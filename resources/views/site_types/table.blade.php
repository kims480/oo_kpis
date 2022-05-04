<div class="table-responsive table-striped table-sm table-bordered">
    <table class="table" id="siteTypes-table">
        <thead>
        <tr>
            <th>@lang('models/siteTypes.fields.id')</th>
        <th>@lang('models/siteTypes.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($siteTypes as $siteType)
            <tr>
                <td>{{ $siteType->id }}</td>
            <td>{{ $siteType->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => [__('models/siteTypes.url').'.destroy', $siteType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route(__('models/siteTypes.url').'.show', [$siteType->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route(__('models/siteTypes.url').'.edit', [$siteType->id]) }}"
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
