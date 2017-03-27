@extends('front.ecommerce.checkout.checkout')


@section('checkout_processing')
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            @include('front.ecommerce.checkout.pages.success_message')
            <h4 class="panel-title">
                <a   aria-expanded="true" >
                    Payment Method
                </a>
            </h4>

        </div>
        <div>
            <div class="panel-body">
                {!!Form::open( array('route' =>['order.save'],'method'=>'post'))!!}
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input style="margin-right:10px;transform: scale(1.5);" name="payment_method"  type="radio" value="cash_on_delivery" checked>Cash On Delivery
                            <input style="margin-left:30px; margin-right:10px;transform: scale(1.5);" name="payment_method"  value="paypal"  type="radio" >Paypal
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {{Form::label('comments', 'Comment', array('class' => ''))}}
                            <textarea name="comments" id=""  class="form-control"></textarea>
                            @if ($errors->has('comments')) <p class="text-danger">{{ $errors->first('comments') }}</p> @endif
                        </div>
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
    </div> <!--billing registraion-->
@endsection