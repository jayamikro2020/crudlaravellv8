<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'nama' => 'Jaya Linux',
            'jeniskelamin' => 'Laki-laki',
            'notelpon' => '082276001234'
        ]);
    }
}
