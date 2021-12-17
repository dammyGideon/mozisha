<?php

namespace App\Http\Livewire;

use App\Mail\MenteeAppNewTaskEmail;
use App\Mail\MenteeConnectEmail;
use App\Models\Connect;
use App\Models\PeriodicDuty;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class MentorAppNewTask extends Component
{
    use WithFileUploads;

    public $user;
    public $conn;

    public $title;
    public $details;
    public $deadline;
    public $link_1;
    public $link_2;
    public $attach;
    public $students = [];
    public $connects;


    public function mount($user){
        $this->user  =  $user;
        $this->fetchApprentices();
    }

    public function fetchApprentices()
    {
        $this->connects = Connect::where('mentor_id', Auth::user()->id)->groupBy('mentee_id')->get();
    }


    public function updated($field){
        $this->validateOnly($field, [
            'title'       => 'required|max:255',
            'deadline'    => 'required|max:255',
            'details'     => 'required|max:4000',
            'students'    => 'required|min:1',
            'link_1'      => 'nullable|max:255',
            'link_2'      => 'nullable|max:255',
            'attach'      => 'nullable|mimes:jpg,jpeg,epub,png,gif,doc,docx,pdf,mp4,mp3|max:20000'
        ]);
    }

    public function setTask(){
        $this->validate([
            'title'        => 'required|max:255',
            'deadline'     => 'required|max:255',
            'details'     => 'required|max:4000',
            'students'    => 'required|min:1',
            'link_1'      => 'nullable|max:255',
            'link_2'      => 'nullable|max:255',
            'attach'      => 'nullable|mimes:jpg,jpeg,epub,png,gif,doc,docx,pdf,mp4,mp3|max:20000'
        ]);

        //Check if file is supplied, then store it
        if (!empty($this->attach)){
            $file = $this->storeFile();
        }else{
            $file = [
                'name'          => null,
                'original_name' => null,
            ];
        }

        foreach ($this->students as $student){
            $studentDetails = User::where('email', $student)->first();
            $connect        = Connect::where(['mentor_id' => Auth::user()->id, 'mentee_id' => $studentDetails->id])->first();
            PeriodicDuty::create([
                'title'              => $this->title,
                'deadline'           => $this->deadline,
                'details'            => $this->details,
                'link_1'             => $this->link_1,
                'link_2'             => $this->link_2,
                'file'               => $file['name'],
                'file_original_name' => $file['original_name'],
                'mentor_id'          => Auth::user()->id,
                'mentee_id'          => $studentDetails->id,
                'connect_id'         => $connect->id,
            ]);

            try {
                //Mail the user concerning the new task
                $data = [
                    'email'         => $studentDetails->email,
                    'name'          => $studentDetails->name,
                    'mentor_name'   => Auth::user()->name,
                    'app_name'      => $connect->apprenticeship->title,
                    'task_type'     => $this->deadline,
                    'type'          => '',
                    'deadline'      => $this->deadline,
                    'task_title'    => $this->title,
                    'task_details'  => Str::limit($this->details, $limit = 100, $end = '...'),
                    'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
                ];
                Mail::to($student)->send(new MenteeAppNewTaskEmail($data));

            }catch (\Exception $e){

            }
        }

        $this->discard();
        $this->emit('alert', ['type' => 'success', 'message' => 'Task uploaded successfully.']);

    }

    public function discard(){
        $this->title    = '';
        $this->details  = '';
        $this->deadline = '';
        $this->link_1   = '';
        $this->link_2   = '';
        $this->attach   = '';
        $this->students = [];
//        $this->attach  = '';
    }


    public function storeFile()
    {

        $file =  $this->attach;
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




    public function render()
    {
        return view('livewire.mentor.app.mentor-app-new-task');
    }
}
