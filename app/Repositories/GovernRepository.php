<?php

namespace App\Repositories;

use App\Models\Govern;
use App\Repositories\BaseRepository;

/**
 * Class GovernRepository
 * @package App\Repositories
 * @version February 8, 2022, 6:28 am +04
*/

class GovernRepository extends BaseRepository
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
        return Govern::class;
    }
}
