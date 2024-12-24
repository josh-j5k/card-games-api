<?php

namespace Database\Seeders;

use App\Models\Solitaire;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $arr = [
            ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],
            ['time' => '04:04', 'score' => 4500, 'name' => 'josh'],
            ['time' => '07:04', 'score' => 1450, 'name' => 'josh'],
            ['time' => '05:55', 'score' => 2300, 'name' => 'josh'],
            ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],
            ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],
            ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],
            ['time' => '05:04', 'score' => 2450, 'name' => 'josh'],


        ];
        foreach ($arr as $val) {
            Solitaire::factory()->create([
                'name' => $val['name'],
                'score' => $val['score'],
                'time' => $val['time']
            ]);
        }
    }
}
