@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un livre</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" name="media_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="media_description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="media_type" class="form-label">Type</label>
                                <select class="form-select" id="gender" name="media_type" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="film">Film</option>
                                    <option value="serie">Série</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Url</label>
                                <input type="text" name="media_url" class="form-control">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="media_photo" class="form-label">Image du media</label>
                                <input type="file" class="form-control" name="media_photo" id="image">
                            </div>
                            <div class="form-group">
                                <select name="genre_id" class="custom-select">
                                    <option value=""> --Genre-- </option>
                                    @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary  rounded-pill shadow-sm">
                                Ajouter un media </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection