@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <h3 class="col-md-11">{{ $userPosts[0]->name }}</h3>
                    <a class="btn btn-primary col-md-1" href="/home">Back</a>
                </div>
                </div>

                <div class="container" style="margin: 20px 20px; width:auto;">
                    @foreach ($userPosts as $post)
                        <div class="card" style="margin: 10px 10px">
                            <div class="card-body"><p>{{ $post->post_body }}</p></div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>


@endsection