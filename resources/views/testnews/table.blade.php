<div class="table-responsive">
    <table class="table" id="testnews-table">
        <thead>
        <tr>
            <th>@lang('models/testnews.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($testnews as $testnew)
            <tr>
                <td>{{ $testnew->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['testnews.destroy', $testnew->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('testnews.show', [$testnew->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('testnews.edit', [$testnew->id]) }}"
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
