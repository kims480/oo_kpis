<?php

namespace App\DataTables;

use App\Models\Snagmang;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SnagDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'snagmangs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Snagmang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Snagmang $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => true, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => new Column(['title' => __('models/snagmangs.fields.id'), 'data' => 'id','searchable' => false]),
            'report_date' => new Column(['title' => __('models/snagmangs.fields.report_date'), 'data' => 'report_date','searchable' => false]),
            'site_id' => new Column(['title' => __('models/snagmangs.fields.site_id'), 'data' => 'site_id','searchable' => true]),
            'region_id' => new Column(['title' => __('models/snagmangs.fields.region_id'), 'data' => 'region_id','searchable' => true]),
            'office_id' => new Column(['title' => __('models/snagmangs.fields.office_id'), 'data' => 'office_id','searchable' => false]),
            'description' => new Column(['title' => __('models/snagmangs.fields.description'), 'data' => 'description','searchable' => false]),
            'main_categ_id' => new Column(['title' => __('models/snagmangs.fields.main_categ_id'), 'data' => 'main_categ_id','searchable' => true]),
            'sub_categ_id' => new Column(['title' => __('models/snagmangs.fields.sub_categ_id'), 'data' => 'sub_categ_id','searchable' => true]),
            'domain_id' => new Column(['title' => __('models/snagmangs.fields.domain_id'), 'data' => 'domain_id','searchable' => true]),
            'snag_remark_id' => new Column(['title' => __('models/snagmangs.fields.snag_remark_id'), 'data' => 'snag_remark_id','searchable' => true]),
            'snag_reported_id' => new Column(['title' => __('models/snagmangs.fields.snag_reported_id'), 'data' => 'snag_reported_id','searchable' => false]),
            'closure_date' => new Column(['title' => __('models/snagmangs.fields.closure_date'), 'data' => 'closure_date','searchable' => false]),
            'snag_closed_by' => new Column(['title' => __('models/snagmangs.fields.snag_closed_by'), 'data' => 'snag_closed_by','searchable' => false]),
            'remarks' => new Column(['title' => __('models/snagmangs.fields.remarks'), 'data' => 'remarks','searchable' => false])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'snagmangs_datatable_' . time();
    }
}
