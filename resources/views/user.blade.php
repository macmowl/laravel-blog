@extends('layout')

@section('content')

<section class="container my-5">
    <div class="d-flex justify-content-start">
            <h1 class="mr-3">{{ $user->email }}</h1>
            @auth
                @if(auth()->user()->email != $user->email)
                    <form action="/{{ $user->email }}/follow" method="post">
                        {{ csrf_field() }}
                        @if (auth()->user()->follow($user))
                            {{ method_field('delete') }}
                        @endif

                        <button type="submit" class="btn btn-outline-secondary">
                            @if (auth()->user()->follow($user))
                                Unfollow
                            @else
                                Follow
                            @endif
                        </button>
                    </form>
                @endif
            @endauth
    </div>

    @if (auth()->check() AND auth()->user()->id === $user->id)
        
        <form action="/messages" method="post">
            {{ csrf_field() }}

            <div class="field">
                <label class="label">Message</label>
                <div class="control">
                    <textarea class="textarea" name="message" placeholder="Qu'avez-vous à dire ?"></textarea>
                </div>
                @if($errors->has('message'))
                    <p class="help is-danger">{{ $errors->first('message') }}</p>
                @endif

            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Publish</button>
                </div>
            </div>
        
        </form>

    @endif

    @if(auth()->check() AND auth()->user()->follow($user) OR auth()->user()->id === $user->id)
        @foreach( $messages as $message)
            <hr>
            <p>
                <strong>{{ $message->created_at }}</strong>    
                {{ $message->content }}
            </p>

        @endforeach
    @endif

</section>

@endsection