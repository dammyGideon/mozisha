
@extends('layouts.chat.app')

@section('content')

        {{--<livewire:dashboard />--}}
        @livewire('mentee-chat-room', ['connect_id_string' => $connect_id_string])

@endsection

