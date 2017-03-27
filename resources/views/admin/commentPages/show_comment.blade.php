@extends('admin.master')
@section('main_content')

<div style="overflow:hidden">

    <h3 class="section-title first-title"><i class="icon-table"></i> Show Comment</h3>


    <div class="form-group " >
        {{Form::label('comment_author', 'Author', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">
            {{ Form::text('comment_author', $comment_author = $comment->comment_author, array('class' => 'form-control input-md','id'=>'contact_first_name','style'=>'margin-bottom:20px')) }}

        </div>
    </div>

    <div class="form-group " >
        {{Form::label('email_address', 'Author Email', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">
            {{ Form::text('email_address', $comment_author = $comment->email_address, array('class' => 'form-control input-md','id'=>'contact_first_name','style'=>'margin-bottom:20px')) }}

        </div>
    </div>


    <div class="form-group" >

        {{Form::label('comment', 'Comment', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">
            {{ Form::textarea('comment', $comment = $comment->comment, array('class' => 'form-control input-md','style'=>'margin-bottom:20px', 'id'=>'message_title')) }}

        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-10 ">
            <a href="{{ route('manage.comment') }}" class="btn btn-success">Back</a>

        </div>
    </div>
</div>
@endsection