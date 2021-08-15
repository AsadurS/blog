@extends('home')
@section('mainContent')
<form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="col=md-9">
    <h2 class="text-center">Update Post</h2>
  
    <label for="title">Post title:</label><br>
    <input type="text" name="title" value="{{$post->title}}" id="title" class="form-control"><br>
    <label for="category">post image:</label><br>
    <input type="file" name="iamge"  class="form-control"><br>
    <label for="category_id">Select category:</label><br>
    <select  name="category_id" class="form-control">
        @foreach ($categories as $category)
        <option @if($category->id===$post->category_id)? 'selected ':'' @endif
          value="{{ $category->id}}">{{ $category->name }}</option>
        @endforeach
        
    </select><br>
    <label for="category">Category Description:</label><br>
    <textarea name="description"  class="form-control"  rows="2"> {{$post->description}}</textarea> <br>
    <button class="btn btn-success btn-large" onclick="updateData({{ $post->id }})">save</button>

</div>
<script type="text/javascript" src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/updatePost.js') }}"></script>
@endsection
