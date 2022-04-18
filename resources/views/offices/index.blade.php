@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header">
            {{-- <div class="col-sm-12 d-flex align-items-center"> --}}
            @lang('models/offices.plural')

            <a class="btn btn-default btn-sm py-0 ml-auto" href="{{ route('offices.create') }}">
                @lang('crud.add_new')
            </a>
            @can('gen.permissions')
                <a class="btn btn-default p-0  btn-sm ml-1"
                    href="{{ route('insert.permissions', __('models/offices.singular')) }}">
                    @lang('crud.initiate_permissions')
                </a>
            @endcan
            {{-- </div> --}}
        </div>

            @livewire('offices-wire')

    </div>
@endsection
