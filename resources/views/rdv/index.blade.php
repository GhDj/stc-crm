@extends('layouts.app')

@section('content')
    <div class="container shadow rounded-2 p-0">
    <h3 class="modal-title p-3">Liste des rendez-vous</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date & Heure</th>
                    <th scope="col">Prospect</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Status</th>
                </tr>
                <tbody>
                @forelse($rdvs as $rdv)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $rdv->date }} à {{ $rdv->time }}</td>
                        <td>{{ $rdv->prospect()->first()->raison_sociale }}</td>
                        <td> {{ $rdv->rvp }}</td>
                        <td> {{ $rdv->status }}</td>
                    </tr>
                @empty
                    <tr></tr>
                @endforelse
                </tbody>
            </table>


        <div class="row">
            {{ $rdvs->links() }}
        </div>

    </div>
@endsection
