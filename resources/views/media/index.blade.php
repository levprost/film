@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center w-100 h-100 back">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="fw-light text-white m-1">Bienvenue sur notre collection de médias</h1>
        <h2 class="fw-light text-white m-1">HypeTrain de la semaine:</h2>
        @if($mediaFirst)
        <!-- Top 1 media -->
        <div class="container my-4 p-4 rounded bg-dark">
            <div class="row align-items-center">
                <!-- Image -->
                <div class="col-md-3 text-center">
                    <img src="/storage/uploads/{{$mediaFirst->media_photo}}"
                        class="rounded shadow-sm"
                        alt="Image de {{ $mediaFirst->media_title }}"
                        style="height: 350px; width: 250px; object-fit: cover;">
                </div>

                <!-- info -->
                <div class="col-md-9">
                    <h1 class="fw-bold text-white">{{ $mediaFirst->media_title }}</h1>
                    <p class="text-white-50 mb-4">{{ $mediaFirst->media_description }}</p>

                    <!-- Ratings -->
                    <div class="d-flex align-items-center">
                        <div>
                            @for ($i = 1; $i <= round($topMedia->average_rating); $i++)
                                <span style="color: gold; font-size: 1.5rem;">&#9733;</span> {{-- star --}}
                                @endfor
                                @for ($i = round($topMedia->average_rating) + 1; $i <= 5; $i++)
                                    <span style="color: lightgray; font-size: 1.5rem;">&#9733;</span> {{-- Star --}}
                                    @endfor
                        </div>
                        <p class="ms-3 text-white-50 mb-0">Note moyenne: {{ round($topMedia->average_rating, 1) }}</p>
                    </div>
                </div>
            </div>
        </div>

        @endif
    </div>

</div>
<div class="container py-5">


    <!-- Films -->
    <section class="mb-5">
        <h3 class="mb-4">Films</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($media->where('media_type', 'film') as $film)
            <div class="col">
                <div class="card h-100 shadow-sm" id="media-{{ $film->id }}">
                    @if($film->media_photo)
                        <img src="/storage/uploads/{{$film->media_photo}}"
                             class="card-img-top"
                             alt="Image de {{ $film->media_title }}"
                             style="height: 300px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $film->media_title }}</h5>
                        <p class="card-text"><strong>Genre:</strong> {{ $film->genre->genre_name }}</p>
                        <p class="card-text text-muted">{{ Str::limit($film->media_description, 100) }}</p>
                        <p>Average Rating:
                            @php
                                $note = $noteMedia->firstWhere('media_id', $film->id);
                                $averageRating = $note ? $note->average_rating : 0;
                            @endphp
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $averageRating ? 'filled' : '' }}">&#9733;</span>
                                @endfor
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>

    <!-- Series -->
    <section>
        <h3 class="mb-4">Séries</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($media->where('media_type', 'serie') as $serie)
            <div class="col">
                <div class="card h-100 shadow-sm" id="media-{{ $serie->id }}">
                    @if($serie->media_photo)
                        <img src="/storage/uploads/{{$serie->media_photo}}"
                             class="card-img-top"
                             alt="Image de {{ $serie->media_title }}"
                             style="height: 300px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $serie->media_title }}</h5>
                        <p class="card-text"><strong>Genre:</strong> {{ $serie->genre->genre_name }}</p>
                        <p class="card-text text-muted">{{ Str::limit($serie->media_description, 100) }}</p>
                        <p>Average Rating:
                            @php
                                $note = $noteMedia->firstWhere('media_id', $serie->id);
                                $averageRating = $note ? $note->average_rating : 0;
                            @endphp
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $averageRating ? 'filled' : '' }}">&#9733;</span>
                                @endfor
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
</div>
</div>
</div>