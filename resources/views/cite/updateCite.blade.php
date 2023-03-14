@extends('layouts.layoutperso')

@section('content')
    <div class="container">
        <div class="container text-center py-5">
            <h3>Modification de la cité</h3>
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
                <form action="{{ route('cite.update', ['cite' => $cite->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="libelle_cite" class="form-label">Nom de la Cité</label>
                            <input type="text" class="form-control" name="libelle_cite" id="libelle_cite" value="{{ $cite->libelle_cite }}" placeholder="Cité ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="adresse_cite" class="form-label">Adresse de la Cité</label>
                            <input type="text" class="form-control" name="adresse_cite" id="adresse_cite" value="{{ $cite->adresse_cite }}" placeholder="Adresse ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="code_postal_cite" class="form-label">Code postal</label>
                            <input type="text" class="form-control" name="code_postal_cite" id="code_postal_cite" value="{{ $cite->code_postal_cite }}" placeholder="Téléphone ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="agence_id" class="form-label">Agence</label>
                            <select class="form-control" name="agence_id" id="agence_id">
                                <option value=""></option>
                                @foreach($agences as $agence)
                                    @if($agence->id == $cite->agence_id)
                                        <option value="{{ $agence->id }}" selected>{{ $agence->libelle_agence }} / {{ $agence->adresse_agence }}</option>
                                    @else
                                        <option value="{{ $agence->id }}">{{ $agence->libelle_agence }} / {{ $agence->adresse_agence }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-outline-primary">Mettre à jour</button>
                            <span class="px-2"></span>
                            <a href="{{ route('cite') }}" class="btn btn-outline-danger">annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
