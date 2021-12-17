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
                            <h3 class="page-title">Testimonial</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">List Of Testimonials</li>
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

                                    @if($members)

                                        @foreach($members as $blog)
                                            <div class="col-12 col-md-6 col-xl-4">
                                                <div class="course-box blog grid-blog">
                                                    <div class="blog-image mb-0">
                                                        <a href="blog-details.html"><img class="img-fluid" src="{{$blog->ImagePath}}" alt="Post Image"></a>
                                                    </div>
                                                    <div class="course-content">
                                                        <span class="date">{{$blog->created_at->format('M d Y')}}</span>
                                                        <span>{{ $blog->last_name.' ' .$blog->first_name }}</span><br>
                                                        <hr><br>
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <p>Profession: {{$blog->profession}}</p>
                                                            <p>Rating:
                                                                @if($blog->rating == 5)
                                                                    Excellent
                                                                @endif
                                                                @if($blog->rating == 4)
                                                                    Very Good
                                                                @endif
                                                                @if($blog->rating == 3)
                                                                    Good
                                                                @endif
                                                                @if($blog->rating == 2)
                                                                    Fair
                                                                @endif
                                                                @if($blog->rating == 1)
                                                                    Poor
                                                                @endif
                                                            </p>
                                                            <hr>
                                                            <br>
                                                            <p> LinkedIn:&nbsp;<a href="{{$blog->linkedin}}" target="_blank"> {{$blog->linkedin}}</a></p>
                                                        </div>

                                                        <hr><br>
                                                        <div class="alert alert-success alert-dismissible fade show" style="padding: 10px; text-align: justify;" role="alert">
                                                            <p style=" width: 100%;"> &nbsp;{{$blog->testimony}}</p>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="/testimonials/{{$blog->id}}/edit" class="text-success">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </a>
                                                            </div>
                                                            <div class="col text-right">

                                                                <a href="#" wire:click="remove({{$blog->id}})" class="text-danger">
                                                                    <i class="far fa-trash-alt"></i><i wire:loading wire:target="updateStatus" class="fa fa-spinner fa-spin"></i> Remove
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{ $members->links('components.admin.pagination-links') /* For pagination links */}}
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

