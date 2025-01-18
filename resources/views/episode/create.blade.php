@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un episode</h3>
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
                        <form method="POST" action="{{ route('episode.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" name="episode_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Numero</label>
                                <input type="text" name="episode_nmbr" class="form-control">
                            </div>
                            <div class="form-group">
                                <select name="media_id" class="custom-select">
                                    <option value=""> --Nom de media-- </option>
                                    @foreach($media as $media)
                                    <option value="{{ $media->id }}">{{ $media->media_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary  rounded-pill shadow-sm">
                                Ajouter un episode </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection