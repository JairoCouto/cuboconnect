<?php

namespace App\Http\Controllers\Indicated;

use App\Http\Controllers\Controller;
use App\Http\Services\Indicated\IndicatedService;
use Illuminate\Http\Request;

class UserIndicatedController extends Controller
{
    public function __construct(IndicatedService $indicatedService)
    {
        $this->indicatedService = $indicatedService;
    }

    public function index($userIndicated)
    {
        $indicateds = $this->indicatedService->list($userIndicated);

        $arrayIndicated = [
            'id_usuario' => $userIndicated
        ];

        $user = $this->indicatedService->find($arrayIndicated);

        return view('indicated.list-indicated',[
            'nameIndicated' => $user->nome,
            'indicateds' => $indicateds
        ]);
    }
}
