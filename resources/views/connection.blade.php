@extends('layout')

@section('content')

    <form method="post" class="section">
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" name="email" value="{{ old('email') }}" />
            </div>
            @if($errors->has('email'))
                <p class="help is-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class="input" type="password" name="password" />
            </div>
            @if($errors->has('password'))
                <p class="help is-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>
        
        <div class="field">
            <div class="control">
                <button class="button is-link">Login</button>
            </div>
        </div>
    </form>

@endsection