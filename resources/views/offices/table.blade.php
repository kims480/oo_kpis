<div class="table-responsive">
    <table class="table">
        <thead>
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
                    <td>{{ $office->region->name}}</td>
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
