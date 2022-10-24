<?php

namespace App\DataTables;

use App\Models\BatteryAdd;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class BatteryAddDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'battery_adds.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BatteryAdd $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BatteryAdd $model)
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
            'id' => new Column(['title' => __('models/batteryAdds.fields.id'), 'data' => 'id','searchable' => false]),
            'site__deployed' => new Column(['title' => __('models/batteryAdds.fields.site__deployed'), 'data' => 'site__deployed','searchable' => false]),
            'shelter_num' => new Column(['title' => __('models/batteryAdds.fields.shelter_num'), 'data' => 'shelter_num','searchable' => false]),
            'ref_wo' => new Column(['title' => __('models/batteryAdds.fields.ref_wo'), 'data' => 'ref_wo','searchable' => false]),
            'ref_cr' => new Column(['title' => __('models/batteryAdds.fields.ref_cr'), 'data' => 'ref_cr','searchable' => false]),
            'batter_1_sn' => new Column(['title' => __('models/batteryAdds.fields.batter_1_sn'), 'data' => 'batter_1_sn','searchable' => false]),
            'num_of_rect' => new Column(['title' => __('models/batteryAdds.fields.num_of_rect'), 'data' => 'num_of_rect','searchable' => false]),
            'rect_num' => new Column(['title' => __('models/batteryAdds.fields.rect_num'), 'data' => 'rect_num','searchable' => false]),
            'bank_num' => new Column(['title' => __('models/batteryAdds.fields.bank_num'), 'data' => 'bank_num','searchable' => false]),
            'install_date' => new Column(['title' => __('models/batteryAdds.fields.install_date'), 'data' => 'install_date','searchable' => false]),
            'aircon_status' => new Column(['title' => __('models/batteryAdds.fields.aircon_status'), 'data' => 'aircon_status','searchable' => false]),
            'rect_charge_status' => new Column(['title' => __('models/batteryAdds.fields.rect_charge_status'), 'data' => 'rect_charge_status','searchable' => false]),
            'old_batteries_aging' => new Column(['title' => __('models/batteryAdds.fields.old_batteries_aging'), 'data' => 'old_batteries_aging','searchable' => false]),
            'llvd' => new Column(['title' => __('models/batteryAdds.fields.llvd'), 'data' => 'llvd','searchable' => false]),
            'blvd' => new Column(['title' => __('models/batteryAdds.fields.blvd'), 'data' => 'blvd','searchable' => false])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'battery_adds_datatable_' . time();
    }
}
