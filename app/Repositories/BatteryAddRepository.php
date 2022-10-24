<?php

namespace App\Repositories;

use App\Models\BatteryAdd;
use App\Repositories\BaseRepository;

/**
 * Class BatteryAddRepository
 * @package App\Repositories
 * @version October 25, 2022, 12:25 am +04
*/

class BatteryAddRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'site__deployed',
        'ref_wo',
        'ref_cr',
        'batter_1_sn',
        'install_date',
        'aircon_status',
        'rect_charge_status',
        'old_batteries_aging'
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
        return BatteryAdd::class;
    }
}
