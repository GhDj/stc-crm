@extends('layouts.app')

@section('content')
    <div class="container shadow rounded-2 p-0">
        <h3 class="modal-title p-3">Prospects</h3>
        <div class="container">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Raison Sociale</th>
                    <th scope="col">Siren</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Rendez-vous</th>
                </tr>
                <tbody>
                @forelse($prospects as $prospect)

                    <tr>

                        <th scope="row">
                            <a href="{{ route('manager.prospect.show', ['id' => $prospect->id ]) }}">{{ $loop->iteration }}</a>
                        </th>
                        <td>{{ $prospect->raison_sociale }}</td>
                        <td>{{ $prospect->SIREN }}</td>
                        <td> {{ $prospect->nom }} {{ $prospect->prenom }}</td>
                        <td> {{ $prospect->ville }}</td>
                        <td> @if(!empty($prospect->rdv()->first()))
                            {{ $prospect->rdv()->first()->date }} {{ $prospect->rdv()->first()->status }}
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr></tr>
                @endforelse
                </tbody>
            </table>
        </div>



        <div class="row">
            {{ $prospects->links() }}
        </div>

    </div>
@endsection
