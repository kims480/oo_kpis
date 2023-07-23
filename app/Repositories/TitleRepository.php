<?php

namespace App\Repositories;

use App\Models\Title;
use App\Repositories\BaseRepository;

/**
 * Class TitleRepository
 * @package App\Repositories
 * @version July 23, 2023, 10:03 pm +04
*/

class TitleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'details'
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
        return Title::class;
    }
}
