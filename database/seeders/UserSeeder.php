<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke dalam table role dengan nama role admin
        $roleadmin=Role::create(['name'=>'admin']);
          // insert data ke dalam table role dengan nama role user
        $roleuser=Role::create(['name'=>'user']);
        // insert data ke dalam table role dengan nama role kepsek
        $rolekepsek=Role::create(['name'=>'kepsek']);


        // insert data ke table user 
        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);
        // merelasikan user dengan name admin yang memiliki role nama admin
        $admin->syncRoles($roleadmin);
       
        $user=User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('user123'),
        ]);
        // merelasikan user dengan name admin yang memiliki role nama user
        $user->syncRoles($roleuser);

        $kepsek=User::create([
            'name'=>'kepsek',
            'email'=>'kepsek@gmail.com',
            'password'=>bcrypt('kepsek123'),
        ]);
        // merelasikan user dengan name admin yang memiliki role nama admin
        $kepsek->syncRoles($rolekepsek);
    }
    // JANGAN LUPA DIBACA KOMEN INI YAAAA!!!!!
}
