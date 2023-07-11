<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Repositories\TicketRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Contractor;
use App\Models\OtcAlarms;
use App\Models\Site;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\EmailNotification;
use Auth;
use Carbon\Carbon;
use Doctrine\DBAL\Driver\SQLSrv\LastInsertId;
use Illuminate\Http\Request;
use Flash;
use Notification;
use Response;

class TicketController extends AppBaseController
{
    /** @var TicketRepository $ticketRepository*/
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepo)
    {
        $this->ticketRepository = $ticketRepo;
    }
    public function send()
    {
    	$user = User::first();

        $project = [
            'greeting' => 'Hi '.$user->name.',',
            'body' => 'This is the project assigned to you.',
            'thanks' => 'Thank you this is from codeanddeploy.com',
            'actionText' => 'View Project',
            'actionURL' => url('/'),
            'id' => 57
        ];

        Notification::send($user, new EmailNotification($project));

        dd('Notification sent!');
    }
    /**
     * Display a listing of the Ticket.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $tickets = Ticket::with(
            [
                'site' => function ($site) {
                    $site->select('id', 'site_id')->get();
                }, 'tt_categ' => function ($categ) {
                    $categ->select('id', 'name')->get();
                }, 'tt_contractor' => function ($contractor) {
                    $contractor->select('id', 'name')->get();
                }, 'tt_scope' => function ($scope) {
                    $scope->select('id', 'name')->get();
                }, 'alarm' => function ($alarm_name) {
                    $alarm_name->select('id', 'name')->get();
                }
            ]
        )->paginate(10);
        // ->where('site_id','like', '%'.$this->site_id.'%');

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new Ticket.
     *
     * @return Response
     */
    public function create()
    {

        $SitesList = Site::select('id', 'site_id')->get()->pluck('site_id', 'id');
        $ContractorsList = Contractor::select('id', 'name')->get()->pluck('name', 'id');
        $AlarmsList = OtcAlarms::select('id', 'name')->get()->pluck('name', 'id');

        return view('tickets.create', compact('SitesList', 'ContractorsList', 'AlarmsList'));
    }

    /**
     * Store a newly created Ticket in storage.
     *
     * @param CreateTicketRequest $request
     *
     * @return Response
     */
    public function store(CreateTicketRequest $request)
    {
        $input = $request->all();

        $input['tt_number'] = $this->genTT();
        $input['last_number'] = $this->last_number() + 1;
        $input['assigned_to'] = Auth::user()->id;
        $input['status'] = 'Created';
        $input['created_by'] =   Auth::user()->id;

        $ticket = $this->ticketRepository->create($input);

        Flash::success(__($ticket->tt_number . 'TT created successfully', ['model' => __('models/tickets.singular')]));

        return redirect(route('tickets.index'));
    }


    public function last_number()
    {
        return (Ticket::select('id', 'last_number')->orderBy('id', 'DESC')->first()->last_number) ?? 0;
    }
    public function genTT()
    {
        $dt = Carbon::now();
        return 'TT-' . $dt->year . $dt->month . $dt->day . '-' . sprintf('%08d', $this->last_number() + 1);;
    }

    /**
     * Display the specified Ticket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tickets.singular')]));

            return redirect(route('tickets.index'));
        }


        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified Ticket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tickets.singular')]));

            return redirect(route('tickets.index'));
        }
        $SitesList = Site::select('id', 'site_id')->get()->pluck('site_id', 'id');
        $ContractorsList = Contractor::select('id', 'name')->get()->pluck('name', 'id');
        $AlarmsList = OtcAlarms::select('id', 'name')->get()->pluck('name', 'id');

        return view('tickets.edit', compact('ticket', 'SitesList', 'ContractorsList', 'AlarmsList'));
    }

    /**
     * Update the specified Ticket in storage.
     *
     * @param int $id
     * @param UpdateTicketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTicketRequest $request)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tickets.singular')]));

            return redirect(route('tickets.index'));
        }

        $ticket = $this->ticketRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tickets.singular')]));

        return redirect(route('tickets.index'));
    }

    /**
     * Remove the specified Ticket from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tickets.singular')]));

            return redirect(route('tickets.index'));
        }

        $this->ticketRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tickets.singular')]));

        return redirect(route('tickets.index'));
    }
}
