@if ($message = Session::get('success'))
<div class="alert alert-success">
    <button class="close">x</button>
    {{ $message }}
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <button class="close">x</button>
    {{ $message }}
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning">
    <button class="close">x</button>
    {{ $message }}
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info">
    <button class="close">x</button>
    {{ $message }}
</div>
@endif


@if ($errors->any())
<div class="alert alert-info">
    <button class="close">x</button>
    Please check the form below for errors
</div>
@endif
