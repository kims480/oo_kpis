<?php

namespace App\Repositories;

use App\Models\Testing;
use App\Repositories\BaseRepository;

/**
 * Class TestingRepository
 * @package App\Repositories
 * @version February 6, 2022, 5:49 am +07
*/

class TestingRepository extends BaseRepository
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
        return Testing::class;
    }
}
