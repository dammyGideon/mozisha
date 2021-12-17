<?php

namespace App\Http\Livewire;

use App\Models\PersonalInterest;
use App\Models\PersonalAccomplishment as MyAccomplishment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PersonalAccomplishment extends Component
{

    public $user;
    public $accomplish;
    public $old_accomplishes;
    public $other_accomplish;

    public $interest;
    public $old_interests;

    public $other_interest;
    public $showInterestForm = false;
    public $showAccomplishForm = false;



    public function showInterestForm(){
        $this->showInterestForm = true;

    }

    public function hideInterestForm(){
        $this->showInterestForm= false;
    }

    public function showAccomplishForm(){
        $this->showAccomplishForm = true;
    }

    public function hideAccomplishForm(){
        $this->showAccomplishForm= false;
    }


    public function updated($field)
    {
        $this->validateOnly($field,[
            'accomplish' => 'nullable|max:255',
            'interest'   => 'nullable|max:255'
        ]);
    }

    //Update the about table
    public function updateAccomplish()
    {
        if(!empty($this->accomplish)){
            //Check if the user already has an accomplishment with same name in the About table
            $userAbout = MyAccomplishment::where(['user_id' => $this->user->id, 'accomplishment' => $this->accomplish])->count();
            if ($userAbout < 1) { //if not exist
                MyAccomplishment::create([
                    'user_id'                => $this->user->id,
                    'accomplishment'         => $this->accomplish,
                ]);

            }
        }
    }

    public function insertOtherAccomplish(){
        $this->validate([
            'other_accomplish' => 'required|max:255',
        ]);

        if (!empty($this->other_accomplish)){
            //Find if exist
            $accomplish = MyAccomplishment::where(['user_id' => $this->user->id, 'accomplishment' => $this->other_accomplish])->count();
            if($accomplish > 0){
                $this->showAccomplishForm = false;
                $this->emit('alert', ['type' => 'success', 'message' => 'You\'ve already shared this Accomplishment.']);
            }else{

                MyAccomplishment::create([
                    'user_id' => $this->user->id,
                    'accomplishment' => $this->other_accomplish,
                ]);

                $this->showAccomplishForm = false;
                $this->refresh();
                $this->emit('alert', ['type' => 'success', 'message' => 'Accomplishment added successfully.']);

            }

        }
    }

    public function removeAccomplish($id){

        //Find if exist
        MyAccomplishment::where(['id' => $id])->delete();

        $this->refresh();
        $this->emit('alert', ['type' => 'success', 'message' => 'Accomplishment deleted successfully.']);

    }

    public function updateInterest(){

        if (!empty($this->interest)){

            $interest = PersonalInterest::where(['user_id' => $this->user->id, 'interest' => $this->interest])->count();
            if($interest < 1){
                PersonalInterest::create([
                    'user_id' => $this->user->id,
                    'interest' => $this->interest,
                ]);
            }

        }



    }

    public function insertOtherInterest(){
        $this->validate([
            'other_interest'   => 'required|max:255'
        ]);

        if (!empty($this->other_interest)){
            //Find if exist
            $interest = PersonalInterest::where(['user_id' => $this->user->id, 'interest' => $this->other_interest])->count();
            if($interest > 0){
                $this->showInterestForm = false;
                $this->emit('alert', ['type' => 'success', 'message' => 'You\'ve already shared this Interest.']);
            }else{

                PersonalInterest::create([
                    'user_id' => $this->user->id,
                    'interest' => $this->other_interest,
                ]);

                $this->showInterestForm = false;
                $this->refresh();
                $this->emit('alert', ['type' => 'success', 'message' => 'Interest added successfully.']);

            }

        }
    }

    public function removeInterest($id){

        //Find if exist
        PersonalInterest::where(['id' => $id])->delete();

        $this->refresh();
        $this->emit('alert', ['type' => 'success', 'message' => 'Interest deleted successfully.']);

    }

    //Updates the Languages table
    public function updateProfile()
    {
        $this->validate([
            'accomplish' => 'nullable|max:255',
            'interest'   => 'nullable|max:255'
        ]);

        //Updates the About table
        $this->updateAccomplish();

        //Updates the laguages table
        $this->updateInterest();


        $this->refresh();
        $this->emitTo('mentee-sidebar', 'refresh');
        $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated successfully.']);
    }

    public function refresh()
    {

          $this->refreshInterest();
          $this->refreshAccomplish();
          $this->emitTo('mentor-sidebar', 'refresh');

    }

    public function refreshInterest()
    {
            $interests = PersonalInterest::where('user_id', Auth::user()->id)->get();
            $this->old_interests = $interests;
    }

    public function refreshAccomplish()
    {
            $accomplishes = MyAccomplishment::where('user_id', Auth::user()->id)->get();
            $this->old_accomplishes = $accomplishes;
    }



    public function mount($user){
        $this->user = $user;
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.mentor.personal-accomplishment');
    }
}
