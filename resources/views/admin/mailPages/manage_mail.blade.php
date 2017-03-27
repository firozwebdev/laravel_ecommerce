@extends('admin.master')
@section('main_content')
    <div class="widget">
        <h3 class="section-title first-title"><i class="icon-table"></i> Inbox</h3>
        <div class="widget-content-white glossed">
            <div class="padded">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th style="display:none;"><div class="checkbox"><input type="checkbox"></div></th>
                        <th>ID</th>
                        <th> Subject</th>
                        <th>Message</th>
                        <th> Status</th>
                        <th style="display:none">Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if($mails)
                    <?php $i=1; ?>
                    @foreach( $mails as $mail)

                        <tr>
                            <td style="display:none;" ><div class="checkbox"><input  type="checkbox"></div></td>
                            <td>{{ $i }}</td>
                            <td>{{ str_limit($mail->message_subject,25) }}</td>
                            <td>{{ str_limit($mail->contact_message,30) }}</td>

                            <td class="text-right">
                                @if($mail->message_status==1 )
                                    <span class="label label-success">Read</span>
                                @endif
                                @if($mail->message_status==0 )
                                    <span class="label label-danger">Unread</span>
                                @endif
                            </td>
                            <td style="display:none;"><span class="label label-success">Active</span></td>
                            <td class="text-right">



                                <a href="{{ route('show.mail',['id'=>$mail->id]) }}" class="btn btn-default btn-xs"><i class="icon-eye-open"></i></a>
                                <a href="{{ route('reply.mail',['id'=>$mail->id]) }}" class="btn btn-default btn-xs"><i class="icon-reply"></i></a>
                                <a href="{{ route('important.mail',['id'=>$mail->id]) }}" class="btn btn-default btn-xs"><i class="icon-magic"></i></a>
                                <a onclick=" return confirm('Are you sure to delete'); " href="{{ URL::to('delete-mail/'.$mail->id) }}" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach


                    @endif




                    </tbody>
                </table>
            </div>
        </div>
    </div> <!--end inbox mail-->

    <div class="widget">
        <h3 class="section-title first-title"><i class="icon-table"></i> Important Mail</h3>
        <div class="widget-content-white glossed">
            <div class="padded">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th style="display:none;"><div class="checkbox"><input type="checkbox"></div></th>
                        <th>ID</th>
                        <th> Subject</th>
                        <th>Message</th>
                        <th style="display:none"> Status</th>
                        <th style="display:none">Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if($important_mails)
                    <?php $i=1; ?>
                    @foreach( $important_mails as $important_mail)

                        <tr>
                            <td style="display:none;" ><div class="checkbox"><input  type="checkbox"></div></td>
                            <td>{{ $i }}</td>
                            <td>{{ str_limit($important_mail->message_subject,25) }}</td>
                            <td>{{ str_limit($important_mail->contact_message,30) }}</td>

                            <td style="display:none" class="text-right">

                            </td>
                            <td style="display:none;"><span class="label label-success">Active</span></td>
                            <td class="text-right">



                                <a href="{{ route('show.important.mail',['id'=>$important_mail->id]) }}" class="btn btn-default btn-xs"><i class="icon-eye-open"></i></a>
                                <a href="{{ route('reply.important.mail',['id'=>$important_mail->id]) }}" class="btn btn-default btn-xs"><i class="icon-reply"></i></a>
                                <a onclick=" return confirm('Are you sure to delete'); " href="{{ URL::to('delete-mail/'.$important_mail->id) }}" class="btn btn-danger btn-xs"><i class="icon-remove"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach


                    @endif




                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>


@endsection