@if(session()->has('pay_message'))
    <br>
<div class="alert alert-success alert-dismissible fade show" style="text-align: center;" role="alert">
    <strong>Success!</strong> {{session()->get('pay_message')}}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('error'))
<br>
<div class="alert alert-danger alert-dismissible fade show" style="text-align: center;" role="alert">
    <strong>Error!</strong> {{session()->get('pay_error')}}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


