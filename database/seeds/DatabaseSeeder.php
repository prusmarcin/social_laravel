<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pl_PL');

        /* =============Zmienne=============== */
        $number_of_users = 20;
        $password = 'pass';
        /* ==================================== */

        for ($i = 1; $i <= $number_of_users; $i++) {

            if ($i === 1) {
                DB::table('users')->insert([
                    'name' => 'Marcin Prus',
                    'email' => 'mhome@o2.pl',
                    'password' => bcrypt('marcin17'),
                    'sex' => 'm',
                ]);
            } else {
                $sex = $faker->randomElement($array = array('m', 'f'));

                switch ($sex) {
                    case 'm':
                        $name = $faker->firstNameMale . ' ' . $faker->lastNameMale;

                        break;
                    case 'f':
                        $name = $faker->firstNameFemale . ' ' . $faker->lastNameFemale;

                        break;

                    default:
                        break;
                }

                DB::table('users')->insert([
                    'name' => $name,
                    'email' => str_replace('-', '', str_slug($name)) . '@' . $faker->safeEmailDomain,
                    //str_slug() zamienia Marcin Prus na marcin-prus
                    'password' => bcrypt($password),
                    'sex' => $sex,
                ]);
            }
        }
    }
}