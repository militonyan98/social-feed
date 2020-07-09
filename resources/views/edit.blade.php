@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <h3 class="col-md-11">Edit Post</h3>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('update') }}" style="margin: 20px 20px;">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-group row">
                    <label for="post_body" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}" style="color: black"  required autocomplete="title" autofocus>
                        </div>

                        <label for="post_body" class="col-md-4 col-form-label text-md-right">{{ __('Tell us what you are thinking...') }}</label>
                        <div class="col-md-6">
                            <textarea id="post_body" rows="4" cols="50" class="form-control @error('post_body') is-invalid @enderror" name="post_body" style="color: black" required autocomplete="post_body" autofocus>{{$post->post_body}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" value="Update" name="Update" class="btn btn-primary">
                                <a class="btn btn-primary" href="/home">Cancel</a>
                            </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection