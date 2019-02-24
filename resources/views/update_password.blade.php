Hello,{{Session::get('name')}}<br>
Thông tin tài khoản

{!! Form::open(['url' => 'doi-mat-khau.html','method' => 'POST','class' => 'form_login']) !!}
</br>
{!! Form::password('password', ['class' => 'text','placeholder' => "Password"]); !!} 
@if($errors->has('password'))
    {{$errors->first('password')}}
@endif
@if($errors->has('errorpass'))
    {{$errors->first('errorpass')}}
@endif
</br>
{!! Form::password('newpassword', ['class' => 'text','placeholder' => "New password"]); !!} 
@if($errors->has('newpassword'))
    {{$errors->first('newpassword')}}
@endif
</br>
{!! Form::submit('Update!'); !!}
{!! csrf_field() !!}
{!! Form::close() !!}
<a href="dang-nhap-thanh-cong.html">Thông tin tài khoản</a>