@extends('layouts.app')

@section('content')
    <div class="container shadow rounded-2 p-0">

        <div class="card">
            <div class="card-header bg-success text-light">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title-t">{{ $rdv->prospect()->first()->raison_sociale }}</h3>
                        <h4 class="card-subtitle text-black-50">{{ $rdv->prospect()->first()->nom }} {{ $rdv->prospect()->first()->prenom }}</h4>

                    </div>
                    <div class="col-4 my-1 p-2 text-end">
                        <h5 class="p-2"><i class="bi-person-circle"></i> {{ $rdv->user()->first()->name }}</h5>
                    </div>
                </div>


            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="list-group">
                            <a href="http://www.societe.com/cgi-bin/search?champs={{ $rdv->prospect()->first()->SIREN }}" class="list-group-item list-group-item-action py-3" aria-current="true" target="_blank">
                                <b>SIREN :</b> <span class="text-muted">{{ $rdv->prospect()->first()->SIREN }}</span> <i class="bi-info-circle-fill"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Raison Sociale :</b> <span class="text-muted">{{ $rdv->prospect()->first()->raison_sociale }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Professions :</b> <span class="text-muted">{{ $rdv->prospect()->first()->professions }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Nom & Prénom :</b> <span class="text-muted">{{ $rdv->prospect()->first()->civilite }} {{ $rdv->prospect()->first()->nom }} {{ $rdv->prospect()->first()->prenom }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Rôle :</b> <span class="text-muted">{{ $rdv->prospect()->first()->role }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Adresse :</b> <span class="text-muted">{{ $rdv->prospect()->first()->adresse }} - {{ $rdv->prospect()->first()->ville }} {{ $rdv->prospect()->first()->code_postal }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Tél :</b> <span class="text-muted">{{ $rdv->prospect()->first()->tel }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Fixe :</b> <span class="text-muted">{{ $rdv->prospect()->first()->fixe }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Email :</b> <span class="text-muted">{{ $rdv->prospect()->first()->mail }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Année de création :</b> <span class="text-muted">{{ $rdv->prospect()->first()->annee_de_creation }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3 disabled"><b>Forme légale :</b> <span class="text-muted">{{ $rdv->prospect()->first()->form_legale }}</span></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="list-group">

                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Date :</b> <span class="text-muted">{{ $rdv->date }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Heure :</b> <span class="text-muted">{{ $rdv->time }} </span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Responsable :</b> <span class="text-muted">{{ $rdv->rvp }} </span></a>
                            <a class="list-group-item list-group-item-action py-3"><b>Status :</b> <span class="text-muted">{{ $status_rdv }}</span>
                            <form action="{{ route('manager.rdv.update', ['id' => $rdv->id]) }}" method="post" class="mt-2">
                            @csrf
                                @method('put')
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Changer Status RDV" name="status">
                                        <option>Changer le status</option>
                                        @forelse($status as $s)
                                            <option value="{{ $s->id }}" @if($rdv->status == $s->id) selected @endif>{{ $s->status }}</option>
                                        @empty
                                            <option>Demander à l'admin d'ajouter des status</option>
                                        @endforelse
                                   {{--     <option value="en_attente">En attente</option>
                                        <option value="conforme">Conforme</option>
                                        <option value="non_conforme">Non conforme</option>
                                        <option value="valid_decisionnaire">Valid décisionnaire</option>
                                        <option value="valid_budget">Valid budget</option>
                                        <option value="verrou_interet">Verrou intérêt</option>
                                        <option value="verro_creneau">Verrou créneau (durée/date)</option>
                                        <option value="verro_compréhension">Verrou compréhension</option>
                                        <option value="gratuite">Gratuité</option>
                                        <option value="renouvellement">Renouvellement</option>--}}
                                    </select>
                                    <label for="floatingSelect">Changer le status</label>
                                </div>
                                <button type="submit" class="btn btn-info btn-lg text-light my-2 w-100"> <i class="bi-check"></i> Changer le status</button>
                            </form></a>
                        </div>
                        <div class="card my-3">
                            <div class="card-header">
                                <h5 class="card-title">Notes</h5>
                                <div class="list-group my-2">
                                    @forelse($rdv->notes as $note)
                                    <a href="#" class="list-group-item list-group-item-action py-3">
                                        <span class="text-muted">{{ $note->note }}
                                    </a>
                                    @empty
                                        <b>Pas de note</b>
                                    @endforelse
                                </div>
                                <form action="{{ route('manager.note.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $rdv->id }}" name="rdv_id">
                                    <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                                    <div class="form-floating">
                                    <textarea class="form-control" placeholder="Ajouter note" id="note" name="note" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Ajouter note</label>
                                   </div>
                                    <button type="submit" class="btn btn-primary btn-lg text-light my-2 w-100"> <i class="bi-plus-lg"></i> Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                </div>

        </div>

    </div>
@endsection
