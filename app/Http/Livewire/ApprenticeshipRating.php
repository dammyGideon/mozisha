<?php

namespace App\Http\Livewire;


use App\Models\MentorRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ApprenticeshipRating extends Component
{
    public $conn;
    public $rate;
    public $comment;

    public function mount()
    {
        $this->conn = Session::get('conn');
        $this->fetchRating();
    }

    public function fetchRating()
    {
        $rating = MentorRating::where(['connect_id' => $this->conn->id])->first();
        if ($rating)
        {
            $this->rate = $rating->rating;
            $this->comment = $rating->comment;
        }

    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'rate'    => 'required|max:255',
            'comment' => 'required|max:4000'
        ]);
    }

    public function dropRate()
    {
        $this->validate([
            'rate'    => 'required|max:255',
            'comment' => 'required|max:4000'
        ]);

        //if previous rating exist
        if(MentorRating::where(['connect_id' => $this->conn->id])->count())
        {
            MentorRating::where(['connect_id' => $this->conn->id])->update([
                'rating'      => $this->rate,
                'comment'   => $this->comment
            ]);
            $this->emit('alert', ['type' => 'success', 'message' => 'Rate updated successfully.']);
            return;
        }

        //if No previous rating exist
        MentorRating::create([
            'mentee_id'  => Auth::user()->id,
            'mentor_id'  => $this->conn->mentor_id,
            'connect_id' => $this->conn->id,
            'rating'     => $this->rate,
            'comment'    => $this->comment
        ]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Mentor rated successfully.']);
    }

    public function render()
    {
        return view('livewire.mentee.app.apprenticeship-rating');
    }
}
