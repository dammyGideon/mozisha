
@extends('layouts.user.home.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('team-member-view', ['member' => $member])

    </div>
    <!-- /.content-wrapper -->


@endsection
