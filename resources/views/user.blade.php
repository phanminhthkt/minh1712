Hello,{{Session::get('name')}}<br>
Thông tin tài khoản

{!! Form::open(['url' => 'thong-tin-tai-khoan.html','method' => 'POST','class' => 'form_login']) !!}
</br>
{!! Form::password('password', ['class' => 'text','placeholder' => "Password"]); !!} 
@if($errors->has('password'))
    {{$errors->first('password')}}
@endif
@if($errors->has('errorpass'))
    {{$errors->first('errorpass')}}
@endif
</br>
{!! Form::email('email', $value = Session::get('email'), $attributes = ['placeholder' => "Email"]); !!} 
@if($errors->has('email'))
	 {{$errors->first('email')}}
@endif
</br>
{!! Form::submit('Update!'); !!}
{!! csrf_field() !!}
{!! Form::close() !!}
<a href="doi-mat-khau.html">Đổi mật khẩu</a>
<a href="dang-xuat.html">Logout</a>