<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version July 23, 2023, 6:00 pm +04
*/

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
            'first_name',
            'mid_name',
            'last_name',
            'email',
            'phone',
            'password',
            'civil_id',
            'hr_code',
            'project_id',
            'designation_id',
            'office_id',
            'title_id',
            'gender',
            'dept_id',
            'hiring_date',
            'salary',
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
        return Employee::class;
    }
}
