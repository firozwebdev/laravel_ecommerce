
@extends('admin.master')
@section('main_content')
    <h3 class="section-title first-title"><i class="icon-table"></i>Add Page</h3>
    {!!Form::open( array('route' =>['save.page'],'method'=>'post','class'=>'form-horizontal contact_form'))!!}

    <div class="form-group">
        {{Form::label('page_name', 'Menu Name (sub-menu)', array('class' => ''))}}
        {{Form::text('page_name', $page_name = null, array('class' => 'form-control','id'=>'blog_title',  'placeholder' => 'Menu Name'))}}
        @if ($errors->has('page_name')) <p class="text-danger">{{ $errors->first('page_name') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('parent_id', 'Parent Page', array('class' => ''))}}

        <select class="form-control" name="parent_id" data-placeholder="Choose a Parent" tabindex="1">
            <option value="">Select Parent...</option>
            @if($pages)
                @foreach($pages as $page)
                    <option value="{{ $page->parent_id }}">{{ $page->page_parent_name }}</option>
                @endforeach
            @endif

        </select>
        @if ($errors->has('parent_id')) <p class="text-danger">{{ $errors->first('parent_id') }}</p> @endif
    </div>

    <div class="form-group">
        {{Form::label('page_description', 'Page Description', array('class' => ''))}}
        {{Form::textarea('page_description', $page_description = null, array('class' => 'form-control','id'=>'editor1',  'placeholder' => 'Page Description'))}}
        @if ($errors->has('page_description')) <p class="text-danger">{{ $errors->first('page_description') }}</p> @endif
    </div>

    <div class="form-group">
        {{Form::label('page_publication_status', 'Publication Status', array('class' => ''))}}

        <select class="form-control" name="page_publication_status" data-placeholder="Choose a Category" tabindex="1">
            <option value="">Select Status...</option>
            <option value="1">Published</option>
            <option value="0">Unpublish</option>
        </select>
        @if ($errors->has('page_publication_status')) <p class="text-danger">{{ $errors->first('page_publication_status') }}</p> @endif
    </div>

    <div class="form-group">

        <button type="submit" id="submit" class="btn btn-primary">Create Page</button>

    </div>
    {!!Form::close()!!}

    <script>
        CKEDITOR.replace( 'editor1',{
            width:'100%',
            height:'250px'
        } );
    </script>
@endsection