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
                            LISTE DES UTILISATEURS DU SYSTEME
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="{{ route('gestion_personnel.create') }}"
                                class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formLocataireBackdrop">
                                Ajouter un utilisateur
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
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Nom d'utilisateur</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->login }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight{{ $item->id }}"
                                                aria-controls="offcanvasRight">
                                                <i class="me-2 text-green text-center" data-feather="eye"></i>
                                            </a>
                                        </td>
                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight{{ $item->id }}"
                                            aria-labelledby="offcanvasRightLabel">
                                            <div class="offcanvas-header">
                                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body">
                                                <div class="col-xl-12">
                                                    <div class="card mb-4">
                                                        <div class="card-header">Plus sur l'agent N°: {{ $item->id }}</div>
                                                        <div class="list-group list-group-flush small">
                                                            <a class="list-group-item list-group-item-action" href="#">
                                                                <i class="fas fa-eye fa-fw text-success me-2"></i>
                                                                Detail de l'utilisateur
                                                            </a>
                                                            <a class="list-group-item list-group-item-action" href="#">
                                                                <i class="fas fa-edit fa-fw text-warning me-2"></i>
                                                                Modifier l'utilisateur
                                                            </a>
                                                            <a class="list-group-item list-group-item-action" href="{{ url('delete_user/' . $item->id) }}">
                                                                <i class="fas fa-close fa-fw text-danger me-2"></i>
                                                                Supprimer l'utilisateur
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="formLocataireBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un nouveau utilisateur
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabbed dashboard card example-->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('gestion_utilisateur.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="p-2 m-1"
                                                style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                <h3 class="m-2 text-center text-danger">Veuillez renseigner les
                                                    informations de l'agent
                                                </h3>
                                                <p class="mb-5">NB: les champs ayant des * en couleur rouge sont
                                                    obligatoires </p>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Nom<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="nom" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Email<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="email" name="email" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Login</label>
                                                            <input class="form-control" type="text" name="login" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Password</label>
                                                            <input class="form-control" type="password" name="password" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Role</label>
                                                            <select name="role" class="form-control">
                                                                <option value="Admin">Admin</option>
                                                                <option value="User">User</option>
                                                                <option value="Agent traitant">Agent traitant</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formValidationBackdrop">Enregistrer</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                                @include('require.validationModal')
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
