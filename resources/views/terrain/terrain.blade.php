@extends('layouts.layoutperso')

@section('content')
    <section class="py-5">
        <div class="container text-center py-5">
            <h3>Liste des Terrains</h3>
        </div>
        <section>
            <div class="container bg-dark py-5">

                <section>
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            <h3>{{ session()->get('success') }}</h3>
                        </div>
                    @endif
                </section>

                <div class="d-flex justify-content-between" mb-4>
                    {{ $terrains->links() }}
                    <div><a href="{{ route('terrain.create') }}" class="btn bg-white text-dark btn-sm"><i class="fa-solid fa-circle-plus"></i> Ajout</a></div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Superficie</th>
                            <th scope="col">Cité / Adresse</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terrains as $terrain)
                            <tr>
                                <th scope="row">{{ $terrain->id }}</th>
                                <td>{{ $terrain->nom_terrain }}</td>
                                <td>{{ $terrain->superficie_terrain }} m²</td>
                                <td>{{ $terrain->cite->libelle_cite }} / {{ $terrain->cite->adresse_cite }}</td>
                                <td>
                                    <a href="{{ route('terrain.edit', ['terrain' => $terrain->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#"><i class="fa-solid fa-trash-can" onclick="if(confirm('Vous-voulez vraiment supprimer cet terrain ?')){document.getElementById('form-{{ $terrain->id }}').submit() }"></i></a>
                                    <form id="form-{{ $terrain->id }}" action="{{ route('terrain.delete', ['terrain' => $terrain->id]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </section>
    </section>
@endsection

