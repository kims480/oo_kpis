<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Repositories\TitleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TitleController extends AppBaseController
{
    /** @var TitleRepository $titleRepository*/
    private $titleRepository;

    public function __construct(TitleRepository $titleRepo)
    {
        $this->titleRepository = $titleRepo;
    }

    /**
     * Display a listing of the Title.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $titles = $this->titleRepository->paginate(10);

        return view('titles.index')
            ->with('titles', $titles);
    }

    /**
     * Show the form for creating a new Title.
     *
     * @return Response
     */
    public function create()
    {
        return view('titles.create');
    }

    /**
     * Store a newly created Title in storage.
     *
     * @param CreateTitleRequest $request
     *
     * @return Response
     */
    public function store(CreateTitleRequest $request)
    {
        $input = $request->all();

        $title = $this->titleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/titles.singular')]));

        return redirect(route('titles.index'));
    }

    /**
     * Display the specified Title.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $title = $this->titleRepository->find($id);

        if (empty($title)) {
            Flash::error(__('messages.not_found', ['model' => __('models/titles.singular')]));

            return redirect(route('titles.index'));
        }

        return view('titles.show')->with('title', $title);
    }

    /**
     * Show the form for editing the specified Title.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $title = $this->titleRepository->find($id);

        if (empty($title)) {
            Flash::error(__('messages.not_found', ['model' => __('models/titles.singular')]));

            return redirect(route('titles.index'));
        }

        return view('titles.edit')->with('title', $title);
    }

    /**
     * Update the specified Title in storage.
     *
     * @param int $id
     * @param UpdateTitleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTitleRequest $request)
    {
        $title = $this->titleRepository->find($id);

        if (empty($title)) {
            Flash::error(__('messages.not_found', ['model' => __('models/titles.singular')]));

            return redirect(route('titles.index'));
        }

        $title = $this->titleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/titles.singular')]));

        return redirect(route('titles.index'));
    }

    /**
     * Remove the specified Title from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $title = $this->titleRepository->find($id);

        if (empty($title)) {
            Flash::error(__('messages.not_found', ['model' => __('models/titles.singular')]));

            return redirect(route('titles.index'));
        }

        $this->titleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/titles.singular')]));

        return redirect(route('titles.index'));
    }
}
