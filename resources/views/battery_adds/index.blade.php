@extends('layouts.app')

@section('content')
    {{-- @include('battery_adds.index_') --}}
    @livewire('batteries.list-site-batteries')
@endsection
