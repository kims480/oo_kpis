@extends('layouts.app')

@section('content')
    <section class="bg-slate-500 shadow-md p-2 mb-3 rounded-md text-xl text-cyan-50">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    Add  @lang('models/wilayats.singular')
                </div>
            </div>
        </div>
    </section>

    <div class="content">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'wilayats.store']) !!}

            <div class="card-body">
                <div class="row">
                    @include('wilayats.fields')
                </div>
            </div>

            <div class="card-footer ">
                {!! Form::submit('Save', ['class' => 'bg-blue-500 mr-3  hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline','type'=>'input']) !!}
                <a href="{{ route('wilayats.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">
                 @lang('crud.cancel')
                </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
