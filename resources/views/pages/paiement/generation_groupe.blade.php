@extends('layouts.master')
@section('content')
    <header class="page-header page-header-dark pb-10"
        style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            Génération de paiement pour plusieurs agents
                        </h1>
                        <div class="page-header-subtitle mt-4">
                            <br>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
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
        <div class="row m-3">
            <div class="col-lg-12 col-md-12">
                <div class="card lift h-100"
                    style="background: linear-gradient(90deg, rgb(181, 233, 233) 0%, rgb(251, 252, 252) 100%);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center text-center">
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-2">
                                    <h6 class="text-uppercase">total salaire brut</h6>
                                    <div class="text-muted small">
                                        <h1 class="text-primary mt-5" style="font-size: 20px; font-weight: bold;">
                                            {{ $total_brut }} FCFA</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-2">
                                    <h6 class="text-uppercase">Total iuts</h6>
                                    <div class="text-muted small">
                                        <h1 class="text-primary mt-5" style="font-size: 20px; font-weight: bold;">
                                            {{ $total_iuts }} FCFA</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-2">
                                    <h6 class="text-uppercase">Total cnss</h6>
                                    <div class="text-muted small">
                                        <h1 class="text-primary mt-5" style="font-size: 20px; font-weight: bold;">
                                            {{ $total_cnss }} FCFA</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <form action="{{url("generation_paiement_groupe")}}" method="POST">
        @csrf
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Tabbed dashboard card example-->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div>
                                @if (count(session("allready")??[])!=0)
                                    <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                                        <p>Les matricules suivants ont déjà été payés à cette période, choisissez une autre période: </p>
                                        @foreach(session("allready") as $mat)
                                            <p><strong>{{ $mat }}</strong></p>
                                        @endforeach
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row m-2" style="border: 2px solid rgb(48, 56, 126); border-radius: 5px;">
                                        <input class="form-control" type="text" name="contrats_id" hidden />
                                        <div class="col-lg-4 col-md-12 mt-2">
                                            <div class="mb-3">
                                                <label>Date du paiement<span class="text-danger">*</span></label>
                                                <input class="form-control" type="date" name="date" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mt-2">
                                            <div class="mb-3">
                                                <label>Mode paie<span class="text-danger">*</span></label>
                                                <select name="mode_paie" class="form-control">
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Virement">Virement</option>
                                                    <option value="Espece">Espece</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mt-2">
                                            <div class="mb-3">
                                                <label>Période<span class="text-danger">*</span></label>
                                                <select name="periode_paie" class="form-control">
                                                    <option value="01">1er au 31 Janvier</option>
                                                    <option value="02">1er au 29 Févier</option>
                                                    <option value="03">1er au 30 Mars</option>
                                                    <option value="04">1er au 31 Avril</option>
                                                    <option value="05">1er au 30 Mai</option>
                                                    <option value="06">1er au 31 Juin</option>
                                                    <option value="07">1er au 30 Juillet</option>
                                                    <option value="08">1er au 31 Aout</option>
                                                    <option value="09">1er au 30 Septembre</option>
                                                    <option value="10">1er au 31 Octobre</option>
                                                    <option value="11">1er au 30 Novembre</option>
                                                    <option value="12">1er au 31 Decembre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label>Année<span class="text-danger">*</span></label>
                                                <select name="annee_paie" class="form-control">
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label>Institution banquaire<span class="text-danger">*</span></label>
                                                <select name="istitut_banks_id" class="form-control">
                                                    @foreach ($banques as $item)
                                                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->libelle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-2">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formValidationBackdrop">Générer le paiement</button>
                                        </div>
                                        @include('require.validationModal')
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>N° CNIB</th>
                                                <th>Nom</th>
                                                <th>Genre</th>
                                                <th>Catégorie</th>
                                                <th>Fonction</th>
                                                <th>Selectionner</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($collection as $item)
                                                <tr>
                                                    <td>{{ $item->Agent->matricule }}</td>
                                                    <td>{{ $item->Agent->num_cnib }}</td>
                                                    <td>{{ $item->Agent->nom }} {{ $item->Agent->prenom }}</td>
                                                    <td>{{ $item->Agent->genre }}</td>
                                                    <td>{{ $item->Agent->categorie }}</td>
                                                    <td>{{ $item->Agent->fonction }}</td>
                                                    <td class="text-center">
                                                        <input name="contrat[]" class="form-check-input" type="checkbox" value="{{$item->id}}">
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
            </div>
        </div>
    </form>
@endsection