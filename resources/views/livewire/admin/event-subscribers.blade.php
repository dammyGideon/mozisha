<div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!--Admin header-->
        <livewire:admin-header />
        <!-- /Admin header-->

        <!-- Admin siebar-->
        <x-admin_sidebar />
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">{{$event->theme}}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Subscribers</li>

                            </ul>
                            <x-alert />
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->



                <div class="row">
                    <div class="col-md-12">

                        @if($customMailForm)
                            <!-- Recent Orders -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Booking List: Total {{$count}} (Subscribers)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="card-body">
                                                <div class="card-body">
                                                    <form action="/event_notice/send/{{$event->id}}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="row">
                                                                    <label class="col-lg-3 col-form-label">Contacts</label>
                                                                    <div class="col-lg-9">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <input type="email" name="feedback_email" placeholder="Feedback Email" class="form-control">
                                                                                    @error('feedback_email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <input type="text" name="feedback_phone" placeholder="Feedback Phone" class="form-control">
                                                                                    @error('feedback_phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-lg-3 col-form-label">Subject</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" name="subject" placeholder="Email Subject" class="form-control">
                                                                        @error('subject') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-lg-3 col-form-label">Content</label>
                                                                    <div class="col-lg-9">
                                                                        <textarea rows="8" name="mail_content" cols="5" id="#mytextarea"  class="form-control" placeholder="Enter your broadcast message here..."></textarea>
                                                                        @error('mail_content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <button style="background-color: #420175 !important; border-color: #420175;" type="submit" class="btn btn-primary">Send Message</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <!--Password reset livewire component-->
                                        <button wire:click="hideCustomMailForm" wire:loading.remove wire:target="hideCustomMailForm" class="btn btn-success" type="button" style="background-color: #420175; border-color: #420175;"> <<< Back to subscribers</button>
                                        <button  wire:loading wire:target="hideCustomMailForm" class="btn btn-success" type="button" style="background-color: #420175; border-color: #420175;"> <i class="fa fa-spinner fa-spin"></i> Processing request...</button>
                                    </div>
                                </div>
                                <!-- /Recent Orders -->
                        @else
                            <!-- Recent Orders -->
                                <div class="card card-table">
                                    <div class="card-header">
                                        <h4 class="card-title">Booking List: Total {{$count}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            @if($subs)
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Booking Time</th>
                                                        <th>Event_ID</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($subs as $sub)
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="/subscriber/{{$sub->id}}/profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$sub->ImagePath}}" alt="User Image"></a>
                                                                    <a href="/subscriber/{{$sub->id}}/profile">{{$sub->name}}</a>
                                                                </h2>
                                                            </td>
                                                            <td>{{$sub->phone}}</td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="mailto:{{$sub->email}}" target="_blank" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$sub->ImagePath}}" alt="User Image"></a>
                                                                    <a href="mailto:{{$sub->email}}" target="_blank">{{$sub->email}} </a>
                                                                </h2>
                                                            </td>
                                                            <td>{{$sub->created_at->format('d-M-Y')}} <span class="text-primary d-block">{{$sub->created_at->format('h:iA')}}</span></td>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="/event/{{$sub->event_id}}/edit" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{$sub->ImagePath}}" alt="User Image"></a>
                                                                    <a href="/event/{{$sub->event_id}}/edit">{{$sub->event_id}} </a>
                                                                </h2>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    {{ $subs->links('components.admin.pagination-links') /* For pagination links */}}
                                                    <!-- Pagination -->
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <!--Password reset livewire component-->
                                        <button wire:click="remind" wire:loading.remove wire:target="remind" class="btn btn-primary" type="button">Remind Users of the event</button>
                                        <button wire:loading wire:target="remind" class="btn btn-primary" type="button"><i class="fa fa-spinner fa-spin"></i> Processing reminder..</button>
                                        <button wire:click="showCustomMailForm" wire:loading.remove wire:target="showCustomMailForm" class="btn btn-success" type="button" style="background-color: #420175; border-color: #420175;">Custom Notification</button>
                                        <button  wire:loading wire:target="showCustomMailForm" class="btn btn-success" type="button" style="background-color: #420175; border-color: #420175;"> <i class="fa fa-spinner fa-spin"></i> Processing form...</button>
                                    </div>
                                </div>
                                <!-- /Recent Orders -->
                        @endif


                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
</div>

