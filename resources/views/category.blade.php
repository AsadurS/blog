@extends('layouts.frontend.app')

@section('title','Category')
@push('css')
    <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
@endpush
@section('content')


    <section class="blog-area section">
        <div class="container">

            <div class="row">
                    @forelse($posts as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="single-post post-style-1">
                                    @php
                                        $image = null ;
                                       if($post->image=== ' ')
                                          { $image= 'https://images-na.ssl-images-amazon.com/images/I/91bYsX41DVL.jpg';}
                                       else{ $image = $post->image;}
                                    @endphp
                                    <div class="blog-image"><img src="{{ $image }}" height="100px" width="100px" alt="{{ $post->title }}"></div>


                                    <div class="blog-info">

                                        <h4 class="title"><a href="{{ route('post.details',$post->slug) }}"><b>{{ $post->title }}</b></a></h4>

                                        <ul class="post-footer">

                                            <li>

                                                    <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                        closeButton: true,
                                                        progressBar: true,
                                                    })"><i class="ion-heart"></i>123</a>


                                            </li>
                                            <li><a href="#"><i class="ion-chatbubble"></i>123</a></li>
                                            <li><a href="#"><i class="ion-eye"></i>123</a></li>
                                        </ul>

                                    </div><!-- blog-info -->
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->
                    @empty
                        <div class="col-lg-12 col-md-12">
                            <div class="card h-100">
                                <div class="single-post post-style-1 p-2">
                                <strong>No Post Found :(</strong>
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->
                    @endforelse


            </div><!-- row -->

            {{--{{ $posts->links() }}--}}

        </div><!-- container -->
    </section><!-- section -->

@endsection

@push('js')

@endpush
