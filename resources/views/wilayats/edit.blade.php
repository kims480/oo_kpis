@extends('layouts.app')

@section('content')
    <section class="bg-slate-500 shadow-md p-2 mb-3 rounded-md text-xl text-cyan-50r">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                     Edit @lang('models/wilayats.singular')
                </div>
            </div>
        </div>
    </section>

    <div class="bg-white shadow-md p-3 rounded-md">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($wilayat, ['route' => ['wilayats.update', $wilayat->id], 'method' => 'patch']) !!}

            <div class="p-3">
                <div class="flex flex-col justify-between items-center md:flex-row">
                    @include('wilayats.fields')
                </div>
            </div>

            <div class="flex align-middle justify-end px-5 py-3 border-t-2 border-slate-500footer">
                {!! Form::submit('Save', ['class' => 'bg-blue-500 mr-3  hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline']) !!}
                <a href="{{ route('wilayats.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">
                    @lang('crud.cancel')
                 </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
