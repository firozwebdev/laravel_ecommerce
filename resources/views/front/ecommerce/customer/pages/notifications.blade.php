@extends('front.ecommerce.customer.customer_dashboard_layout')

@section('customer_content')

    <div class="panel-heading" role="tab" id="headingTwo"  style="padding:0px">
        <h4> Your Notifications </h4>

    </div>

@if($notifications)
    @foreach($notifications as $notification)
        <div class="panel panel-success">
            <div class="panel-heading">{{ $notification->created_at->diffForHumans() }}</div>
            <div class="panel-body">{{ $notification->notification }}</div>
            <!-- Add Panel Footer Here -->
        </div>

    @endforeach
    <div class="filter-group">
        {{ $notifications->links() }}
    </div>
@else
    <h3>Currently, You have no notification !!</h3>
@endif

@endsection

