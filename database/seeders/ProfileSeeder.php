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
                'name' => 'admin',
                'username' => 'admin',	
                'password' => Hash::make("admin"),	
                'celphone' => 'admin',	
                'email' => 'admin',	
                'facebook' => 'admin',	
                'twitter' => 'admin',	
                'instagram' => 'admin',	
                'youtube' => 'admin',	
                'rol_id' => '1'	
            ]									
        ]);
    }
}
