
@extends('layouts.user.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('view-apprenticeship', ['user' => $user, 'app' => $app])

    </div>
    <!-- /.content-wrapper -->


@endsection

