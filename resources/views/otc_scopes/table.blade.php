<div class="table-responsive">
    <table class="table" id="otcScopes-table">
        <thead>
        <tr>
            <th>@lang('models/otcScopes.fields.id')</th>
        <th>@lang('models/otcScopes.fields.name')</th>
        <th>@lang('models/otcScopes.fields.details')</th>
        <th>@lang('models/otcScopes.fields.add_by')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($otcScopes as $otcScope)
            <tr>
                <td>{{ $otcScope->id }}</td>
            <td>{{ $otcScope->name }}</td>
            <td>{{ $otcScope->details }}</td>
            <td>{{ $otcScope->add_by }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['otcScopes.destroy', $otcScope->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('otcScopes.show', [$otcScope->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('otcScopes.edit', [$otcScope->id]) }}"
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
