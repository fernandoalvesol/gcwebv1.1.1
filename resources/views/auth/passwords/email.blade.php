@extends('auth.templates.templates')

@section('content-login')

{!! Form::open(['url' => '/password/email', 'class' => 'form-login']) !!}

        {!! Form::email('email', null, ['placeholder' => 'Seu E-mail:']) !!}
        {!! Form::submit('Recuperar', ['class' => 'btn-login']) !!}
       
        <a href="{{url('/login')}}" class="rel-pass">Voltar ao Login?</a>

{!! Form::close() !!}

@endsection
