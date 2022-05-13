<?php

namespace App\Http\Services\Indicated;

use App\Models\Contact;
use App\Models\User;

class IndicatedService
{
    /**
     * Função responsável por listar todos os indicados
     */
    public function list($userIdIndicated = null)
    {
        $user = User::select('id_usuario',
                            'id_indicado',
                            'nome',
                            'cpf',
                            'email',
                            'situacao',
                            'created_at')
                    ->orderBy('nome', 'asc')
                    ->where(function($query) use ($userIdIndicated) {
                        if(!is_null($userIdIndicated)) {
                            $query->where('id_indicado', '=', $userIdIndicated);
                        }
                    })
                    ->get();

        return $user;
    }

    /**
     * Função responsável por criar um novo indicado
     */
    public function create(array $data)
    {
        $arrayIndicated = [
            'cpf' => $data['cpf_indicado'] 
        ];

        $user = User::create([
            'nome' => $data['nome'],
            'cpf'  => func_remove_mask_number($data['cpf']),
            'email' => $data['email'],
            'situacao' => 1,
            'id_indicado' => !is_null($data['cpf_indicado']) 
                ? $this->find($arrayIndicated)->id_usuario 
                : null
        ]);

        Contact::create([
            'id_usuario' => $user->id_usuario,
            'ddd' => func_format_ddd_contact($data['telefone']),
            'numero' => func_format_number_contact($data['telefone'])
        ]);
    }

    /**
     * Função responsável por validar se o cpf está inserido na base como referencia ao indicado por
     */
    public function find(array $data)
    {
        $user = User::select('id_usuario', 'id_indicado', 'nome')
                    ->where(function($query) use ($data) {
                        if(isset($data['cpf']) && !is_null($data['cpf'])) {
                            $query->where('cpf', '=', func_remove_mask_number($data['cpf']));
                        }
                    })
                    ->where(function($query) use ($data) {
                        if(isset($data['id_usuario']) && !is_null($data['id_usuario'])) {
                            $query->where('id_usuario', '=', $data['id_usuario']);
                        }
                    })
                    ->first();

        return $user;
    }

    /**
     * Função responsável por atualizar a situação
     */
    public function update(array $data)
    {
        User::where('id_usuario', '=', $data['id_usuario'])
            ->update([
                'situacao' => $data['situacao']
            ]);
    }

    /**
     * Função responsável por remover um indicado da base de dados.
     */
    public function delete($userId)
    {
        $user =  User::where('id_indicado', '=', $userId)->count();

        if($user > 0) {
            return $user;
        }

        Contact::where('id_usuario', '=', $userId)->delete();

        User::where('id_usuario', '=', $userId)->delete();

        return 0;
    }
}