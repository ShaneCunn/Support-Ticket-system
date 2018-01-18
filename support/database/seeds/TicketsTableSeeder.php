<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $faker= Faker::create();
        for ($i = 0; $i < 10; $i++) {

            DB::table('tickets')->insert([
                'user_id' => 1,
                'category_id' => rand(1, 4),
                'ticket_id' => str_random(10),
                'title' => str_random(10, 40).' test subject ' . $i,
                'message' => $faker-> realText($maxNbChars = 200, $indexSize = 2),
                'priority' => 'medium',
                'status' => 'Open',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,

            ]);
        }
    }
}
