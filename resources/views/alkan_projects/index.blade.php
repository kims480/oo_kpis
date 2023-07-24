@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   @lang('models/alkanProjects.plural')
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a class="btn btn-primary mr-3"
                       href="{{ route(__('models/alkanProjects.router').'.create') }}">
                         @lang('crud.add_new')
                    </a>
                    @can('gen.permissions')
                        <a class="btn btn-success "
                        href="{{route('insert.permissions',__('models/alkanProjects.router')) }}">
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
                @include('alkan_projects.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('infyom/common/paginate', ['records' => $alkanProjects])

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

