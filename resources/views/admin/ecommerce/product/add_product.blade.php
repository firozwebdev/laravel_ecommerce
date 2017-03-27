
@extends('admin.master')
@section('main_content')
    <h3 class="section-title first-title"><i class="icon-table"></i>Add Blog</h3>
    {!!Form::open( array('route' =>['ecommerce.save.product'],'method'=>'post','files'=>true,'class'=>'form-horizontal contact_form'))!!}

    <div class="form-group">
        {{Form::label('product_title', 'Product Title', array('class' => ''))}}
        {{Form::text('product_title', $product_title = null, array('class' => 'form-control','id'=>'product_title',  'placeholder' => 'Product Title'))}}
        @if ($errors->has('product_title')) <p class="text-danger">{{ $errors->first('blog_title') }}</p> @endif
    </div>

    <div class="form-group">
        {{Form::label('ecategory_id', 'Product Category', array('class' => ''))}}

        <select class="form-control" name="ecategory_id" data-placeholder="Choose a Category" tabindex="1">
            <option value="">Select Category...</option>
            @if($categories)
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            @endif

        </select>
        @if ($errors->has('publication_status')) <p class="text-danger">{{ $errors->first('publication_status') }}</p> @endif
    </div>


    <div class="form-group">
        {{Form::label('product_image', 'Upload an Image', array('style' => 'float:left;margin-right:20px;'))}}
        {!! Form::file('product_image') !!}
        <!--<span  id="more_img"></span>
        <input  type="button" value="Add More" onClick="addInput('dynamicInput');">
        <p style="margin-left:136px;width:50%;" class="help-block">Example block-level help text here.</p>-->
        @if ($errors->has('product_image')) <p class="text-danger">{{ $errors->first('product_image') }}</p> @endif
    </div>



    <div class="form-group">
        {{Form::label('product_description', 'Product Description', array('class' => ''))}}
        {{Form::textarea('product_description', $product_description = null, array('class' => 'form-control','id'=>'editor1',  'placeholder' => 'Product Description'))}}
        @if ($errors->has('product_description')) <p class="text-danger">{{ $errors->first('product_description') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('product_type', 'Product Type', array('class' => ''))}}
        <select class="form-control" name="product_type" data-placeholder="Choose a type" tabindex="1">
            <option>Select Type...</option>
             <option>Regular</option>
             <option>Featured</option>
             <option>Special</option>
        </select>
        @if ($errors->has('product_type')) <p class="text-danger">{{ $errors->first('product_type') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('product_price', 'Product Price', array('class' => ''))}}
        {{Form::text('product_price', $product_price = null, array('class' => 'form-control', 'placeholder' => 'Price'))}}
        @if ($errors->has('product_price')) <p class="text-danger">{{ $errors->first('product_price') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('product_quantity', 'Product Quantity', array('class' => ''))}}
        {{Form::text('product_quantity', $product_quantity = null, array('class' => 'form-control', 'placeholder' => 'Quantity'))}}
        @if ($errors->has('product_quantity')) <p class="text-danger">{{ $errors->first('product_quantity') }}</p> @endif
    </div>

    <div class="form-group">
        {{Form::label('publication_status', 'Publication Status', array('class' => ''))}}

        <select class="form-control" name="publication_status" data-placeholder="Choose a Category" tabindex="1">
            <option value="">Select Status...</option>
            <option value="1">Published</option>
            <option value="0">Unpublish</option>
        </select>
        @if ($errors->has('publication_status')) <p class="text-danger">{{ $errors->first('publication_status') }}</p> @endif
    </div>

    <div class="form-group">

        <button type="submit" id="submit" class="btn btn-primary">Create Product</button>

    </div>
    {!!Form::close()!!}

    <script>
        CKEDITOR.replace( 'editor1',{
            width:'100%',
            height:'250px'
        }).config.allowedContent = true;
    </script>
    <script src='{{ asset("js/jquery-1.11.1.min.js") }}'></script>
   <!-- <script>
        $(document).ready(function(){
            $('.add_more').on('click',function(e){
                var content='';
                 content += '<input type = "file" name="image[]">';
                $('.more_img').html(content);
                e.preventDefault();
            });
        });
    </script>-->
    <script>
        var counter = 1;
        var limit = 3;
        function addInput(divName){
            if (counter == limit)  {
                alert("You have reached the limit of adding " + counter + " images");
            }
            else {
                var newdiv;
                newdiv =  " <div><input  style='margin-left:137px;' type='file' name='images[]'></div>";
               $('#more_img').append(newdiv);
                counter++;
            }
        }
    </script>
@endsection