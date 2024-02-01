<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Plan::
        query()
            ->insert([
                [
                    'name' => 'Free Plan',
                    'price' => 0
                ],
                [
                    'name' => 'Basic Plan',
                    'price' => 2000
                ],
                [
                    'name' => 'Pro Plan',
                    'price' => 8000
                ],

            ]);

        Feature::
        query()
            ->insert([
                [
                    'name' => 'Classrooms #',
                    'code' => 'classrooms-count'
                ],
                [
                    'name' => 'Students Per Classroom',
                    'code' => 'classroom-students'
                ],
            ]);

        DB::table('plan_features')
            ->insert([
                ['plan_id' => 1, 'feature_id' => 1, 'feature_value' => 1],
                ['plan_id' => 1, 'feature_id' => 2, 'feature_value' => 10],
                ['plan_id' => 2, 'feature_id' => 1, 'feature_value' => 5],
                ['plan_id' => 2, 'feature_id' => 2, 'feature_value' => 30],
                ['plan_id' => 3, 'feature_id' => 1, 'feature_value' => 100],
                ['plan_id' => 3, 'feature_id' => 2, 'feature_value' => 1000],
            ]);



    }
}
