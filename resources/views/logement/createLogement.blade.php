@extends('layouts.layoutperso')

@section('content')
    <div class="container">
        <div class="container text-center py-5">
            <h3>Nouvelle cité</h3>
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
                <form action="{{ route('logement.save') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="num_logement" class="form-label">Num du Logement</label>
                            <input type="text" class="form-control" name="num_logement" id="num_logement" placeholder="Num ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="prix_logement" class="form-label">Prix</label>
                            <input type="number" class="form-control" name="prix_logement" id="prix_logement" placeholder="Prix ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="terrain_id" class="form-label">Terrain</label>
                            <select class="form-control" name="terrain_id" id="terrain_id">
                                <option value="">---Selectionner le terrain---</option>
                                @foreach($terrains as $terrain)
                                    <option value="{{ $terrain->id }}">{{ $terrain->nom_terrain }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="type_vente" class="form-label">Type de pyement</label>
                            <select class="form-control" name="type_vente" id="type_vente">
                                <option value="Cash">Cash</option>
                                <option value="Chèque">Chèque</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                            <span class="px-2"></span>
                            <a href="{{ route('logement') }}" class="btn btn-outline-danger">annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
