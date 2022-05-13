@extends('templates.layout')

@push('alerts')
    @include('templates.alerts')
@endpush

@section('body')
    <div class="card">
        <div class="card-header">
            {{ $title }}
            <div class="float-right">
                <a href="{{ route('index') }}">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ $action }}" method="post">
                @csrf

                <div class="form-row col-md-6">
                    <label for="">Nome do Indicado*</label>
                    <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                    @error('nome')
                        <label for="" class="font-error-message">{{ $message }}</label>
                    @enderror
                </div>

                <br/>

                <div class="form-row col-md-6">
                    <label for="">CPF do Indicado*</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}">
                    @error('cpf')
                        <label for="" class="font-error-message">{{ $message }}</label>
                    @enderror
                </div>

                <br/>

                <div class="form-row col-md-6">
                    <label for="">Telefone do Indicado*</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}">
                    @error('telefone')
                        <label for="" class="font-error-message">{{ $message }}</label>
                    @enderror
                </div>

                <br/>

                <div class="form-row col-md-6">
                    <label for="">E-mail do Indicado*</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    @error('email')
                        <label for="" class="font-error-message">{{ $message }}</label>
                    @enderror
                </div>

                <br/>

                <div class="form-row col-md-6">
                    <label for="">Informe o CPF de quem o indicou:</label>
                    <input type="text" class="form-control" name="cpf_indicado" id="cpf_indicado" value="{{ old('cpf_indicado') }}">
                    @error('cpf_indicado')
                        <label for="" class="font-error-message" id="cpf_indicado_error">{{ $message }}</label>
                    @enderror
                </div>

                <br/>

                <hr>
                <div class="form-row col-md-6">
                    <p class="font-alert-mandatory">Todos os dados (*) são do tipo obrigatório.</p>
                </div>

                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                

            </form>
        </div>
    </div>
@endsection