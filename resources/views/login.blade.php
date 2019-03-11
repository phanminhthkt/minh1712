@if($errors->has('errorlogin'))
    {{$errors->first('errorlogin')}}
@endif
{!! Form::open(['url' => 'dang-nhap.html','method' => 'POST','class' => 'form_login']) !!}
{!! Form::text('username',null,['class' => 'text','placeholder' => "Username"]); !!}
@if($errors->has('username'))
    {{$errors->first('username')}}
@endif
<br> 
{!! Form::password('password', ['class' => 'text','placeholder' => "Password"]); !!}
@if($errors->has('password'))
    {{$errors->first('password')}}
@endif
<br> 
{!! Form::submit('Login!'); !!}
{!! csrf_field() !!}
{!! Form::close() !!}