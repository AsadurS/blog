@extends('home')
@section('mainContent')
<div class="card">
    <div class="card-head">
    <h2 class="text-center pt-4">All post</h2>
    </div>
    <div class="card-body">
    <button class="btn btn-primary"> <a href="{{ route('post.createForm') }}" style="color: #fff;">Create post</a></button><br> <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>slug</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->index + 1}}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td> <img width="30px" height="30px" src="{{ $post->image }}" alt=""></td>
                <td>{{ $post->description }}</td>
                <td style="width: 10%">
                    <a href="{{route('post.updateForm', $post->id) }}"><i class="fas fa-edit"></i></a>
                    <a href="{{route('post.delete', $post->id) }}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>      
</div>
    <script type="text/javascript" src="{{ asset('js/axios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/deletePost.js') }}"></script>
@endsection