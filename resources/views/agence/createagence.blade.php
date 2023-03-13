@extends('layouts.layoutperso')

@section('content')
    <div class="container">
        <div class="container text-center py-5">
            <h3>Nouvelle agence</h3>
        </div>
        <section>
            <div class="container bg-dark py-5">
                <section>
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </section>
                <form action="{{ route('agence.save') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="libelle_agence" class="form-label">Nom de l'Agence</label>
                            <input type="text" class="form-control" name="libelle_agence" id="libelle_agence" placeholder="Agence ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="adresse_agence" class="form-label">Adresse de l'Agence</label>
                            <input type="text" class="form-control" name="adresse_agence" id="adresse_agence" placeholder="Adresse ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tel_agence" class="form-label">Téléphone de l'Agence</label>
                            <input type="text" class="form-control" name="tel_agence" id="tel_agence" placeholder="Téléphone ... ">
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                            <span class="px-2"></span>
                            <a href="{{ route('agence') }}" class="btn btn-outline-danger">annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
