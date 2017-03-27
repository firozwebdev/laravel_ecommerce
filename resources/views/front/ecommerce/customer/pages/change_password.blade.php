@extends('front.ecommerce.customer.customer_dashboard_layout')

@section('customer_content')
    <div class="dashboard">
        <form>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Retype New Password</label>
                        <input type="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-large">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection


