<?php

namespace App\Repositories;

use App\Models\SiteCateg;
use App\Repositories\BaseRepository;

/**
 * Class SiteCategRepository
 * @package App\Repositories
 * @version February 16, 2022, 3:31 pm +04
*/

class SiteCategRepository extends BaseRepository
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
        return SiteCateg::class;
    }
}
