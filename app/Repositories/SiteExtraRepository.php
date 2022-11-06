<?php

namespace App\Repositories;

use App\Models\SiteExtra;
use App\Repositories\BaseRepository;

/**
 * Class SiteExtraRepository
 * @package App\Repositories
 * @version November 7, 2022, 12:22 am +04
*/

class SiteExtraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'site__id',
        'added_by',
        'contract_prio',
        'prio_2022',
        'contract_severity',
        'severity_2022',
        'connected_sites',
        'connected_omc',
        'connected_ip',
        'connected_sdh',
        'landlord_owner'
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
        return SiteExtra::class;
    }
}
