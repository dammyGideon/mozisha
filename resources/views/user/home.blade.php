
@extends('layouts.user.home.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('homepage')

    </div>
    <!-- /.content-wrapper -->


@endsection
