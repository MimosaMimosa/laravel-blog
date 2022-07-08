@extends('front.layout.master')

@section('content')
    <section class="post container-fluid">
        <div class="container">
            <div class="row mt-5 justify-content-center align-items-center">
                <div class="col-8">
                    <div class="card-header bg-purple text-white d-flex justify-content-between align-items-center">
                        <p class="h6 fw-bold mb-0">Edit Post</p>
                        <a href="{{ route('posts.index') }}" class="btn btn-sm btn-white">All Posts</a>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form action="{{ route('posts.update', $post->id) }}" autocomplete="off" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="mb-1">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Post Title" value="{{ old('title', $post->title) }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="body" class="mb-1">Body</label>
                                    <textarea type="text" name="body" id="title" class="form-control" placeholder="Enter Post Body">{{ old('body', $post->body) }}</textarea>
                                </div>
                                <div class="form-group mt-3"><button class="btn btn-purple text-white">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
