@extends('layouts.app')

@section('content')
    <div class="card">
        <section class="card-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="{{ route('users.create') }}">
                            Add New
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="card-body">
            @include('flash::message')
            @include('users.table')
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">

            </div>
        </div>
    </div>
@endsection
