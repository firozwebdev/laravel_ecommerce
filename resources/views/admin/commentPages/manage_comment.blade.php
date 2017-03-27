@extends('admin.master')
@section('main_content')
    <div class="widget">
        <h3 class="section-title first-title"><i class="icon-table"></i> Manage Comment</h3>
        <div class="widget-content-white glossed">
            <div class="padded">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th><div class="checkbox"><input type="checkbox"></div></th>
                        <th>ID</th>
                        <th>Comment Author</th>
                        <th>Comment</th>
                        <th>Publication Status</th>
                        <th style="display:none">Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php $i=1; ?>
                    @foreach( $comments as $comment)

                        <tr>
                            <td><div class="checkbox"><input type="checkbox"></div></td>
                            <td>{{ $i }}</td>
                            <td>{{ $comment->comment_author }}</td>
                            <td>{{ str_limit($comment->comment, 27) }}</td>
                            <td class="text-right">
                                @if($comment->comment_publication_status==1 )
                                    <span class="label label-success">Active</span>
                                @endif
                                @if($comment->comment_publication_status==0 )
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td style="display:none;"><span class="label label-success">Active</span></td>
                            <td class="text-right">

                                @if($comment->comment_publication_status==1)
                                    <a href="{{URL::to('unpublish-comment/'.$comment->comment_id)}}"  class="btn btn-default btn-xs"> <i class="icon-remove"></i></a>
                                @endif
                                @if($comment->comment_publication_status==0)
                                    <a href="{{URL::to('publish-comment/'.$comment->comment_id)}}"   class="btn btn-default btn-xs">  <i class="icon-ok"></i></a>
                                @endif

                                <a href="{{ route('show.comment',['id'=>$comment->comment_id]) }}" class="btn btn-default btn-xs"><i class="icon-renren"></i></a>
                                <a onclick=" return confirm('Are you sure to delete'); " href="{{ URL::to('delete-comment/'.$comment->comment_id) }}" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>
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