@extends('layouts.app')

@section('content')
    <div class="container">

        @include('flash::message')

        <div class="card">
            <div class="content-header flex items-center">

                <h3 class="text-md flex-grow">
                    <i class="fas fa-list mr-3"></i> Wilayats List
                </h3>
                <a class="btn btn-primary text-xs font-bold py-1" href="{{ route('wilayats.create') }}">
                    <span><i class="fa fa-plus"></i> @lang('crud.add_new')</span>
                </a>
                @can('gen.permissions')
                    <a class="bg-lime-500  text-xs hover:bg-lime-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('insert.permissions', __('models/wilayats.singular')) }}">
                        @lang('crud.initiate_permissions')
                    </a>
                @endcan
            </div>
            @livewire('wilayat-wire')



        </div>


    </div>
@endsection
