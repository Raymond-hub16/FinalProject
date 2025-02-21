@extends('layouts.app')
@section('title', 'Create')


@section('content')
<h2>Add New Person</h2>
<form action="{{ route('person.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required>
    <label>Age:</label>
    <input type="number" name="age" required>
    <label>Image:</label>
    <input type="file" name="image">
    <button type="submit">Save</button>
</form>
@endsection
