@extends('layouts.app')

@section('content')
    <div class="card">
        <section class="card-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        @lang('models/siteSnags.singular')
                    </div>
                </div>
            </div>
        </section>

        {{-- {!! Form::model( ['route' => ['siteSnags.create' ], 'method' => 'post']) !!} --}}
        <div class="card-body">
            @include('adminlte-templates::common.errors')
            @include('site_snags.fields')
        </div>

    </div>
@endsection
