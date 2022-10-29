@extends('layouts.app')

@section('content')
    <div class="card ">
        <section class="content-header flex justify-between ">
            <div class="col-sm-6">
                @lang('models/batteryAdds.plural')
            </div>
            <div class="flex content-between self-end ">

                <a class="btn btn-primary mr-3" href="{{ route(__('models/batteryAdds.singular') . '.create') }}">
                    @lang('crud.add_new')
                </a>
                <a class="btn btn-primary mr-3" href="{{ route(__('models/batteryAdds.singular') . '.export') }}">
                    @lang('models/batteryAdds.export')
                </a>
                {{-- <button wire:click.prevent="export" x-data={isOpen:false}
                    class="transition ease-in-out btn btn-default relative has-tooltips text-sm " data-mdb-ripple="true"
                    @mouseover="isOpen=true" @mouseover.away="isOpen=false">
                    <x-tooltip message='Export excel' />
                    <i class="far fa-file-excel "></i> Export
                </button> --}}
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
