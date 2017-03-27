@extends('admin.master')
@section('main_content')
<div class="widget">
    <h3 class="section-title first-title"><i class="icon-table"></i> Manage Customer</h3>
    @include('admin.partials.success_message')
    <div class="widget-content-white glossed">
        <div class="padded">
            <table class="table table-striped table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th><div class="checkbox"><input type="checkbox"></div></th>
                    <th>ID</th>
                    <th>Custmer name</th>
                    <th>Email</th>

                    <th style="display:none">Publication Status</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                <?php $i=1; ?>
                @foreach( $customers as $customer)

                <tr>
                    <td><div class="checkbox"><input type="checkbox"></div></td>
                    <td>{{ $i }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->email_address }}</td>

                    <td style="display:none" class="text-right">

                    </td>
                    <td><span class="label label-success">Active</span></td>
                    <td class="text-right">
                        <a href="{{ route('show.customer',['id'=>$customer->id]) }}" class="btn btn-default btn-xs"><i class="icon-eye-open"></i></a>

                        <a onclick=" return confirm('Are you sure to delete'); " href="{{ URL::to('delete-customer/'.$customer->id) }}" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach







                </tbody>
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


@endsection