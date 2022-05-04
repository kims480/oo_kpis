<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

use App\Repositories\DashboardRepository;
use Laracasts\Flash\Flash;

class DashboardController extends Controller
{
    /** @var  DashboardRepository */
    private $dashboardRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardRepository $dashboardRepo)
    {
        $this->dashboardRepository = $dashboardRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->dashboardRepository->GetData();
        return view('dashboard.tables', $data);
    }

    public function generatePermissions($model,$url=null)
    {
        if (!class_exists("\App\Models\\" . $model)) {
            Flash::error('Model is not exist');

            return redirect(route('dashboard'));
        }


        $tableName = $url ? $url : strtolower($model) . 's';

        $permissions = [
            ['name' => $tableName . '.index', 'guard_name' => 'web', 'title' => $tableName . '.index', 'module' => $model],
            ['name' => $tableName . '.create', 'guard_name' => 'web', 'title' => $tableName . '.create', 'module' => $model],
            ['name' => $tableName . '.update', 'guard_name' => 'web', 'title' => $tableName . '.update', 'module' => $model],
            ['name' => $tableName . '.edit', 'guard_name' => 'web', 'title' => $tableName . '.edit', 'module' => $model],
            ['name' => $tableName . '.store', 'guard_name' => 'web', 'title' => $tableName . '.store', 'module' => $model],
            ['name' => $tableName . '.destroy', 'guard_name' => 'web', 'title' => $tableName . '.destroy', 'module' => $model],
            ['name' => $tableName . '.show', 'guard_name' => 'web', 'title' => $tableName . '.show', 'module' => $model],
        ];

        // dd($permissions,$tableName);

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        Flash::success(__('Permission generated Successfully', ['model' => $model]));

        return redirect(route($tableName . '.index'));
    }
}
