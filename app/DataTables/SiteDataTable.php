<?php

namespace App\DataTables;

use App\Models\Site;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SiteDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'sites.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Site $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Site $model)
    {
        return $model->newQuery()->with(['govern','wilayat','office']);
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
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
            'id' => new Column(['title' => __('models/sites.fields.id'), 'data' => 'id','searchable' => false]),
            'site_id' => new Column(['title' => __('models/sites.fields.site_id'), 'data' => 'site_id','searchable' => false]),
            'lat' => new Column(['title' => __('models/sites.fields.lat'), 'data' => 'lat','searchable' => false]),
            'long' => new Column(['title' => __('models/sites.fields.long'), 'data' => 'long','searchable' => false]),
            'nis' => new Column(['title' => __('models/sites.fields.nis'), 'data' => 'nis','searchable' => false]),
            'prio' => new Column(['title' => __('models/sites.fields.prio'), 'data' => 'prio','searchable' => false]),
            'type' => new Column(['title' => __('models/sites.fields.type'), 'data' => 'type','searchable' => false]),
            'categ' => new Column(['title' => __('models/sites.fields.categ'), 'data' => 'categ','searchable' => false]),
            'governate' => new Column(['title' => __('models/sites.fields.govern_id'), 'data' => 'govern.name','searchable' => false]),
            'wilayat' => new Column(['title' => __('models/sites.fields.wilayat_id'), 'data' => 'wilayat.name','searchable' => false]),
            'office' => new Column(['title' => __('models/sites.fields.office_id'), 'data' => 'office.name','searchable' => false]),
            'address' => new Column(['title' => __('models/sites.fields.address'), 'data' => 'address','searchable' => false])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sites_datatable_' . time();
    }
}
