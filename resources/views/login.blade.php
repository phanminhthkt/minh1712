
@if($errors->has('errorlogin'))
    {{$errors->first('errorlogin')}}
@endif
{!! Form::open(['url' => 'dang-nhap.html','method' => 'POST','class' => 'form_login']) !!}
{!! Form::text('username',null,['class' => 'text','placeholder' => "Username"]); !!} 
@if($errors->has('username'))
    {{$errors->first('username')}}
@endif
{!! Form::password('password', ['class' => 'text','placeholder' => "Password"]); !!} 
@if($errors->has('username'))
    {{$errors->first('username')}}
@endif
{!! Form::submit('Login!'); !!}
{!! csrf_field() !!}
{!! Form::close() !!}
user:admin<br>
pass:123456