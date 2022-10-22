<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\DB::table('currencies')->count() > 0) {
            return;
        }

        \DB::table('currencies')->insert([
            ['code' =>'USD' , 'name' => 'US Dollar', 'symbol' => '$' ],
            ['code' =>'OMR' , 'name' => 'Rial Omani', 'symbol' => '﷼' ],
            ['code' =>'QAR' , 'name' => 'Qatari Rial', 'symbol' => '﷼' ],
            ['code' =>'EUR' , 'name' => 'Euro', 'symbol' => '€' ],
            ['code' =>'EGP' , 'name' => 'Egyptian Pound', 'symbol' => '£' ],
            ['code' =>'SAR' , 'name' => 'Saudi Riyal', 'symbol' => '﷼' ],
            ['code' =>'PKR' , 'name' => 'Pakistan Rupee', 'symbol' => '₨' ],
            ['code' =>'CAD' , 'name' => 'Canadian Dollar', 'symbol' => '$' ],
            ['code' =>'JPY' , 'name' => 'Yen', 'symbol' => '¥' ],
            ['code' =>'PHP' , 'name' => 'Philippine Peso', 'symbol' => 'Php' ],
            ['code' =>'RUB' , 'name' => 'Russian Ruble', 'symbol' => 'руб' ],
            ['code' =>'TRY' , 'name' => 'Turkish Lira', 'symbol' => 'TL' ],
        ]);
    }
}
