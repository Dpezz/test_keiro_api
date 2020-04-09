<?php

use Illuminate\Database\Seeder;
use App\Models\TypeUser;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Administrador'],
            ['name' => 'Usuario']
        ];
        foreach ($data as $key => $value) {
            TypeUser::create($value);
        }
    }
}
