<?php

namespace App\Repositories;

use App\Models\Site;
use App\Repositories\BaseRepository;

/**
 * Class SiteRepository
 * @package App\Repositories
 * @version January 29, 2022, 5:26 am +07
*/

class SiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'site_id',
        'nis',
        'prio',
        'type',
        'categ',
        'govern_id',
        'wilayat_id',
        'office_id',
        'address',
        'added_by'
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
        return Site::class;
    }
}
