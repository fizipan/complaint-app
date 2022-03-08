<?php

namespace Database\Seeders;

use App\Models\MasterData\CategoryComplaint;
use Illuminate\Database\Seeder;

class CategoryComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_complaint = [
            [
                'name' => 'Health',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            [
                'name' => 'Education',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            [
                'name' => 'Social Welfare',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            [
                'name' => 'Employment',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            [
                'name' => 'Social',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
            [
                'name' => 'Political',
                'created_at'    => '2021-03-15 00:00:00',
                'updated_at'    => '2021-03-15 00:00:00',
            ],
        ];

        CategoryComplaint::insert($category_complaint);
    }
}
