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
                <form action="{{ route('terrain.save') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nom_terrain" class="form-label">Nom du terrain</label>
                            <input type="text" class="form-control" name="nom_terrain" id="nom_terrain" placeholder="Terrain ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="superficie_terrain" class="form-label">Superficie</label>
                            <input type="number" class="form-control" name="superficie_terrain" id="superficie_terrain" placeholder="Superficie ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cite_id" class="form-label">Cité</label>
                            <select class="form-control" name="cite_id" id="cite_id">
                                <option value="">---Selectionner le terrain---</option>
                                @foreach($cites as $cite)
                                    <option value="{{ $cite->id }}">{{ $cite->libelle_cite }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                            <span class="px-2"></span>
                            <a href="{{ route('terrain') }}" class="btn btn-outline-danger">annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
