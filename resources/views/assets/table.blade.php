<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered" id="assets-table">
        <thead>
        <tr>
            <th>@lang('models/assets.fields.name')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
            @if (empty($assets))
            <tr>
                Currently No Assets added
            </tr>
            @else
         @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->name }}</td>
                <td class="flex justify-center">
                    {!! Form::open(['route' => ['assets.destroy', $asset->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('assets.show', [$asset->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('assets.edit', [$asset->id]) }}"
                           class='btn btn-success btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
         @endforeach
         @endif
        </tbody>
    </table>
</div>
