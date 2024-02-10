<?php

namespace Database\Seeders;

use App\models\TypeEvent;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeEvent::insert([
            ['name' => 'ACTIVIDAD'],
            ['name' => 'NOTICIA'],
            ['name' => 'POSTER']
        ]);

        Rol::insert([
            ['name' => 'ADMINISTRADOR'],
            ['name' => 'USUARIO'],
        ]);
        User::insert([
            [
                'name' => 'Diego',
                'password' => Hash::make("admin"),	
                'cellphone' => '3112344333',	
                'email' => 'admin',	
                'rol_id' => '1'	
            ]									
        ]);
    }
}
