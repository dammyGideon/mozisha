
@extends('layouts.user.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('mentee-profile-settings', ['user' => $user])

    </div>
    <!-- /.content-wrapper -->


@endsection

