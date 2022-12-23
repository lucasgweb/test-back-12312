<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('vehicles')->insert([
            [
                'user_id' => 1,
                'plate' => 'NDA-0401',
                'brand' => 'Asia Motors',
                'model' => 'Tower Glass Van',
                'year' => '1997 Gasolina'
            ],
            [
                'user_id' => 1,
                'plate' => 'MOO-9748',
                'brand' => 'Citroen',
                'model' => 'C3 Picasso Origine 1.5 Flex 8V Mec.',
                'year' => '2015'
            ],
            [
                'user_id' => 1,
                'plate' => 'IAP-1814',
                'brand' => 'FOTON',
                'model' => 'AUMARK 3.5 - 11ST 2.8 4x2 TB Diesel',
                'year' => '2014'
            ],
            [
                'user_id' => 1,
                'plate' => 'BSQ-8835',
                'brand' => 'Lotus',
                'model' => 'Esprit S-4 2.2 16V',
                'year' => '1995'
            ],
            [
                'user_id' => 1,
                'plate' => 'LRZ-2260',
                'brand' => 'Troller',
                'model' => 'RF Esport T-4 4x4 2.0 Cap. Lona',
                'year' => '1998'
            ],
            [
                'user_id' => 1,
                'plate' => 'HXW-2669',
                'brand' => 'Pontiac',
                'model' => 'Trans-Sport SE 3.1',
                'year' => '1991'
            ],
            [
                'user_id' => 1,
                'plate' => 'NBB-0259',
                'brand' => 'GEELY',
                'model' => 'GC2 1.0 12V 68cv 5p',
                'year' => '2015'
            ],
            [
                'user_id' => 1,
                'plate' => 'MUP-8332',
                'brand' => 'Buggy',
                'model' => 'Buggy 1.6 2-Lug.',
                'year' => '1988'
            ],
            [
                'user_id' => 1,
                'plate' => 'MVT-1833',
                'brand' => 'Alfa Romeo',
                'model' => '145 Elegant 2.0 16V',
                'year' => '1995'
            ],
            [
                'user_id' => 1,
                'plate' => 'JZX-6782',
                'brand' => 'Alfa Romeo',
                'model' => '156 Sport Wagon 2.0 16V',
                'year' => '2001'
            ],
            [
                'user_id' => 1,
                'plate' => 'MLF-6736',
                'brand' => 'VW - VolksWagen',
                'model' => 'JETTA Variant 2.5 20V 170cv Tiptronic',
                'year' => '2008'
            ],
            [
                'user_id' => 1,
                'plate' => 'JZN-1368',
                'brand' => 'Audi',
                'model' => 'RS4 4.2 Avant 32V FSI Quattro S-tronic',
                'year' => '2013'
            ],
        ]);
    }
}
