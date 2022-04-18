<?php

namespace App\Repositories;

use App\Models\Snagremark;
use App\Repositories\BaseRepository;

/**
 * Class SnagremarkRepository
 * @package App\Repositories
 * @version February 16, 2022, 2:56 pm +04
*/

class SnagremarkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'remark'
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
        return Snagremark::class;
    }
}
