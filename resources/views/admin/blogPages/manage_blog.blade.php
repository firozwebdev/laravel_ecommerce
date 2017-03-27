@extends('admin.master')
@section('main_content')
    <div class="widget">
        <h3 class="section-title first-title"><i class="icon-table"></i> Manage Blog</h3>
        @include('admin.partials.success_message')
        <div class="widget-content-white glossed">

            <div class="padded">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th style="display:none"><div class="checkbox"><input type="checkbox"></div></th>
                        <th>ID</th>
                        <th>Blog Title</th>
                        <th>Category</th>
                        <th>Blog Short Description</th>
                        <th>Author Name</th>
                        <th style="display:none">Balance</th>
                        <th>Status</th>
                        <th style="width:14%">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $i=1; ?>
                    @foreach( $blogs as $blog)
                    <tr>
                        <td style="display:none"><div class="checkbox"><input type="checkbox"></div></td>
                        <td>{{ $i }}</td>
                        <td>{{ str_limit($blog->blog_title, 35) }}</td>
                        <td>{{ $blog->category_name }}</td>
                        <td>{!!  str_limit($blog->blog_description,200)  !!}</td>
                        <td>{{ str_limit($blog->author_name ,10)}}</td>
                        <td style="display:none" class="text-right">$25.94</td>
                        <td class="text-right">
                            @if($blog->blog_publication_status==1 )
                                <span class="label label-success">Active</span>
                            @endif
                            @if($blog->blog_publication_status==0 )
                                <span class="label label-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="text-right">

                            @if($blog->blog_publication_status==1)
                                <a href="{{URL::to('unpublish-blog/'.$blog->blog_id)}}"  class="btn btn-default btn-xs"> <i class="icon-remove"></i></a>
                            @endif
                            @if($blog->blog_publication_status==0)
                                <a href="{{URL::to('publish-blog/'.$blog->blog_id)}}"   class="btn btn-default btn-xs">  <i class="icon-ok"></i></a>
                            @endif

                            <a href="{{ route('edit.blog',['id'=>$blog->blog_id]) }}" class="btn btn-default btn-xs"><i class="icon-pencil"></i></a>
                            <a onclick=" return confirm('Are you sure to delete'); " href="{{ URL::to('delete-blog/'.$blog->blog_id) }}" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>
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