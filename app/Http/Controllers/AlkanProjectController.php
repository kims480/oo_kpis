<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlkanProjectRequest;
use App\Http\Requests\UpdateAlkanProjectRequest;
use App\Repositories\AlkanProjectRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AlkanProjectController extends AppBaseController
{
    /** @var AlkanProjectRepository $alkanProjectRepository*/
    private $alkanProjectRepository;

    public function __construct(AlkanProjectRepository $alkanProjectRepo)
    {
        $this->alkanProjectRepository = $alkanProjectRepo;
    }

    /**
     * Display a listing of the AlkanProject.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $alkanProjects = $this->alkanProjectRepository->paginate(10);

        return view('alkan_projects.index')
            ->with('alkanProjects', $alkanProjects);
    }

    /**
     * Show the form for creating a new AlkanProject.
     *
     * @return Response
     */
    public function create()
    {
        return view('alkan_projects.create');
    }

    /**
     * Store a newly created AlkanProject in storage.
     *
     * @param CreateAlkanProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateAlkanProjectRequest $request)
    {
        $input = $request->all();

        $alkanProject = $this->alkanProjectRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/alkanProjects.router')]));

        return redirect(route(__('models/alkanProjects.router').'.index'));
    }

    /**
     * Display the specified AlkanProject.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alkanProject = $this->alkanProjectRepository->find($id);

        if (empty($alkanProject)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alkanProjects.router')]));

            return redirect(route('alkanProjects.index'));
        }

        return view('alkan_projects.show')->with('alkanProject', $alkanProject);
    }

    /**
     * Show the form for editing the specified AlkanProject.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alkanProject = $this->alkanProjectRepository->find($id);

        if (empty($alkanProject)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alkanProjects.router')]));

            return redirect(route('alkanProjects.index'));
        }

        return view('alkan_projects.edit')->with('alkanProject', $alkanProject);
    }

    /**
     * Update the specified AlkanProject in storage.
     *
     * @param int $id
     * @param UpdateAlkanProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlkanProjectRequest $request)
    {
        $alkanProject = $this->alkanProjectRepository->find($id);

        if (empty($alkanProject)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alkanProjects.router')]));

            return redirect(route('alkanProjects.index'));
        }

        $alkanProject = $this->alkanProjectRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/alkanProjects.router')]));

        return redirect(route('alkanProjects.index'));
    }

    /**
     * Remove the specified AlkanProject from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alkanProject = $this->alkanProjectRepository->find($id);

        if (empty($alkanProject)) {
            Flash::error(__('messages.not_found', ['model' => __('models/alkanProjects.router')]));

            return redirect(route('alkanProjects.index'));
        }

        $this->alkanProjectRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/alkanProjects.router')]));

        return redirect(route('alkanProjects.index'));
    }
}
