@extends('layouts.app')
@section('title', 'Person Operation')
@section('content')

    <h2>List People</h2>
    <a href="{{ route('person.create') }}">Add New Person</a>
    <ul>
        @foreach ($people as $person)
            <li>
                <strong>{{ $person->name }}</strong> ({{ $person->age }} year(s) old)
                @if ($person->image)
                    <img src="{{ asset('storage/' . $person->image) }}" width="50">
                @endif
                <a href="{{ route('person.edit',$person->id) }}">Edit</a>
                <form action="{{ route ('person.destroy',$person->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
