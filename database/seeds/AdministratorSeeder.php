<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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
        $administrator->username = 'admin';
        $administrator->name = 'Administrator';
        $administrator->email = 'admin@mail.id';
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = Hash::make('admin123');
        $administrator->avatar = '';
        $administrator->address ='Dimana-mana';
        $administrator->created_by = 0 ;
        $administrator->updated_by = 0 ;
      

        ($administrator)->save();

      

    }
}
