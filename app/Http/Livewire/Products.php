<?php

namespace App\Http\Livewire;

use App\Models\MainCateg;

use App\Models\Snagmang;
use App\Models\SubCateg;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categories = [];
    public $sortColumn = 'description';
    public $sortDirection = 'asc';
    public $searchColumns = [
        'report_date' => ['', ''],
        'site_id' =>'' ,
        'description' => '',
        'main_categ_id' => 0,
    ];

    public function mount()
    {
        $this->categories = MainCateg::pluck('name', 'id');
        $this->sub_categories = SubCateg::pluck('name', 'id');
    }

    public function sortByColumn($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->reset('sortDirection');
            $this->sortColumn = $column;
        }
    }

    public function updating($value, $name)
    {
        $this->resetPage();
    }

    public function render()
    {
        $snags = Snagmang::select([
            'description',
            // 'site_id',
            'report_date',
            'snag_mangs.main_categ_id',
            'snag_reporters.name as snag_reporter_name',
            'snag_remarks.remark as snag_remark_name',
            'snagdomains.name as snag_domain_name',
            'sub_categs.main_categ_id as sub_main_categ_id',
            'snag_mangs.site_id as siteId',
            'main_categs.name as main_categ_name',
            'sub_categs.name as sub_categ_name',
            'sites.site_id as site',
            // 'sites.office_name as snag_office_name',
            // 'sites.wilayat as snag_wilayat',
            // 'sites.governate as snag_governate',
            // 'main_categ_id',
        ])->with(['site'])
            ->leftJoin('main_categs',
                'snag_mangs.main_categ_id',
                '=',
                'main_categs.id')
            ->leftJoin('sites',
            'snag_mangs.site_id',
            '=',
            'sites.id')
            ->leftJoin('sub_categs',
            'snag_mangs.sub_categ_id',
            '=',
            'sub_categs.id')
            ->leftJoin('snag_remarks',
            'snag_mangs.snag_remark_id',
            '=',
            'snag_remarks.id')
            ->leftJoin('snagdomains',
            'snag_mangs.domain_id',
            '=',
            'snagdomains.id')
            ->leftJoin('snag_reporters',
            'snag_mangs.snag_reported_id',
            '=',
            'snag_reporters.id')

            ;

        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
                if ($column == 'report_date') {
                    if (($value[0])) {
                        $snags->where($column, '>', $value[0]);
                    }
                    if (($value[1])) {
                        $snags->where($column, '<', $value[1]);
                    }
                } elseif ($column == 'main_categ_id') {
                    $snags->where('snag_mangs.'.$column, $value);
                }
                elseif ($column == 'sub_categ_id') {
                    $snags->where('snag_mangs.'.$column, $value);
                }
                elseif ($column == 'site_id') {

                    $snags->where('sites.' . $column, 'LIKE', '%' . $value . '%');
                }
                else {
                    $snags->where('snag_mangs.' . $column, 'LIKE', '%' . $value . '%');
                }
            }
        }

        $snags->orderBy($this->sortColumn, $this->sortDirection);

        return view('livewire.bootstrap.products', [
            'products' => $snags->paginate(5)
        ]);
    }
}
