@extends('layouts.app')

@section('content')
<div class="card ">
    <div class="card-header">
            <div class="flex w-full p-1 justify-between content-between">
                <div class="col-sm-6">
                   @lang('models/batteryAdds.plural')
                </div>
                <div class="col-sm-6 d-flex flex content-end self-end ">
                    <a class="btn btn-primary mr-3"
                       href="{{ route(__('models/batteryAdds.singular').'.create') }}">
                         @lang('crud.add_new')
                    </a>
                    @can('gen.permissions')
                        <a class="btn btn-success "
                        href="{{route('insert.permissions',__('models/batteryAdds.singular')) }}">
                            @lang('crud.initiate_permissions')
                        </a>
                    @endcan
                </div>
                @include('layouts.app.common')
            </div>
        </div>
    </div>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('battery_adds.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


