<?php

namespace App\Http\Livewire;

use App\Mail\MenteeAppRequestEmail;
use App\Mail\MenteeCreateAccountEmail;
use App\Mail\MentorAppRequestEmail;
use App\Models\About;
use App\Models\ApprenticeDuty;
use App\Models\ApprenticeHelp;
use App\Models\Apprenticeship;
use App\Models\CompanyInfo;
use App\Models\FamiliarTool;
use App\Models\Language;
use App\Models\NeededExperience;
use App\Models\NeededIndustry;
use App\Models\PersonalInterest;
use App\Models\PersonalAccomplishment as MyAccomplishment;
use App\Models\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserEducation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ViewApprenticeship extends Component
{
    public $app;
    public $user;
    public $details;
    public $company;
    public $appDuty;
    public $appHelp;
    public $language;
    public $interest;
    public $about;
    public $accomp;
    public $phone;

    public $app_user;
    public $status;

    public $profileStatus;


    public function mount($user, $app){
        $this->user = $user;
        $this->app  = $app;
        $this->app_user = User::find($app->user_id);
        $this->phone    = UserDetail::where('user_id', $app->user_id)->first()->phone;

        $this->details();
        $this->company();
        $this->apprenticeDuty();
        $this->apprenticeHelp();
        $this->language();
        $this->language();
        $this->interest();
        $this->about();
        $this->accomplishments();

        //Fetch if application has already been submitted
        $this->status = Request::where(['mentee_id' => Auth::user()->id, 'apprenticeship_id' => $this->app->id])->count();
        $this->profileStatus();
    }

    public function details(){
         $this ->details =  UserDetail::where('user_id', $this->app_user->id)->first();
    }

    public function company(){
        $this->company = CompanyInfo::where('user_id', $this->app_user->id)->first();
    }

    public function apprenticeDuty(){
        $this->appDuty = ApprenticeDuty::where('user_id', $this->app_user->id)->get();
    }

    public function apprenticeHelp(){
        $this->appHelp = ApprenticeHelp::where('user_id', $this->app_user->id)->get();
    }

    public function language(){
        $this->language =  Language::where('user_id', $this->app_user->id)->get();
    }

    public function interest(){
        $this->interest =  PersonalInterest::where('user_id', $this->app_user->id)->get();
    }

    public function about(){
        $this->about = About::where('user_id', $this->app_user->id)->first();
    }

    public function accomplishments(){
        $this->accomp = MyAccomplishment::where('user_id', $this->app_user->id)->get();
    }


    /*
     *
     * Application processing methods
     *
     * @EazyApply Button
     *
     */

    public function apply(){
        //Fetch if application has already been submitted
       $request =  Request::where(['mentee_id' => Auth::user()->id,  'apprenticeship_id' => $this->app->id])->count();
       if($request > 0){
           $this->emit('alert', ['type' => 'info', 'message' => 'You already applied for this apprenticeship.']);
       }else{
          $request =  Request::create([
               'mentee_id'          => Auth::user()->id,
               'mentor_id'          => $this->app_user->id,
               'apprenticeship_id'  => $this->app->id,
               'status'             => 'Pending',

           ]);
           //Fetch apprentice request

           try {
               //Mails mentee concerning the request
               $data = [
                   'email'         => Auth::user()->email,
                   'name'          => Auth::user()->name,
                   'app_name'      => $this->app->title,
                   'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
               ];
               Mail::to(Auth::user()->email)->send(new MenteeAppRequestEmail($data));

               //Mails mentor concerning the request
               $data = [
                   'email'         => $this->user->email,
                   'name'          => $this->user->name,
                   'app_name'      => $this->app->title,
                   'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
               ];
               Mail::to($this->app_user->email)->send(new MentorAppRequestEmail($data));


           }catch (\Exception $e){

           }

           return redirect('/apprenticeship/'.$request->id.'/success');
       }
    }


    /*
     * Information needed to process user profile status
     */
    public function detailStatus(){
        //Check if one of the compulsory fields is present
        if(UserDetail::where('user_id', Auth::user()->id)->first()->age){
            return 1;
        }
        return 0;
    }

    public function userImageStatus()
    {
        if(User::find(Auth::user()->id)->profile_photo_path){
            return 1;
        }
        return 0;
    }

    public function aboutStatus()
    {
        return About::where('user_id', Auth::user()->id)->count();
    }

    public function bioStatus()
    {
        if(About::where('user_id', Auth::user()->id)->first()->biography){
            return 1;
        }
        return 0;
    }

    public function languageStatus()
    {
        return Language::where('user_id', Auth::user()->id)->count();
    }

    public function interestStatus()
    {
        return PersonalInterest::where('user_id', Auth::user()->id)->count();
    }

    public function toolsStatus()
    {
        return FamiliarTool::where('user_id', Auth::user()->id)->count();
    }

    public function neededExperienceStatus()
    {
        return NeededExperience::where('user_id', Auth::user()->id)->count();
    }

    public function industryStatus()
    {
        return NeededIndustry::where('user_id', Auth::user()->id)->count();
    }

    public function educationStatus()
    {
        if(UserEducation::where('user_id', Auth::user()->id)->count() > 0){
            return 1;
        }
        return 0;
    }


    //Check if profile is up to date
    public function profileStatus()
    {
        //Returns true if completed
        if ($this->detailStatus()   < 1 || $this->userImageStatus()        < 1 ||
            $this->aboutStatus()    < 1 || $this->bioStatus()              < 1 ||
            $this->languageStatus() < 1 || $this->interestStatus()         < 1 ||
            $this->toolsStatus()    < 1 || $this->neededExperienceStatus() < 1 ||
            $this->industryStatus() < 1 || $this->educationStatus()        < 1)
        {
            $this->profileStatus = false;
        }else{
            $this->profileStatus = true;
        }

    }

    public function render()
    {
        return view('livewire.mentee.view-apprenticeship');
    }
}
