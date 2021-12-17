<div>
        {{-- <div class="progress-bar-custom">
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
        </div> --}}
    <div class="custom-sidebar-nav">
        <ul>
            <li><a href="{{route('mentee.dashboard')}}"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="{{route('mentee.apprenticeship.find')}}" ><i class="fas fa-clock"></i>Find Apprenticeship <span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="{{route('mentee.dashboard')}}"><i class="fas fa-user-md"></i>Mentors <span><i class="fas fa-chevron-right"></i></span></a></li>
             <li><a href="{{route('mentee.profile.settings')}}"><i class="fas fa-user-cog"></i>Update profile<span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="{{route('mentee.invoices')}}"><i class="fas fa-money-bill"></i>Invoices<span><i class="fas fa-chevron-right"></i></span></a></li>
            <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li>

        </ul>
    </div>
</div>
