<?php

namespace App\Repositories;

use App\Models\AlarmCateg;
use App\Repositories\BaseRepository;

/**
 * Class AlarmCategRepository
 * @package App\Repositories
 * @version July 11, 2023, 7:28 pm +04
*/

class AlarmCategRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categ_name',
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
        return AlarmCateg::class;
    }
}
