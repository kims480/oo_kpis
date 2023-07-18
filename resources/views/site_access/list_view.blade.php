@extends('layouts.app')

@section('content')

    <div class="card">
        <section class="content-header">

            <h3>Site Access List</h3>
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

            @include('site_access.list')

        </div>
        <div class="card-footer ">


        </div>
    </div>
@endsection
