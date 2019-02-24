Thông tin đăng ký
@if($errors->has('errorlogin'))
    {{$errors->first('errorlogin')}}
@endif
{!! Form::open(['url' => 'dang-ky.html','method' => 'POST','class' => 'form_login']) !!}
{!! Form::text('username',null,['class' => 'text','placeholder' => "Username"]); !!} 
@if($errors->has('username'))
    {{$errors->first('username')}}
@endif
</br>
{!! Form::password('password', ['class' => 'text','placeholder' => "Password"]); !!} 
@if($errors->has('password'))
    {{$errors->first('password')}}
@endif
</br>
{!! Form::email('email', $value = null, $attributes = ['placeholder' => "Email"]); !!} 
@if($errors->has('email'))
	 {{$errors->first('email')}}
@endif
</br>
{!! Form::submit('Register!'); !!}
{!! csrf_field() !!}
{!! Form::close() !!}