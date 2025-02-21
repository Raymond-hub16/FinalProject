@extends('layouts.app')
@section('title','Edit')
@section('content')
<h2>Edit Person</h2>
    <form action="{{ route('person.update', $person->id)}}" method="POST" enctype="multipart/form-data">

        @method('PUT')
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ $person->name }}" nullable>
        <label>Age:</label>
        <input type="number" name="age" value="{{ $person->age }}" nullable>
        <label>Image:</label>
        <input type="file" name="image">
        @if($person->image)
            <img src="{{ asset('storage/'.$person->image) }}" width="50">
        @endif
        <button type="submit">Update</button>
    </form>
@endsection

