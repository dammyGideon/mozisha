
@extends('layouts.admin.app')

@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{--       <livewire:dashboard />--}}
        @livewire('edit-testimonial', ['testimonial' => $testimonial])

    </div>
    <!-- /.content-wrapper -->


@endsection
