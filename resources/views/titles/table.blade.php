<div class="table-responsive">
    <table class="table" id="titles-table">
        <thead>
        <tr>
            <th>@lang('models/titles.fields.name')</th>
        <th>@lang('models/titles.fields.details')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($titles as $title)
            <tr>
                <td>{{ $title->name }}</td>
            <td>{{ $title->details }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['titles.destroy', $title->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('titles.show', [$title->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('titles.edit', [$title->id]) }}"
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
