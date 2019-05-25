@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu direccion de correo electronico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Le hemos enviado un correo a su email. Por favor verifique su cuenta') }}
                    {{ __('Si no ha recibido el correo') }}, <a href="{{ route('verification.resend') }}">{{ __('click aqui') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
