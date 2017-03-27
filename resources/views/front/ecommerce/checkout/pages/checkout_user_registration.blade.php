@extends('front.ecommerce.checkout.checkout')

@section('checkout_processing')
    <div class="panel panel-default">

        <div >
            <div class="panel-body">
                <div class="row">

                    <div class="col-sm-6">
                        <div class="sub-heading">Returning Customers</div>
                        <p>Sign in to speed up your checkout process</p>

                            @include('front.ecommerce.checkout.pages.error_message')

                            {!!Form::open( array('route' =>['customer.check'],'method'=>'post'))!!}




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
                                <a href="checkout.html#" class="btn-link">Forgot your password?</a>
                                <span class="pull-right">* Required Fields</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-large">Login</button>
                                <a href="{{ route('checkout.billinginfo') }}"  class="btn btn-info btn-large">Register</a>
                            </div>

                        {!!Form::close()!!}

                    </div>
                </div>
            </div>
        </div>
    </div><!--register-->
@endsection