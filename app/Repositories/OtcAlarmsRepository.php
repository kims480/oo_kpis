<?php

namespace App\Repositories;

use App\Models\OtcAlarms;
use App\Repositories\BaseRepository;

/**
 * Class OtcAlarmsRepository
 * @package App\Repositories
 * @version July 11, 2023, 11:22 pm +04
*/

class OtcAlarmsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'add_by',
        'details',
        'categ_id',
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
        return OtcAlarms::class;
    }
}
