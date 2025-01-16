@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="mb-4 text-center">Bienvenue sur notre collection de médias</h2>

            <!-- Секция: Новые медиа -->
            <section class="mb-5">
                <h3 class="mb-4">Nouveaux Médias</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($media->sortByDesc('created_at') as $med)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            @if($med->media_photo)
                            <img src="/storage/uploads/{{$med->media_photo}}" class="card-img-top" alt="Image de {{ $med->media_title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $med->media_title }}</h5>
                                <p class="card-text"><strong>Catégorie:</strong> {{ $med->genre->name }}</p>
                                <p class="card-text"><strong>Type:</strong> {{ ucfirst($med->media_type) }}</p>
                                <p class="card-text text-muted">{{ Str::limit($med->media_description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Секция: Фильмы -->
            <section class="mb-5">
                <h3 class="mb-4">Films</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($media->where('media_type', 'film') as $film)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            @if($film->media_photo)
                            <img src="/storage/uploads/{{$film->media_photo}}" class="card-img-top" alt="Image de {{ $film->media_title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $film->media_title }}</h5>
                                <p class="card-text"><strong>Catégorie:</strong> {{ $film->genre->name }}</p>
                                <p class="card-text text-muted">{{ Str::limit($film->media_description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Секция: Сериалы -->
            <section>
                <h3 class="mb-4">Séries</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($media->where('media_type', 'serie') as $serie)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            @if($serie->media_photo)
                            <img src="/storage/uploads/{{$serie->media_photo}}" class="card-img-top" alt="Image de {{ $serie->media_title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $serie->media_title }}</h5>
                                <p class="card-text"><strong>Catégorie:</strong> {{ $serie->genre->name }}</p>
                                <p class="card-text text-muted">{{ Str::limit($serie->media_description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
