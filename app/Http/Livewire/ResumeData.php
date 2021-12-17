<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\Language;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

class ResumeData extends Component
{
    use WithFileUploads;
    public $user;
    public $resume;
    public $old_resume;
    public $old_resume_path;

    public $location;
    public $military;
    public $languages;
    public $other_language;
    public $showForm = false;

    public $old_languages;


    public function showLanguageForm(){
        $this->showForm = true;
    }

    public function hideLanguageForm(){
        $this->showForm = false;
    }


    public function updated($field){
        $this->validateOnly($field,[
           'location' => 'required|max:255',
            'resume'  => 'nullable|mimes:pdf,docs,doc|max:2000'
        ]);
    }

    //Update the about table
    public function updateAbout(){

        //Checks if the user supplies the resume
        if($this->resume){
            //Check for user data
            $data = About::where('user_id', Auth::user()->id)->count();
            if($data > 0){
                //Check for old file an remove
                $data = About::where('user_id', Auth::user()->id)->first();
                if ($data->resume){
                    $this->deleteOldFile($data->resume);
                }
            }
            $file = $this->storeFile();
        }

        //Check if the user already has a record in the About table
        $userAbout = About::where('user_id', Auth::user()->id)->count();
        if ($userAbout < 1) { //if not exist
            if($this->resume){ //if resume is supplied
                About::create([
                    'user_id'                => Auth::user()->id,
                    'military'               => $this->military,
                    'location'               => $this->location,
                    'resume'                 => $file['name'],
                    'resume_original_name'   => $file['original_name'],
                ]);
                $this->refreshSidebar();
            }else{ //if resume is not supplied
                About::create([
                    'user_id'                => Auth::user()->id,
                    'military'               => $this->military,
                    'location'               => $this->location,
                ]);
                $this->refreshSidebar();
            }

        } else {
            //Update the existing record if exists
            if($this->resume){
                //with resume
                About::where('user_id', Auth::user()->id)->update([
                    'military'               => $this->military,
                    'location'               => $this->location,
                    'resume'                 => $file['name'],
                    'resume_original_name'   => $file['original_name'],
                ]);
                $this->refreshSidebar();
            }else{
                //without resume
                About::where('user_id', Auth::user()->id)->update([
                    'military'               => $this->military,
                    'location'               => $this->location,
                ]);
                $this->refreshSidebar();
            }

        }
    }

    public function refreshSidebar(){
        if(Auth::user()->hasRole('mentor')){
            $this->emitTo('mentor-sidebar', 'refresh');
        }
        if(Auth::user()->hasRole('mentee')){
            $this->emitTo('mentee-sidebar', 'refresh');
        }
    }

    public function insertOtherLanguage(){

        if (!empty($this->other_language)){
            //Find if exist
            $language = Language::where(['user_id' => Auth::user()->id, 'language' => $this->other_language])->count();
            if($language > 0){
                $this->showForm = false;
                $this->emit('alert', ['type' => 'success', 'message' => 'Language already selected.']);
            }else{

                Language::create([
                    'user_id' => Auth::user()->id,
                    'language' => $this->other_language,
                ]);

                $this->showForm = false;
                $this->refresh();
                $this->refreshSidebar();
                $this->emit('alert', ['type' => 'success', 'message' => 'Language added successfully.']);

            }

        }
    }

    public function removeLanguage($id){

            //Find if exist
            Language::where(['id' => $id])->delete();

            $this->refresh();
            $this->refreshSidebar();
            $this->emit('alert', ['type' => 'success', 'message' => 'Language deleted successfully.']);

    }


    //Updates the Languages table
    public function updateLanguage(){
        if (!empty($this->languages)){

            $language = Language::where(['user_id' => Auth::user()->id, 'language' => $this->languages])->count();
            if($language < 1){
                Language::create([
                    'user_id' => Auth::user()->id,
                    'language' => $this->languages,
                ]);
            }

        }



    }

    public function updateProfile()
    {
        $this->validate([
            'location' => 'required|max:255',
            'resume'  => 'nullable|mimes:pdf,docs,doc|max:2000'
        ]);

        //Updates the About table
        $this->updateAbout();

        //Updates the laguages table
        $this->updateLanguage();


        $this->refresh();
        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);
    }

    public function refresh(){
        $user = About::where('user_id', Auth::user()->id)->count();
        if ($user < 1){
            $this->military        = '';
            $this->old_resume      = '';
            $this->old_resume_path = '';
            $this->location        = '';
            $this->user            = '';
        }else{
            $userAccount = User::find(Auth::user()->id);
            $user = About::where('user_id', Auth::user()->id)->first();


                $this->military     = $user->military;
                $this->old_resume   = $user->resume_original_name;
                $this->old_resume_path = $user->FilePath.'/'.$user->resume;
                $this->location     = $user->location;
                $this->user         = $userAccount;


        }

        if(Language::where('user_id', Auth::user()->id)){
            $languages = Language::where('user_id', Auth::user()->id)->get();
            $this->old_languages = $languages;
        }

    }

    public function storeFile()
        {

        $file =  $this->resume;
        $original_filename = $file->getClientOriginalName();
        $filename = time() .Str::random(50).'_'.$original_filename;

        $path = $file->storeAs('public', $filename);

            $fileData =
            [
                'name'          => $filename,
                'original_name' => $original_filename,
            ];

            return $fileData;
        }

    protected function deleteOldFile($filename){
            Storage::delete('/public/'.$filename);
    }

    public function mount($user){
        $this->user = $user;
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.mentee.resume-data');
    }
}
