@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header">
            {{-- <div class="col-sm-12 d-flex align-items-center"> --}}
            @lang('models/snags.plural')

            <a class="btn btn-default btn-sm py-0 ml-auto" href="{{ route('snags.create') }}">
                @lang('crud.add_new')
            </a>
            @can('gen.permissions')
                <a class="btn btn-default p-0  btn-sm ml-1"
                    href="{{ route('insert.permissions', __('models/snags.singular')) }}">
                    @lang('crud.initiate_permissions')
                </a>
            @endcan
            @can('snags.export')
                <a class="btn btn-default p-0  btn-sm ml-1"
                    href="{{ route('snags.export', __('models/snags.export')) }}">
                    {{__('models/snags.export')}}
                </a>
            @endcan
            {{-- </div> --}}
        </div>
        {{-- @livewire('snags') --}}
        {{-- @livewire('products') --}}
        {{-- @dump($filter) --}}
        {{-- @dump($snagslist) --}}
        @include('snags.table')
    </div>
    {{-- @foreach ($snagslist as $site => $snags)
        <div class="row">
            <div class="col-md-2">{{ $site }}</div>
            <div class="col-md-10">
                @foreach ($snags as $snag)
                    @foreach ($snag as $key => $snagy)
                        <div class="row col-md-6 P-0">
                            <div class="col-md-2">{{ $key }}</div>
                            <div class="col-md-10">{{ $snagy }}</div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @endforeach --}}
    {{-- site {{$site}} : {{$snag}} --}}
    @push('page_scripts')
        {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            window.addEventListener('swal:modal', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                });
            });

            window.addEventListener('swal:confirm', event => {
                swal({
                        title: event.detail.title,
                        text: event.detail.text,
                        icon: event.detail.type,
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.livewire.emit('delete', event.detail.id);
                        }
                    });
            });

        </script> --}}
    @endpush
@endsection
