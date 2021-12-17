
@extends('layouts.user.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('mentor-apprenticeship-view', ['user' => $user, 'app' => $app])

    </div>
    <!-- /.content-wrapper -->


@endsection

