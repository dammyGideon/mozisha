@extends('layouts.event.app')

@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<livewire:dashboard />--}}
        @livewire('events-patron')

    </div>
    <!-- /.content-wrapper -->


@endsection
