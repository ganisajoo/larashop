<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = 'administrator';
        $administrator->name = 'Site Administrator';
        $administrator->email = 'administrator@larashop.test';
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = Hash::make('larashop');
        $administrator->avatar = '';
        $administrator->address = 'Jakarta Pusat';

        $administrator->save();

        $this->command->info('User admin berhasil diinsert');

    }
}
