@if(Session::get('message'))
    <div class=" alert alert-success">
        {{ Session::get('message')}}
    </div>
    <div style="clear:both"></div>
@endif

@if(Session::get('exception'))
    <div class=" alert alert-danger">
        {{ Session::get('exception')}}
    </div>
    <div style="clear:both"></div>
@endif

