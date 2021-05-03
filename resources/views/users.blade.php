@extends('layout')

@section('content')

<section class="section">
    <h1>Users:</h1>
    @auth
    <h2>Followed users</h2>

    <ul>
        @forelse(auth()->user()->follows as $user)
            <li>
                <a href="/{{ $user->email }}">{{ $user->email }}</a>
            </li>
        @empty
            <p>Nobody to follow</p>
        @endforelse
    </ul>
    @endauth

    <h2>Users list</h2>
    <ul>
        @foreach($users as $user)
            <li>
                <a href="/{{ $user->email }}">{{ $user->email }}</a>
            </li>
        @endforeach
    </ul>
</section>


@endsection