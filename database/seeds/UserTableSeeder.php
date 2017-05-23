<?php

use Illuminate\Database\Seeder;
use App\Users;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'USRNUM' => 1,
            'USRTYPE' => 'admin',
            'USRLOGIN' => 'Arnedo5',
            'USRNAME' => 'David',
            'USRLASTNAME' => 'Arnedo Gallardo',
            'USRMAIL' => 'arnedo555@gmail.com',
            'USRPASSWORD' => \Hash::make('123456'),
            'USRCITY' => 'Les Masies de Voltregà',
            'USRDIRECTION' => 'C/ Sant Jordi nº3 2on 1a',
            'USRPOSTAL' => '08508',
            'USRDESCRIPTION' => 'Usuari administrador de sistema',
            'USRIMG' => 'null',
            'USRSTATUS' => true,
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime,
            ],
            [
            'USRNUM' => 2,
            'USRTYPE' => 'user',
            'USRLOGIN' => 'user',
            'USRNAME' => 'User',
            'USRLASTNAME' => 'Text Prova',
            'USRMAIL' => 'prova@gmail.com',
            'USRPASSWORD' => \Hash::make('123456'),
            'USRCITY' => 'Torello',
            'USRDIRECTION' => 'C/ Sant Miquel',
            'USRPOSTAL' => '08570',
            'USRDESCRIPTION' => 'Usuari estàndard de prova. No es admin',
            'USRIMG' => 'null',
            'USRSTATUS' => true,
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime,
            ],
            [
            'USRNUM' => 3,
            'USRTYPE' => 'user',
            'USRLOGIN' => 'aleix5',
            'USRNAME' => 'Aleix',
            'USRLASTNAME' => 'Aleix Garriga',
            'USRMAIL' => 'kundrak@gmail.com',
            'USRPASSWORD' => \Hash::make('123456'),
            'USRCITY' => 'Ripoll',
            'USRDIRECTION' => 'C/ Monestir',
            'USRPOSTAL' => '17500',
            'USRDESCRIPTION' => 'Usuari registrat',
            'USRIMG' => 'null',
            'USRSTATUS' => true,
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime,
            ],
            [
            'USRNUM' => 4,
            'USRTYPE' => 'user',
            'USRLOGIN' => 'marta5',
            'USRNAME' => 'Marta',
            'USRLASTNAME' => 'Pradell Sanchez',
            'USRMAIL' => 'maria5@gmail.com',
            'USRPASSWORD' => \Hash::make('123456'),
            'USRCITY' => 'Vic',
            'USRDIRECTION' => 'C/ Sant Girona',
            'USRPOSTAL' => '08500',
            'USRDESCRIPTION' => 'Usuari registrat.',
            'USRIMG' => 'null',
            'USRSTATUS' => true,
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime,
            ],
            [
            'USRNUM' => 5,
            'USRTYPE' => 'user',
            'USRLOGIN' => 'roger5',
            'USRNAME' => 'Roger',
            'USRLASTNAME' => 'Sanchez Milar',
            'USRMAIL' => 'roger5@gmail.com',
            'USRPASSWORD' => \Hash::make('123456'),
            'USRCITY' => 'Santa Coloma de Farners',
            'USRDIRECTION' => 'C/ Salvador Espriu',
            'USRPOSTAL' => '17430',
            'USRDESCRIPTION' => 'Usuari registrat.',
            'USRIMG' => 'null',
            'USRSTATUS' => true,
            'created_at'=> new DateTime,
            'updated_at'=> new DateTime,
            ]
         ]);
    }
}
