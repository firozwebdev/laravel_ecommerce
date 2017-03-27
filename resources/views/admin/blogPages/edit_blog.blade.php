
@extends('admin.master')
@section('main_content')
    <h3 class="section-title first-title"><i class="icon-table"></i>Edit Blog</h3>
    {!!Form::open( array('route' =>['update.blog'],'method'=>'put','files'=>true,'class'=>'form-horizontal contact_form'))!!}
    <input type="hidden" name="blog_id"  value="{{ $single_blog->blog_id }}"/>
    <div class="form-group">
        {{Form::label('blog_title', 'Blog Title', array('class' => ''))}}
        {{Form::text('blog_title', $blog_title = $single_blog->blog_title, array('class' => 'form-control','id'=>'blog_title',  'placeholder' => 'Blog Title'))}}
        @if ($errors->has('blog_title')) <p class="text-danger">{{ $errors->first('blog_title') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('cagegory_id', 'Blog Category', array('class' => ''))}}

        <select class="form-control" name="category_id" data-placeholder="Choose a Category" tabindex="1">
            @if($categories)
                @foreach($categories as $category)
                    <option
                            @if($single_blog->category_id == $category->category_id )
                            selected
                            @endif
                            value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                @endforeach
            @endif

        </select>
        @if ($errors->has('publication_status')) <p class="text-danger">{{ $errors->first('publication_status') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('blog_image', 'Upload an Image', array('style' => 'float:left;margin-right:20px;'))}}
        {!! Form::file('blog_image') !!}
        <p style="margin-left:136px;width:50%;" class="help-block">Example block-level help text here.</p>
        @if ($errors->has('blog_image')) <p class="text-danger">{{ $errors->first('blog_image') }}</p> @endif
        <img style="width:170px;height:150px;" src="{{ asset( $single_blog->blog_image ) }}" />
    </div>

    <div class="form-group">
        {{Form::label('blog_description', 'Blog Description', array('class' => ''))}}
        {{Form::textarea('blog_description', $blog_description = $single_blog->blog_description, array('class' => 'form-control','id'=>'editor1',  'placeholder' => 'Blog Description'))}}
        @if ($errors->has('blog_description')) <p class="text-danger">{{ $errors->first('blog_description') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('blog_tag', 'Put A Tag', array('class' => ''))}}
        {{Form::text('blog_tag', $blog_tag = $single_blog->blog_tag, array('class' => 'form-control', 'placeholder' => 'Tag'))}}
        @if ($errors->has('blog_tag')) <p class="text-danger">{{ $errors->first('blog_tag') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('author_name', 'Author Name', array('class' => ''))}}
        {{Form::text('author_name', $author_name = $single_blog->author_name, array('class' => 'form-control', 'placeholder' => 'Author Name'))}}
        @if ($errors->has('author_name')) <p class="text-danger">{{ $errors->first('author_name') }}</p> @endif
    </div>

    <div class="form-group">
        {{Form::label('blog_publication_status', 'Publication Status', array('class' => ''))}}

        <select class="form-control" name="blog_publication_status" data-placeholder="Choose a Category" tabindex="1">
            @if($single_blog->blog_publication_status==1)
                <option selected value="1">Published</option>
            @else
                <option  value="1">Published</option>
            @endif

            @if($single_blog->blog_publication_status==0)
                <option selected value="0">Unpublished</option>
            @else
                <option  value="0">Unpublished</option>
            @endif
        </select>
        @if ($errors->has('blog_publication_status')) <p class="text-danger">{{ $errors->first('blog_publication_status') }}</p> @endif
    </div>

    <div class="form-group">

        <button type="submit" id="submit" class="btn btn-primary">Update Blog</button>

    </div>
    {!!Form::close()!!}

    <script>
        CKEDITOR.replace( 'editor1',{
            width:'100%',
            height:'250px'
        } );
    </script>
@endsection