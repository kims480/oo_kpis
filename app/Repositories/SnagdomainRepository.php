<?php

namespace App\Repositories;

use App\Models\Snagdomain;
use App\Repositories\BaseRepository;

/**
 * Class SnagdomainRepository
 * @package App\Repositories
 * @version February 16, 2022, 2:05 pm +04
*/

class SnagdomainRepository extends BaseRepository
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
        return Snagdomain::class;
    }
}
