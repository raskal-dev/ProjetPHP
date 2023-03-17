@extends('layouts.layoutperso')

@section('content')
    <div class="container">
        <div class="container text-center py-5">
            <h3>Modification du logement</h3>
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
                <form action="{{ route('logement.update', ['logement' => $logement->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="num_logement" class="form-label">Num Logement</label>
                            <input type="text" class="form-control" name="num_logement" id="num_logement" value="{{ $logement->num_logement }}" placeholder="Num Logement ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="prix_logement" class="form-label">Prix</label>
                            <input type="number" class="form-control" name="prix_logement" id="prix_logement" value="{{ $logement->prix_logement }}" placeholder="Prix ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="type_vente" class="form-label">Cité</label>
                            <select class="form-control" name="type_vente" id="type_vente">
                                <option value=""></option>
                                    @if($logement->type_vente == "Chèque")
                                        <option value="Chèque" selected>Chèque</option>
                                        <option value="Cash">Cash</option>
                                    @else
                                        <option value="Chèque">Chèque</option>
                                        <option value="Cash" selected>Cash</option>
                                    @endif
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="terrain_id" class="form-label">Cité</label>
                            <select class="form-control" name="terrain_id" id="terrain_id">
                                <option value=""></option>
                                @foreach($terrains as $terrain)
                                    @if($terrain->id == $logement->terrain_id)
                                        <option value="{{ $terrain->id }}" selected>{{ $terrain->nom_terrain }}</option>
                                    @else
                                        <option value="{{ $terrain->id }}">{{ $terrain->nom_terrain }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-outline-primary">Mettre à jour</button>
                            <span class="px-2"></span>
                            <a href="{{ route('logement') }}" class="btn btn-outline-danger">annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
