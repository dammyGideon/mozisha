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
                            <h3 class="page-title">Upcoming Events</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Events</li>
                                <li class="breadcrumb-item active">Upcoming</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                        <x-alert />
                        <div class="card">
                            <div class="card-body">

                                <!-- Blog list -->
                                <div class="row">

                                    @if($events)

                                        @foreach($events as $event)
                                            <div class="col-12 col-md-6 col-xl-4">
                                                <div class="course-box blog grid-blog">
                                                    <div class="blog-image mb-0">
                                                        <a href="#"><img class="img-fluid" src="{{$event->ImagePath}}" alt="Event Image"></a>
                                                    </div>
                                                    <div class="course-content">
                                                        <span class="date">
                                                            {{ $event->start_date. ', ' .$event->start_hour.':'.$event->start_minute.$event->start_meridian.'.'.$event->start_time_zone }}
                                                            <i class="far fa-location-arrow"></i> {{$event->location}}
                                                        </span>
                                                        <span class="course-title">{{ Str::limit($event->theme, $limit = 45, $end = '...') }}</span>
                                                        <p>{{ Str::limit($event->details, $limit = 150, $end = '...') }}</p>
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="/event/{{$event->id}}/edit" class="text-success">
                                                                    <i class="far fa-edit"></i> View/Edit
                                                                </a>
                                                            </div>
                                                            <div class="col text-right">
                                                                    <a  class="text-primary">
                                                                        <i class="far fa-star"></i> {{$event->status}}
                                                                    </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{ $events->links('components.admin.pagination-links') /* For pagination links */}}
                                    <!-- Pagination -->



                                        <!-- /Pagination -->
                                    @endif
                                </div>
                                <!-- /Blog list -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->


    </div>
    <!-- /Main Wrapper -->
</div>

