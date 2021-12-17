
@extends('layouts.user.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('mentee-checkout-page', ['user' => $user, 'connect' => $connect])

    </div>
    <!-- /.content-wrapper -->


@endsection

