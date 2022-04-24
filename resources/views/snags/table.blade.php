<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                {{-- <th class="w-1/6">@lang('models/snags.fields.id')</th> --}}
                <th class="">#</th>
                <th class="w-auto">@lang('models/snags.fields.main_categ')</th>
                <th class="w-auto">@lang('models/snags.fields.sub_categ')</th>
                <th class="main">@lang('models/snags.fields.name')</th>
                <th class="actions-header">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($snagslist as $snag)
                <tr>
                    <td>{{ $snag->id }}</td>
                    <td>{{ $snag->sub_categ->main_categ->name}}</td>
                    <td>{{ $snag->sub_categ->name}}</td>
                    <td class="">{{ $snag->description }}</td>
                    <td class="actions">
                        {!! Form::open(['route' => ['snags.destroy', $snag->id], 'method' => 'delete']) !!}

                            <a href="{{ route('snags.show', [$snag->id]) }}" class='btn btn-default '>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('snags.edit', [$snag->id]) }}" class='btn btn-sucess btn-xs'>
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
