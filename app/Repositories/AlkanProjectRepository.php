<?php

namespace App\Repositories;

use App\Models\AlkanProject;
use App\Repositories\BaseRepository;

/**
 * Class AlkanProjectRepository
 * @package App\Repositories
 * @version July 23, 2023, 9:47 pm +04
*/

class AlkanProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_name',
        'alkan_project_code',
        'customer_project_code',
        'project_detail'
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
        return AlkanProject::class;
    }
}
