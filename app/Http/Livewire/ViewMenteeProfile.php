<?php

namespace App\Http\Livewire;

use App\Mail\MenteeAppRequestEmail;
use App\Mail\MenteeConnectEmail;
use App\Mail\MentorAppRequestEmail;
use App\Mail\MentorConnectEmail;
use App\Models\About;
use App\Models\Apprenticeship;
use App\Models\Connect;
use App\Models\FamiliarTool;
use App\Models\Language;
use App\Models\NeededExperience;
use App\Models\NeededIndustry;
use App\Models\PersonalInterest;
use App\Models\Request;
use App\Models\UserDetail;
use App\Models\UserEducation;
use App\Models\UserWorkExperience;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class ViewMenteeProfile extends Component
{

    public $user;
    public $detail;
    public $about;
    public $education;
    public $workExperience;
    public $tool;
    public $industry;
    public $language;
    public $neededExperience;
    public $personalInterest;


    public $req;
    public $connCheck; //Checks if they are already connected

    public function mount($user, $req){
        $this->user = $user;
        $this->req = $req;
        $this->findConnect();
        $this->fetchDetails();
        $this->fetchAbout();
        $this->fetchEducation();
        $this->fetchNeededExperience();
        $this->fetchWorkExperience();
        $this->fetchTool();
        $this->fetchIndustry();
        $this->fetchLanguage();
        $this->fetchInterest();
    }

    public function findConnect(){
        $conn = Connect::where(['apprenticeship_id' => $this->req->apprenticeship_id, 'mentor_id' => Auth::user()->id, 'mentee_id' => $this->user->id])->count();
        $this->connCheck = $conn;
    }

    public function fetchDetails(){
        $this->detail = UserDetail::where('user_id', $this->user->id)->first();
    }

    public function fetchLanguage(){
        $this->language = Language::where('user_id', $this->user->id)->get();
    }

    public function fetchInterest(){
        $this->personalInterest = PersonalInterest::where('user_id', $this->user->id)->get();
    }

    public function fetchAbout(){
        $this->about = About::where('user_id', $this->user->id)->first();
    }

    public function fetchEducation(){
        $this ->education =  UserEducation::where('user_id', $this->user->id)->first();;
    }

    public function fetchWorkExperience(){
        $this->workExperience =  UserWorkExperience::where('user_id', $this->user->id)->get();
    }

    public function fetchTool(){
        $this->tool = FamiliarTool::where('user_id', $this->user->id)->get();
    }

    public function fetchIndustry(){
        $this->industry =  NeededIndustry::where('user_id', $this->user->id)->get();
    }

    public function fetchNeededExperience(){
        $this->neededExperience = NeededExperience::where('user_id', $this->user->id)->get();
    }


 /*
 *
 * Application processing methods
 *
 * @Accept Button
 *
 */

    public function acceptRequest(){
        //Fetch Apprenticehip
       $app = Apprenticeship::where('id', $this->req->apprenticeship_id)->first();

        //Update request table
        Request::where(['apprenticeship_id' => $app->id, 'mentee_id' => $this->user->id])->update([
            'status' => 'Accepted',
        ]);
        //Creates connection
        $conn = $this->createConnection($app, Auth::user()->id);

        try {
            //Mails mentor concerning the connect
            $data = [
                'email'         => Auth::user()->email,
                'name'          => Auth::user()->name,
                'mentee_name'   => $this->user->name,
                'app_name'      => $conn->apprenticeship->title,
                'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
            ];
            Mail::to(Auth::user()->email)->send(new MentorConnectEmail($data));

            //Mails mentee concerning the connect
            $data = [
                'email'         => $this->user->email,
                'name'          => $this->user->name,
                'app_name'      => $conn->apprenticeship->title,
                'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
            ];
            Mail::to($this->user->email)->send(new MenteeConnectEmail($data));


        }catch (\Exception $e){

        }

        return redirect('/acceptance/'.$conn->id.'/success');

    }

    public function createConnection($app, $mentor_id){
        //Creates a connection between the mentor and the mentee
        if ($app->type == 'Premium'){
            $status = 'Pending';
            $payment_status = 'Pending';
        }else{
            $status = 'Active';
            $payment_status = 'Free';
        }

         return Connect::create([
            'mentor_id'           => $mentor_id,
            'mentee_id'           => $this->user->id,
            'apprenticeship_id'   => $app->id,
            'type'                => $app->type,
            'price'               => $app->price,
            'payment_status'      => $payment_status,
            'connect_id_string'   => Str::random(20).Carbon::now()->timestamp.Str::random(20),
            'start_timestamp'     => $app->start_timestamp,
            'end_timestamp'       => $app->end_timestamp,
            'initial_end_year'    => $app->end_year,
            'apprentice_period'   => $app->apprentice_period,
            'mentor_period'       => $app->mentor_period,
            'apprentice_service'  => 'Not Needed',
            'status'              => $status,
        ]);

    }



    public function render()
    {
        return view('livewire.mentor.view-mentee-profile');
    }
}

