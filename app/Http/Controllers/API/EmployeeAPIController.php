<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmployeeAPIRequest;
use App\Http\Requests\API\UpdateEmployeeAPIRequest;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\API
 */

class EmployeeAPIController extends AppBaseController
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the Employee.
     * GET|HEAD /employees
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $employees = $this->employeeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $employees->toArray(),
            __('messages.retrieved', ['model' => __('models/employees.plural')])
        );
    }

    /**
     * Store a newly created Employee in storage.
     * POST /employees
     *
     * @param CreateEmployeeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeAPIRequest $request)
    {
        $input = $request->all();

        $employee = $this->employeeRepository->create($input);

        return $this->sendResponse(
            $employee->toArray(),
            __('messages.saved', ['model' => __('models/employees.singular')])
        );
    }

    /**
     * Display the specified Employee.
     * GET|HEAD /employees/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/employees.singular')])
            );
        }

        return $this->sendResponse(
            $employee->toArray(),
            __('messages.retrieved', ['model' => __('models/employees.singular')])
        );
    }

    /**
     * Update the specified Employee in storage.
     * PUT/PATCH /employees/{id}
     *
     * @param int $id
     * @param UpdateEmployeeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/employees.singular')])
            );
        }

        $employee = $this->employeeRepository->update($input, $id);

        return $this->sendResponse(
            $employee->toArray(),
            __('messages.updated', ['model' => __('models/employees.singular')])
        );
    }

    /**
     * Remove the specified Employee from storage.
     * DELETE /employees/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/employees.singular')])
            );
        }

        $employee->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/employees.singular')])
        );
    }
}
