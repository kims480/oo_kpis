<div class="table-responsive table-striped table-sm table-bordered">
    <table class="table" id="siteCategs-table">
        <thead>
        <tr>
            <th>@lang('models/siteCategs.fields.id')</th>
        <th>@lang('models/siteCategs.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($siteCategs as $siteCateg)
            <tr>
                <td>{{ $siteCateg->id }}</td>
            <td>{{ $siteCateg->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => [__('models/siteCategs.url').'.destroy', $siteCateg->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route(__('models/siteCategs.url').'.show', [$siteCateg->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route(__('models/siteCategs.url').'.edit', [$siteCateg->id]) }}"
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
