@extends('admin.master')
@section('main_content')
    <div class="widget">
        <h3 class="section-title first-title"><i class="icon-table"></i> Manage User</h3>
        <div class="widget-content-white glossed">
            <div class="padded">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th><div class="checkbox"><input type="checkbox"></div></th>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>User Email</th>

                        <th style="display:none">Publication Status</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php $i=1; ?>
                    @foreach( $users as $user)

                        <tr>
                            <td><div class="checkbox"><input type="checkbox"></div></td>
                            <td>{{ $i }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->email_address }}</td>

                            <td  class="text-right">
                                @if($user->user_status==1 )
                                    <span class="label label-success">Active</span>
                                @endif
                                @if($user->user_status==0 )
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td style="display:none;"><span class="label label-success">Active</span></td>
                            <td class="text-right">

                                @if($user->user_status==1)
                                    <a href="{{URL::to('unpublish-user/'.$user->id)}}"  class="btn btn-default btn-xs"> <i class="icon-remove"></i></a>
                                @endif
                                @if($user->user_status==0)
                                    <a href="{{URL::to('publish-user/'.$user->id)}}"   class="btn btn-default btn-xs">  <i class="icon-ok"></i></a>
                                @endif

                                <a href="{{ route('edit.user',['id'=>$user->id]) }}" class="btn btn-default btn-xs"><i class="icon-pencil"></i></a>
                                <a href="{{ route('view.user',['id'=>$user->id]) }}" class="btn btn-default btn-xs"><i class="icon-eye-open"></i></a>
                                <a href="{{ route('reply.user',['id'=>$user->id]) }}" class="btn btn-default btn-xs"><i class="icon-reply"></i></a>
                                <a onclick=" return confirm('Are you sure to delete'); " href="{{ URL::to('delete-page/'.$user->id) }}" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>
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