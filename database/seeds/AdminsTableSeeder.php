<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        'username' => 'Gene Sibbett',
        'email' => 'admin@mail.com',
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        ]
      ];

      foreach ($admins as $admin) {
           Admin::create($admin);
       }
       Model::reguard();
    }
}
