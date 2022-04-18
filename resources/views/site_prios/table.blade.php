<div class="table-responsive table-striped table-sm table-bordered">
    <table class="table" id="sitePrios-table">
        <thead>
        <tr>
            <th>@lang('models/sitePrios.fields.id')</th>
        <th>@lang('models/sitePrios.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($sitePrios as $sitePrio)
            <tr>
                <td>{{ $sitePrio->id }}</td>
            <td>{{ $sitePrio->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['sitePrios.destroy', $sitePrio->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sitePrios.show', [$sitePrio->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('sitePrios.edit', [$sitePrio->id]) }}"
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
