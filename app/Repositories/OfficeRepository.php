<?php

namespace App\Repositories;

use App\Models\Office;
use App\Repositories\BaseRepository;

/**
 * Class OfficeRepository
 * @package App\Repositories
 * @version February 6, 2022, 2:11 am +07
*/

class OfficeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'region_id'
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
        return Office::class;
    }
    /**
     * Configure the Model
     **/
    public function officesRegions()
    {
        return Office::with('region')->get();
    }
    /**
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $columns = ['*'])
    {
        $query = $this->allQuery(['region'=> function($q){$q->select('regions.id','regions.name');}]);

        return $query->paginate($perPage, $columns);
    }
}
