{{-- @push('third_party_stylesheets')
    @include('layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-sm table-bordered']) !!}

@push('third_party_scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush --}}

<div class="table-control">

</div>
<table class="table">
    <thead>
        <tr>
            <th>{!!__('models/sites.fields.id')!!}</th>
            <th>{!!__('models/sites.fields.site_id')!!}</th>
            <th>{!!__('models/sites.fields.lat')!!}</th>
            <th>{!!__('models/sites.fields.long')!!}</th>
            <th>{!!__('models/sites.fields.nis')!!}</th>
            <th>{!!__('models/sites.fields.prio')!!}</th>
            <th>{!!__('models/sites.fields.categ')!!}</th>
            <th>{!!__('models/sites.fields.governate')!!}</th>
            <th>{!!__('models/sites.fields.wilayat')!!}</th>
            <th>{!!__('models/sites.fields.office')!!}</th>
            <th>{!!__('models/sites.fields.address')!!}</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>site_id</th>
            <th>lat</th>
            <th>long</th>
            <th>nis</th>
            <th>prio {!!__('models/sites.fields.prio')!!}</th>
            <th>categ</th>
            <th>governate</th>
            <th>wilayat</th>
            <th>office</th>
            <th>address</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ID</td>
            <td>site_id</td>
            <td>lat</td>
            <td>long</td>
            <td>nis</td>
            <td>prio {!!__('models/sites.fields.prio')!!}</td>
            <td>categ</td>
            <td>governate</td>
            <td>wilayat</td>
            <td>office</td>
            <td>address</td>
        </tr>
    </tbody>
</table>
