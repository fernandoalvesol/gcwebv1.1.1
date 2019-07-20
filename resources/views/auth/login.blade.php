@extends('auth.templates.templates')

@section('content-login')

{!! Form::open(['url' => '/login','class' => 'form-login']) !!}

        {!! Form::email('email', null, ['placeholder' => 'Seu E-mail:']) !!}
        {!! Form::password('password', ['placeholder' => 'Sua Senha: ']) !!}

        {!! Form::submit('Acessar', ['class' => 'btn-login']) !!}

        <a href="{{url('/password/reset')}}" class="rel-pass">Recuperar Senha?</a>

{!! Form::close() !!}
@endsection
