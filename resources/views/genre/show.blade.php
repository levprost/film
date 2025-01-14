@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h2 class="display-6 mb-4">Médiathèque</h2>
            
            <div class="d-flex flex-wrap gap-2 mb-3">
                @php
                    $genres = $media->pluck('genre')->unique();
                @endphp
                @foreach($genres as $genre)
                    <a href="#genre-{{ $genre->id }}" 
                       class="btn btn-outline-primary btn-sm rounded-pill">
                        {{ $genre->genre_name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @foreach($genres as $genre)
        <div id="genre-{{ $genre->id }}" class="mb-5">
            <h3 class="h4 mb-4 pb-2 border-bottom">{{ $genre->genre_name }}</h3>
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($media->where('genre.id', $genre->id) as $med)
                    <div class="col">
                        <div class="card h-100 shadow-sm hover-shadow-md transition-all">
                            @if($med->media_photo)
                                <div class="position-relative">
                                    <img src="/storage/uploads/{{$med->media_photo}}" 
                                         class="card-img-top object-fit-cover" 
                                         style="height: 200px;"
                                         alt="{{ $med->media_title }}">
                                    <span class="position-absolute top-0 end-0 m-2 badge bg-dark">
                                        {{ $med->media_type }}
                                    </span>
                                </div>
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <i class="bi bi-film fs-1 text-secondary"></i>
                                </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $med->media_title }}</h5>
                                <p class="card-text text-secondary small">
                                    {{ Str::limit($med->media_description, 100) }}
                                </p>
                                <div class="mt-auto pt-3">
                                    <a href="{{ $med->media_url }}" 
                                       class="btn btn-primary btn-sm w-100"
                                       target="_blank">
                                        <i class="bi bi-box-arrow-up-right me-1"></i>
                                        Voir le média
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@endsection