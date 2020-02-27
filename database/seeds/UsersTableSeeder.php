<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();

        $superAdminRole = Role::where('name', 'super-admin')->first();

        $user = new User;
        $user->name = 'Net Fusion Technology';
        $user->email = 'admin@nft.com';
        $user->password = bcrypt('Abcde12345');
        $user->email_verified_at = now();
        $user->save();

        $user->assignRole($superAdminRole);

        Schema::enableForeignKeyConstraints();
    }
}
