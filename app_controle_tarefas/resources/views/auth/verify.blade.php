@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verificando e-amil</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Enviado email para validação
                        </div>
                    @endif

                    Antes de continuar, verifique seu e-mail para obter um link de verificação.
                    Se você não recebeu o e-mail,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique Aqui</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
