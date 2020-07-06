@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <form method="POST" action="/home/addPost" style="margin: 20px 20px;">
                    @csrf

                    <div class="form-group row">
                        <label for="post_body" class="col-md-4 col-form-label text-md-right">{{ __('Tell us what you are thinking...') }}</label>

                        <div class="col-md-6">
                            <input id="post_body" type="text" class="form-control @error('post_body') is-invalid @enderror" name="post_body" value="{{ old('post_body') }}" required autocomplete="post_body" autofocus>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Post') }}
                                </button>
                            </div>
                    </div>
                </form>

                <!-- show posts -->
                <div>
                    @foreach ($posts as $post)
                    <div class="container" style="margin: 20px 20px; width:auto;">
                        <div class="card">
                            <div class="card-body"><h3><a href="/home/userPosts/{{$post->user_id}}">{{ $post->name }}</a></h3></div>
                            <div class="card-body"><p>{{ $post->post_body }}</p></div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
