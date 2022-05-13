<?php

namespace App\Http\Controllers\Indicated;

use App\Http\Controllers\Controller;
use App\Http\Requests\Indicated\IndicatedCreateRequest;
use App\Http\Requests\Indicated\IndicatedUpdateRequest;
use App\Http\Requests\Indicated\ValidateCPFIndicatedRequest;
use Illuminate\Http\Request;
use App\Http\Services\Indicated\IndicatedService;
use Illuminate\Support\Facades\DB;

class IndicatedController extends Controller
{

    public function __construct(IndicatedService $indicatedService)
    {
        $this->indicatedService = $indicatedService;
    }

    public function index()
    {
        $indicateds = $this->indicatedService->list();

        return view('indicated.index',[
            'indicateds' => $indicateds
        ]);
    }

    public function viewCreate()
    {
        return view('indicated.form',[
            'title' => 'Adicionar Indicado',
            'action' => Route('indicateds.create')
        ]);
    }

    public function create(IndicatedCreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->indicatedService->create($request->all());

            DB::commit();

            return redirect()
                ->route('index')
                ->with('success', 'Usuário criado com sucesso.');    

        } catch (\Exception $ex) {
            DB::rollBack();

            report($ex);

            return redirect()
                    ->back()
                    ->with('Ocorreu um erro ao criar o usuário.');
        }
    }

    public function update(IndicatedUpdateRequest $request)
    {
        try {
            $this->indicatedService->update($request->all());

            return redirect()
                    ->route('index')
                    ->with('success', 'Situação atualizada com sucesso.');

        } catch (\Exception $ex) {
            report($ex);

            return redirect()
                    ->back()
                    ->with('Ocorreu um erro ao atualizar a situação do usuário.');

        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->indicatedService->delete($id);

            if($user == 0) {
                return redirect()
                    ->route('index')
                    ->with('success', 'Usuário removido com sucesso');
            }

            return redirect()
                    ->route('index')
                    ->with('error', 'Não foi possível remover o usuário, pois o mesmo possui indicado(s) associado(s) a ele.');

        } catch (\Exception $ex) {
            report($ex);

            return redirect()
                    ->back()
                    ->with('Ocorreu um erro ao remover o usuário.');
        }
    }

    public function find(ValidateCPFIndicatedRequest $request)
    {
        try {
            $user = $this->indicatedService->find($request->all());

            if(!is_null($user)) {
                return response()->json([
                    "status" => "Sucesso",
                    "response" => "Usuário encontrado com sucesso."
                ],200);
            }

            return response()->json([
                "status" => "Ocorreu um erro ao realizar a consulta",
                "response" => "Não foi possível localizar o CPF informado na base dados, remova o CPF para continuar ou informe um novo CPF novamente."
            ],400);


        } catch (\Exception $ex) {
            report($ex);

            return response()->json([
                "status" => "Ocorreu um erro ao realizar a consulta",
                "exception" => $ex->getMessage()
            ],500);
        }
    }
}
