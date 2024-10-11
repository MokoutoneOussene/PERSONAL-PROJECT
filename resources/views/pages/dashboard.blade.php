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
                            TABLEAU DE BORD
                        </h1>
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
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Nombre des agents</div>
                                <div class="text-lg fw-bold">{{ $agents->count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="user"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="">Voir plus</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Nombre de contrats</div>
                                <div class="text-lg fw-bold">{{ $contrats->count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="calendar"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="">Voir plus</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Total des missions</div>
                                <div class="text-lg fw-bold">{{ $missions->count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="home"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="">Voir plus</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Total des depenses</div>
                                <div class="text-lg fw-bold">{{ $depenses->count() }}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="home"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="">Voir plus</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Example Charts for Dashboard Demo-->
        <div class="row mb-3">
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
                                            85415241 FCFA</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-2">
                                    <h6 class="text-uppercase">Total iuts</h6>
                                    <div class="text-muted small">
                                        <h1 class="text-primary mt-5" style="font-size: 20px; font-weight: bold;">
                                            88454854 FCFA</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="mb-2">
                                    <h6 class="text-uppercase">Total cnss</h6>
                                    <div class="text-muted small">
                                        <h1 class="text-primary mt-5" style="font-size: 20px; font-weight: bold;">
                                            88454854 FCFA</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Agent concerné</th>
                                    <th>Motif</th>
                                    <th>Montant depense</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($depenses as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->date_encaissement }}</td>
                                        <td>{{ $item->location}}</td>
                                        <td>{{ $item->adresse }}</td>
                                        <td>{{ $item->montant }}</td>
                                        <td>{{ $item->periode }}</td>
                                        <td class="text-center">
                                            <a class="text-center"
                                                href="">
                                                <i class="me-2 text-green" data-feather="eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-9 col-md-6 p-3" style="background: rgb(50, 49, 49)">
                                <h4 class="text-light"><strong>TOTAL</strong></h4>
                            </div>
                            <div class="col-lg-3 col-md-6 p-3 bg-danger">
                                <h4 class="text-light"><strong>{{ $total }} FCFA</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
