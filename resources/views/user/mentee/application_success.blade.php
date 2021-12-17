
@extends('layouts.user.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('application-success', ['user' => $user, 'app' => $app, 'request' => $request])

    </div>
    <!-- /.content-wrapper -->


@endsection

