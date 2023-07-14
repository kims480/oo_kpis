<?php

namespace App\Repositories;

use App\Models\TTStatus;
use App\Repositories\BaseRepository;

/**
 * Class TTStatusRepository
 * @package App\Repositories
 * @version July 14, 2023, 4:32 pm +04
*/

class TTStatusRepository extends BaseRepository
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
        return TTStatus::class;
    }
}
