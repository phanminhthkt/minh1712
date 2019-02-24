@if($errors->has('errorlogin'))
    {{$errors->first('errorlogin')}}
@endif
{!! Form::open(['url' => 'dang-nhap.html','method' => 'POST','class' => 'form_login']) !!}
{!! Form::text('username',null,['class' => 'text','placeholder' => "Username"]); !!}<br> 
{!! Form::password('password', ['class' => 'text','placeholder' => "Password"]); !!}<br> 
{!! Form::submit('Login!'); !!}
{!! csrf_field() !!}
{!! Form::close() !!}