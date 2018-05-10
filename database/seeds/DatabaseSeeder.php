<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('companies')->insert([
            'name' => 'Tio Toddy',
        ]);

        DB::table('users')->insert([
            'companies_id' => 1,
            'name' => 'toddy',
            'email' => 'tiotoddy.recreacao@gmail.com',
            'password' => bcrypt('123123'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Tecnologia',
            'description' => 'Descrição categoria'
        ]);

    }
}
