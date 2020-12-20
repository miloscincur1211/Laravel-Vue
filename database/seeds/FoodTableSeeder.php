<?php

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('foods')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'vrsta' => 'dorucak',
                    'naziv' => 'Omlet sa sirom',
                    'cijena' => '3.00',
                    'sastav' => 'jaja, sir',
                    'created_at' => '2017-04-05 14:42:45',
                    'updated_at' => '2017-04-05 14:42:45',
                ),
            1 =>
                array (
                    'id' => 2,
                    'vrsta' => 'dorucak',
                    'naziv' => 'Omlet sa sunkom',
                    'cijena' => '3.50',
                    'sastav' => 'jaja, sunka',
                    'created_at' => '2017-04-05 14:42:45',
                    'updated_at' => '2017-04-05 14:42:45',
                ),
            2 =>
                array (
                    'id' => 3,
                    'vrsta' => 'dorucak',
                    'naziv' => 'Omlet sa povrcem',
                    'cijena' => '3.20',
                    'sastav' => 'jaja, povrce',
                    'created_at' => '2017-04-05 14:42:45',
                    'updated_at' => '2017-04-05 14:42:45',
                ),
            3 =>
                array (
                    'id' => 4,
                    'vrsta' => 'glavno jelo',
                    'naziv' => 'Tortilja mexicana',
                    'cijena' => '4.00',
                    'sastav' => 'pomfrit, prilog, toritilja',
                    'created_at' => '2017-04-05 14:42:45',
                    'updated_at' => '2017-04-05 14:42:45',
                ),
            4 =>
                array (
                    'id' => 5,
                    'vrsta' => 'glavno jelo',
                    'naziv' => 'Biftek',
                    'cijena' => '12.00',
                    'sastav' => 'junece meso, krompir, salata',
                    'created_at' => '2017-04-05 14:42:45',
                    'updated_at' => '2017-04-05 14:42:45',
                ),
            5 =>
                array (
                    'id' => 6,
                    'vrsta' => 'glavno jelo',
                    'naziv' => 'Slane palacinke',
                    'cijena' => '3.50',
                    'sastav' => 'sunka, pavlaka',
                    'created_at' => '2017-04-05 14:42:45',
                    'updated_at' => '2017-04-05 14:42:45',
                ),
            6 =>
                array (
                    'id' => 7,
                    'vrsta' => 'pice',
                    'naziv' => 'Kafa',
                    'cijena' => '1.00',
                    'sastav' => 'kafa',
                    'created_at' => '2017-04-05 14:42:45',
                    'updated_at' => '2017-04-05 14:42:45',
                ),
            7 =>
                array (
                    'id' => 8,
                    'vrsta' => 'pice',
                    'naziv' => 'Coca-cola',
                    'cijena' => '1.80',
                    'sastav' => 'cola',
                    'created_at' => '2017-04-05 14:42:45',
                    'updated_at' => '2017-04-05 14:42:45',
                ),
            8 =>
                array (
                    'id' => 9,
                    'vrsta' => 'pice',
                    'naziv' => 'Mineralna voda',
                    'cijena' => '1.20',
                    'sastav' => 'voda',
                    'created_at' => '2017-04-05 14:42:45',
                    'updated_at' => '2017-04-05 14:42:45',
                ),

        ));
    }
}
