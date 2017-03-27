@extends('front.ecommerce.checkout.checkout')

@section('checkout_processing')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                Step-2 : Registration (Billing Information)
            </h4>

            <hr>
        </div>

        {!!Form::open( array('route' =>['billinginfo.save'],'method'=>'post'))!!}

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('first_name', 'First Name', array('class' => ''))}}
                    {{Form::text('first_name', $first_name = null, array('class' => 'form-control','id'=>'first_name',  'placeholder' => 'First Name'))}}
                    @if ($errors->has('first_name')) <p class="text-danger">{{ $errors->first('first_name') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('last_name', 'Last Name', array('class' => ''))}}
                    {{Form::text('last_name', $last_name = null, array('class' => 'form-control','id'=>'last_name',  'placeholder' => 'Last Name'))}}
                    @if ($errors->has('last_name')) <p class="text-danger">{{ $errors->first('last_name') }}</p> @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('company_name', 'Company Name', array('class' => ''))}}
                    {{Form::text('company_name', $company_name = null, array('class' => 'form-control','id'=>'company_name'))}}
                    @if ($errors->has('company_name')) <p class="text-danger">{{ $errors->first('company_name') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('email_address', 'Email Address', array('class' => ''))}}
                    {{Form::text('email_address', $email_address = null, array('class' => 'form-control','id'=>'email_address' ))}}
                    @if ($errors->has('email_address')) <p class="text-danger">{{ $errors->first('email_address') }}</p> @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('address', 'Address', array('class' => ''))}}
                    {{Form::text('address', $address = null, array('class' => 'form-control','id'=>'address'))}}
                    @if ($errors->has('address')) <p class="text-danger">{{ $errors->first('address') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('street_address', 'Street Address', array('class' => ''))}}
                    {{Form::text('street_address', $street_address = null, array('class' => 'form-control','id'=>'street_address',  'placeholder' => 'Street Address'))}}
                    @if ($errors->has('street_address')) <p class="text-danger">{{ $errors->first('street_address') }}</p> @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('city', 'City', array('class' => ''))}}
                    {{Form::text('city', $city = null, array('class' => 'form-control','id'=>'city'))}}
                    @if ($errors->has('city')) <p class="text-danger">{{ $errors->first('city') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('zip', 'Zip Code', array('class' => ''))}}
                    {{Form::text('zip', $zip = null, array('class' => 'form-control','id'=>'zip'))}}
                    @if ($errors->has('zip')) <p class="text-danger">{{ $errors->first('zip') }}</p> @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('country', 'Country', array('class' => ''))}}
                    {{Form::text('country', $country = null, array('class' => 'form-control','id'=>'country'))}}
                    @if ($errors->has('country')) <p class="text-danger">{{ $errors->first('country') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('password', 'Password', array('class' => ''))}}
                    {{Form::text('password', $password = null, array('class' => 'form-control','id'=>'password'))}}
                    @if ($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p> @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('mobile', 'Mobile', array('class' => ''))}}
                    {{Form::text('mobile', $mobile = null, array('class' => 'form-control','id'=>'mobile'))}}
                    @if ($errors->has('mobile')) <p class="text-danger">{{ $errors->first('mobile') }}</p> @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('conf_password', 'Confirm Password', array('class' => ''))}}
                    {{Form::text('conf_password', $conf_password= null, array('class' => 'form-control','id'=>'conf_password'))}}
                    @if ($errors->has('conf_password')) <p class="text-danger">{{ $errors->first('conf_password') }}</p> @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <input style="margin-right:10px;" name="shipping_type"  type="radio" value="0" checked>Ship to this address
                    <input style="margin-left:30px; margin-right:10px;" name="shipping_type"  value="1"  type="radio" >Ship to different address
                </div>
            </div>
            <div class="col-sm-4 text-right">
                <span>* Required Fields</span>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-large">Continue</button>
                </div>
            </div>

        </div>
        {!!Form::close()!!}

    </div><!--register-->
@endsection