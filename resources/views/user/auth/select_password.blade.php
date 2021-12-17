@extends('layouts.user.auth.app')

@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{--       <livewire:posts />--}}
        @livewire('user-google-select-password', ['google_id' => $google_id])


    </div>
    <!-- /.content-wrapper -->


@endsection


