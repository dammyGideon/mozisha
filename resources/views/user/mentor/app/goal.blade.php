
@extends('layouts.user.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('mentor-app-goal', ['conn' => $conn])

    </div>
    <!-- /.content-wrapper -->


@endsection
