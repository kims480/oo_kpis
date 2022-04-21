@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Section 1 -->
        <section class="content-header">

            <h3 class="text-xl font-black leading-none text-white select-none logo">@lang('models/assets.plural')<span
                    class="text-blue-600"></span></h3>

            <div class="ml-auto">
                <a href="{{ route('assets.create') }}" class="btn btn-default btn-xs text-xs">@lang('crud.add_new')</a>
                @can('gen.permissions')
                    <a href="{{ route('insert.permissions', __('models/assets.singular')) }}"
                        class="inline-block btn btn-default btn-xs text-xs font-semibold ">@lang('crud.initiate_permissions')</a>
                @endcan
            </div>

        </section>



        <section class="card-body">
            <div class="content px-3">
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Info</p>

                    @include('flash::message')
                  </div>

                <div class="clearfix"></div>



            </div>
            @include('assets.table')
        </section>
    </div>
@endsection
