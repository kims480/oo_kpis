@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   @lang('models/titles.plural')
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a class="btn btn-primary mr-3"
                       href="{{ route('titles.create') }}">
                         @lang('crud.add_new')
                    </a>
                    @can('gen.permissions')
                        <a class="btn btn-success "
                        href="{{route('insert.permissions',__('models/titles.singular')) }}">
                            @lang('crud.initiate_permissions')
                        </a>
                    @endcan
                </div>
                @include('layouts.app.common')
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('titles.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('"infyom/common/paginate', ['records' => $titles])

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

