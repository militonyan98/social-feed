@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="/home/addPost" style="margin: 20px 20px;">
                    @csrf

                    <div class="form-group row">
                    <label for="post_body" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                        </div>

                        <label for="post_body" class="col-md-4 col-form-label text-md-right">{{ __('Tell us what you are thinking...') }}</label>
                        <div class="col-md-6">
                            <textarea id="post_body" rows="4" cols="50" class="form-control @error('post_body') is-invalid @enderror" name="post_body" value="{{ old('post_body') }}" required autocomplete="post_body" autofocus></textarea>
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
                            <div class="card-body"><h3 style="font-weight: bold;"><a href="/home/userPosts/{{$post->user_id}}">{{ $post->name }}</a></h3></div>
                            <div class="card-body" style="margin-top: -20px; margin-bottom: -20px;"><h5 style="color: #414573;">{{ $post->title }}</h5></div>
                            <div class="card-body" style="margin-top: -20px;"><p>{{ $post->post_body }}</p></div>
                            <span class="time_date card-body" style="margin-top: -50px; font-size: .85em; color: dimgray;">{{ $post->created_at }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
