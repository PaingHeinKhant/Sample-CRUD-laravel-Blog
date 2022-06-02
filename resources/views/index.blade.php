@extends('master')
@section('title') Sample blog Home @endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card my-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h1 class="mb-0">Hello ..</h1>
                                <p class="mb-0 text-black-50">What is in your mind?</p>
                            </div>
                            <div class="">
                                <a href=" {{ route('post.create') }}" class="btn btn-lg btn-outline-primary">Create Post</a>
                            </div>
                        </div>
                    </div>
            </div>

                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                @foreach($posts as $post)

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">{{ $post->title }}</h4>
                            <p class="card-text text-black-50">{{ Str::words($post->description,50) }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mx-4 font-weight-bold"> {{ $post->created_at->format('j F y | n : i A') }}</p>
                          <div class="">
                              <form action="{{ route('post.destroy',$post->id) }}" class="d-inline-block" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-outline-danger">Delete</button>

                              </form>
                              <a href="{{ route('post.edit',$post->id) }}" class="btn btn-outline-info mx-2 my-3">Edit</a>

                              <a href="{{ route('post.show',$post->id) }}" class="btn btn-outline-primary mx-2 my-3">See More</a>
                          </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
