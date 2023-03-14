@extends('layouts.layoutperso')

@section('content')
    <section class="py-5">
        <div class="container text-center py-5">
            <h3>Liste des agences</h3>
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
                    {{ $agences->links() }}
                    <div><a href="{{ route('agence.create') }}" class="btn bg-white text-dark btn-sm"><i class="fa-solid fa-circle-plus"></i> Ajout</a></div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agences as $agence)
                            <tr>
                                <th scope="row">{{ $agence->id }}</th>
                                <td>{{ $agence->libelle_agence }}</td>
                                <td>{{ $agence->adresse_agence }}</td>
                                <td>{{ $agence->tel_agence }}</td>
                                <td>
                                    <a href="{{ route('agence.edit', ['agence' => $agence->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#"><i class="fa-solid fa-trash-can" onclick="if(confirm('Vous-voulez vraiment supprimer cette agence ?')){document.getElementById('form-{{ $agence->id }}').submit() }"></i></a>
                                    <form id="form-{{ $agence->id }}" action="{{ route('agence.delete', ['agence' => $agence->id]) }}" method="post">
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
