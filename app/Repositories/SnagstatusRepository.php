<?php

namespace App\Repositories;

use App\Models\Snagstatus;
use App\Repositories\BaseRepository;

/**
 * Class SnagstatusRepository
 * @package App\Repositories
 * @version February 16, 2022, 2:19 pm +04
*/

class SnagstatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Snagstatus::class;
    }
}
