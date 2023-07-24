<?php

namespace App\Repositories;

use App\Models\Attendance;
use App\Models\BatterAddOffice;
use App\Models\BatteryAdd;
use App\Models\BatteryCountWeekChart;
use App\Models\BatteryprogressChart;
use App\Models\BatterySitePrio;
use App\Models\EmployeesChart;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\ArrayKey;

/**
 * Class DashboardRepository
 * @package App\Repositories
 * @version July 26, 2021, 12:17 pm UTC
 */

class DashboardRepository
{
    /** @var  UserRepository */
    private $userRepository;
    /** @var  BatteryAddRepository */
    private $batteryAddRepository;
    /** @var  RoleRepository */
    private $roleRepository;
    /** @var  PermissionRepository */
    private $permissionRepository;
    /** @var  AttendanceRepository */
    private $attendanceRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RoleRepository $roleRepo, UserRepository $userRepo, PermissionRepository $permissionRepo,BatteryAddRepository $batteryAddRepo, AttendanceRepository $attendanceRepo)
    {
        $this->permissionRepository = $permissionRepo;
        $this->userRepository = $userRepo;
        $this->batteryAddRepository = $batteryAddRepo;
        $this->roleRepository = $roleRepo;
        $this->attendanceRepository = $attendanceRepo;
    }

    private function getDashboardInfo()
    {
        $dashboardInfo = [];
        $dashboardInfo['user_count'] =  $this->userRepository->count();
        $dashboardInfo['role_count'] =  $this->roleRepository->count();
        $dashboardInfo['batteries_batch_1_2022'] =  1128;
        $dashboardInfo['batteries'] =  $this->batteryAddRepository->count();
//         DB::table('battery_add')->select('id', 'install_date', DB::raw( count('site__deployed') as 'Sites'))
// ->groupBy(‘seller’)
// ->groupBy(‘date’)
// ->get();
        $batteries=  BatteryAdd::select('battery_add.id','install_date','site__deployed')->with(['site'=>function($q){
            $q->select('id','site_id','office_id');
        }

        ])->orderBy('install_date','asc')->get();

        $dashboardInfo['batteries_chart_weeks_xdata']=[];
        $dashboardInfo['batteries_chart_weeks_ydata']=[];
        $weeks=$batteries->groupBY(function($battery){
            return Carbon::parse($battery->install_date)->week();
        });
        foreach ($weeks as $week => $value) {
            $dashboardInfo['batteries_chart_weeks_xdata'][]="Week-".$week;
            $dashboardInfo['batteries_chart_weeks_ydata'][]=count($value);
        }
        $dashboardInfo['employees_chart'] =  EmployeesChart::get()->toArray();
        // dd($dashboardInfo['batteries_chart_weeks_ydata']);
        $dashboardInfo['batteries_sites'] =  BatteryAdd::distinct()->count('site__deployed');
        $dashboardInfo['batteries_progress_chart'] =  BatteryprogressChart::get()->mapWithKeys(function ($item, $key) {
            return ["week-".$item['week'] => $item['battery_total_progress']];
        })->toArray();
        // var_dump(array_keys($dashboardInfo['batteries_progress_chart']) );
        $dashboardInfo['batteries_week_count_chart'] =  BatteryCountWeekChart::get()->mapWithKeys(function ($item, $key) {
            return ["week-".$item['week'] => $item['num_of_Site_per_week']];
        })->toArray();
        $dashboardInfo['batteries_office_chart'] =  BatterAddOffice::get()->mapWithKeys(function ($item, $key) {
            return [$item['office_name'] => $item['num_office_name']];
        })->except(['Warehouse'])->toArray();

        $dashboardInfo['batteries_site_prio_chart'] =  BatterySitePrio::get()->filter()->mapWithKeys(function ($item, $key) {
            return [$item['site_prio'] => $item['num_sites']];
        })->toArray();
$dashboardInfo['employees_chart'] =  EmployeesChart::get()->filter()->toArray();
        $dashboardInfo['permission_count'] =  $this->permissionRepository->count();
        // $dashboardInfo['user_online'] =  $this->attendanceRepository->CountUserOnline();

        return $dashboardInfo;
    }
    private function getChartUserCheckinInfo()
    {
        $labels = [];
        $dataset1 = [];
        $dataset1['label'] = 'My Daily';
        $dataset1['data'] = [];
        $dataset1['borderColor'] = 'rgb(75, 192, 192)';

        $data = $this->attendanceRepository->TotalCheckInByDay(auth()->user()->id);
        foreach ($data as $key => $value) {
            $dataset1['data'][$key] = $value;
            $labels[$key] = $key;
        }

        $dataset2 = [];
        $dataset2['label'] = 'User Daily';
        $dataset2['data'] = [];
        $dataset2['borderColor'] = 'rgb(20, 150, 192)';

        $data = $this->attendanceRepository->TotalCheckInByDay();
        foreach ($data as $key => $value) {
            $dataset2['data'][$key ] = $value;
            $labels[$key] = $key;
        }

        $datasets = [];
        $datasets[] = $dataset1;
        $datasets[] = $dataset2;

        $data = [];
        $data['labels'] = array_values($labels);
        $data['datasets'] = $datasets;

        $chart = [];
        $chart['type'] = 'line';
        $chart['data'] = $data;
        return $chart;
    }
    public function GetData()
    {
        $dashboard = [];
        $dashboard['dashboardInfo'] = $this->getDashboardInfo();
        // $dashboard['chartUserCheckin'] = $this->getChartUserCheckinInfo();
        return $dashboard;
    }
}
