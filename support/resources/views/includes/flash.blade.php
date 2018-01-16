@if (session('status'))
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {!!  session('status') !!}
    </div>
@elseif (session('failed'))
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {!!  session('failed') !!}
    </div>
@endif