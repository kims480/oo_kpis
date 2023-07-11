<div class="table-responsive">
    <table class="table" id="otcCategs-table">
        <thead>
        <tr>
            <th>@lang('models/otcCategs.fields.id')</th>
        <th>@lang('models/otcCategs.fields.name')</th>
        <th>@lang('models/otcCategs.fields.add_by')</th>
        <th>@lang('models/otcCategs.fields.details')</th>
        <th>@lang('models/otcCategs.fields.notes')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($otcCategs as $otcCateg)
            <tr>
                <td>{{ $otcCateg->id }}</td>
            <td>{{ $otcCateg->name }}</td>
            <td>{{ $otcCateg->add_by }}</td>
            <td>{{ $otcCateg->details }}</td>
            <td>{{ $otcCateg->notes }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['otcCategs.destroy', $otcCateg->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('otcCategs.show', [$otcCateg->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('otcCategs.edit', [$otcCateg->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
</div>
