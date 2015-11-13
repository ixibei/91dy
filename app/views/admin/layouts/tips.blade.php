@if(Session::get('status') && Session::get('status'))
<div class="notibar announcement">
    <a class="close"></a>
    <h3> tips {{Session::get('status')}}</h3>
</div>
@endif
