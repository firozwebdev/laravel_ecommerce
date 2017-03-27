@extends('admin.master')
@section('main_content')
    <div class="widget">
        <h3 class="section-title first-title"><i class="icon-table"></i> Manage Product</h3>
        <div class="widget-content-white glossed">
            <div class="padded">

                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th style="display:none"><div class="checkbox"><input type="checkbox"></div></th>
                        <th style="display:none;">ID</th>
                        <th> Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th> Price</th>
                        <th> Quantity</th>
                        <th style="display:none">Balance</th>
                        <th>Status</th>
                        <th style="width:14%">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $i=1; ?>
                    @foreach( $products as $product)
                    <tr>
                        <td style="display:none"><div class="checkbox"><input type="checkbox"></div></td>
                        <td style="display:none;">{{ $i }}</td>
                        <td>{{ str_limit($product->product_title, 35) }}</td>
                        <td>{{ $product->ecategory->category_name }}</td>
                        <td>{!!  str_limit($product->product_description,200)  !!}</td>
                        <td>{{ str_limit($product->product_price ,10)}}</td>
                        <td>{{ str_limit($product->product_quantity ,10)}}</td>
                        <td style="display:none" class="text-right">$25.94</td>
                        <td class="text-right">
                            @if($product->publication_status==1 )
                                <span class="label label-success">Active</span>
                            @endif
                            @if($product->publication_status==0 )
                                <span class="label label-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="text-right">

                            @if($product->publication_status==1)
                                <a href="{{URL::to('ecommerce-unpublish-product/'.$product->id)}}"  class="btn btn-default btn-xs"> <i class="icon-remove"></i></a>
                            @endif
                            @if($product->publication_status==0)
                                <a href="{{URL::to('ecommerce-publish-product/'.$product->id)}}"   class="btn btn-default btn-xs">  <i class="icon-ok"></i></a>
                            @endif

                            <a href="{{ route('ecommerce.edit.product',['id'=>$product->id]) }}" class="btn btn-default btn-xs"><i class="icon-pencil"></i></a>
                            <a onclick="return confirm('Are you sure to delete');" href="{{ URL::to('ecommerce-delete-product/'.$product->id) }}" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>

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