<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::truncate();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@dbkl.my',
            'password' => bcrypt('dbklAdmin123'),
        ]);

        $user->assignRole('Admin');
    }
}
