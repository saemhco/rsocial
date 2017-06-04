<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'nombres' => 'Super',
                'apellidos' => 'Admin',
                'dni' => '00000000',
                'email' => 'administrador@hotmail.com',
                'password' => bcrypt('12345678'),
                'foto' => 'admin.png',
                'sexo' => '1',
                'tipo' => '0',
                'estado' => '1',
        	]);
        DB::table('users')->insert([
                'nombres' => 'Docente',
                'apellidos' => 'Doc',
                'dni' => '00000001',
                'email' => 'd@hotmail.com',
                'password' => bcrypt('12345678'),
                'foto' => 'admin.png',
                'sexo' => '1',
                'tipo' => '1',
                'estado' => '1',
            ]);
        DB::table('docentes')->insert([
                'user_id' => '2',
            ]);

    }
}
