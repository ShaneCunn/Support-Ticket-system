@if (session('status'))
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {!!  session('status') !!}
    </div>
@elseif (session('closed'))
    <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {!!  session('closed') !!}
    </div>
@elseif (session('failed'))
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {!!  session('failed') !!}
    </div>
@endif