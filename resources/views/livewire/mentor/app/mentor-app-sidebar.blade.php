<div>
    <div class="progress-bar-custom">

        @if($percentage_profile == 100)
            <h6>Profile update completed </h6>
        @else
            <h6>Apprenticeship progress.</h6>
        @endif
        <div class="pro-progress">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="background-color: #420175; width: {{$percentage_profile}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="tooltip" style="background-color: #420175;">{{$percentage_profile}}%</div>
        </div>
    </div>

    <div class="custom-sidebar-nav">
        <ul>
            <li><a href="{{route('mentor.dashboard')}}"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a class="edit-link" href="{{'/mentor/'.$conn->id.'/goal'}}"><i class="fas fa-clock"></i>Set Goal <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="schedule-timings.html"><i class="fas fa-hourglass-start"></i>New Task <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="schedule-timings.html"><i class="fas fa-hourglass-end"></i>All tasks <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="chat.html"><i class="fas fa-comments"></i>Responses <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="{{route('mentor.profile')}}"><i class="fas fa-user-cog"></i>Apprenticeship Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li>
        </ul>
    </div>
</div>

