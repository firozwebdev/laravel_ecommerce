@extends('admin.master')
@section('main_content')
    <style>
        .nav-tabs li a{
            cursor:pointer !important;
        }
        .nav-tabs li.active a{
            cursor:auto ;
        }
    </style>
    <div class="widget">
        <h3 class="section-title first-title"><i class="icon-table"></i> Customer Informations</h3>
        <div class="widget-content-white glossed">
            <div class="padded" style="min-height:400px">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-target="#personal_info" data-toggle="tab">Personal Info</a></li>
                    <li><a data-target="#billing_info" data-toggle="tab">Billing Info</a></li>
                    <li><a data-target="#shipping_info" data-toggle="tab">Shipping Info</a></li>
                    <li><a data-target="#orders_info" data-toggle="tab">Orders Info</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="personal_info" style="padding-left:30px;padding-top:20px">
                        {!!Form::open( array('class'=>'form-horizontal contact_form'))!!}
                        <div class="form-group " >

                            {{Form::label('first_name', 'First Name', array('class' => 'col-sm-3'))}}
                            <div class="col-sm-10">
                                {{ Form::text('first_name', $first_name = $customer->first_name, array('class' => 'form-control input-md','id'=>'first_name', 'placeholder' => 'First Name')) }}

                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error': '' }}" >

                            {{Form::label('last_name', 'Last Name', array('class' => 'col-sm-3'))}}
                            <div class="col-sm-10">
                                {{ Form::text('last_name', $last_name = $customer->last_name, array('class' => 'form-control input-md','id'=>'last_name',  'placeholder' => 'Last Name')) }}

                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email_address') ? 'has-error': '' }}" >

                            {{Form::label('email_address', 'Email', array('class' => 'col-sm-3'))}}
                            <div class="col-sm-10">
                                {{Form::email('email_address', $email_address = $customer->email_address, array('class' => 'form-control input-md','id'=>'email_address',  'placeholder' => 'example@domain.com'))}}

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="billing_info" style="padding-left:30px;padding-right:30px;padding-top:20px">
                        {!!Form::open( array())!!}


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('company_name', 'Company Name', array('class' => ''))}}
                                    {{Form::text('company_name', $company_name = $customer->billing->company_name, array('class' => 'form-control','id'=>'company_name'))}}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('zip', 'Zip Code', array('class' => ''))}}
                                    {{Form::text('zip', $zip = null, array('class' => 'form-control','id'=>'zip'))}}

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('address', 'Address', array('class' => ''))}}
                                    {{Form::text('address', $address = $customer->billing->address, array('class' => 'form-control','id'=>'address'))}}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('street_address', 'Street Address', array('class' => ''))}}
                                    {{Form::text('street_address', $street_address = $customer->billing->street_address, array('class' => 'form-control','id'=>'street_address',  'placeholder' => 'Street Address'))}}

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('country', 'Country', array('class' => ''))}}

                                    {{Form::text('country', $country = $customer->billing->country, array('class' => 'form-control','id'=>'country',  'placeholder' => 'Country'))}}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('city', 'City', array('class' => ''))}}

                                    {{Form::text('city', $city = $customer->billing->city, array('class' => 'form-control','id'=>'city',  'placeholder' => 'City'))}}

                                </div>



                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('', 'Mobile', array('class' => ''))}}

                                    <div class="row">
                                        <div class="col-sm-4">
                                            {{Form::text('mobile', $mobile = null, array('class' => 'form-control','id'=>'mobile'))}}
                                        </div>
                                        <div class="col-sm-8">
                                            {{Form::text('mobile', $mobile = $customer->billing->mobile, array('class' => 'form-control','id'=>'mobile'))}}

                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="col-sm-6">

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="shipping_info"  style="padding-left:30px;padding-right:30px;padding-top:20px">
                        {!!Form::open( array())!!}


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('company_name', 'Company Name', array('class' => ''))}}
                                    {{Form::text('company_name', $company_name = $customer->shipping->company_name, array('class' => 'form-control','id'=>'company_name'))}}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('zip', 'Zip Code', array('class' => ''))}}
                                    {{Form::text('zip', $zip = $customer->shipping->zip, array('class' => 'form-control','id'=>'zip'))}}

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('address', 'Address', array('class' => ''))}}
                                    {{Form::text('address', $address = $customer->shipping->address, array('class' => 'form-control','id'=>'address'))}}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('street_address', 'Street Address', array('class' => ''))}}
                                    {{Form::text('street_address', $street_address = $customer->shipping->street_address, array('class' => 'form-control','id'=>'street_address',  'placeholder' => 'Street Address'))}}

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('country', 'Country', array('class' => ''))}}

                                    {{Form::text('country', $country = $customer->shipping->country, array('class' => 'form-control','id'=>'country',  'placeholder' => 'Country'))}}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('city', 'City', array('class' => ''))}}

                                    {{Form::text('city', $city = $customer->shipping->city, array('class' => 'form-control','id'=>'city',  'placeholder' => 'City'))}}

                                </div>



                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::label('', 'Mobile', array('class' => ''))}}

                                    <div class="row">
                                        <div class="col-sm-4">
                                            {{Form::text('mobile', $mobile = null, array('class' => 'form-control','id'=>'mobile'))}}
                                        </div>
                                        <div class="col-sm-8">
                                            {{Form::text('mobile', $mobile = $customer->shipping->mobile, array('class' => 'form-control','id'=>'mobile'))}}

                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="col-sm-6">

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="orders_info"   style="padding-left:30px;padding-right:30px;padding-top:20px">
                        <table class="table table-striped table-bordered table-hover datatable">
                            <thead>
                            <tr>
                                <th style="display:none"><div class="checkbox"><input type="checkbox"></div></th>
                                <th>ID</th>
                                <th>Order Total</th>
                                <th>Order Status</th>

                                <th style="display:none">Publication Status</th>
                                <th style="display:none">Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <?php $i=1; ?>
                            @foreach($customer->orders as $order)
                                <tbody>
                                     <tr>
                                        <td style="display:none"><div class="checkbox"><input type="checkbox"></div></td>
                                        <td> {{ $i }}</td>
                                        <td>{{ $order->order_total }}</td>
                                        <td>{{ $order->order_status }}</td>

                                        <td  class="text-right" style="display:none">

                                        </td>
                                        <td style="display:none;"><span class="label label-success">Active</span></td>
                                        <td>
                                            <a onclick=" return confirm('Are you sure to delete'); " href="" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $i++; ?>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>


@endsection