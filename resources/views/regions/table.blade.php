<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered" id="regions-table">
        <thead>
        <tr>
            <th>@lang('models/regions.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($regions as $region)
            <tr>
                <td>{{ $region->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['regions.destroy', $region->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('regions.show', [$region->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('regions.edit', [$region->id]) }}"
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
