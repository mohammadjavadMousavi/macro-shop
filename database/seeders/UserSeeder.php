<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'role_id' => Role::query()->where('title','admin')->first()->id,
            'name' => 'javad Admin',
            'verifyCode' => bcrypt('12345'),
            'statusVerify' => '1',
            'email' => 'mhmdjvadzx83@gmail.com',
            'password' => bcrypt('12341234')
        ]);
    }
}
