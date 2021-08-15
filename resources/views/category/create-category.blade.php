@extends('home')
@section('mainContent')
<div class="categoryForm">
    <form method="post" action="{{route('category.create')}}">
        @csrf
        <label for="category">Category name:</label><br>
        <input type="text" name="name" id="category" class="form-control"><br>
        <button class="btn btn-success form-control" type="submit">save</button>

    </form>
</div>
@endsection