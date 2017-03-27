@extends('front.ecommerce.customer.customer_dashboard_layout')

@section('customer_content')


    <div>
        <div class="panel-heading" role="tab" id="headingThree" style="padding:0px">
            <h4>

               Personal Information

            </h4>

        </div>
        <div>
            <div class="panel-body">
                @include('front.ecommerce.checkout.pages.success_message')
                @include('front.ecommerce.checkout.pages.error_message')
                {!!Form::open( array('route' =>['customer.personal.info.update'],'method'=>'put'))!!}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('first_name', 'First Name', array('class' => ''))}}
                            {{Form::text('first_name', $first_name = $customer->first_name, array('class' => 'form-control','id'=>'first_name',  'placeholder' => 'First Name'))}}
                            @if ($errors->has('first_name')) <p class="text-danger">{{ $errors->first('first_name') }}</p> @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('last_name', 'Last Name', array('class' => ''))}}
                            {{Form::text('last_name', $last_name =  $customer->last_name, array('class' => 'form-control','id'=>'last_name',  'placeholder' => 'Last Name'))}}
                            @if ($errors->has('last_name')) <p class="text-danger">{{ $errors->first('last_name') }}</p> @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('email_address', 'Email Address', array('class' => ''))}}
                            {{Form::text('email_address', $email_address =  $customer->email_address, array('class' => 'form-control','id'=>'email_address' ))}}
                            @if ($errors->has('email_address')) <p class="text-danger">{{ $errors->first('email_address') }}</p> @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password"  name="password" class="form-control" />
                            @if ($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p> @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password"   name="new_password" class="form-control" />
                            @if ($errors->has('new_password')) <p class="text-danger">{{ $errors->first('new_password') }}</p> @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Retype New Password</label>
                            <input type="password"  name="passconf" class="form-control" />
                            @if ($errors->has('passconf')) <p class="text-danger">{{ $errors->first('passconf') }}</p> @endif
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-4 pull-right">
                        <span>* Required Fields</span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-large">Save Changes</button>
                        </div>
                    </div>

                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div><!--shipping registraion-->


@endsection


