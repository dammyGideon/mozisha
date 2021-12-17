
@extends('layouts.user.auth.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        {{--<livewire:dashboard />--}}
        @livewire('password-token')


    </div>
    <!-- /.content-wrapper -->


@endsection

