<?php

use App\Admin;
use App\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('admins')->delete();

        $admins = [
            [
                'first_name' => 'Gene',
                'last_name' => 'Sibbett',
                'username' => 'Gene',
                'unique_id' => str_random(10),
                'email' => 'admin@mail.com',
                'password' => bcrypt('secret'),
                'remember_token' => str_random(10),
            ],
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
        Model::reguard();

        // setting table

        Model::unguard();
        DB::table('settings')->delete();

        $settings = [
            [
                'app_name' => 'iFundFilm',
                'logo_img' => 'default.jpg',
                'logo_fav' => 'default.jpg',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
        Model::reguard();
    }
}
