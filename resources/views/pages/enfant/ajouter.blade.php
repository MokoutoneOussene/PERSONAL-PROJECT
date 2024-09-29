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
                            GESTION DES ENFANTS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="{{ route('gestion_enfant.index') }}">
                                Liste générale des enfants
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
                            {{-- <form action="{{ route('perso_filter') }}" method="GET">
                                <div class="d-flex justify-content-end mb-3">
                                    <div class="col-3 m-2">
                                        <label>Selectionner une fonction</label>
                                        <select name="fonction" class="form-control">
                                            <option value="Responsable HSE">Responsable HSE</option>
                                            <option value="Superviseur">Superviseur</option>
                                            <option value="Mécanicien">Mécanicien</option>
                                            <option value="Foreur">Foreur</option>
                                            <option value="Aide foreur">Aide foreur</option>
                                            <option value="Assistant HSE">Assistant HSE</option>
                                            <option value="Aide Mécanicien">Aide Mécanicien</option>
                                            <option value="Secretaire">Secretaire</option>
                                            <option value="Comptable">Comptable</option>
                                        </select>
                                    </div>
                                    <div class="col-1 m-2 pt-4">
                                        <button type="submit" class="btn btn-success">Actualiser</button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Genre</th>
                                    <th>Catégorie</th>
                                    <th>date embauche</th>
                                    <th>Résidence</th>
                                    <th>Téléphone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->matricule }}</td>
                                        <td>{{ $item->nom }} {{ $item->prenom }}</td>
                                        <td>{{ $item->genre }}</td>
                                        <td>{{ $item->categorie }}</td>
                                        <td>{{ $item->date_embauche }}</td>
                                        <td>{{ $item->residence }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td>

                                            {{-- <div class="dropdown">
                                                <button class="btn dropdown-toggle w-100" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li>
                                                        <a class="dropdown-item" href="">Editer</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="">Supprimer</a>
                                                    </li>
                                                </ul>
                                            </div> --}}

                                            <div class="d-flex">
                                                <a class="text-center"
                                                    href="{{ route('gestion_enfant.index', [$item->id]) }}"
                                                    class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#formLocataireBackdrop">
                                                    <i class="me-2 text-green" data-feather="plus"></i>
                                                </a>
                                                @include('pages.enfant.modalenfant')

                                                <a class="text-center" href="{{ route('gestion_enfant.show', [$item->id]) }}">
                                                    <i class="me-2 text-green" data-feather="eye"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
