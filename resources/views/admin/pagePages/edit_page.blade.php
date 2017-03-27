
@extends('admin.master')
@section('main_content')
    <h3 class="section-title first-title"><i class="icon-table"></i>Update Page</h3>
    {!!Form::open( array('route' =>['update.page'],'method'=>'put','class'=>'form-horizontal contact_form'))!!}
        <input type="hidden" name="page_id"  value="{{ $single_page->page_id }}"/>
    <div class="form-group">
        {{Form::label('page_name', 'Menu Name (sub-menu)', array('class' => ''))}}
        {{Form::text('page_name', $page_name = $single_page->page_name, array('class' => 'form-control','id'=>'blog_title',  'placeholder' => 'Menu Name'))}}
        @if ($errors->has('page_name')) <p class="text-danger">{{ $errors->first('page_name') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('parent_id', 'Parent Page', array('class' => ''))}}

        <select class="form-control" name="parent_id" data-placeholder="Choose a Parent" tabindex="1">
            @if($pages)
                @foreach($pages as $page)
                    <option
                            @if($single_page->parent_id == $page->parent_id )
                            selected
                            @endif
                            value="{{ $page->parent_id }}">{{ $page->page_parent_name }}</option>
                @endforeach
            @endif

        </select>
        @if ($errors->has('parent_id')) <p class="text-danger">{{ $errors->first('parent_id') }}</p> @endif
    </div>

    <div class="form-group">
        {{Form::label('page_description', 'Page Description', array('class' => ''))}}
        {{Form::textarea('page_description', $page_description = $single_page->page_description, array('class' => 'form-control','id'=>'editor1',  'placeholder' => 'Page Description'))}}
        @if ($errors->has('page_description')) <p class="text-danger">{{ $errors->first('page_description') }}</p> @endif
    </div>

    <div class="form-group">
        {{Form::label('page_publication_status', 'Publication Status', array('class' => ''))}}

        <select class="form-control" name="page_publication_status" data-placeholder="Choose a Category" tabindex="1">
            @if($single_page->page_publication_status==1)
                <option selected value="1">Published</option>
            @else
                <option  value="1">Published</option>
            @endif

            @if($single_page->page_publication_status==0)
                <option selected value="0">Unpublished</option>
            @else
                <option  value="0">Unpublished</option>
            @endif
        </select>
        @if ($errors->has('page_publication_status')) <p class="text-danger">{{ $errors->first('page_publication_status') }}</p> @endif
    </div>

    <div class="form-group">

        <button type="submit" id="submit" class="btn btn-primary">Update Page</button>
        <a href="{{ route('manage.page') }}" class="btn btn-success">Back</a>

    </div>
    {!!Form::close()!!}

    <script>
        CKEDITOR.replace( 'editor1',{
            width:'100%',
            height:'250px'
        } );
    </script>
@endsection