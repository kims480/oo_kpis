<?php

namespace App\Repositories;

use App\Models\Snagmang;
use App\Repositories\BaseRepository;

/**
 * Class SnagmangRepository
 * @package App\Repositories
 * @version February 16, 2022, 2:45 pm +04
*/

class SnagRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        // 'report_date',
        // 'site_id',
        // 'region_id',
        // 'office_id',
        // 'description',
        // 'main_categ_id',
        // 'sub_categ_id',
        // 'domain_id',
        // 'snag_remark_id',
        // 'snag_reported_id',
        // 'closure_date',
        // 'snag_closed_by',
        // 'remarks'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Snag::class;
    }
}
