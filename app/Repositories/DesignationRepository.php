<?php

namespace App\Repositories;

use App\Models\Designation;
use App\Repositories\BaseRepository;

/**
 * Class DesignationRepository
 * @package App\Repositories
 * @version July 23, 2023, 9:51 pm +04
*/

class DesignationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'details',
        'create_by'
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
        return Designation::class;
    }
}
