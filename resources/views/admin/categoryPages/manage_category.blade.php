@extends('admin.master')
@section('main_content')
<div class="widget">
    <h3 class="section-title first-title"><i class="icon-table"></i> Manage Category</h3>
    @include('admin.partials.success_message')
    <div class="widget-content-white glossed">
        <div class="padded">
            <table class="table table-striped table-bordered table-hover datatable">
                <thead>
                <tr>
                    <th><div class="checkbox"><input type="checkbox"></div></th>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Publication Status</th>
                    <th style="display:none">Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>

                <?php $i=1; ?>
                @foreach( $categories as $category)

                <tr>
                    <td><div class="checkbox"><input type="checkbox"></div></td>
                    <td>{{ $i }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ str_limit($category->category_description, 27) }}</td>
                    <td class="text-right">
                        @if($category->publication_status==1 )
                             <span class="label label-success">Active</span>
                        @endif
                        @if($category->publication_status==0 )
                                <span class="label label-danger">Inactive</span>
                        @endif
                    </td>
                    <td style="display:none;"><span class="label label-success">Active</span></td>
                    <td class="text-right">

                        @if($category->publication_status==1)
                            <a href="{{URL::to('unpublish-category/'.$category->category_id)}}"  class="btn btn-default btn-xs"> <i class="icon-remove"></i></a>
                        @endif
                        @if($category->publication_status==0)
                            <a href="{{URL::to('publish-category/'.$category->category_id)}}"   class="btn btn-default btn-xs">  <i class="icon-ok"></i></a>
                        @endif

                        <a href="{{ route('edit.category',['id'=>$category->category_id]) }}" class="btn btn-default btn-xs"><i class="icon-pencil"></i></a>
                        <a onclick=" return confirm('Are you sure to delete'); " href="{{ URL::to('delete-category/'.$category->category_id) }}" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>
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