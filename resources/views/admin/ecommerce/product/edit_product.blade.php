
@extends('admin.master')
@section('main_content')
    <h3 class="section-title first-title"><i class="icon-table"></i>Edit Product</h3>
    {!!Form::open( array('route' =>['ecommerce.update.product'],'method'=>'put','files'=>true,'class'=>'form-horizontal contact_form'))!!}
    <input type="hidden" name="id"  value="{{ $product->id }}"/>
    <div class="form-group">
        {{Form::label('product_title', 'Product Title', array('class' => ''))}}
        {{Form::text('product_title', $product_title = $product->product_title, array('class' => 'form-control','id'=>'product_title',  'placeholder' => 'Blog Title'))}}
        @if ($errors->has('product_title')) <p class="text-danger">{{ $errors->first('product_title') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('ecategory_id', 'Product Category', array('class' => ''))}}

        <select class="form-control" name="ecategory_id" data-placeholder="Choose a Category" tabindex="1">
            @if($product->ecategory)
                @foreach($categories as $category)
                    <option
                            @if($product->ecategory_id == $category->id )
                            selected
                            @endif
                            value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            @endif

        </select>
        @if ($errors->has('publication_status')) <p class="text-danger">{{ $errors->first('publication_status') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('product_image', 'Upload an Image', array('style' => 'float:left;margin-right:20px;'))}}
        {!! Form::file('product_image') !!}
        <p style="margin-left:136px;width:50%;" class="help-block">Example block-level help text here.</p>
        @if ($errors->has('product_image')) <p class="text-danger">{{ $errors->first('product_image') }}</p> @endif
        <img style="width:170px;height:150px;" src="{{ asset("front_assets/upload/". $product->product_image ) }}" />
    </div>

    <div class="form-group">
        {{Form::label('product_description', 'Product Description', array('class' => ''))}}
        {{Form::textarea('product_description', $product_description = $product->product_description, array('class' => 'form-control','id'=>'editor1',  'placeholder' => 'Blog Description'))}}
        @if ($errors->has('product_description')) <p class="text-danger">{{ $errors->first('product_description') }}</p> @endif
    </div>

    <div class="form-group">
        {{Form::label('product_type', 'Product Type', array('class' => ''))}}
        <select class="form-control" name="product_type" data-placeholder="Choose a type" tabindex="1">
           @if($product->product_type=='Regular')
                <option selected>Regular</option>
                <option>Featured</option>
                <option>Special</option>
           @endif
           @if($product->product_type=='Featured')
               <option >Regular</option>
               <option selected>Featured</option>
               <option>Special</option>
           @endif
           @if($product->product_type=='Special')
               <option >Regular</option>
               <option>Featured</option>
               <option selected>Special</option>
           @endif

        </select>
        @if ($errors->has('product_type')) <p class="text-danger">{{ $errors->first('product_type') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('product_price', 'Product Price', array('class' => ''))}}
        {{Form::text('product_price', $product_price = $product->product_price, array('class' => 'form-control', 'placeholder' => 'Price'))}}
        @if ($errors->has('product_price')) <p class="text-danger">{{ $errors->first('product_price') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('product_quantity', 'Author Name', array('class' => ''))}}
        {{Form::text('product_quantity', $product_quantity = $product->product_quantity, array('class' => 'form-control', 'placeholder' => 'Quantity'))}}
        @if ($errors->has('product_quantity')) <p class="text-danger">{{ $errors->first('product_quantity') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('publication_status', 'Publication Status', array('class' => ''))}}

        <select class="form-control" name="publication_status" data-placeholder="Choose a Category" tabindex="1">
            @if($product->publication_status==1)
                <option selected value="1">Published</option>
            @else
                <option  value="1">Published</option>
            @endif

            @if($product->publication_status==0)
                <option selected value="0">Unpublished</option>
            @else
                <option  value="0">Unpublished</option>
            @endif
        </select>
        @if ($errors->has('publication_status')) <p class="text-danger">{{ $errors->first('publication_status') }}</p> @endif
    </div>

    <div class="form-group">

        <button type="submit" id="submit" class="btn btn-primary">Update Product</button>

    </div>
    {!!Form::close()!!}

    <script>
        CKEDITOR.replace( 'editor1',{
            width:'100%',
            height:'250px'
        } );
    </script>
@endsection