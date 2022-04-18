<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSnagdomainRequest;
use App\Http\Requests\UpdateSnagdomainRequest;
use App\Repositories\SnagdomainRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SnagdomainController extends AppBaseController
{
    /** @var SnagdomainRepository $snagdomainRepository*/
    private $snagdomainRepository;

    public function __construct(SnagdomainRepository $snagdomainRepo)
    {
        $this->snagdomainRepository = $snagdomainRepo;
    }

    /**
     * Display a listing of the Snagdomain.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $snagdomains = $this->snagdomainRepository->paginate(10);

        return view('snagdomains.index')
            ->with('snagdomains', $snagdomains);
    }

    /**
     * Show the form for creating a new Snagdomain.
     *
     * @return Response
     */
    public function create()
    {
        return view('snagdomains.create');
    }

    /**
     * Store a newly created Snagdomain in storage.
     *
     * @param CreateSnagdomainRequest $request
     *
     * @return Response
     */
    public function store(CreateSnagdomainRequest $request)
    {
        $input = $request->all();

        $snagdomain = $this->snagdomainRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/snagdomains.singular')]));

        return redirect(route('snagdomains.index'));
    }

    /**
     * Display the specified Snagdomain.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $snagdomain = $this->snagdomainRepository->find($id);

        if (empty($snagdomain)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagdomains.singular')]));

            return redirect(route('snagdomains.index'));
        }

        return view('snagdomains.show')->with('snagdomain', $snagdomain);
    }

    /**
     * Show the form for editing the specified Snagdomain.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $snagdomain = $this->snagdomainRepository->find($id);

        if (empty($snagdomain)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagdomains.singular')]));

            return redirect(route('snagdomains.index'));
        }

        return view('snagdomains.edit')->with('snagdomain', $snagdomain);
    }

    /**
     * Update the specified Snagdomain in storage.
     *
     * @param int $id
     * @param UpdateSnagdomainRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSnagdomainRequest $request)
    {
        $snagdomain = $this->snagdomainRepository->find($id);

        if (empty($snagdomain)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagdomains.singular')]));

            return redirect(route('snagdomains.index'));
        }

        $snagdomain = $this->snagdomainRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/snagdomains.singular')]));

        return redirect(route('snagdomains.index'));
    }

    /**
     * Remove the specified Snagdomain from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $snagdomain = $this->snagdomainRepository->find($id);

        if (empty($snagdomain)) {
            Flash::error(__('messages.not_found', ['model' => __('models/snagdomains.singular')]));

            return redirect(route('snagdomains.index'));
        }

        $this->snagdomainRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/snagdomains.singular')]));

        return redirect(route('snagdomains.index'));
    }
}
