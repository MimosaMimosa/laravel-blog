@extends('front.layout.master')

@section('content')
    <section class="post container-fluid">
        <div class="container">
            <div class="row mt-5 justify-content-center align-items-center">
                <div class="col-8">
                    <div class="card-header bg-purple text-white d-flex justify-content-between align-items-center">
                        <p class="h6 fw-bold mb-0">Create Post</p>
                        <a href="{{ route('posts.index') }}" class="btn btn-sm btn-white">All Posts</a>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form action="{{ route('posts.store') }}" autocomplete="off" method="POST">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="mb-1">Title</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Post Title">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="body" class="mb-1">Body</label>
                                    <textarea type="text" name="body" id="title" class="form-control @error('body') is-invalid @enderror"" placeholder="Enter Post Body"></textarea>
                                    @error('body')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
