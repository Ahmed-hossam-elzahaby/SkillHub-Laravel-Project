<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class Settingseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

'email'=>'ahmed.elzahby44@gmail.com',
'phone'=>'01008168578',
'facebook'=>'https://www.facebook.com/',
'linkedin'=>'https://www.linkedin.com/in/ahmed-el-zahaby-b96428197/'

        ]);
    }
}
