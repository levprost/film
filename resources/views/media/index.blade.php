@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <h3 class="mb-4">Liste des Media</h3>

                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($media as $med)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            @if($med->media_photo)
                            <img src="/storage/uploads/{{$med->media_photo}}" class="card-img-top" alt="Image de {{ $med->media_title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <p class="card-text"><strong>Catégorie:</strong> {{ $med->genre->name }}</p>
                                <p class="card-text"><strong>URL:</strong> {{ $med->media_url }}</p>
                                <p class="card-text"><strong>Type:</strong> {{ $med->media_type }}</p>
                                <h5 class="card-title">{{ $med->media_title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($med->media_description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection