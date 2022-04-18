<div class="container-fluid">
    <div class="row bg-white shadow-sm rounded p-2 mb-2">
        <h3>Snag Search Query</h3>
        <div class="d-flex align-items-center justify-content-around">
            <div class="col-sm-2">

                <div class="form-group">
                    {!! Form::label('name', __('models/query.fields.date_from') . ':') !!}
                    <input type="date" class="form-control " style=""
                        wire:model="searchColumns.report_date.0" />
                </div>
                <div class="form-group">
                    {!! Form::label('name', __('models/query.fields.date_to') . ':') !!}
                    <input type="date" class="form-control " style=""
                        wire:model="searchColumns.report_date.1" />
                </div>
            </div>
            <div class="form-group ">
                {!! Form::label('name', __('models/query.fields.site_id') . ':') !!}
                <input type="text" class="form-control" wire:model="searchColumns.site_id" />
            </div>
            <div class="form-group ">
                {!! Form::label('name', __('models/query.fields.description') . ':') !!}
                <input type="text" class="form-control" wire:model="searchColumns.description" />
            </div>
            <div class="form-group ">
                {!! Form::label('name', __('models/query.fields.main_categ_id') . ':') !!}
                <select class="form-control" wire:model="searchColumns.main_categ_id">
                    <option value="">-- choose category --</option>
                    @foreach ($categories as $id => $category)
                        <option value="{{ $id }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ">
                {!! Form::label('name', __('models/query.fields.sub_categ_id') . ':') !!}
                <select class="form-control" wire:model="searchColumns.sub_categ_id">
                    <option value="">-- choose Sub Categ --</option>
                    @foreach ($sub_categories as $id => $sub_category)
                        <option value="{{ $id }}">{{ $sub_category }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <table class="table table-responsive table-striped table-sm table-bordered bg-white">
        <thead>
            <tr>
                <th  wire:click="sortByColumn('report_date')">
                    Report Date
                    @if ($sortColumn == 'report_date')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th  wire:click="sortByColumn('siteId')">
                    Site_ID
                    @if ($sortColumn == 'site_id')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th  wire:click="sortByColumn('description')">
                    Description
                    @if ($sortColumn == 'description')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th  wire:click="sortByColumn('main_categ_id')">
                    Category
                    @if ($sortColumn == 'main_categ_id')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th  wire:click="sortByColumn('sub_categ_id')">
                    Sub Categ
                    @if ($sortColumn == 'sub_categ_id')
                    <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                    <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th  >
                    Remark
                    @if ($sortColumn == 'snag_remark_name')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th  >
                    Domain
                    @if ($sortColumn == 'domain')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th  >
                    Reported By
                    @if ($sortColumn == 'snag_reporter_name')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->report_date }}</td>
                    <td>{{ $product->site }}</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>{{ $product->main_categ_name ?? '' }}</td>
                    <td>{{ $product->sub_categ_name ?? '' }}</td>
                    <td>{{ $product->snag_remark_name ?? '' }}</td>
                    <td>{{ $product->snag_domain_name ?? '' }}</td>
                    <td>{{ $product->snag_reporter_name ?? '' }}</td>
                    {{-- <td>{{ $product->site->office_name ?? '' }}</td>
                    <td>{{ $product->site->wilayat ?? '' }}</td>
                    <td>{{ $product->site->governate ?? '' }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}

    @dump($sortColumn)
</div>
