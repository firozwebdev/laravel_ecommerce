@extends('front.ecommerce.checkout.checkout')
@section('checkout_processing')
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            @include('front.ecommerce.checkout.pages.success_message')
            <h4 class="panel-title">
                <a  role="button">
                    Shipping Information
                </a>
            </h4>
            <a href="checkout.html#" class="edit-btn">Edit</a>
        </div>
        <div>
            <div class="panel-body">
                {!!Form::open( array('route' =>['shippinginfo.save'],'method'=>'post'))!!}


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
                            {{Form::label('address', 'Address', array('class' => ''))}}
                            {{Form::text('address', $address = null, array('class' => 'form-control','id'=>'address'))}}
                            @if ($errors->has('address')) <p class="text-danger">{{ $errors->first('address') }}</p> @endif
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('country', 'Country', array('class' => ''))}}

                            <select class="form-control select_country" name="country"  tabindex="1">
                                <option>Select country...</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->country_code }}">{{ $country->country }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('country')) <p class="text-danger">{{ $errors->first('country') }}</p> @endif
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

                            <select class="form-control  select_province" name="city"   tabindex="1"></select>
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
                            {{Form::label('', 'Mobile', array('class' => ''))}}

                            <div class="row">
                                <div class="col-sm-4">
                                    <select  name="mobile" class="form-control">
                                        <option  selected="selected">IND +91 </option>
                                        <option  >USA +1</option>
                                        <option  >GBR +44 </option>
                                        <option  >ARE +971</option>
                                        <option  >CAN +1 </option>
                                        <option  >AUS +61</option>
                                        <option  >PAK +92 </option>
                                        <option >SAU +966 </option>
                                        <option  >KWT +965 </option>
                                        <option >ZAF +27 </option>
                                        <option  >AFG +93 </option>
                                        <option  >ALB +355</option>
                                        <option  >DZA +213 </option>
                                        <option  >ASM +684 </option>
                                        <option  >AND +376</option>
                                        <option  >AGO +244 </option>
                                        <option  >AIA +264 </option>
                                        <option  >ATG +268 </option>
                                        <option >ARG +54 </option>
                                        <option  >ARM +374 </option>
                                        <option >AUT +43 </option>
                                        <option  >AZE +994 </option>
                                        <option >BHS +1242 </option>
                                        <option  >BHR +973</option>
                                        <option  >BGD +880</option>
                                        <option  >BRB +1246 </option>
                                        <option >BLR +375 </option>
                                        <option  >BEL +32</option>
                                        <option >BLZ +501 </option>
                                        <option  >BMU +1441 </option>
                                        <option  >BTN +975</option>
                                        <option  >BOL +591</option>
                                        <option >BIH +387 </option>
                                        <option  >BWA +267 </option>
                                        <option  >BRA +55</option>
                                        <option  >BRN +673 </option>
                                        <option  >BGR +359</option>
                                        <option  >BFA +226 </option>
                                        <option >BDI +257</option>
                                        <option  >KHM +855</option>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    {{Form::text('mobile', $mobile = null, array('class' => 'form-control','id'=>'mobile'))}}
                                    @if ($errors->has('mobile')) <p class="text-danger">{{ $errors->first('mobile') }}</p> @endif
                                </div>
                            </div>


                        </div>

                    </div>
                </div>


                <div class="row">

                    <div class="col-sm-4 col-sm-offset-8 text-right">
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
            </div>
        </div>
    </div><!--shipping registraion-->

@endsection