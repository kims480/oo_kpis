<div class="table-responsive table-striped table-sm table-bordered">
    <table class="table" id="snagdomains-table">
        <thead>
        <tr>
            <th>@lang('models/snagdomains.fields.id')</th>
        <th>@lang('models/snagdomains.fields.name')</th>
        <th>@lang('models/snagdomains.fields.note')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($snagdomains as $snagdomain)
            <tr>
                <td>{{ $snagdomain->id }}</td>
            <td>{{ $snagdomain->name }}</td>
            <td>{{ $snagdomain->note }}</td>
                <td width="120">
                    {!! Form::open(['route' => [__('models/snagdomains.url').'.destroy', $snagdomain->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route(__('models/snagdomains.url').'.show', [$snagdomain->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route(__('models/snagdomains.url').'.edit', [$snagdomain->id]) }}"
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
