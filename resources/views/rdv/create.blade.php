@extends('layouts.app')

@section('content')
    <div class="container p-0 mb-5 rounded">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ajouter Rendez-vous</h3>

                    </div>
                    <div class="card-body p-3">
                        <form action="{{ route('agent.rdv.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="prospect_id" value="{{ $prospect->id }}">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <div class="row">


                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nom" placeholder="{{ $prospect->nom }}" value="{{ $prospect->nom }}" name="nom" readonly>
                                        <label for="nom">Nom</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">

                                        <input type="text" class="form-control" id="prenom" placeholder="{{ $prospect->prenom }}" name="prenom" value="{{ $prospect->prenom }}" readonly>
                                        <label for="prenom">Prénom</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-floating">

                                        <input type="email" class="form-control" id="mail" placeholder="mail" name="{{ $prospect->mail }}" value="{{ $prospect->mail }}" readonly>
                                        <label for="mail">Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-floating">
                                        <input type="date" class="form-control datepicker" id="dateRDV" name="time"/>
                                        <label for="dateRDV" class="form-label">Selectionner date</label>

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-floating">
                                        <input type="time" class="form-control datepicker" id="timeRDV" name="date"/>
                                        <label for="timeRDV" class="form-label">Selectionner l'heure</label>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="adresse" placeholder="Adresse" name="adresse" readonly value="{{ $prospect->adresse }} - {{ $prospect->ville }} {{ $prospect->code_postal }}">
                                        <label for="adresse">Adresse</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group d-flex" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="radio" class="btn-check" id="opportunite" autocomplete="off" name="agent" value="opportunite">
                                        <label class="btn btn-outline-primary btn-lg" for="opportunite">Opportunité</label>

                                        <input type="radio" class="btn-check" id="page_jaune" autocomplete="off" name="agent" value="page_jaune">
                                        <label class="btn btn-outline-warning btn-lg" for="page_jaune">Pages jaunes</label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <div class="form-floating d-none" id="selectAgentOppo">
                                        <select class="form-select" id="selectOppo" aria-label="Choisir le responsable" name="oppo">
                                            <option selected disabled>Sélectionner</option>
                                            <option value="Mme Margaux Planchon--0636416078">Mme Margaux Planchon</option>
                                            <option value="Mme Coralie Graziano--0771144162">Mme Coralie Graziano</option>
                                            <option value="Mme Océane Martucci -- 0771666463">Mme Océane Martucci</option>
                                            <option value="Mr Loic Nissas -- 0771666463">Mr Loic Nissas</option>
                                            <option value="Mme Celia Duchamps -- 0771167448">Mme Celia Duchamps</option>
                                            <option value="Mme Léa Duby -- 0771835722">Mme Léa Duby</option>
                                            <option value="Mme Mégane Rollin -- 0750515301">Mme Mégane Rollin</option>
                                            <option value="Mr David Mescolini -- 0784982430">Mr David Mescolini</option>
                                            <option value="Mr Pierre-Antoine Touchard -- 0636416554">Mr Pierre-Antoine Touchard</option>
                                        </select>
                                        <label for="selectOppo">Choisir le responsable</label>

                                    </div>
                                    <div class="form-floating d-none" id="selectAgentPj">
                                        <select class="form-select" id="selectPj" aria-label="Choisir le responsable" name="selectPj">
                                            <option selected disabled>Sélectionner</option>
                                            <option value="Mr Thomas Cabrero -- 0693557246">Mr Thomas Cabrero</option>
                                            <option value="Mr Romain Moinet -- 0771714423">Mr Romain Moinet</option>
                                            <option value="Mr Gaetan De Macedo -- 0636416213">Mr Gaetan De Macedo</option>
                                            <option value="Mr Michael Riclafe -- 0771279904">Mr Michael Riclafe</option>
                                            <option value="Mme Julie Berry -- 0771854332">Mme Julie Berry</option>
                                            <option value="Mr Imad Louafi -- 0784967940">Mr Imad Louafi</option>
                                            <option value="Mme Jennifer Barrere -- 0771639377">Mme Jennifer Barrere</option>
                                            <option value="Mme Camille Potiez -- 0693557246">Mme Camille Potiez</option>
                                            <option value="Mme Sarah Chevallier -- 0771757389">Mme Sarah Chevallier</option>
                                            <option value="Mme Belma Kunic -- 0750515305">Mme Belma Kunic</option>
                                            <option value="Mme Sarah Amzaib -- 0636416483">Mme Sarah Amzaib</option>
                                            <option value="Mme Candice Brosson -- 0771666463">Mme Candice Brosson</option>
                                            <option value="Mme Victoria Touron -- 0771241644">Mme Victoria Touron</option>
                                            <option value="Mme Sophie Blanc">Mme Sophie Blanc</option>
                                            <option value="Mme Sarah Poullard">Mme Sarah Poullard</option>
                                            <option value="Mr Romain Moreau -- 0771101898">Mr Romain Moreau</option>
                                            <option value="Mr Pierre-antoine Touchard">Mr Pierre-antoine Touchard</option>
                                            <option value="Mme Marion Benedetto -- 0771103933">Mme Marion Benedetto</option>
                                            <option value="Mr Marie Chiara -- 0636416529">Mr Marie Chiara</option>


                                        </select>
                                        <label for="selectPj">Choisir le responsable</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-lg w-100">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Prospect</h3>
                    </div>
                    <div class="card-body p-3">

                        <div class="list-group">
                           <a href="http://www.societe.com/cgi-bin/search?champs={{ $prospect->SIREN }}" class="list-group-item list-group-item-action py-3" aria-current="true" target="_blank">
                               <b>SIREN :</b> <span class="text-muted">{{ $prospect->SIREN }}</span> <i class="bi-info-circle-fill"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Raison Sociale :</b> <span class="text-muted">{{ $prospect->raison_sociale }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Nom & Prénom :</b> <span class="text-muted">{{ $prospect->nom }} {{ $prospect->prenom }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Adresse :</b> <span class="text-muted">{{ $prospect->adresse }} - {{ $prospect->ville }} {{ $prospect->code_postal }}</span></a>
                            <a class="list-group-item list-group-item-action py-3"><b>Tél :</b> <span class="text-muted">{{ $prospect->tel }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script
    src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
@endsection
