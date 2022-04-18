@extends('layouts.app')

@section('content')
    <div class="card">
        <section class="card-header">
            <h3>
                @lang('models/siteSnags.singular')

            </h3>
        </section>

        {!! Form::model($siteSnag, ['route' => ['siteSnags.update', $siteSnag->id], 'method' => 'patch']) !!}
        <div class="card-body">
            @include('adminlte-templates::common.errors')

                @include('site_snags.fields')

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-default">
                Add Snag to Site
            </button>
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('siteSnags.index') }}" class="btn btn-default">
                @lang('crud.cancel')
            </a>
        </div>


        {!! Form::close() !!}
    </div>
    </div>
@endsection
