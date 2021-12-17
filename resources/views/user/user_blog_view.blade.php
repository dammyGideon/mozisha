
@extends('layouts.user.home.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('user-view-blog', ['blog' => $blog])

    </div>
    <!-- /.content-wrapper -->


@endsection
