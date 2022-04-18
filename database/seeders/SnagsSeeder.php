<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SnagsSeeder extends Seeder
{
    public $main_categs = [
        ['id' => 1, 'name' => 'CABLE DRESSING'],
        ['id' => 2, 'name' => 'AIR CONCITIONER'],
        ['id' => 3, 'name' => 'AVIATION LIGHT'],
        ['id' => 4, 'name' => 'BATTERY BACKUP'],
        ['id' => 5, 'name' => 'BREAKER/RELAY/SENSOR'],
        ['id' => 6, 'name' => 'CIVIL_WORK'],
        ['id' => 7, 'name' => 'COW'],
        ['id' => 8, 'name' => 'DELTA CABINET'],
        ['id' => 9, 'name' => 'DESIGN ISSUE'],
        ['id' => 10, 'name' => 'DG ISSUES'],
        ['id' => 11, 'name' => 'DUMMY MISSING'],
        ['id' => 12, 'name' => 'Emergency Light'],
        ['id' => 13, 'name' => 'Ex'],
        ['id' => 14, 'name' => 'EXTERNAL ALARM'],
        ['id' => 15, 'name' => 'EXTRA MATERIAL'],
        ['id' => 16, 'name' => 'Fire Equipment'],
        ['id' => 17, 'name' => 'FIRE EXTINGUISER'],
        ['id' => 18, 'name' => 'GROUNDING'],
        ['id' => 19, 'name' => 'HOUSEKEEPING'],
        ['id' => 20, 'name' => 'HOUSEKEEPING/Omantel'],
        ['id' => 21, 'name' => 'ILLUMINATION LIGHT'],
        ['id' => 22, 'name' => 'LABELING'],
        ['id' => 23, 'name' => 'LOG BOOK'],
        ['id' => 24, 'name' => 'OD CABINET'],
        ['id' => 25, 'name' => 'OTHERS'],
        ['id' => 26, 'name' => 'PADLOCK'],
        ['id' => 27, 'name' => 'PADLOCK/Omantel'],
        ['id' => 28, 'name' => 'RECTIFIER'],
        ['id' => 29, 'name' => 'Wrong Installation']
    ];

    public $sub_categs = [
        ['id' => 1, 'name' => 'AC SPD FAULTY', 'main_categ_id' => 5],
        ['id' => 2, 'name' => 'ACDB', 'main_categ_id' => 6],
        ['id' => 3, 'name' => 'Air Con Sensor', 'main_categ_id' => 25],
        ['id' => 4, 'name' => 'AIR CONDITIONER ID', 'main_categ_id' => 2],
        ['id' => 5, 'name' => 'AIR CONTIONER OD', 'main_categ_id' => 2],
        ['id' => 6, 'name' => 'AIR_CONDITIONER', 'main_categ_id' => 8],
        ['id' => 7, 'name' => 'ANTENNA GROUNDING', 'main_categ_id' => 18],
        ['id' => 8, 'name' => 'Antenna Pole', 'main_categ_id' => 6],
        ['id' => 9, 'name' => 'Aviation Light', 'main_categ_id' => 3],
        ['id' => 10, 'name' => 'AVIATION LIGHT BOARD', 'main_categ_id' => 3],
        ['id' => 11, 'name' => 'AVR', 'main_categ_id' => 25],
        ['id' => 12, 'name' => 'BATTERY BACKUP', 'main_categ_id' => 4],
        ['id' => 13, 'name' => 'Board', 'main_categ_id' => 3],
        ['id' => 14, 'name' => 'CABLE DRESSING', 'main_categ_id' => 1],
        ['id' => 15, 'name' => 'Cable Tray', 'main_categ_id' => 6],
        ['id' => 16, 'name' => 'CIVIL_WORK', 'main_categ_id' => 6],
        ['id' => 17, 'name' => 'Compound', 'main_categ_id' => 6],
        ['id' => 18, 'name' => 'Compound Damage', 'main_categ_id' => 6],
        ['id' => 19, 'name' => 'Compressor', 'main_categ_id' => 2],
        ['id' => 20, 'name' => 'COMPRESSOR 2.5 Rotary', 'main_categ_id' => 2],
        ['id' => 21, 'name' => 'COW', 'main_categ_id' => 7],
        ['id' => 22, 'name' => 'COW tyre', 'main_categ_id' => 25],
        ['id' => 23, 'name' => 'DB', 'main_categ_id' => 6],
        ['id' => 24, 'name' => 'DELTA _AIRCON FAULTY', 'main_categ_id' => 8],
        ['id' => 25, 'name' => 'Delta Cabinet', 'main_categ_id' => 8],
        ['id' => 26, 'name' => 'DELTA RECTIFIER', 'main_categ_id' => 8],
        ['id' => 27, 'name' => 'Delta_Filter', 'main_categ_id' => 8],
        ['id' => 28, 'name' => 'DESIGN ISSUE', 'main_categ_id' => 9],
        ['id' => 29, 'name' => 'DG', 'main_categ_id' => 10],
        ['id' => 30, 'name' => 'DG ISSUES', 'main_categ_id' => 10],
        ['id' => 31, 'name' => 'DOOR LOCK', 'main_categ_id' => 8],
        ['id' => 32, 'name' => 'Door Sensor', 'main_categ_id' => 25],
        ['id' => 33, 'name' => 'DUMMY MISSING', 'main_categ_id' => 11],
        ['id' => 34, 'name' => 'Emergency Light', 'main_categ_id' => 12],
        ['id' => 35, 'name' => 'EXPIRY', 'main_categ_id' => 17],
        ['id' => 36, 'name' => 'EXTERNAL ALARM', 'main_categ_id' => 14],
        ['id' => 37, 'name' => 'EXTRA MATERIAL', 'main_categ_id' => 15],
        ['id' => 38, 'name' => 'FACP BATTERY', 'main_categ_id' => 16],
        ['id' => 39, 'name' => 'FACP BATTERY ', 'main_categ_id' => 16],
        ['id' => 40, 'name' => 'Fence / Boundry Wall / Main Gate', 'main_categ_id' => 6],
        ['id' => 41, 'name' => 'Filter', 'main_categ_id' => 2],
        ['id' => 42, 'name' => 'Fire Equipment', 'main_categ_id' => 16],
        ['id' => 43, 'name' => 'FIRE PANEL', 'main_categ_id' => 16],
        ['id' => 44, 'name' => 'Fire Panel Battery', 'main_categ_id' => 16],
        ['id' => 45, 'name' => 'Foundation', 'main_categ_id' => 6],
        ['id' => 46, 'name' => 'Fuel', 'main_categ_id' => 25],
        ['id' => 47, 'name' => 'GROUNDING', 'main_categ_id' => 18],
        ['id' => 48, 'name' => 'HOUSEKEEPING', 'main_categ_id' => 19],
        ['id' => 49, 'name' => 'huawei ETP48300 Display', 'main_categ_id' => 28],
        ['id' => 50, 'name' => 'ILLUMINATION LIGHT', 'main_categ_id' => 21],
        ['id' => 51, 'name' => 'Indoor Shelter', 'main_categ_id' => 6],
        ['id' => 52, 'name' => 'LABELING', 'main_categ_id' => 22],
        ['id' => 53, 'name' => 'Ladder', 'main_categ_id' => 6],
        ['id' => 54, 'name' => 'Ladder Broken', 'main_categ_id' => 6],
        ['id' => 55, 'name' => 'LEAKAGE', 'main_categ_id' => 2],
        ['id' => 56, 'name' => 'LIGHTNING SYSTEM', 'main_categ_id' => 18],
        ['id' => 57, 'name' => 'LOG BOOK', 'main_categ_id' => 23],
        ['id' => 58, 'name' => 'LOGO TIMER', 'main_categ_id' => 2],
        ['id' => 59, 'name' => 'Main DB', 'main_categ_id' => 6],
        ['id' => 60, 'name' => 'Main Gate', 'main_categ_id' => 6],
        ['id' => 61, 'name' => 'Microwave Antenna', 'main_categ_id' => 25],
        ['id' => 62, 'name' => 'MISSING', 'main_categ_id' => 17],
        ['id' => 63, 'name' => 'OD CABINET AIR CON', 'main_categ_id' => 2],
        ['id' => 64, 'name' => 'Other', 'main_categ_id' => 4],
        ['id' => 65, 'name' => 'OTHERS', 'main_categ_id' => 6],
        ['id' => 66, 'name' => 'PADLOCK', 'main_categ_id' => 27],
        ['id' => 67, 'name' => 'Paint Job', 'main_categ_id' => 6],
        ['id' => 68, 'name' => 'PATHWAY DAMAGE', 'main_categ_id' => 6],
        ['id' => 69, 'name' => 'PCB KIT', 'main_categ_id' => 2],
        ['id' => 70, 'name' => 'Power connection', 'main_categ_id' => 25],
        ['id' => 71, 'name' => 'RECTIFIER', 'main_categ_id' => 28],
        ['id' => 72, 'name' => 'RECTIFIER ALARMS', 'main_categ_id' => 28],
        ['id' => 73, 'name' => 'RECTIFIER MODULE', 'main_categ_id' => 28],
        ['id' => 74, 'name' => 'REMOTE', 'main_categ_id' => 2],
        ['id' => 75, 'name' => 'Remote Batteries', 'main_categ_id' => 2],
        ['id' => 76, 'name' => 'REMOTE MISSING', 'main_categ_id' => 2],
        ['id' => 77, 'name' => 'RT Ladder', 'main_categ_id' => 6],
        ['id' => 78, 'name' => 'Sand', 'main_categ_id' => 6],
        ['id' => 79, 'name' => 'sector blockage', 'main_categ_id' => 25],
        ['id' => 80, 'name' => 'Sensor', 'main_categ_id' => 8],
        ['id' => 81, 'name' => 'SHELTER', 'main_categ_id' => 13],
        ['id' => 82, 'name' => 'Shelter', 'main_categ_id' => 13],
        ['id' => 83, 'name' => 'SHELTER DOOR', 'main_categ_id' => 6],
        ['id' => 84, 'name' => 'Smoke Sensor', 'main_categ_id' => 25],
        ['id' => 85, 'name' => 'Sun Shade', 'main_categ_id' => 9],
        ['id' => 86, 'name' => 'TEMPERATURE SENSOR', 'main_categ_id' => 14],
        ['id' => 87, 'name' => 'Tower', 'main_categ_id' => 6],
        ['id' => 88, 'name' => 'Tower Light', 'main_categ_id' => 3],
        ['id' => 89, 'name' => 'UNSAFE LADDER', 'main_categ_id' => 9],
        ['id' => 90, 'name' => 'VSAT', 'main_categ_id' => 25],
        ['id' => 91, 'name' => 'WRONG INSTALLATION', 'main_categ_id' => 9]

    ];

    public $snag_status = [
        ['id' => 1, 'name' => 'Open'],
        ['id' => 2, 'name' => 'Closed'],
        ['id' => 3, 'name' => 'Pending']
    ];

    public $snag_reporter = [
        ['id' => 1, 'name' => 'QMS'],
        ['id' => 2, 'name' => 'PM']
    ];

    public $snag_domains = [

        ['id' => 1, 'name' => 'Oo Support'],
        ['id' => 2, 'name' => 'Infra FM'],
        ['id' => 3, 'name' => 'OmanTel']
    ];
    public $snag_remarks = [
        ['id' => 1, 'remark' => 'Dependency'],
        ['id' => 2, 'remark' => 'Major-CIVIL'],
        ['id' => 3, 'remark' => 'Major-GROUNDING'],
        ['id' => 4, 'remark' => 'Omantel Support'],
        ['id' => 5, 'remark' => 'DESIGN ISSUE'],
        ['id' => 6, 'remark' => 'FM Domain'],
        ['id' => 7, 'remark' => 'Duplicated'],
        ['id' => 8, 'remark' => 'Site is relocated'],
        ['id' => 9, 'remark' => 'MOD Tower'],
        ['id' => 10, 'remark' => 'Already Present in QMS']
    ];
    public $governs = [
        ['id' => 1, 'name' => 'Muscat'],
        ['id' => 2, 'name' => 'Dhofar'],
        ['id' => 3, 'name' => 'Al Batinah South'],
        ['id' => 4, 'name' => 'Al Batinah North'],
        ['id' => 5, 'name' => 'Al Dakhiliyah'],
        ['id' => 6, 'name' => 'Al Buraymi'],
        ['id' => 7, 'name' => 'Al Sharqiyah North'],
        ['id' => 8, 'name' => 'Al Wusta'],
        ['id' => 9, 'name' => 'Al Sharqiyah South'],
        ['id' => 10, 'name' => 'Musandam'],
        ['id' => 11, 'name' => 'Al Dhahirah'],
        ['id' => 12, 'name' => 'COW/Auto VSAT'],
        ['id' => 13, 'name' => 'Ad Dakhliyah'],
        ['id' => 14, 'name' => 'Ash Sharqiyah South'],
        ['id' => 15, 'name' => 'Ash Sharqiyah North'],
        ['id' => 16, 'name' => 'Adh Dhahirah'],

    ];
    public $offices = [
        ['id' => 1, 'name' => 'Muscat', 'region_id' => 1],
        ['id' => 2, 'name' => 'Salalah', 'region_id' => 2],
        ['id' => 3, 'name' => 'Sohar', 'region_id' => 1],
        ['id' => 4, 'name' => 'Ibra', 'region_id' => 2],
        ['id' => 5, 'name' => 'Nizwa', 'region_id' => 2],
        ['id' => 6, 'name' => 'Ibri', 'region_id' => 2],
        ['id' => 7, 'name' => 'Sur', 'region_id' => 2],
        ['id' => 8, 'name' => 'Jalan', 'region_id' => 2],
        ['id' => 9, 'name' => 'Khasab', 'region_id' => 1],
        ['id' => 11, 'name' => 'Duqqam', 'region_id' => 2],
        ['id' => 12, 'name' => 'Haima', 'region_id' => 2],
        ['id' => 13, 'name' => 'Marmoul', 'region_id' => 2],
        ['id' => 14, 'name' => 'Buraimi', 'region_id' => 1],
        ['id' => 15, 'name' => 'Suwaiq', 'region_id' => 1],
        ['id' => 16, 'name' => 'Warehouse', 'region_id' => 2],
        ['id' => 17, 'name' => 'Adam', 'region_id' => 2],
    ];
    public $regions = [
        ['id' => 1, 'name' => 'Northern Oman'],
        ['id' => 2, 'name' => 'Southern Oman'],
    ];


    public $wilayats = [
        ['id' => 1, 'name' => 'Muscat', 'govern_id' => 1],
        ['id' => 2, 'name' => 'Salalah', 'govern_id' => 2],
        ['id' => 3, 'name' => 'Sohar', 'govern_id' => 3],
        ['id' => 4, 'name' => 'Ibra', 'govern_id' => 7],
        ['id' => 5, 'name' => 'Nizwa', 'govern_id' => 5],
        ['id' => 6, 'name' => 'Sur', 'govern_id' => 9],
        ['id' => 7, 'name' => 'Adam', 'govern_id' => 8],
        ['id' => 8, 'name' => 'Ad Duqm', 'govern_id' => 8],
        ['id' => 9, 'name' => 'Hayma', 'govern_id' => 8],
        ['id' => 10, 'name' => 'AS SUWAYQ', 'govern_id' => 4],
        ['id' => 11, 'name' => 'Khasab', 'govern_id' => 10],
        ['id' => 12, 'name' => 'Ibri', 'govern_id' => 11],
        ['id' => 13, 'name' => 'Al Sunaynah', 'govern_id' => 6],
        ['id' => 14, 'name' => 'Bidiyah', 'govern_id' => 7],
        ['id' => 15, 'name' => 'Masirah', 'govern_id' => 9],
        ['id' => 16, 'name' => 'Bawshar', 'govern_id' => 1],
        ['id' => 17, 'name' => 'Wadi Bani Khalid', 'govern_id' => 7],
        ['id' => 18, 'name' => 'Al Mudaybi', 'govern_id' => 7],
        ['id' => 19, 'name' => 'Shalim Wa Juzur Al Hallniyat', 'govern_id' => 2],
        ['id' => 20, 'name' => 'Dima Wa At Taiyyin', 'govern_id' => 7],
        ['id' => 21, 'name' => 'Al Kamil Wa Al Wafi', 'govern_id' => 9],
        ['id' => 22, 'name' => 'Jaalan Bani Bu Ali', 'govern_id' => 9],
        ['id' => 23, 'name' => 'Jaalan Bani Bu Hasan', 'govern_id' => 9],
        ['id' => 24, 'name' => 'BidBid', 'govern_id' => 5],
        ['id' => 25, 'name' => 'Al Qabil', 'govern_id' => 7],
        ['id' => 26, 'name' => 'Al Maydin', 'govern_id' => 9],
        ['id' => 27, 'name' => 'Al Amrat', 'govern_id' => 1],
        ['id' => 28, 'name' => 'Qurayyat', 'govern_id' => 1],
        ['id' => 29, 'name' => 'Nakhal', 'govern_id' => 3],
        ['id' => 30, 'name' => 'Mahawt', 'govern_id' => 8],
        ['id' => 31, 'name' => 'Muttrah', 'govern_id' => 1],
        ['id' => 32, 'name' => 'Al Seeb', 'govern_id' => 1],
        ['id' => 33, 'name' => 'Al Mazyunah', 'govern_id' => 2],
        ['id' => 34, 'name' => 'Bahla', 'govern_id' => 5],
        ['id' => 35, 'name' => 'Barka', 'govern_id' => 3],
        ['id' => 36, 'name' => 'Wadi Al Maawil', 'govern_id' => 3],
        ['id' => 37, 'name' => 'Daba', 'govern_id' => 10],
        ['id' => 38, 'name' => 'Bukha', 'govern_id' => 10],
        ['id' => 39, 'name' => 'Madha', 'govern_id' => 10],
        ['id' => 40, 'name' => 'Mahdah', 'govern_id' => 6],
        ['id' => 41, 'name' => 'Dank', 'govern_id' => 11],
        ['id' => 42, 'name' => 'Al Buraymi', 'govern_id' => 6],
        ['id' => 43, 'name' => 'Yanqul', 'govern_id' => 11],
        ['id' => 44, 'name' => 'Thumrayt', 'govern_id' => 2],
        ['id' => 45, 'name' => 'Sadah', 'govern_id' => 2],
        ['id' => 46, 'name' => 'Taqah', 'govern_id' => 2],
        ['id' => 47, 'name' => 'Rakhyut', 'govern_id' => 2],
        ['id' => 48, 'name' => 'Mirbat', 'govern_id' => 2],
        ['id' => 49, 'name' => 'Muqshin', 'govern_id' => 2],
        ['id' => 50, 'name' => 'Dalkut', 'govern_id' => 2],
        ['id' => 51, 'name' => 'Al Hamra', 'govern_id' => 5],
        ['id' => 52, 'name' => 'Samail', 'govern_id' => 5],
        ['id' => 53, 'name' => 'Izki', 'govern_id' => 5],
        ['id' => 54, 'name' => 'Al Jazer', 'govern_id' => 8],
        ['id' => 55, 'name' => 'Manah', 'govern_id' => 5],
        ['id' => 56, 'name' => 'Muhut', 'govern_id' => 8],
        ['id' => 57, 'name' => 'COW/Auto VSAT', 'govern_id' => 7],
        ['id' => 58, 'name' => 'Al Rustaq', 'govern_id' => 3],
        ['id' => 59, 'name' => 'Shinas', 'govern_id' => 4],
        ['id' => 60, 'name' => 'Al Khaburah', 'govern_id' => 4],
        ['id' => 61, 'name' => 'Saham', 'govern_id' => 4],
        ['id' => 62, 'name' => 'Al Awabi', 'govern_id' => 3],
        ['id' => 63, 'name' => 'Al Musanah', 'govern_id' => 3],
        ['id' => 64, 'name' => 'AR RUSTAQ', 'govern_id' => 3],
        ['id' => 65, 'name' => 'DAMA WA AT TAIYIN', 'govern_id' => 7],
        ['id' => 66, 'name' => 'AL JAZIR', 'govern_id' => 8],
        ['id' => 67, 'name' => 'AS SEEB', 'govern_id' => 1],
        ['id' => 68, 'name' => 'MUTRAH', 'govern_id' => 1],
        ['id' => 69, 'name' => 'Al Kamimah', 'govern_id' => 7],
        ['id' => 70, 'name' => 'SHALIM WA JUZOR AL HALLANIYAT', 'govern_id' => 2],
        ['id' => 71, 'name' => 'Sadeh', 'govern_id' => 2],
        ['id' => 72, 'name' => 'Laqbi', 'govern_id' => 8],
        ['id' => 73, 'name' => 'liwa', 'govern_id' => 4],
        ['id' => 74, 'name' => 'Al Suwayq', 'govern_id' => 4],
        ['id' => 75, 'name' => '-', 'govern_id' => 8],
        ['id' => 76, 'name' => '-', 'govern_id' => 2],
        ['id' => 77, 'name' => '-', 'govern_id' => 6],
        ['id' => 78, 'name' => '-', 'govern_id' => 5],
        ['id' => 79, 'name' => '-', 'govern_id' => 4],
        ['id' => 80, 'name' => '-', 'govern_id' => 7],
        ['id' => 81, 'name' => '-', 'govern_id' => 9],
        ['id' => 82, 'name' => '-', 'govern_id' => 3],
        ['id' => 83, 'name' => '-', 'govern_id' => 10],
        ['id' => 84, 'name' => '-', 'govern_id' => 11],
        ['id' => 85, 'name' => '-', 'govern_id' => 12],
        ['id' => 86, 'name' => '-', 'govern_id' => 13],
        ['id' => 87, 'name' => '-', 'govern_id' => 14],
        ['id' => 88, 'name' => '-', 'govern_id' => 15],
        ['id' => 89, 'name' => '-', 'govern_id' => 16],
        ['id' => 90, 'name' => 'FAHUD', 'govern_id' => 5],
        ['id' => 91, 'name' => 'Sadh', 'govern_id' => 2],
        ['id' => 92, 'name' => 'MAHADAH', 'govern_id' => 6],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_categs')->insert($this->main_categs);
        DB::table('sub_categs')->insert($this->sub_categs);
        DB::table('snagstatuss')->insert($this->snag_status);
        DB::table('snag_reporters')->insert($this->snag_reporter);
        DB::table('snagdomains')->insert($this->snag_domains);
        DB::table('snag_remarks')->insert($this->snag_remarks);
        DB::table('regions')->insert($this->regions);
        DB::table('governs')->insert($this->governs);
        DB::table('wilayats')->insert($this->wilayats);
        DB::table('offices')->insert($this->offices);
    }
}
