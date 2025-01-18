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
        @if($final_note)
        <p>{{ $final_note }}</p>
        @endif

       
        <h3>Episodes:</h3>
        <ul>
            @foreach($episodes->where('media_id', $media->id) as $ep)
            <li>
                <h4>{{ $ep->episode_name }} {{ $ep->episode_nmbr }}</h4>
            </li>
            @endforeach
        </ul>
       

        <!-- Добавление отзывов -->
        @foreach($note as $note)
        <div class="col-12 mt-2">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Commentaires :</h6>
                    <p class="card-text text-secondary">{{ $note->comment }}</p>
                    <p>{{ $note->note_nmbr }}</p>

                    <form action="{{ route('note.destroy', $note->id)}}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="mt-4">
            <h4>Оставить комментарий</h4>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @method('PATCH')
            @csrf
            <!---->
            <form method="post" action="{{ route('note.store') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="comment"></textarea>
                    <input type="hidden" name="media_id" value="{{ $media->id }}" />
                </div>
                <label for="note_nmbr" class="form-label">Оценка</label>
                <select name="note_nmbr" id="note_nmbr" class="form-control">
                    <option value="">Выберите оценку</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                </select>
                @error('note_nmbr')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add Comment" />
                </div>
            </form>


        </div>

        @endforeach
    </div>
</div>

@endsection