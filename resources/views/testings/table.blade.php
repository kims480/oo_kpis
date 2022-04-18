<div class="table-responsive">
    <table class="table" id="testings-table">
        <thead>
        <tr>
            <th>@lang('models/testings.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($testings as $testing)
            <tr>
                <td>{{ $testing->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['testings.destroy', $testing->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('testings.show', [$testing->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('testings.edit', [$testing->id]) }}"
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
