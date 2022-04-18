<div class="table-responsive table-striped table-sm table-bordered">
    <table class="table" id="siteSnags-table">
        <thead>
        <tr>
            <th>#</th>
        <th>@lang('models/siteSnags.fields.site_id')</th>
        <th>Main Categ</th>
        <th>Sub Categ</th>
        <th>@lang('models/siteSnags.fields.snagmangs')</th>
        <th>Reported By</th>
        <th>Domain</th>
        <th>Reported In</th>
        <th>Remarks</th>
        <th>Status</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($siteSnags as $siteSnag)
            <tr>
                <td>{{ $siteSnag->id }}</td>
            <td>{{ $siteSnag->site->site_id }}</td>
            <td>{{ $siteSnag->snag->sub_categ->main_categ->name}}</td>
            <td>{{ $siteSnag->snag->sub_categ->name}}</td>
            <td>{{ $siteSnag->snag->description}}</td>
            <td>{{ $siteSnag->reportedBy->name ??''}}</td>
            <td>{{ $siteSnag->snagdomain->name ??''}}</td>
            <td>{{ $siteSnag->snagreporter->name ??''}}</td>
            <td>{{ $siteSnag->snagremark->remark ??''}}</td>
            <td>{{ $siteSnag->snagstatus->name ??''}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['siteSnags.destroy', $siteSnag->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('siteSnags.show', [$siteSnag->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('siteSnags.edit', [$siteSnag->id]) }}"
                           class='btn btn-success btn-xs'>
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
