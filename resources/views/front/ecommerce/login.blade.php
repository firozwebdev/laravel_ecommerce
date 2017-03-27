@extends('front.ecommerce.layout')
@section('content')
    <div id="content" class="registration" style="margin-top:200px;">

        <section class="inner-content">
            <div class="container">
                <!-- ****************** Login Section	****************** -->
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="heading-row">
                            <h1>Already Registered?</h1>
                            <p>If you have an account with us, please log in.</p>
                        </div>

                        @include('front.ecommerce.checkout.pages.error_message')
                        {!!Form::open( array('route' =>['customer.login.check'],'method'=>'post'))!!}
                        <div class="form-content">
                            <div class="form-group">
                                {{Form::label('email_address', 'Email Address', array('class' => ''))}}
                                {{Form::text('email_address', $email_address = null, array('class' => 'form-control','id'=>'email_address' ))}}
                                @if ($errors->has('email_address')) <p class="text-danger">{{ $errors->first('email_address') }}</p> @endif
                            </div>
                            <div class="form-group">
                                {{Form::label('password', 'Password', array('class' => ''))}}

                                <input type="password" name="password" class="form-control">
                                @if ($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p> @endif
                            </div>

                            <div class="form-group">
                                <label class="label_check" for="checkbox-01">
                                    <input name="sample-checkbox-01" id="checkbox-01" value="1" type="checkbox" checked="">Remember Me What's this?
                                </label>
                            </div>
                            <div class="form-group btn-area">
                                <button type="submit" class="btn btn-info btn-large">Sign In</button>
                                <a href="login.html#" class="btn-link">Forgot Your Password?</a>
                            </div>
                        </div>
                        {!!Form::close()!!}
                        <div class="heading-row">
                            <h1>New Here?</h1>
                            <p>Registration is free and easy!</p>
                            <a href="register.html" class="btn btn-detail btn-large">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>



@endsection