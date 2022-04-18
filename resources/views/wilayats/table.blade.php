{{-- <div class="table-responsive">
    <table class="table table-striped table-sm table-bordered" id="wilayats-table">
        <thead>
        <tr>
            <th>@lang('models/wilayats.fields.name')</th>
        <th>@lang('models/wilayats.fields.region_id')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($wilayats as $wilayat)
            <tr>
                <td>{{ $wilayat->name }}</td>
            <td>{{ $wilayat->region_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['wilayats.destroy', $wilayat->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('wilayats.show', [$wilayat->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('wilayats.edit', [$wilayat->id]) }}"
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
</div> --}}

<table class="table">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="">{!! Form::text('name', null, ['class'=> 'text-sm','placeholder'=>'Whilayat name']) !!}</th>
            <th class="">{!! Form::text('gorvern_id', null, ['class'=> 'text-sm','placeholder'=>'Gorern Name']) !!}
            </th>
            <th class="actions-header"></th>
        </tr>
        <tr>
            <th class="">@lang('models/wilayats.fields.name')</th>
            <th class="">@lang('models/wilayats.fields.region_id')
            </th>
            <th class="actions-header">@lang('crud.action')</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach($wilayats as $wilayat)
        <tr class="">
            <td >{{ $wilayat->name }}</td>
            <td>{{ $wilayat->govern->name }}</td>
            <td class="actions "> {!! Form::open(['route' => ['wilayats.destroy', $wilayat->id], 'method' => 'delete']) !!}

                    <a href="{{ route('wilayats.show', [$wilayat->id]) }}"
                       class='btn btn-default btn-xs'>
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('wilayats.edit', [$wilayat->id]) }}"
                       class='btn btn-success btn-xs'>
                        <i class="far fa-edit"></i>
                    </a>
                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger btn btn-text', 'onclick' => "return confirm('Are you sure?')"]) !!}

                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

