@extends('layouts.app')

@section('content')
    @include('flash::message')
    <div class="col-md-6 bg-white shadow-sm rounded p-2">
        <div class="d-flex align-items-center">
            <div class="col-md-2">
                <span>Upload File</span>
            </div>
            <form action="{{ route('imports.store') }}" class="d-flex" method="post" enctype="multipart/form-data">
                <div class="custom-file col-md-8">
                    @csrf
                    <input type="file" name='snaglist' class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="col-md-2">
                    {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
                </div>
            </form>
        </div>
    </div>

    @livewire('main-sub-categ')
    {{-- <input type="submit" class="btn btn-primary" value="Upload">
<table class="table">
    <thead>
        <tr>
            <td>A</td>
            <td>B</td>
            <td>C</td>
            <td>D</td>
        </tr>
    </thead>
    <tbody>

        @if (!empty($snagslist))
            @foreach ($snagslist as $snag)
                <tr>
                    <td>{{$snag->site_name}}</td>
                    <td>{{$snag->snag }}</td>
                    <td>{{$snag->long}}</td>
                    <td>{{$snag->snag_reporter }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table> --}}
    {{-- @livewire('products') --}}
    {{-- @dump($filter) --}}
    @dump($snagslist)

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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

        </script>
    @endpush
@endsection
