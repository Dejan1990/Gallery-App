@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach($albums as $album)
                @foreach($album->albumimages as $img)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{ asset('images') }}/{{ $img->image }}" data-lightbox="photos">
                        <img src="{{ asset('images') }}/{{ $img->image }}" class="img-thumbnail">
                    </a>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card-body">
            @foreach($albums as $album)
                <p>
                    <h2>{{ $album->name }}</h2>
                </p>
                <p>{{ $album->description }}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection