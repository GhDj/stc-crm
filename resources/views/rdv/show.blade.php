@extends('layouts.app')

@section('content')
    <div class="container shadow rounded-2 p-0">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title-t">{{ $rdv->prospect()->first()->raison_sociale }}</h3>
                <h4 class="card-subtitle text-muted">{{ $rdv->prospect()->first()->nom }} {{ $rdv->prospect()->first()->prenom }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="list-group">
                            <a href="http://www.societe.com/cgi-bin/search?champs={{ $rdv->prospect()->first()->SIREN }}" class="list-group-item list-group-item-action py-3" aria-current="true" target="_blank">
                                <b>SIREN :</b> <span class="text-muted">{{ $rdv->prospect()->first()->SIREN }}</span> <i class="bi-info-circle-fill"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Raison Sociale :</b> <span class="text-muted">{{ $rdv->prospect()->first()->raison_sociale }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Nom & Prénom :</b> <span class="text-muted">{{ $rdv->prospect()->first()->nom }} {{ $rdv->prospect()->first()->prenom }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Adresse :</b> <span class="text-muted">{{ $rdv->prospect()->first()->adresse }} - {{ $rdv->prospect()->first()->ville }} {{ $rdv->prospect()->first()->code_postal }}</span></a>
                            <a class="list-group-item list-group-item-action py-3"><b>Tél :</b> <span class="text-muted">{{ $rdv->prospect()->first()->tel }}</span></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="list-group">

                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Date :</b> <span class="text-muted">{{ $rdv->date }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Heure :</b> <span class="text-muted">{{ $rdv->time }} </span></a>
                            <a href="#" class="list-group-item list-group-item-action py-3"><b>Responsable :</b> <span class="text-muted">{{ $rdv->rvp }} </span></a>
                            <a class="list-group-item list-group-item-action py-3"><b>Status :</b> <span class="text-muted">{{ $rdv->status }}</span></a>
                        </div>
                    </div>
                </div>

                    <div class="card my-3">
                        <div class="card-header">
                            <h5 class="card-title">Notes</h5>

                        </div>
                    </div>
                </div>

        </div>

    </div>
@endsection
