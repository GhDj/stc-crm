@extends('layouts.app')

@section('content')
    <div class="container shadow rounded-2 p-0">


        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-light">
                    <h2>Status des rendez-vous</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Status</td>
                                <td>Supprimer</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($status as $s)
                                <tr>
                                    <td>{{ $s->id }}</td>
                                    <td>{{ $s->status }}</td>
                                    <td>
                                        <form action="{{ route('status.destroy', ['id' => $s->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn text-danger" > <i class="bi-x-square-fill"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h5>Pas de status pour les rendez-vous</h5>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Ajotuer status</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('status.store') }}" method="post">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                                        <label for="floatingInput">Status</label>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-lg text-light my-2 w-100"><i
                                            class="bi-plus-lg"></i> Ajouter status
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>


    </div>
@endsection
