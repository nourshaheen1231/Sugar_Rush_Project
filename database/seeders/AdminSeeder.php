<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName'=>'nour',
            'lastName'=>'shaheen',
            'phone'=> '0936820776',
            'password'=>Hash::make('nour1234'),
            'role'=>true,
        ]);

        User::create([
            'firstName'=>'naya',
            'lastName'=>'salha',
            'phone'=> '0930536570',
            'password'=>Hash::make('nnaya1234'),
            'role'=>true,
        ]);
    }
}
