<?php

namespace App\Repositories;

use App\Models\OtcScope;
use App\Repositories\BaseRepository;

/**
 * Class OtcScopeRepository
 * @package App\Repositories
 * @version July 11, 2023, 10:41 pm +04
*/

class OtcScopeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'details',
        'add_by'
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
        return OtcScope::class;
    }
}
