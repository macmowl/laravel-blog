@extends('layout')

@section('content')

<section class="container my-5">
    <h1>Feed</h1>
    @foreach( $messages as $message)
        <hr>
        <p>
            <strong>{{ $message->created_at }}</strong>    
            {{ $message->content }}
        </p>

    @endforeach

</section>

@endsection