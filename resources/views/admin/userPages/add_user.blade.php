@extends('admin.master')
@section('main_content')
    <h3 class="section-title first-title"><i class="icon-table"></i>Add User</h3>
    {!!Form::open( array('route' =>['save.user'],'method'=>'post','class'=>'form-horizontal contact_form'))!!}
    <div class="form-group " >

        {{Form::label('first_name', 'First Name', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">
            {{ Form::text('first_name', $first_name = null, array('class' => 'form-control input-md','id'=>'first_name', 'placeholder' => 'First Name')) }}
            @if ($errors->has('first_name')) <p class="text-danger">{{ $errors->first('first_name') }}</p> @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('last_name') ? 'has-error': '' }}" >

        {{Form::label('last_name', 'Last Name', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">
            {{ Form::text('last_name', $last_name = null, array('class' => 'form-control input-md','id'=>'last_name',  'placeholder' => 'Last Name')) }}
            @if ($errors->has('last_name')) <p class="text-danger">{{ $errors->first('last_name') }}</p> @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('email_address') ? 'has-error': '' }}" >

        {{Form::label('email_address', 'Email', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">
            {{Form::email('email_address', $email_address = null, array('class' => 'form-control input-md','id'=>'email_address',  'placeholder' => 'example@domain.com'))}}
            @if ($errors->has('email_address')) <p class="text-danger">{{ $errors->first('email_address') }}</p> @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error': '' }}" >

        {{Form::label('Password', 'Password', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">

            {{Form::password('password', array('class' => 'form-control input-md','id'=>'password',  'placeholder' => 'Password'))}}
            @if ($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p> @endif
        </div>
    </div>


    <div class="form-group @if ($errors->has('password_confirm')) has-error @endif">

        {{Form::label('password_confirm', 'Confirm Password', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">

            {{Form::password('password_confirm', array('class' => 'form-control input-md', 'id'=>'password_confirm',  'placeholder' => 'Confirm Password'))}}
            @if ($errors->has('password_confirm')) <p class="text-danger">{{ $errors->first('password_confirm') }}</p> @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('address') ? 'has-error': '' }}" >

        {{Form::label('address', 'Address', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">

            {{ Form::textarea('address', $address = null, array('class' => 'form-control input-md',  'id'=>'address', 'placeholder' => 'Address')) }}
            @if ($errors->has('address')) <p class="text-danger">{{ $errors->first('address') }}</p> @endif
        </div>
    </div>

    <!-- <div class="form-group">
         <label for="exampleInputFile" class="col-sm-3">File input</label>
         <input name="user_image" type="file" id="exampleInputFile">

     </div>-->

    <div class="form-group">
        <div class="col-sm-10 ">
            <button type="submit" id="submit" class="btn btn-primary">Create User</button>
        </div>
    </div>

    {!!Form::close()!!}


@endsection