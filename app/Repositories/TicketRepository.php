<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Repositories\BaseRepository;

/**
 * Class TicketRepository
 * @package App\Repositories
 * @version July 11, 2023, 6:03 pm +04
*/

class TicketRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'site_id',
        'categ',
        'contractor',
        'scope',
        'tt_number',
        'notes'
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
        return Ticket::class;
    }
}
