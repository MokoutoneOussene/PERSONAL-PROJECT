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
                            MODIFICATION DE L'AGENT N° {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="{{ route('gestion_personnel.index') }}">
                                Liste des agents
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
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Tabbed dashboard card example-->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="sbp-preview-content">
                                            {{-- si un formulaire contient une image il faut ajouter enctype="multipart/form-data" --}}
                                            <form method="POST" action="{{ route('gestion_personnel.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="p-2 m-1"
                                                    style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                    <h3 class="m-2 text-center text-danger">Veuillez renseigner les
                                                        informations de l'agent
                                                    </h3>
                                                    <p class="mb-5">NB: les champs ayant des * en couleur rouge sont
                                                        obligatoires </p>
    
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>N° sécurité sociale<span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="num_secu_social" value="{{ $finds->num_secu_social }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Nom<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="nom" value="{{ $finds->nom }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Prénom<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="prenom" value="{{ $finds->prenom }}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Date de maissance</label>
                                                                <input class="form-control" type="date" name="date_nais" value="{{ $finds->date_nais }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Lieu de naissance</label>
                                                                <input class="form-control" type="text" name="lieunais" value="{{ $finds->lieunais }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Sexe</label>
                                                                <select name="genre" class="form-control">
                                                                    <option value="Masculin">Masculin</option>
                                                                    <option value="Feminin">Feminin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Résidence</label>
                                                                <input class="form-control" type="text" name="residence" value="{{ $finds->residence }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Date d'embauche<span class="text-danger">*</span></label>
                                                                <input class="form-control" type="date" name="date_embauche" value="{{ $finds->date_embauche }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Catégorie</label>
                                                                <select name="categorie" class="form-control">
                                                                    <option value="cat1">cat1</option>
                                                                    <option value="cat2">cat2</option>
                                                                    <option value="cat3">cat3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Téléphone</label>
                                                                <input class="form-control" type="number" name="telephone" value="{{ $finds->telephone }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Groupe sanguin</label>
                                                                <select name="grou_sang" class="form-control">
                                                                    <option value="AB+">AB+</option>
                                                                    <option value="AB-">AB-</option>
                                                                    <option value="A+">A+</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Père</label>
                                                                <input class="form-control" type="text" name="pere" value="{{ $finds->pere }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Mère</label>
                                                                <input class="form-control" type="text" name="mere" value="{{ $finds->mere }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Personne à prévenir</label>
                                                                <input class="form-control" type="text" name="perso_prevenir" value="{{ $finds->perso_prevenir }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Tel Personne à prévenir</label>
                                                                <input class="form-control" type="number" name="tele_perso_prevenir" value="{{ $finds->tele_perso_prevenir }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Province</label>
                                                                <input class="form-control" type="text" name="province" value="{{ $finds->province }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Situation atrimoniale</label>
                                                                <input class="form-control" type="text" name="matrimoniale" value="{{ $finds->matrimoniale }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Fonction</label>
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
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Email</label>
                                                                <input class="form-control" type="email" name="email" value="{{ $finds->email }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>N° CNIB ou Passport</label>
                                                                <input class="form-control" type="text" name="num_cnib" value="{{ $finds->num_cnib }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Date d'établissement</label>
                                                                <input class="form-control" type="date" name="date_cnib" value="{{ $finds->date_cnib }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Lieu d'établissement</label>
                                                                <input class="form-control" type="text" name="lieu_cnib" value="{{ $finds->lieu_cnib }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Nbre enfants</label>
                                                                <input class="form-control" type="number" name="nbre_enfant" value="{{ $finds->nbre_enfant }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Charge UITS</label>
                                                                <input class="form-control" type="text" name="charge_uts" value="{{ $finds->charge_uts }}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formValidationBackdrop">Modifier</button>
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
    </div>
@endsection
