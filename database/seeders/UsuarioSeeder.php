<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'name'=>'carlos',
            'email'=>'carlos@carlos',
            'password'=>bcrypt('carlos')
        ];

        if(User::where('email','=',$dados['email'])->count()){
            $usuario = User::where('email','=',$dados['email'])->first();
            $usuario->updade($dados);
            echo 'usuario alterado';
        }else{

            User::create($dados);
            echo 'usuario criado';
        }
    }
}
