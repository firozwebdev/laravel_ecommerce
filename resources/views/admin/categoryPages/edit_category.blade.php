
@extends('admin.master')
@section('main_content')
    <h3 class="section-title first-title"><i class="icon-table"></i>Add Category</h3>

    {!!Form::open( array('route' =>['update.category'],'method'=>'put','class'=>'form-horizontal contact_form'))!!}
        <input type="hidden" name="category_id"  value="{{ $single_category->category_id }}"/>
    <div class="form-group">
        {{Form::label('category_name', 'Category Name', array('class' => ''))}}
        {{Form::text('category_name', $category_name =  $single_category->category_name , array('class' => 'form-control','id'=>'category_name'))}}
        @if ($errors->has('category_name')) <p class="text-danger">{{ $errors->first('category_name') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('category_description', 'Category Description', array('class' => ''))}}
        {{Form::textarea('category_description', $category_description = $single_category->category_description, array('class' => 'form-control','id'=>'category_description' ))}}
        @if ($errors->has('category_description')) <p class="text-danger">{{ $errors->first('category_description') }}</p> @endif
    </div>
    <div class="form-group">
        {{Form::label('publication_status', 'Publication Status', array('class' => ''))}}

        <select class="form-control" name="publication_status" data-placeholder="Choose a Category" tabindex="1">
            @if($single_category->publication_status==1)
                <option selected value="1">Published</option>
            @else
                <option  value="1">Published</option>
            @endif

            @if($single_category->publication_status==0)
                <option selected value="0">Unpublished</option>
            @else
                <option  value="0">Unpublished</option>
            @endif
        </select>
        @if ($errors->has('publication_status')) <p class="text-danger">{{ $errors->first('publication_status') }}</p> @endif
    </div>

    <div class="form-group">

        <button type="submit" id="submit" class="btn btn-primary">Update Category</button>

    </div>
    {!!Form::close()!!}


@endsection