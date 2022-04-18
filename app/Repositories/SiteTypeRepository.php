<?php

namespace App\Repositories;

use App\Models\SiteType;
use App\Repositories\BaseRepository;

/**
 * Class SiteTypeRepository
 * @package App\Repositories
 * @version February 16, 2022, 3:33 pm +04
*/

class SiteTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name'
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
        return SiteType::class;
    }
}
