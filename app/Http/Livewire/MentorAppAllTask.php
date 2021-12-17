<?php

namespace App\Http\Livewire;

use App\Mail\MenteeAppNewTaskEmail;
use App\Mail\MenteeAppUpdateTaskEmail;
use App\Mail\MentorResponseRatingEmail;
use App\Models\Connect;
use App\Models\DutyRating;
use App\Models\DutyResponse;
use App\Models\PeriodicDuty;
use App\Models\Rating;
use App\Models\ResponseReply;
use App\Models\TaskComment;
use App\Models\TaskCommentReply;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class MentorAppAllTask extends Component
{
    use WithFileUploads;
    public $user;
    public $conn;
    public $tasks;

    public $showTasks = true;
    public $viewTask  = false;

    public $task_id;
    public $task;

    //Response reply parametes
    public $reply;
    public $replies;
    public $comments;
    public $comment;

    //update properties
    public $title;
    public $details;
    public $deadline;
    public $link_1;
    public $link_2;
    public $attach;
    public $attach_name;

    //Response parameters
    public $response;
    public $rating;

    public $curr_rating;


    //Form toggle
    public $editForm;
    public $replyForm;


    public function showEditForm()
    {
        $this->editForm = true;
    }

    public function hideEditForm()
    {
        $this->editForm = false;
    }

    public function showReplyForm($comment_id)
    {
        $this->replyForm = $comment_id;
    }

    public function fetchTaskView($task_id){
        $this->task = PeriodicDuty::where('id', $task_id)->first();
        $this->task_id = $task_id;

        if ($this->task){
            //Details of the edit form.
            $this->title       = $this->task->title;
            $this->details     = $this->task->details;
            $this->deadline    = $this->task->deadline;
            $this->link_1      = $this->task->link_1;
            $this->link_2      = $this->task->link_2;
            $this->attach_name = $this->task->file_original_name;

            $this->fetchResponse($task_id);
            $this->fetchComments();
        }

    }


    public function fetchResponse($task_id){
        $this->response = DutyResponse::where('duty_id', $task_id)->first();
    }


    public function updated($field){
        $this->validateOnly($field, [
            'title'     => 'required|max:255',
            'deadline'  => 'required|max:255',
            'details'   => 'required|max:4000',
            'link_1'    => 'nullable|max:255',
            'link_2'    => 'nullable|max:255',
            'attach'    => 'nullable|mimes:jpg,jpeg,epub,png,gif,doc,docx,pdf,mp4,mp3|max:20000'
        ]);
    }

    public function updateTask(){
        $this->validate([
            'title'     => 'required|max:255',
            'deadline'  => 'required|max:255',
            'details'   => 'required|max:4000',
            'link_1'    => 'nullable|max:255',
            'link_2'    => 'nullable|max:255',
            'attach'    => 'nullable|mimes:jpg,jpeg,epub,png,gif,doc,docx,pdf,mp4,mp3|max:20000'
        ]);


        //Check and Delete old file
        $data = PeriodicDuty::find($this->task->id);
        //Check if file is supplied, then store it
        if ($this->attach){
            if ($data->file){
                $this->deleteOldFile($data->file);
            }
            $file = $this->storeFile();
        }else{
            //If there is an old file
            if ($data->file){
                $file = [
                    'name'          => $data->file,
                    'original_name' => $data->file_original_name,
                ];
            }else{
                $file = [
                    'name'          => null,
                    'original_name' => null,
                ];
            }
        }

        PeriodicDuty::where('id', $this->task->id)->update([
            'title'              => $this->title,
            'deadline'           => $this->deadline,
            'details'            => $this->details,
            'link_1'             => $this->link_1,
            'link_2'             => $this->link_2,
            'file'               => $file['name'],
            'file_original_name' => $file['original_name'],
        ]);

        //Mail the user concerning the update
        $data = [
            'email'         => $this->user->email,
            'name'          => $this->user->name,
            'mentor_name'   => Auth::user()->name,
            'app_name'      => $this->conn->apprenticeship->title,
            'deadline'      => $this->deadline,
            'task_title'    => $this->title,
            'task_details'  => Str::limit($this->details, $limit = 100, $end = '...'),
            'date_and_time' => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
        ];
        Mail::to($this->user->email)->send(new MenteeAppUpdateTaskEmail($data));

        $this->fetchTaskView($this->task->id);
        $this->emit('alert', ['type' => 'success', 'message' => 'Task updated successfully.']);

    }

    public function sendReply(){
        $this->validate([
            'reply' => 'required|max:2000',
        ]);
        ResponseReply::create([
           'mentor_id'   => $this->response->mentor_id,
           'mentee_id'   => $this->response->mentee_id,
           'connect_id'  => $this->response->connect_id,
           'response_id' => $this->response->id,
           'sender_id'   => Auth::user()->id,
           'reply'       => $this->reply,
        ]);
        $this->reply = '';
        $this->fetchReplies();
        $this->emit('alert', ['type' => 'success', 'message' => 'Message sent.']);
    }

    public function fetchReplies(){

        if($this->response){ //checks if there is a response on the task.
            $this->replies = ResponseReply::where('response_id', $this->response->id)->get();
        }

    }

    public function addRating(){
        $this->validate([
           'rating' => 'required|max:255',
        ]);
        //Check if response as been rated
        $response = DutyRating::where('response_id', $this->response->id)->count();
        if($response > 0){
            DutyRating::where('response_id', $this->response->id)->update([
                'rating'      => $this->rating,
            ]);

            $this->fetchResponse($this->task->id);
            $this->emit('alert', ['type' => 'success', 'message' => 'Response updated successfully.']);
        }else{
            DutyRating::create([
                'mentor_id'   => $this->task->mentor_id,
                'mentee_id'   => $this->task->mentee_id,
                'connect_id'  => $this->conn->id,
                'response_id' => $this->response->id, //But currently undefined
                'rating'      => $this->rating,
            ]);
            $this->fetchResponse($this->task->id);
            $this->emit('alert', ['type' => 'success', 'message' => 'Response rated successfully.']);

        }
        //Mail the user concerning the new task
        $data = [
            'email'            => $this->user->email,
            'name'             => $this->user->name,
            'mentor_name'      => $this->conn->mentor->name,
            'app_name'         => $this->conn->apprenticeship->title,
            'rating'           => $this->rating,
            'response_title'   => $this->response->title,
            'response_details' => Str::limit($this->response->details, $limit = 100, $end = '...'),
            'task_title'       => $this->title,
            'date_and_time'    => Carbon::now()->format('d M Y'). ', '. Carbon::now()->format('h:iA'),
        ];
        Mail::to($this->user->email)->send(new MentorResponseRatingEmail($data));

    }

    public function removeTask($task_id){
        //Delete the task itself
        PeriodicDuty::where('id', $task_id)->update([
            'status' => 'deleted'
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Task deleted successfully.']);
        $this->showTasks();
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


    public function removeFile()
    {

    }

    public function showTasks(){
        $this->fetchTasks();
        $this->showTasks = true;
        $this->viewTask  = false;
    }

    public function backToList(){
        $this->showTasks();
    }

    public function viewTask($task_id){
        $this->showTasks = false;
        $this->viewTask  = true;
        $this->fetchTaskView($task_id);
        $this->fetchComments();
    }


    //Comments section
    public function dropComment()
    {
        $this->validate([
            'comment' => 'required|max:3000',
        ]);
        TaskComment::create([
            'user_id'    => Auth::user()->id,
            'connect_id' => $this->conn->id,
            'task_id'    => $this->task->id,
            'message'    => $this->comment
        ]);

        $this->comment = '';
        $this->fetchComments();
        $this->emit('alert', ['type' => 'success', 'message' => 'Comment dropped.']);
    }

    public function dropReply($comment_id)
    {
        $this->validate([
            'reply' => 'required|max:1500',
        ]);
        TaskCommentReply::create([
            'user_id'          => Auth::user()->id,
            'connect_id'       => $this->conn->id,
            'task_comment_id'  => $comment_id,
            'message'          => $this->reply
        ]);

        $this->reply = '';
        $this->fetchComments();
        $this->emit('alert', ['type' => 'success', 'message' => 'Reply dropped.']);
    }

    public function fetchComments(){
            $this->comments = TaskComment::where('task_id', $this->task_id)->get();
    }

    public function mount($conn){
        $this->conn = $conn;
        $this->user = $conn->mentee;
        $this->fetchTasks();
    }

    public function fetchTasks(){
        $this->tasks = PeriodicDuty::orderBy('id', 'DESC')->where(['connect_id' => $this->conn->id, ['status', '!=', 'deleted']])->get();
    }

    public function deleteTask($task_id){
        //Delete from the lowest on heirahecal tree


        $resp = DutyResponse::where('duty_id', $task_id)->first();
        if($resp){
            $repl = ResponseReply::where('response_id', $resp->id)->first();
            if($repl){ //if there is any reply
                //Delete replies first
                ResponseReply::where('response_id', $resp->id)->delete();
            }

            $respRate = DutyRating::where('response_id', $resp->id)->first();
            if($respRate){ //Check if there is rating
                //Delete response and ratings
                DutyRating::where('response_id', $resp->id)->delete();
            }


            DutyResponse::where('duty_id', $task_id)->delete();
        }

        //Delete the task itself
        PeriodicDuty::where('id', $task_id)->delete();

        $this->emit('alert', ['type' => 'success', 'message' => 'Task deleted successfully.']);
        $this->showTasks();
    }

    public function render()
    {
        return view('livewire.mentor.app.mentor-app-all-task');
    }
}
