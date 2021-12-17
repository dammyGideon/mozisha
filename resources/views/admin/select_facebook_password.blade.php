@extends('layouts.admin.app')

@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{--       <livewire:posts />--}}
        @livewire('admin-facebook-select-password', ['facebook_id' => $facebook_id])


    </div>
    <!-- /.content-wrapper -->


@endsection


