<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;

use Illuminate\Http\Request;
use DB;
use Mail;
use Validator;
use App\Http\Requests;
use Session;


class MailController extends BackendController
{
   public function manage_mail(){
       $mails = DB::table('contact')
           ->select('*')
           ->where('message_status',0)
           ->orWhere('message_status',1)
           ->orderBy('id', 'desc')
           ->get();

       $important_mails = DB::table('contact')
           ->select('*')
           ->where('message_status',2)
           ->orderBy('id', 'desc')
           ->get();

       return view('admin.mailPages.manage_mail')->with('mails',$mails)->with('important_mails',$important_mails);
   }

    public function show_mail($contact_id){

        DB::table('contact')
            ->where('id',$contact_id)
            ->update(['message_status'=>1]);

        $single_contact = DB::table('contact')
            ->select('*')
            ->where('id',$contact_id)
            ->first();
        $hello='';
        $show_mail = 'show mail';
        return view('admin.mailPages.show_mail')->with('single_contact',$single_contact)->with('hello',$hello)->with('show_mail',$show_mail);

    }
    public function show_important_mail($contact_id){


        $single_contact = DB::table('contact')
            ->select('*')
            ->where('id',$contact_id)
            ->first();

        $hello='';
        $show_mail = 'show important mail';
        return view('admin.mailPages.show_mail')->with('single_contact',$single_contact)->with('hello',$hello)->with('show_mail',$show_mail);

    }
    public function important_mail($contact_id){


        DB::table('contact')
            ->where('id',$contact_id)
            ->update(['message_status'=>2]);

        $mails = DB::table('contact')
            ->select('*')
            ->where('message_status',0)
            ->orWhere('message_status',1)
            ->orderBy('id', 'desc')
            ->get();

        $important_mails = DB::table('contact')
            ->select('*')
            ->where('message_status',2)
            ->orderBy('id', 'desc')
            ->get();


        return view('admin.mailPages.manage_mail')->with('mails',$mails)->with('important_mails',$important_mails);

    }

    public function reply_mail($contact_id){
        DB::table('contact')
            ->where('id',$contact_id)
            ->update(['message_status'=>1]);

        $single_contact = DB::table('contact')
            ->select('*')
            ->where('id',$contact_id)
            ->first();
        $hello = 5; //hello is simple a flag variable to check some code in the show_mail view page
        $reply_mail = 'reply mail';
        return view('admin.mailPages.show_mail')->with('single_contact',$single_contact)->with('hello',$hello)->with('reply_mail',$reply_mail);
    }
    public function reply_important_mail($contact_id){

        $single_contact = DB::table('contact')
            ->select('*')
            ->where('id',$contact_id)
            ->first();
        $hello = 5; //hello is simple a flag variable to check some code in the show_mail view page
        $reply_mail = 'reply important mail';
        return view('admin.mailPages.show_mail')->with('single_contact',$single_contact)->with('hello',$hello)->with('reply_mail',$reply_mail);
    }

    public function send_mail(Request $request){
        $contact_id = $request->contact_id;

        $messages = array(
            'message_subject.required'=>'Subject should be not be empty...',
            'message_subject.min'=>'Subject should be min 6 characters...',
            'contact_message.required'=>'Message should not be empty...',
            'contact_message.min'=>'Message should be min 30 characters...'
        );

        $rules = array(
            'message_subject' =>'required|min:6',
            'contact_message' =>'required|min:30',

        );
        $data = [

            'contact_email_address'=> $request->contact_email_address,
            'message_subject'=> $request->message_subject,
            'contact_message'=> $request->contact_message,
        ];


        $validator = Validator::make($request->all(), $rules,$messages);


        if($validator->fails()){
            return redirect()->route('reply.mail',['id'=>$contact_id])->withInput()->withErrors($validator);
        }else {

            Mail::send('admin.mailPages.admin_contact',$data,function($message) use ($data){
                $message->to($data['contact_email_address']);
                $message->from('smskushtia@gmail.com');
                $message->subject($data['message_subject']);
            });
            Session::flash('message','Your mail has been sent');
            return redirect()->route('show.mail',['id'=>$contact_id]);
        }
    }

    public function send_important_mail(Request $request){
        $contact_id = $request->contact_id;

        $messages = array(
            'message_subject.required'=>'Subject should be not be empty...',
            'message_subject.min'=>'Subject should be min 6 characters...',
            'contact_message.required'=>'Message should not be empty...',
            'contact_message.min'=>'Message should be min 30 characters...'
        );

        $rules = array(
            'message_subject' =>'required|min:6',
            'contact_message' =>'required|min:30',

        );
        $data = [

            'contact_email_address'=> $request->contact_email_address,
            'message_subject'=> $request->message_subject,
            'contact_message'=> $request->contact_message,
        ];


        $validator = Validator::make($request->all(), $rules,$messages);


        if($validator->fails()){
            return redirect()->route('reply.important.mail',['id'=>$contact_id])->withInput()->withErrors($validator);
        }else {

            Mail::send('admin.mailPages.admin_contact',$data,function($message) use ($data){
                $message->to($data['contact_email_address']);
                $message->from('smskushtia@gmail.com');
                $message->subject($data['message_subject']);
            });


            Session::flash('message','Your mail has been sent');
            return redirect()->route('reply.important.mail',['id'=>$contact_id]);
        }


    }



    public function incoming_mail(){

        /* connect to gmail */
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'sabuzbenimondol@gmail.com';
        $password = 'qnjwcmdhcsdggfud';

        /* try to connect */
        $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

        /* grab emails */
        $emails = imap_search($inbox,'ALL');

        return view('admin.mailPages.incoming_mail')->with('emails',$emails)->with('inbox',$inbox);


    }

    public function delete_mail($contact_id){
        DB::table('contact')
            ->where('id',$contact_id)
            ->delete();
        return redirect()->route('manage.mail');
    }
}
