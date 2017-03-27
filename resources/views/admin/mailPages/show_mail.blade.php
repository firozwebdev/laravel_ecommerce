@extends('admin.master')
@section('main_content')
    <div style="overflow:hidden">
    @if($hello != '')

        <h3 class="section-title first-title"><i class="icon-table"></i> Reply Mail</h3>
        <div style="overflow:hidden">
            @if($reply_mail == 'reply mail')

            {!!Form::open( array('route' =>['send.mail'],'method'=>'post','class'=>'form-horizontal contact_form'))!!}
            @endif

            @if($reply_mail == 'reply important mail')

            {!!Form::open( array('route' =>['send.important.mail'],'method'=>'post','class'=>'form-horizontal contact_form'))!!}
            @endif
            <input type="hidden" name="contact_id"  value="{{ $single_contact->id }}"/>
            <input type="hidden" name="contact_name"  value="{{ $single_contact->contact_first_name }}"/>


            <div class="form-group" >

                {{Form::label('contact_email_address', 'To', array('class' => 'col-sm-3'))}}
                <div class="col-sm-10">
                    {{Form::email('contact_email_address', $contact_email_address = $single_contact->contact_email_address, array('class' => 'form-control input-md','id'=>'contact_email_address','style'=>'margin-bottom:20px', 'readonly' => 'true', 'placeholder' => 'example@domain.com'))}}

                </div>
            </div>

            <div class="form-group" >

                {{Form::label('message_subject', 'Subject', array('class' => 'col-sm-3'))}}
                <div class="col-sm-10">
                    {{ Form::text('message_subject', $message_subject = null, array('class' => 'form-control input-md','', 'id'=>'message_title',  'placeholder' => 'Subject')) }}
                    @if ($errors->has('message_subject')) <p class="text-danger">{{ $errors->first('message_subject') }}</p> @endif

                </div>
            </div>

            <div class="form-group" >

                {{Form::label('contact_message', 'Message', array('class' => 'col-sm-3'))}}
                <div class="col-sm-10">

                    {{ Form::textarea('contact_message', $message = null, array('class' => 'form-control input-md', 'style'=>'margin-bottom:6px',   'id'=>'contact_message', 'placeholder' => 'Message')) }}
                    @if ($errors->has('contact_message')) <p class="text-danger">{{ $errors->first('contact_message') }}</p> @endif

                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-10 ">
                    <a href="{{ route('manage.mail') }}" class="btn btn-success">Back</a>
                    <button type="submit" id="submit" class="btn btn-primary">Send Mail</button>
                </div>
            </div>

            {!!Form::close()!!}
        </div>
    @endif


        <div style="margin-top:30px"></div>

    <h3 class="section-title first-title"><i class="icon-table"></i> Show Mail</h3>


    <div class="form-group " >
        {{Form::label('contact_first_name', 'Name', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">
            {{ Form::text('contact_first_name', $contact_first_name = $single_contact->contact_first_name.' '.$single_contact->contact_last_name, array('class' => 'form-control input-md','id'=>'contact_first_name','style'=>'margin-bottom:20px', 'placeholder' => 'First Name')) }}

        </div>
    </div>




    <div class="form-group" >

        {{Form::label('contact_email_address', 'Email', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">
            {{Form::email('contact_email_address', $contact_email_address = $single_contact->contact_email_address, array('class' => 'form-control input-md','id'=>'contact_email_address','style'=>'margin-bottom:20px',  'placeholder' => 'example@domain.com'))}}

        </div>
    </div>

    <div class="form-group" >

        {{Form::label('message_subject', 'Subject', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">
            {{ Form::text('message_subject', $message_subject = $single_contact->message_subject, array('class' => 'form-control input-md','style'=>'margin-bottom:20px', 'id'=>'message_title',  'placeholder' => 'Subject')) }}

        </div>
    </div>

    <div class="form-group" >

        {{Form::label('contact_message', 'Message', array('class' => 'col-sm-3'))}}
        <div class="col-sm-10">

            {{ Form::textarea('contact_message', $message = $single_contact->contact_message, array('class' => 'form-control input-md', 'style'=>'margin-bottom:6px',   'id'=>'contact_message', 'placeholder' => 'Your Message')) }}

        </div>
    </div>

        @if($hello =='')
            <div class="form-group">
                <div class="col-sm-10 ">
                    <a href="{{ route('manage.mail') }}" class="btn btn-success">Back</a>
                        @if($show_mail == 'show mail')
                        <a href="{{ route('reply.mail',['contact_id'=>$single_contact->id]) }}" class="btn btn-primary">Reply</a>
                        @endif
                    @if($show_mail == 'show important mail')
                        <a href="{{ route('reply.important.mail',['contact_id'=>$single_contact->id]) }}" class="btn btn-primary">Reply</a>
                        @endif
                </div>
            </div>
        @endif


</div>





@endsection