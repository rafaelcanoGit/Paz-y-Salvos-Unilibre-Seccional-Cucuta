@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verficación ha sido enviado a tu Email.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar,Por favor verifica tu email.') }}
                    {{ __('Si no recibiste el email') }}, <a href="{{ route('verification.resend') }}">{{ __('Pulsa aquí para enviar otro nuevo') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
