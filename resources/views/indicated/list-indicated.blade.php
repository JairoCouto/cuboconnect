@extends('templates.layout')

@section('body')
    @push('alerts')
        @include('templates.alerts')
    @endpush
    <div class="card">
        <div class="card-header">
            Lista de Indicados Por: <strong>{{ $nameIndicated }}</strong>
            <div class="float-right">
                <a href="{{ route('indicateds.view-create') }}" class="btn btn-primary">Nova Indicação</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableUsers" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome Indicado</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Data Indicação</th>
                            <th><center>Ações</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($indicateds as $indicated)
                            <tr>
                                <td>{{ $indicated->nome }}</td>
                                <td>{{ func_format_mask_cpf($indicated->cpf) }}</td>
                                <td id="telefone">{{ $indicated->contacts[0]->ddd . $indicated->contacts[0]->numero}}</td>
                                <td>{{ $indicated->email }}</td>
                                <td>{{ $indicated->situacao_descricao }}</td>
                                <td>{{ $indicated->data_criacao }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('indicateds.list-indicated', ['id' => $indicated->id_usuario ]) }}" class="btn btn-primary mr-2"><i class="fas fa-list" data-toggle="tooltip" data-placement="top" title="Listar Indicados"></i></a>
                                        <button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#modalUpdateIndicated-{{ $indicated->id_usuario }}" data-toggle="tooltip" data-placement="top" title="Editar Dados"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalRemoveIndicated-{{ $indicated->id_usuario }}" data-toggle="tooltip" data-placement="top" title="Remover Indicação"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal Update -->
                            <div class="modal fade" id="modalUpdateIndicated-{{ $indicated->id_usuario }}" tabindex="-1" role="dialog" aria-labelledby="modalUpdateIndicatedLabel-{{ $indicated->id_usuario }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('indicateds.update') }}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalUpdateIndicatedLabel-{{ $indicated->id_usuario }}">Atualizar Situação</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_usuario" value="{{ $indicated->id_usuario }}">

                                                <select class="custom-select mr-sm-2" id="situacao" name="situacao">
                                                    @foreach (\App\Enums\SituationIndicatedEnum::situationIndicateds() as $key => $item)
                                                        @if ($key == (int) $indicated->situacao +1)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endif
                                                        @if ($indicated->situacao == 3 && $key == 3)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Remove-->
                            <div class="modal fade" id="modalRemoveIndicated-{{ $indicated->id_usuario }}" tabindex="-1" role="dialog" aria-labelledby="modalRemoveIndicatedLabel-{{ $indicated->id_usuario }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalRemoveIndicatedLabel-{{ $indicated->id_usuario }}">Aviso</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Somente será permitido remover a indicação caso ela não possua indicações vínculadas ela.</p>
                                            <p>Deseja confirmar a remoção da indicação: <strong>{{ $indicated->nome }}</strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <a href="{{ route('indicateds.destroy', ['id' => $indicated->id_usuario ]) }}" class="btn btn-primary">Confirmar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection