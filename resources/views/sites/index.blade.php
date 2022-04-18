@extends('layouts.app')

@section('content')
    <div class="content-header bg-primary p-0">
        <h3>@lang('models/sites.plural')</h3>
        <a class="btn btn-default btn-sm ml-auto" href="{{ route('sites.create') }}">
            @lang('crud.add_new')
        </a>
        <a class="btn btn-default btn-sm ml-2" href="{{ route('insert.permissions', __('models/sites.singular')) }}">
            @lang('crud.initiate_permissions')
        </a>
    </div>
    @livewire('sites-wire')
@endsection
