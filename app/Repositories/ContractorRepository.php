<?php

namespace App\Repositories;

use App\Models\Contractor;
use App\Repositories\BaseRepository;

/**
 * Class ContractorRepository
 * @package App\Repositories
 * @version July 11, 2023, 8:12 pm +04
*/

class ContractorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'info',
        'address',
        'lat',
        'long',
        'added_by',
        'register_number',
        'website',
        'info_mail',
        'it_mail',
        'proc_email',
        'operation_mail',
        'admin_mail',
        'ceo_mail',
        'project_manager_mail'
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
        return Contractor::class;
    }
}
