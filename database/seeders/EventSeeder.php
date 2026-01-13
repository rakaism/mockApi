<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); 

        $categories = ['Conference', 'Workshop', 'Meetup', 'Concert', 'Seminar', 'Webinar', 'Festival', 'Competition'];
        $records = [];

        for ($i = 0; $i < 100; $i++) {
            $name = $faker->unique()->sentence(mt_rand(2, 5));
            $date = $faker->dateTimeBetween('-1 years', '+1 years')->format('Y-m-d');

            $records[] = [
                'event_name' => $name,
                'event_date' => $date,
                'event_location' => $faker->city . ', ' . $faker->country,
                'event_description' => $faker->paragraphs(mt_rand(1, 3), true),
                'event_attendees' => $faker->numberBetween(0, 5000),
                'event_category' => $faker->randomElement($categories),
                'event_organizer' => $faker->company,
                'event_website' => $faker->boolean(70) ? $faker->url : null,
                'event_hashtag' => '#'.Str::slug(substr($name, 0, 40)),
                'event_sponsor' => $faker->boolean(50) ? $faker->company : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (array_chunk($records, 25) as $chunk) {
            DB::table('events')->insert($chunk);
        }
    }
}
