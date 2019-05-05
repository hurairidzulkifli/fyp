<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Settings::create([
            'site_name'=>'WhatsUp Portal',
            'address'=>'KKSJPE Bangsar',
            'contact_number'=>'0145171727',
            'contact_email'=>'hurairi.dz@gmail.com'
        ]);
    }
}
