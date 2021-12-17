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
                            <h3 class="page-title">Blog</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Blog</li>
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

                                    @if($blogs)

                                    @foreach($blogs as $blog)
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="course-box blog grid-blog">
                                            <div class="blog-image mb-0">
                                                <a href="blog-details.html"><img class="img-fluid" src="{{$blog->ImagePath}}" alt="Post Image"></a>
                                            </div>
                                            <div class="course-content">
                                                <span class="date">{{$blog->created_at->format('M d Y')}}</span>
                                                <span class="course-title">{{ Str::limit($blog->title, $limit = 45, $end = '...') }}</span>
                                                <p>{!! Str::limit($blog->content, $limit = 150, $end = '...')  !!}</p>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="/blog/{{$blog->id}}/edit" class="text-success">
                                                            <i class="far fa-edit"></i> Edit
                                                        </a>
                                                    </div>
                                                    <div class="col text-right">
                                                        @if($blog->status == 'Inactive')
                                                            <a href="#" class="text-danger" wire:click="updateStatus({{$blog->id}})">
                                                                <i class="far fa-trash-alt"></i><i wire:loading wire:target="updateStatus"  class="fa fa-spinner fa-spin"></i> Inactive
                                                            </a>
                                                        @endif
                                                        @if($blog->status == 'Active')
                                                                <a href="#" wire:click="updateStatus({{$blog->id}})" class="text-danger">
                                                                    <i class="far fa-trash-alt"></i><i wire:loading wire:target="updateStatus" class="fa fa-spinner fa-spin"></i> Active
                                                                </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                        {{ $blogs->links('components.admin.pagination-links') /* For pagination links */}}
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

