<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $clientRole = Role::where('name', 'client')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'userType' => 'admin',
            'password' => bcrypt('admin')
        ]);

        $client = User::create([
            'name' => 'Client',
            'email' => 'client@client.com',
            'userType' => 'Agency',
            'password' => bcrypt('client')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'userType' => 'Agency',
            'password' => bcrypt('user')
        ]);

        $admin->roles()->attach($adminRole);
        $client->roles()->attach($clientRole);
        $user->roles()->attach($userRole);
    }
}
