<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('product_categories')->insert([
            [
            'PRCNUM' => 1,
            'PRCNAME' => 'Components',
            'PRCDESCRIPTION' => 'Diferents components d"ordinador',
            'PRCIMG' => 'prova',
            'PRCSTATUS' => true,
            ],
            [
            'PRCNUM' => 2,
            'PRCNAME' => 'Torres',
            'PRCDESCRIPTION' => 'Diferents torres d"ordinador a molt bon preu',
            'PRCIMG' => 'prova',
            'PRCSTATUS' => true,
            ],
            [
            'PRCNUM' => 3,
            'PRCNAME' => 'Portatils',
            'PRCDESCRIPTION' => 'Diferents portatils a molt bon preu',
            'PRCIMG' => 'prova',
            'PRCSTATUS' => true,
            ],
            [
            'PRCNUM' => 5,
            'PRCNAME' => 'Cables',
            'PRCDESCRIPTION' => 'Cables per a tots els gustos',
            'PRCIMG' => 'prova',
            'PRCSTATUS' => true,
            ],
            [
            'PRCNUM' => 6,
            'PRCNAME' => "Tintes d'impresora",
            'PRCDESCRIPTION' => 'Tot tipus de tinta',
            'PRCIMG' => 'prova',
            'PRCSTATUS' => true,
            ]
        ]);
    }
}