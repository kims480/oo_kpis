@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                      @lang('models/offices.singular')
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($office, ['route' => ['offices.update', $office->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('offices.fields')
                    <select data-te-select-init data-te-select-filter="true" name="selectx" id="select1">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                        <option value="6">Six</option>
                        <option value="7">Seven</option>
                        <option value="8">Eight</option>
                        <option value="9">Nine</option>
                        <option value="10">Ten</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('offices.index') }}" class="btn btn-default">
                    @lang('crud.cancel')
                 </a>
            </div>


            {!! Form::close() !!}

        </div>
    </div>
    @push('scripts')
       <script>
            const mySelect= document.getElementById('select1');
            const select = new Select(selectEl);
            select.open();
       </script>
    @endpush
@endsection
