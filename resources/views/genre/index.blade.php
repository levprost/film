@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des catégories</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->
                        <table class="table">
                                @foreach($genres as $genre)
                                <tr>
                                    <td>{{$genre->genre_name}}</td>
                                    @if(Auth::user() && Auth::user()->role === 'admin')
                                    <td>
                                        <a href="{{ route('genres.edit', $genre->id)}}" class="btn btn-primary btn-sm">Editer</a> 
                                        <form action="{{ route('genres.destroy', $genre->id)}}" method="POST" style="display: inline-block"> 
                                            @csrf 
                                            @method('DELETE') 
                                            <button class="btn btn-danger btn-sm" type=" submit">Supprimer</button> 
                                        </form> 
                                    </td>
                                    @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection