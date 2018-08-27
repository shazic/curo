@extends('layouts.master')

@section('content')

    <h1>User List</h1>
    
    @foreach($users as $user)
        <ul>
            <li>
                {{ $user->name }}
            </li>
        </ul>
        
    @endforeach

@endsection