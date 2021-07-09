@error('error')
<div class="row" style="margin-top: 2%">
    <div class="center red darken-4" style="min-height: 50px">
        <p class="white-text">
            {{$message}}
        </p>
    </div>
</div>
@enderror

@error('success')
<div class="alert alert-success" role="alert">
    {{ $message }}
</div>
@enderror

@error('warning')
<div class="alert alert-warning" role="alert">
    {{ $message }}
</div>
@enderror
