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
                            GESTION DU PERSONNEL
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
                                                    <p class="mb-5">NB: les champs ayant des * en couleur rouge sont obligatoires </p>

                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>N° sécurité sociale <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text"
                                                                    name="num_secu_social" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Nom <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="nom" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Prénoms <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="prenom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Date de maissance</label>
                                                                <input class="form-control" type="date"
                                                                    name="date_nais" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Genre</label>
                                                                <select name="genre" class="form-control">
                                                                    <option value="Masculin">Masculin</option>
                                                                    <option value="Feminin">Feminin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Résidence</label>
                                                                <input class="form-control" type="text"
                                                                    name="residence" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Date d'embauche <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="date"
                                                                    name="date_embauche" />
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
                                                                <input class="form-control" type="number"
                                                                    name="telephone" />
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
                                                                <input class="form-control" type="text" name="pere" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Mère</label>
                                                                <input class="form-control" type="text"
                                                                    name="mere" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Personne à prévenir</label>
                                                                <input class="form-control" type="text"
                                                                    name="perso_prevenir" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Tel PP</label>
                                                                <input class="form-control" type="number"
                                                                    name="tele_perso_prevenir" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Lieu de naissance</label>
                                                                <input class="form-control" type="text"
                                                                    name="lieunais" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Province</label>
                                                                <input class="form-control" type="text"
                                                                    name="province" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Matrimoniale</label>
                                                                <input class="form-control" type="text"
                                                                    name="matrimoniale" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Date résiliation contrat</label>
                                                                <input class="form-control" type="date"
                                                                    name="date_resiliation" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Fonction</label>
                                                                <input class="form-control" type="text"
                                                                    name="fonction" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Email</label>
                                                                <input class="form-control" type="email"
                                                                    name="email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Contrat</label>
                                                                <input class="form-control" type="text"
                                                                    name="contrat" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>N° CNIB ou Passport</label>
                                                                <input class="form-control" type="text"
                                                                    name="num_cnib" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Date d'établissement</label>
                                                                <input class="form-control" type="date"
                                                                    name="date_cnib" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Lieu d'établissement</label>
                                                                <input class="form-control" type="text"
                                                                    name="lieu_cnib" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Nbre enfants</label>
                                                                <input class="form-control" type="number"
                                                                    name="nbre_enfant" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Charge UITS</label>
                                                                <input class="form-control" type="text"
                                                                    name="charge_uts" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label>Photo</label>
                                                                <input class="form-control" type="file" name="photo" required/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-3">
                                                        <button type="submit"
                                                            class="btn btn-success">Enregistrer</button>
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
