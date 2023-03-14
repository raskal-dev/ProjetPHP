@extends('layouts.layoutperso')

@section('content')
    <div class="container">
        <div class="container text-center py-5">
            <h3>Modification du Terrain</h3>
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
                <form action="{{ route('terrain.update', ['terrain' => $terrain->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nom_terrain" class="form-label">Terrain</label>
                            <input type="text" class="form-control" name="nom_terrain" id="nom_terrain" value="{{ $terrain->nom_terrain }}" placeholder="Terrain ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="superficie_terrain" class="form-label">Superficie</label>
                            <input type="number" class="form-control" name="superficie_terrain" id="superficie_terrain" value="{{ $terrain->superficie_terrain }}" placeholder="Superficie ... ">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cite_id" class="form-label">Cité</label>
                            <select class="form-control" name="cite_id" id="cite_id">
                                <option value=""></option>
                                @foreach($cites as $cite)
                                    @if($cite->id == $terrain->cite_id)
                                        <option value="{{ $cite->id }}" selected>{{ $cite->libelle_cite }} / {{ $cite->adresse_cite }}</option>
                                    @else
                                        <option value="{{ $cite->id }}">{{ $cite->libelle_cite }} / {{ $cite->adresse_cite }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-outline-primary">Mettre à jour</button>
                            <span class="px-2"></span>
                            <a href="{{ route('terrain') }}" class="btn btn-outline-danger">annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
