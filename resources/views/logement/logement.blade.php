@extends('layouts.layoutperso')

@section('content')
    <section class="py-5">
        <div class="container text-center py-5">
            <h3>Liste des logements</h3>
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
                    {{ $logements->links() }}
                    <div><a href="{{ route('logement.create') }}" class="btn bg-white text-dark btn-sm"><i class="fa-solid fa-circle-plus"></i> Ajout</a></div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Num Logement</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Terrain</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logements as $logement)
                            <tr>
                                <th scope="row">{{ $logement->id }}</th>
                                <td>{{ $logement->num_logement }}</td>
                                <td>{{ $logement->prix_logement }} Ariary</td>
                                <td>{{ $logement->terrain->nom_terrain }}</td>
                                <td>{{ $logement->type_vente }}</td>
                                <td>
                                    <a href="{{ route('logement.edit', ['logement' => $logement->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#"><i class="fa-solid fa-trash-can" onclick="if(confirm('Vous-voulez vraiment supprimer cet logement ?')){document.getElementById('form-{{ $logement->id }}').submit() }"></i></a>
                                    <form id="form-{{ $logement->id }}" action="{{ route('logement.delete', ['logement' => $logement->id]) }}" method="post">
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

