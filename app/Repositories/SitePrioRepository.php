<?php

namespace App\Repositories;

use App\Models\SitePrio;
use App\Repositories\BaseRepository;

/**
 * Class SitePrioRepository
 * @package App\Repositories
 * @version February 16, 2022, 3:32 pm +04
*/

class SitePrioRepository extends BaseRepository
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
        return SitePrio::class;
    }
}
