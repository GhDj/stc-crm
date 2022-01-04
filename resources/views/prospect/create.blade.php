@extends('layouts.app')

@section('content')
    <div class="container shadow p-0 mb-5 rounded">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ajouter prospect</h3>

                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-warning" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('agent.prospect.store') }}" class="row align-items-center" method="post">
                            @csrf
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="SIREN" name="SIREN" placeholder="SIREN" required>
                                    <label for="SIREN">SIREN</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="raison_sociale" name="raison_sociale"
                                           placeholder="Raison sociale" required>
                                    <label for="raison_sociale">Raison sociale</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="professions" name="professions"
                                           placeholder="Professions" required>
                                    <label for="professions">Professions</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label=".form-select-lg example" name="civilite">
                                        <option selected disabled>Civilité</option>
                                        <option value="MONSIEUR">MONSIEUR</option>
                                        <option value="MADAME">MADAME</option>
                                    </select>
                                    <label for="floatingSelect">Sélectionner civilité</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                                    <label for="nom">Nom</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="prenom" name="prenom"
                                           placeholder="Prénom" required>
                                    <label for="nom">Prénom</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="role" name="role"
                                           placeholder="Rôle" required>
                                    <label for="role">Rôle</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="adresse" name="adresse"
                                           placeholder="Adresse" required>
                                    <label for="adresse">Adresse</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="code_postal" name="code_postal"
                                           placeholder="Code postal" required>
                                    <label for="code_postal">Code postal</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ville" name="ville"
                                           placeholder="Ville" required>
                                    <label for="ville">Ville</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="tel" name="tel"
                                           placeholder="Portable" required>
                                    <label for="tel">Ville</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="fixe" name="fixe"
                                           placeholder="Fixe" required>
                                    <label for="fixe">Fixe</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="mail" name="mail"
                                           placeholder="Adresse E-mail" required>
                                    <label for="mail">Adresse E-mail</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="annee_de_creation" name="annee_de_creation"
                                           placeholder="Année de création">
                                    <label for="annee_de_creation">Année de création</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="form_legale" name="form_legale"
                                           placeholder="Forme légale">
                                    <label for="mail">Forme légale</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg  text-white w-100"><i class="bi-check-lg"></i> Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
