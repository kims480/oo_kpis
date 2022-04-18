<?php

namespace App\Repositories;

use App\Models\SiteSnag;
use App\Repositories\BaseRepository;

/**
 * Class SiteSnagRepository
 * @package App\Repositories
 * @version February 16, 2022, 2:51 pm +04
*/

class SiteSnagRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'site_id',
        'snag_Id'
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
        return SiteSnag::class;
    }
}
