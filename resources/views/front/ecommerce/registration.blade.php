@extends('front.ecommerce.layout')
@section('content')
    <div id="content" class="registration" style="margin-top:200px;">

        <section class="inner-content">
            <div class="container">
                <!-- ****************** Login Section	****************** -->
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="heading-row">
                            <h1>Customer Registration</h1>
                            <p>Please, Give the proper Infomation below ....</p>
                        </div>

                        @include('front.ecommerce.checkout.pages.error_message')
                        {!!Form::open( array('route' =>['customer.registration.check'],'method'=>'post'))!!}
                        <div class="form-content">
                            <div class="form-group">
                                {{Form::label('first_name', 'First Name', array('class' => ''))}}
                                {{Form::text('first_name', $first_name = null, array('class' => 'form-control','id'=>'first_name' ))}}
                                @if ($errors->has('first_name')) <p class="text-danger">{{ $errors->first('first_name') }}</p> @endif
                            </div>
                            <div class="form-group">
                                {{Form::label('last_name', 'Last Name', array('class' => ''))}}
                                {{Form::text('last_name', $last_name = null, array('class' => 'form-control','id'=>'last_name' ))}}
                                @if ($errors->has('last_name')) <p class="text-danger">{{ $errors->first('last_name') }}</p> @endif
                            </div>
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
                                <button type="submit" class="btn btn-info btn-large">Submit</button>

                            </div>
                        </div>
                        {!!Form::close()!!}

                    </div>
                </div>
            </div>
        </section>

    </div>



@endsection