@extends('layout')

@section('content')

<div class="section">
    <h2>Modify password</h2>
    <form method="post" action="/update_password" >
        {{ csrf_field() }}

        <div class="field">
            <label class="label">New Password</label>
            <div class="control">
                <input class="input" type="password" name="password" />
            </div>
            @if($errors->has('password'))
                <p class="help is-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>
        
        <div class="field">
            <label class="label">Confirm password</label>
            <div class="control">
                <input class="input" type="password" name="password_confirmation" />
            </div>
            @if($errors->has('password_confirmation'))
                <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-link">Update password</button>
            </div>
        </div>
    </form>
</div>

@endsection