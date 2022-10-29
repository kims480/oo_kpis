@extends('layouts.app')

@section('content')
    <div class="card ">
        <section class="content-header">
                <div class="col-sm-6">
                    @lang('models/batteryAdds.plural')
                </div>
                <div class="col-sm-6 d-flex flex content-end self-end ">
                    <a class="btn btn-primary mr-3" href="{{ route(__('models/batteryAdds.singular') . '.create') }}">
                        @lang('crud.add_new')
                    </a>
                    @can('gen.permissions')
                        <a class="btn btn-success " href="{{ route('insert.permissions', __('models/batteryAdds.singular')) }}">
                            @lang('crud.initiate_permissions')
                        </a>
                    @endcan
                </div>
                @include('layouts.app.common')
        </section>

        <div class="card-body overflow-hidden">
            @include('flash::message')
            <div class="clearfix"></div>
            @include('battery_adds.table')

        </div>
        <div class="card-footer ">
            {{-- <x-paginate-component :items="$siteSnags"/> --}}
            {{-- @include('adminlte-templates::common.paginate', [
                'records' => $siteSnags,
            ]) --}}
            <div class="float-right">

            </div>

        </div>
    </div>
@endsection
