<?php

namespace App\Repositories;

use App\Models\OtcCateg;
use App\Repositories\BaseRepository;

/**
 * Class OtcCategRepository
 * @package App\Repositories
 * @version July 11, 2023, 10:51 pm +04
*/

class OtcCategRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'add_by',
        'details',
        'notes'
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
        return OtcCateg::class;
    }
}
