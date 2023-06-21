<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'lastname' => 'admin',
            'sex' => 'Masculino',
            'dni' => '0000000000',
            'phone' => '0000000000',
            'email' => 'admin@admin.com',
            'email_verified_at' => '2023-05-02 22:00:14',
            'file' => 'assets/assets/img/avatar/avatar-1.png',
            'password' => '$2y$10$xdR8eXIJfRcgWqiemqhWp.EWMNixBJQyJVHYQgZlGrSjPN6YYlgnO',
        ])->assignRole('admin');

        // User::create([
        //     'name' => 'admin2',
        //     'lastname' => 'admin2',
        //     'sex' => 'Masculino',
        //     'dni' => '0000000002',
        //     'phone' => '0000000002',
        //     'email' => 'admin2@admin.com',
        //     'email_verified_at' => '2023-05-02 22:00:14',
        //     'file' => 'assets/assets/img/avatar/avatar-1.png',
        //     'password' => '$2y$10$xdR8eXIJfRcgWqiemqhWp.EWMNixBJQyJVHYQgZlGrSjPN6YYlgnO',
        // ])->assignRole('admin');

        // User::create([
        //     'name' => 'admin3',
        //     'lastname' => 'admin3',
        //     'sex' => 'Masculino',
        //     'dni' => '0000000003',
        //     'phone' => '0000000003',
        //     'email' => 'admin@3admin.com',
        //     'email_verified_at' => '2023-05-02 22:00:14',
        //     'file' => 'assets/assets/img/avatar/avatar-1.png',
        //     'password' => '$2y$10$xdR8eXIJfRcgWqiemqhWp.EWMNixBJQyJVHYQgZlGrSjPN6YYlgnO',
        // ])->assignRole('admin');

        // User::create([
        //     'name' => 'user',
        //     'lastname' => 'user',
        //     'sex' => 'Masculino',
        //     'dni' => '0000000004',
        //     'phone' => '0000000004',
        //     'email' => 'user@user.com',
        //     'email_verified_at' => '2023-05-02 22:00:14',
        //     'file' => 'assets/assets/img/avatar/avatar-1.png',
        //     'password' => '$2y$10$xdR8eXIJfRcgWqiemqhWp.EWMNixBJQyJVHYQgZlGrSjPN6YYlgnO',
        // ])->assignRole('user');

        // User::create([
        //     'name' => 'user2',
        //     'lastname' => 'user2',
        //     'sex' => 'Masculino',
        //     'dni' => '0000000005',
        //     'phone' => '0000000005',
        //     'email' => 'user2@user.com',
        //     'email_verified_at' => '2023-05-02 22:00:14',
        //     'file' => 'assets/assets/img/avatar/avatar-1.png',
        //     'password' => '$2y$10$xdR8eXIJfRcgWqiemqhWp.EWMNixBJQyJVHYQgZlGrSjPN6YYlgnO',
        // ])->assignRole('user');

        // User::create([
        //     'name' => 'user3',
        //     'lastname' => 'user3',
        //     'sex' => 'Masculino',
        //     'dni' => '0000000006',
        //     'phone' => '0000000006',
        //     'email' => 'user3@user.com',
        //     'email_verified_at' => '2023-05-02 22:00:14',
        //     'file' => 'assets/assets/img/avatar/avatar-1.png',
        //     'password' => '$2y$10$xdR8eXIJfRcgWqiemqhWp.EWMNixBJQyJVHYQgZlGrSjPN6YYlgnO',
        // ])->assignRole('user');



        // User::create([
        //     'name' => 'empleado',
        //     'lastname' => 'empleado',
        //     'sex' => 'Masculino',
        //     'dni' => '0000000007',
        //     'phone' => '0000000007',
        //     'email' => 'empleado@empleado.com',
        //     'email_verified_at' => '2023-05-02 22:00:14',
        //     'file' => 'assets/assets/img/avatar/avatar-1.png',
        //     'password' => '$2y$10$xdR8eXIJfRcgWqiemqhWp.EWMNixBJQyJVHYQgZlGrSjPN6YYlgnO',
        // ])->assignRole('empleado');

        // User::create([
        //     'name' => 'empleado2',
        //     'lastname' => 'empleado2',
        //     'sex' => 'Masculino',
        //     'dni' => '0000000008',
        //     'phone' => '0000000008',
        //     'email' => 'empleado2@empleado.com',
        //     'email_verified_at' => '2023-05-02 22:00:14',
        //     'file' => 'assets/assets/img/avatar/avatar-1.png',
        //     'password' => '$2y$10$xdR8eXIJfRcgWqiemqhWp.EWMNixBJQyJVHYQgZlGrSjPN6YYlgnO',
        // ])->assignRole('empleado');

        // User::create([
        //     'name' => 'empleado3',
        //     'lastname' => 'empleado3',
        //     'sex' => 'Masculino',
        //     'dni' => '0000000009',
        //     'phone' => '0000000009',
        //     'email' => 'empleado3@empleado.com',
        //     'email_verified_at' => '2023-05-02 22:00:14',
        //     'file' => 'assets/assets/img/avatar/avatar-1.png',
        //     'password' => '$2y$10$xdR8eXIJfRcgWqiemqhWp.EWMNixBJQyJVHYQgZlGrSjPN6YYlgnO',
        // ])->assignRole('empleado');

    }
}
