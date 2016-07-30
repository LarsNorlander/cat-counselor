<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            ['subject_title' => 'Math'],
            ['subject_title' => 'Science'],
            ['subject_title' => 'TLE'],
            ['subject_title' => 'MAPEH'],
            ['subject_title' => 'Computer'],
            ['subject_title' => 'Values'],
            ['subject_title' => 'Filipino'],
            ['subject_title' => 'English'],
            ['subject_title' => 'Social Studies'],
        ]);
    }
}
