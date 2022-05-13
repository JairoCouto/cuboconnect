<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedSituation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

          DB::beginTransaction();

          DB::table('situacao_indicado')->delete();

          DB::table('situacao_indicado')
            ->insert([
              0 => [
                'id_situacao' => 1,
                'descricao' => 'Iniciada',
                'created_at' => date_now_carbon_timestamp()
              ],

              1 => [
                'id_situacao' => 2,
                'descricao' => 'Em Processo',
                'created_at' => date_now_carbon_timestamp()
              ],

              2 => [
                'id_situacao' => 3,
                'descricao' => 'Finalizada',
                'created_at' => date_now_carbon_timestamp()
              ]
            
            ]);

          DB::commit();

          dd('Situações criadas com sucesso');

        } catch (\Exception $ex) {
          DB::rollBack();
          dd('Ocorreu um erro ao criar as situações. Error: ' . $ex->getMessage());
        }
    }
}
