<div>
    <div class="card-body ">
        <div class="content px-3">
            {{-- @if (session()->has('flash_message')) --}}

            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">Info</p>
                @include('flash::message')
            </div>
            {{-- @endif --}}
        </div>
        <div class="clearfix"></div>
        {{-- @include('offices.table') --}}
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th class="w-1/6">@lang('models/offices.fields.id')</th> --}}
                        <th class="main"></th>
                        <th class="w-auto"></th>
                        <th class="actions-header">
                            <button wire:click.prevent="export">Export</button>
                        </th>
                    </tr>
                    <tr>
                        {{-- <th class="w-1/6">@lang('models/offices.fields.id')</th> --}}
                        <th class="main">@lang('models/offices.fields.name')</th>
                        <th class="w-auto">@lang('models/offices.fields.region_id')</th>
                        <th class="actions-header">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offices as $office)
                        <tr>
                            {{-- <td>{{ $office->id }}</td> --}}
                            <td class="">{{ $office->name }}</td>
                            <td>{{ $office->region->name }}</td>
                            <td class="actions">
                                {!! Form::open(['route' => ['offices.destroy', $office->id], 'method' => 'delete']) !!}

                                <a href="{{ route('offices.show', [$office->id]) }}" class='btn btn-default '>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('offices.edit', [$office->id]) }}" class='btn btn-sucess btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-text', 'onclick' => "return confirm('Are you sure?')"]) !!}

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{ $offices->links() }}
        {{-- @include('adminlte-templates::common.paginate', [
            'records' => $offices,
        ]) --}}

    </div>
</div>
