@extends('front.layout.master')

@section('content')
    <section class="post container-fluid">
        <div class="container">
            <div class="row mt-5 justify-content-center align-items-center">
                <div class="col-8">
                    @if (Session::get('success'))
                        <div x-data="{}" x-ref="success" class="alert alert-purple bg-purple text-white d-flex align-items-center justify-content-between">
                            <span>{{ session('success') }}</span>
                            <a href="javascript:void(0)" @click="$refs.success.remove()" class="text-white"><i class="fa-solid fa-xmark"></i></a>
                        </div>
                    @endif
                    <div class="mb-2 text-end">
                        <a href="{{ route('posts.create') }}" class="btn btn-purple text-white">Create Post</a>
                    </div>
                    <div class="card border-start border-purple">
                        <div class="card-body p-0">
                            <table class="table table-striped mb-0" style="cursor: default">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $key => $post)
                                        <tr class="align-middle">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <xmp>{!! $post->body !!}</xmp>
                                            </td>
                                            <td>
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-yellow text-white">
                                                    <i class="fa-solid fa-pen-to-square me-1"></i>
                                                    Edit
                                                </a>
                                                <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Do you want to?')" class="btn btn-sm btn-red text-white">
                                                        <i class="fa-solid fa-trash-can me-1"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="fw-bold">No Posts.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if ($posts->hasPages())
                            {{ $posts->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
