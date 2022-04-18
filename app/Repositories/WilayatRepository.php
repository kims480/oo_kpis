<?php

namespace App\Repositories;

use App\Models\Wilayat;
use App\Repositories\BaseRepository;

/**
 * Class WilayatRepository
 * @package App\Repositories
 * @version February 8, 2022, 6:40 am +04
*/

class WilayatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'govern_id'
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
        return Wilayat::class;
    }
}
