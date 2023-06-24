<?php

namespace App\Repositories;

use App\Models\ConsumableSpare;
use App\Repositories\BaseRepository;

/**
 * Class PassiveSpareRepository
 * @package App\Repositories
 * @version November 6, 2022, 9:33 pm +04
*/

class ConsumableSpareRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'old_bom',
        'new_bom',
        'description',
        'uom',
        'Important',
        'high_consumption'
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
        return ConsumableSpare::class;
    }
}
