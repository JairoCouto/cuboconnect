<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Contact;

class UsersFakeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $faker = \Faker\Factory::create('pt_BR');

            DB::beginTransaction();

            DB::table('contato')->delete();
            DB::table('usuario')->delete();

            for($i=0; $i<20; $i++) {
                $user = User::create([
                        'nome' => $faker->name,
                        'cpf' => func_remove_mask_number($faker->cpf),
                        'email' => $faker->email,
                        'situacao' => 1,
                        'created_at' => date_now_carbon_timestamp()
                    ]);

                Contact::create([
                    'id_usuario' => $user->id_usuario,
                    'ddd' => 62,
                    'numero' => 999999999,
                    'created_at' => date_now_carbon_timestamp()
                ]);
            }

            DB::commit();
            dd('Dados criados com sucesso');

        } catch (\Exception $ex) {
            DB::rollback();
            report($ex);

            dd('Ocorreu um erro ao criar os dados fake. Erro: ' . $ex->getMessage());
        }
    }
}
