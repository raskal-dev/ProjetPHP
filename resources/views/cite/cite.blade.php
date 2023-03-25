@extends('layouts.layoutperso')

@section('content')
    <section class="py-5">
        <div class="container text-center py-5">
            <h3>Liste des cités</h3>
        </div>
        <section>
            <div class="container bg-dark py-5">

                <section>
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            <h3>{{ session()->get('success') }}</h3>
                        </div>
                    @elseif (session()->has("errordelete"))
                        <div class="alert alert-danger">
                            <h4>{{ session()->get('errordelete') }}</h4>
                        </div>
                    @endif
                </section>

                <div class="d-flex justify-content-between" mb-4>
                    {{ $cites->links() }}
                    <div><a href="{{ route('cite.create') }}" class="btn bg-white text-dark btn-sm"><i class="fa-solid fa-circle-plus"></i> Ajout</a></div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Code postal</th>
                            <th scope="col">Agence / Adresse</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cites as $cite)
                            <tr>
                                <th scope="row">{{ $cite->id }}</th>
                                <td>{{ $cite->libelle_cite }}</td>
                                <td>{{ $cite->adresse_cite }}</td>
                                <td>{{ $cite->code_postal_cite }}</td>
                                <td>{{ $cite->agence->libelle_agence }} / {{ $cite->agence->adresse_agence }}</td>
                                <td>
                                    <a href="{{ route('cite.edit', ['cite' => $cite->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="#"><i class="fa-solid fa-trash-can" onclick="if(confirm('Vous-voulez vraiment supprimer cette cite ?')){document.getElementById('form-{{ $cite->id }}').submit() }"></i></a>
                                    <form id="form-{{ $cite->id }}" action="{{ route('cite.delete', ['cite' => $cite->id]) }}" method="post">
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
