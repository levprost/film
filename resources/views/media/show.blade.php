@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row ">
        @foreach($media as $media)       
            <div class="col">
                <div class=" shadow-sm border-light rounded-3">
                    @if($media->media_photo)
                        <div class="position-relative">
                            <img src="/storage/uploads/{{$media->media_photo}}" 
                                 class="card-img-top object-fit-cover" 
                                 style="height: 200px; object-position: center;" 
                                 alt="{{ $media->media_title }}">
                            <span class="position-absolute top-0 end-0 m-2 badge bg-dark">
                                {{ $media->media_type }}
                            </span>
                        </div>
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" 
                             style="height: 200px;">
                            <i class="bi bi-film fs-1 text-secondary"></i>
                        </div>
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate">{{ $media->media_title }}</h5>
                        <p class="card-text text-secondary small">
                            {{ Str::limit($media->media_description, 100) }}
                        </p>

                        <div class="mt-auto pt-3">
                            <a href="{{ $media->media_url }}" 
                               class="btn btn-primary btn-sm w-100"
                               target="_blank">
                                <i class="bi bi-box-arrow-up-right me-1"></i>
                                Voir le média
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Добавление отзывов -->
            @foreach($note as $note)
                <div class="col-12 mt-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title text-muted">Commentaires :</h6>
                            <p class="card-text text-secondary">{{ Str::limit($note->comment, 100) }}</p>
                            <a href="#" class="btn btn-link btn-sm">Lire plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>

@endsection
