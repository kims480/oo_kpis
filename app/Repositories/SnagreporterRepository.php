<?php

namespace App\Repositories;

use App\Models\Snagreporter;
use App\Repositories\BaseRepository;

/**
 * Class SnagreporterRepository
 * @package App\Repositories
 * @version February 16, 2022, 2:58 pm +04
*/

class SnagreporterRepository extends BaseRepository
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
        return Snagreporter::class;
    }
}
