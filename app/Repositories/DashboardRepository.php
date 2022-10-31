<?php

namespace App\Repositories;

use App\Models\Attendance;
use App\Models\BatteryAdd;
use Carbon\Carbon;

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
        $batteries=  BatteryAdd::select('id','install_date')->with(['site'=>function($q){
            $q->select('id','site_id','office_id');
        }
        ])->get();
        $dashboardInfo['batteries_chart_weeks_xdata']=[];
        $dashboardInfo['batteries_chart_weeks_ydata']=[];
        $weeks=$batteries->groupBY(function($battery){
            return Carbon::parse($battery->install_date)->week();
        });
        foreach ($weeks as $week => $value) {
            $dashboardInfo['batteries_chart_weeks_xdata'][]="Week-".$week;
            $dashboardInfo['batteries_chart_weeks_ydata'][]=count($value);
        }

        $dashboardInfo['batteries_sites'] =  BatteryAdd::distinct()->count('site__deployed');
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
