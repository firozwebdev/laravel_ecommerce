
@extends('admin.master')
@section('main_content')
    <h3 class="section-title first-title"><i class="icon-table"></i>Add Blog</h3>
    {!!Form::open( array('route' =>['save.blog'],'method'=>'post','files'=>true,'class'=>'form-horizontal contact_form'))!!}

    <div class="form-group">
        {{Form::label('blog_title', 'Blog Title', array('class' => ''))}}
        {{Form::text('blog_title', $blog_title = null, array('class' => 'form-control','id'=>'blog_title',  'placeholder' => 'Blog Title'))}}
        @if ($errors->has('blog_title')) <p class="text-danger">{{ $errors->first('blog_title') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('cagegory_id', 'Blog Category', array('class' => ''))}}

        <select class="form-control" name="category_id" data-placeholder="Choose a Category" tabindex="1">
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
        {{Form::label('blog_image', 'Upload an Image', array('style' => 'float:left;margin-right:20px;'))}}
        {!! Form::file('blog_image') !!}
        <span  id="more_img"></span>
        <input  type="button" value="Add More" onClick="addInput('dynamicInput');">
        <p style="margin-left:136px;width:50%;" class="help-block">Example block-level help text here.</p>
        @if ($errors->has('blog_image')) <p class="text-danger">{{ $errors->first('blog_image') }}</p> @endif
    </div>



    <div class="form-group">
        {{Form::label('blog_description', 'Blog Description', array('class' => ''))}}
        {{Form::textarea('blog_description', $blog_description = null, array('class' => 'form-control','id'=>'editor1',  'placeholder' => 'Blog Description'))}}
        @if ($errors->has('blog_description')) <p class="text-danger">{{ $errors->first('blog_description') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('blog_tag', 'Put A Tag', array('class' => ''))}}
        {{Form::text('blog_tag', $blog_tag = null, array('class' => 'form-control', 'placeholder' => 'Tag'))}}
        @if ($errors->has('blog_tag')) <p class="text-danger">{{ $errors->first('blog_tag') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('author_name', 'Author Name', array('class' => ''))}}
        {{Form::text('author_name', $author_name = null, array('class' => 'form-control', 'placeholder' => 'Author Name'))}}
        @if ($errors->has('author_name')) <p class="text-danger">{{ $errors->first('author_name') }}</p> @endif
    </div>

    <div class="form-group">
        {{Form::label('blog_publication_status', 'Publication Status', array('class' => ''))}}

        <select class="form-control" name="blog_publication_status" data-placeholder="Choose a Category" tabindex="1">
            <option value="">Select Status...</option>
            <option value="1">Published</option>
            <option value="0">Unpublish</option>
        </select>
        @if ($errors->has('blog_publication_status')) <p class="text-danger">{{ $errors->first('blog_publication_status') }}</p> @endif
    </div>

    <div class="form-group">

        <button type="submit" id="submit" class="btn btn-primary">Create Blog</button>

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