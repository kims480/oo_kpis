@extends('layouts.app')

@section('content')
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   @lang('models/tickets.plural')
                </div>
                <div class="flex justify-content-end">
                    <a class="btn btn-primary mr-3"
                       href="{{ route('tickets.create') }}">
                         @lang('crud.add_new')
                    </a>
                    @can('gen.permissions')
                        <a class="btn btn-success "
                        href="{{route('insert.permissions',__('models/tickets.singular')) }}">
                            @lang('crud.initiate_permissions')
                        </a>
                    @endcan
                </div>
                @include('layouts.app.common')
            </div>
        </div>
    </section> --}}
    <div class="card">
        <section class="content-header">

            <h3>@lang('models/tickets.plural')</h3>
            <a class="btn btn-default btn-sm ml-auto" href="{{ route('tickets.create') }}">
                @lang('crud.add_new')
            </a>
            <a class="btn btn-default btn-sm ml-auto" href="{{ route('tickets.mail') }}">
                mail
            </a>
            <a class="btn btn-default btn-sm ml-2" href="{{ route('insert.permissions', __('models/tickets.singular')) }}">
                @lang('crud.initiate_permissions')
            </a>
        </section>

        <div class="card-body overflow-hidden">

            @include('flash::message')

            <div class="clearfix"></div>


            {{-- @include('tickets.table') --}}
        @livewire('tickets.tickets')

        </div>
        <div class="card-footer ">

            {{-- @include("infyom/common/paginate", ['records' => $tickets]) --}}
            {{-- <x-paginate-component :items="$tickets"> --}}


        </div>
    </div>
@endsection
