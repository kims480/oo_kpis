<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTicketAPIRequest;
use App\Http\Requests\API\UpdateTicketAPIRequest;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TicketController
 * @package App\Http\Controllers\API
 */

class TicketAPIController extends AppBaseController
{
    /** @var  TicketRepository */
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepo)
    {
        $this->ticketRepository = $ticketRepo;
    }

    /**
     * Display a listing of the Ticket.
     * GET|HEAD /tickets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tickets = $this->ticketRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $tickets->toArray(),
            __('messages.retrieved', ['model' => __('models/tickets.plural')])
        );
    }

    /**
     * Store a newly created Ticket in storage.
     * POST /tickets
     *
     * @param CreateTicketAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTicketAPIRequest $request)
    {
        $input = $request->all();

        $ticket = $this->ticketRepository->create($input);

        return $this->sendResponse(
            $ticket->toArray(),
            __('messages.saved', ['model' => __('models/tickets.singular')])
        );
    }

    /**
     * Display the specified Ticket.
     * GET|HEAD /tickets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ticket $ticket */
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tickets.singular')])
            );
        }

        return $this->sendResponse(
            $ticket->toArray(),
            __('messages.retrieved', ['model' => __('models/tickets.singular')])
        );
    }

    /**
     * Update the specified Ticket in storage.
     * PUT/PATCH /tickets/{id}
     *
     * @param int $id
     * @param UpdateTicketAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTicketAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ticket $ticket */
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tickets.singular')])
            );
        }

        $ticket = $this->ticketRepository->update($input, $id);

        return $this->sendResponse(
            $ticket->toArray(),
            __('messages.updated', ['model' => __('models/tickets.singular')])
        );
    }

    /**
     * Remove the specified Ticket from storage.
     * DELETE /tickets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ticket $ticket */
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tickets.singular')])
            );
        }

        $ticket->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/tickets.singular')])
        );
    }
}
