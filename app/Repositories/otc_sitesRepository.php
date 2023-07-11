<?php

namespace App\Repositories;

use App\Models\Otc_site;
use App\Repositories\BaseRepository;

/**
 * Class otc_sitesRepository
 * @package App\Repositories
 * @version July 11, 2023, 9:08 pm +04
*/

class Otc_siteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

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
        return Otc_site::class;
    }
}
