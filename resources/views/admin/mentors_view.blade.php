
@extends('layouts.admin.app')

@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{--       <livewire:dashboard />--}}
        @livewire('admin-mentors-profile', ['user' => $user])


    </div>
    <!-- /.content-wrapper -->


@endsection
