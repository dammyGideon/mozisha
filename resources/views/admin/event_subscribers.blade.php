
@extends('layouts.admin.app')

@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{--       <livewire:dashboard />--}}
        @livewire('event-subscribers', ['event' => $event])


    </div>
    <!-- /.content-wrapper -->


@endsection
