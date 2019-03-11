<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('Backend.header')
    </head>
    <body>
        <div class="dashboard-main-wrapper">
            <div class="splash-container">
                <div class="card ">
                    <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="{{asset('assets/images/logo.png')}}" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
                    <div class="card-body">
                        <form method="POST" action="login" accept-charset="UTF-8" class="form_login @if(count($errors)>0) {{'was-validated'}} @endif">
                        <?php echo Form::open(['url' => 'login','method' => 'POST','class' => 'form_login']); ?>
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="username" type="text" placeholder="Username" name="username" required>
                                <div class="invalid-feedback">
                                    @if($errors->has('username'))
                                        {{$errors->first('username')}}
                                    @endif
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="password" required>
                                <div class="invalid-feedback">
                                    @if($errors->has('password'))
                                        {{$errors->first('password')}}
                                    @endif
                                    @if($errors->has('Errorlogin'))
                                        {{$errors->first('Errorlogin')}}
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                                </label>
                            </div> -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                            <?php echo csrf_field(); ?>
                            <?php echo Form::close(); ?>
                        </form>
                    </div>
                    <div class="card-footer bg-white p-0  ">
                        <div class="card-footer-item card-footer-item-bordered">
                            <a href="#" class="footer-link">Create An Account</a></div>
                        <div class="card-footer-item card-footer-item-bordered">
                            <a href="#" class="footer-link">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
        @include('Backend.footer')
</html>