@extends('home')
@section('mainContent')
<<div class="categoryForm">
    <form method="post" action="{{route('category.update',$category->id)}}">
        @csrf
        <label for="category">Category name:</label><br>
        <input type="text" name="name" value="{{$category->name}}" id="category" class="form-control"><br>
        <button class="btn btn-success form-control" type="submit">update</button>

    </form>
</div>
@endsection
