@extends('layouts.app')

@section('content')
    <div class="card">
        <section class="content-header">

            <h3 class="">
                @lang('models/siteSnags.plural')
            </h3>
            <div class="ml-auto">
                <a class="btn btn-default mr-3" href="{{ route('site-snags.create') }}">
                    @lang('crud.add_new')
                </a>
                @can('gen.permissions')
                    <a class="btn btn-success " href="{{ route('insert.permissions', __('models/siteSnags.model')) }}">
                        @lang('crud.initiate_permissions')
                    </a>
                @endcan
            </div>
            @include('layouts.app.common')

        </section>

        <div class="card-body overflow-hidden">

            @include('flash::message')

            <div class="clearfix"></div>


            @include('site_snags.table')


        </div>
        <div class="card-footer ">

                @include('adminlte-templates::common.paginate', [
                    'records' => $siteSnags,
                ])

        </div>
    </div>
@endsection
