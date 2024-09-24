@extends('layouts.master')

@section('content')
    <header class="page-header page-header-dark pb-10"
        style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            LISTE DES MISSIONS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="{{ route('gestion_mission.create') }}" class="btn btn-success">
                                Ajouter une nouvelle mission
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <div class="form-control ps-0 pointer">
                                {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->

    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div
                            style="background: linear-gradient(90deg, rgb(160, 240, 195) 0%, rgb(237, 237, 163) 100%); border-radius: 5px;">
                            <form action="" method="GET">
                                <div class="d-flex justify-content-end mb-3">
                                    <div class="col-3 m-2">
                                        <label>Date debut</label>
                                        <input class="form-control" name="date_debut" type="date" required />
                                    </div>
                                    <div class="col-3 m-2">
                                        <label>Date fin</label>
                                        <input class="form-control" name="date_fin" type="date" required />
                                    </div>
                                    <div class="col-1 m-2 pt-4">
                                        <button type="submit" class="btn btn-success">Filtrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Objet</th>
                                    <th>Date debut</th>
                                    <th>Date fin</th>
                                    <th>Lieu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->lib }}</td>
                                        <td>{{ $item->date_debut }}</td>
                                        <td>{{ $item->date_fin }}</td>
                                        <td>{{ $item->lieu }}</td>
                                        <td class="text-center">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#missionDetailsModal{{ $item->id }}">
                                                <i class="me-2 text-green" data-feather="eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Modals pour chaque mission -->
                        @foreach ($collection as $item)
                            <div class="modal fade" id="missionDetailsModal{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="missionDetailsModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="missionDetailsModalLabel{{ $item->id }}">
                                                Détails de la mission: {{ $item->lib }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="text-center m-3"><strong class="text-danger">Information de la mission:</strong></h6>
                                                    <table class="table table-striped table-bordered" style="width: 100%;">
                                                        <tr>
                                                            <th>Code</th>
                                                            <td>{{ $item->code }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Intitulé de la mission</th>
                                                            <td>{{ $item->lib }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Consigne</th>
                                                            <td>{{ $item->consigne }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date début</th>
                                                            <td>{{ $item->date_debut }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date de signature</th>
                                                            <td>{{ $item->date_signature }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date fin</th>
                                                            <td>{{ $item->date_fin }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Lieu</th>
                                                            <td>{{ $item->lieu }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="text-center m-3"><strong class="text-danger">Personnels associés:</strong></h6>
                                                    <ul>
                                                        @foreach ($item->personnels as $personnel)
                                                                <table class="table table-striped table-bordered" style="width: 100%;">
                                                                    <tr>
                                                                        <th>Nom</th>
                                                                        <td>{{ $personnel->nom }} {{ $personnel->prenom }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Role</th>
                                                                        <td>{{ $personnel->fonction }}</td>
                                                                    </tr>
                                                                </table>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Ajouter ici d'autres champs pertinents si nécessaire -->
                                        </div>
                                        <div class="modal-footer">
                                            <div class="mt-3">
                                                <button type="button" class="btn btn-success">Fiche de la mission</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
