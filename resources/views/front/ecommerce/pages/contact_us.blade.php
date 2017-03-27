@extends('front.ecommerce.layout')
@section('content')
    <div id="content"  class="extra_margin">

        <section class="inner-content">
            <div class="container">
                <!-- ****************** Contact Us Section	****************** -->
                <div class="contact-us">
                    <div class="heading"><span>Contact Us</span></div>
                    <div class="contact-form">
                        <div class="row">
                            @include('front.ecommerce.checkout.pages.success_message');
                            {!!Form::open( array('route' =>['contact.us.save'],'method'=>'post'))!!}
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('contact_first_name', 'First Name', array('class' => ''))}}
                                    {{Form::text('contact_first_name', $contact_first_name = null, array('class' => 'form-control','id'=>'contact_first_name' ))}}
                                    @if ($errors->has('contact_first_name')) <p class="text-danger">{{ $errors->first('contact_first_name') }}</p> @endif
                                </div>
                                <div class="form-group">
                                    {{Form::label('contact_last_name', 'Last Name', array('class' => ''))}}
                                    {{Form::text('contact_last_name', $contact_last_name = null, array('class' => 'form-control','id'=>'contact_last_name' ))}}
                                    @if ($errors->has('contact_last_name')) <p class="text-danger">{{ $errors->first('contact_last_name') }}</p> @endif
                                </div>
                                <div class="form-group">
                                    {{Form::label('contact_email_address', 'Email Address', array('class' => ''))}}
                                    {{Form::text('contact_email_address', $contact_email_address = null, array('class' => 'form-control','id'=>'contact_email_address' ))}}
                                    @if ($errors->has('contact_email_address')) <p class="text-danger">{{ $errors->first('contact_email_address') }}</p> @endif
                                </div>
                                <div class="form-group">
                                    {{Form::label('message_subject', 'Subject', array('class' => ''))}}
                                    {{Form::text('message_subject', $message_subject = null, array('class' => 'form-control','id'=>'message_subject' ))}}
                                    @if ($errors->has('message_subject')) <p class="text-danger">{{ $errors->first('message_subject') }}</p> @endif
                                </div>

                                <div class="form-group">
                                    <a href="{{ route('welcome') }}"  class="btn btn-info btn-large">Go Home</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('contact_message', 'Message', array('class' => ''))}}
                                    <textarea class="form-control" name="contact_message"></textarea>
                                    @if ($errors->has('contact_message')) <p class="text-danger">{{ $errors->first('contact_message') }}</p> @endif
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-info btn-large">Submit</button>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                    <div class="contact-map">
                        <!--<img src="assets/images/map.png" alt="" class="img-responsive" />-->
                        <div id="map" class="map inside-full-height"></div>
                    </div>
                </div>


            </div>
        </section>


    </div>

@endsection