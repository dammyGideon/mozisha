<div>
    <div class="progress-bar-custom">

        @if($percentage_profile == 100)
            <h6>Profile update completed </h6>
        @else
            <h6>Complete your profiles.</h6>
        @endif
            <div class="pro-progress">
                <div class="progress progress-sm">
                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{$percentage_profile}}%; background-color: #420175 !important;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="tooltip" style="background-color: #420175;">{{$percentage_profile}}%</div>
            </div>
    </div>

    <div class="custom-sidebar-nav">
        <ul>
            <li><a href="{{route('mentor.dashboard')}}"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a class="edit-link" data-toggle="modal" href="#mentor_new_meeting"><i class="fas fa-users"></i>Book Meeting <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a class="edit-link" href="{{route('mentor.new.task')}}"><i class="fas fa-edit"></i>New Task <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fas fa-clock"></i>Post Apprenticeship <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="{{route('mentor.dashboard')}}"><i class="fas fa-users"></i>Apprentices <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="{{route('mentor.profile.update')}}"><i class="fas fa-user-cog"></i>Update profile <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li>
        </ul>
    </div>
</div>

