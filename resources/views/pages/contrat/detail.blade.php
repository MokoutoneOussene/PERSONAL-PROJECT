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
                            Fiche du contrat N°: {{ $finds->id }}
                        </h1>
                        <div class="page-header-subtitle mt-4">
                           <br>
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
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Agent</div>
                            <div class="card-body">
                                <!-- Profile picture image-->
                                <div class="d-flex justify-content-center">
                                    @if ($finds->Agent->photo == '')
                                        <img class="img-account-profile mb-2" style="border-radius: 5px"
                                            src="{{ asset('asset/assets/img/demo/user-placeholder.svg') }}" alt="logo user" />
                                    @else
                                        <img class="img-account-profile mb-2" style="border-radius: 5px"
                                            src="{{ asset('storage') . '/' . $finds->Agent->photo }}" alt="logo user" />
                                    @endif
                                </div>
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4 text-center">
                                    <h5>{{ $finds->Agent->nom }} {{ $finds->Agent->prenom }}</h5>
                                    <h5>Matricule : {{ $finds->Agent->matricule }}</h5>
                                </div>
                                <!-- Profile picture upload button-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mt-3">
                        <div class="card mb-4">
                            <div class="card-header">Plus d'actions</div>
                            <div class="list-group list-group-flush small">
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-edit fa-fw text-warning me-2"></i>
                                    Modifier le contrat
                                </a>
                                <a class="list-group-item list-group-item-action" href="{{ url('imprimer_contrat/' . $finds->id) }}" target="_blank">
                                    <i class="fas fa-print fa-fw text-success me-2"></i>
                                    Imprimer le contrat
                                </a>
                                <a class="list-group-item list-group-item-action" href="">
                                    <i class="fas fa-close fa-fw text-danger me-2"></i>
                                    Supprimer le contrat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Detail du contrat</div>
                    <div class="card-body">
                        <table style="width: 100%;">
                            <tr class="border_dotted">
                                <th>Code</th>
                                <td>{{ $finds->code }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Nature</th>
                                <td>{{ $finds->nature }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Statut</th>
                                <td>{{ $finds->statut }}</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Date de signature</th>
                                <td>{{ $finds->date_signature }}</td>
                            </tr>
                        </table>
                        <div class="m-3">
                            <h6 class="text-center text-info">Salaire de base</h6>
                        </div>                           
                        <table style="width: 100%;">
                            <tr class="border_dotted">
                                <th class="text-danger">Salaire de base</th>
                                <td class="text-danger">{{ $finds->sal_base }} fcfa</td>
                            </tr>
                        </table>
                        <div class="m-3">
                            <h6 class="text-center text-info">Indemnités supplémentaires</h6>
                        </div>
                        <table style="width: 100%;">
                            <tr class="border_dotted">
                                <th class="text-danger">Salaire de base</th>
                                <td class="text-danger">{{ $finds->sal_base }} fcfa</td>
                            </tr>
                        </table>
                        <table style="width: 100%;">
                            <tr class="border_dotted">
                                <th>Prime ancienneté</th>
                                <td>{{ $finds->prime_anciennete }} fcfa</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Prime logement</th>
                                <td>{{ $finds->prime_logement }} fcfa</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Prime transport</th>
                                <td>{{ $finds->prime_transport }} fcfa</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Prime divers</th>
                                <td>{{ $finds->prime_divers }} fcfa</td>
                            </tr>
                            <tr class="border_dotted">
                                <th class="text-danger">Total Indemnités supplémentaires</th>
                                <td class="text-danger">{{ $finds->total_indemnite }} fcfa</td>
                            </tr>
                        </table>
                        <div class="m-3">
                            <h6 class="text-center text-info">Salaire brut</h6>
                        </div>
                        <table style="width: 100%;">
                            <tr class="border_dotted">
                                <th class="text-danger">Salaire brut</th>
                                <td class="text-danger">{{ $finds->salaire_brut }} fcfa</td>
                            </tr>
                        </table>
                        <div class="m-3">
                            <h6 class="text-center text-info">Retenues sur salaire</h6>
                        </div>
                        <table style="width: 100%;">
                            <tr class="border_dotted">
                                <th>UITS</th>
                                <td>{{ $finds->uits }} fcfa</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Cotisations sociales salarié</th>
                                <td>{{ $finds->cotisation_sociale }} fcfa</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Impôts</th>
                                <td>{{ $finds->impot }} fcfa</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Avance / prêt reçu</th>
                                <td>{{ $finds->avance_pret }} fcfa</td>
                            </tr>
                            <tr class="border_dotted">
                                <th>Mutuelle payée par l’employé</th>
                                <td>{{ $finds->mutuelle_payee }} fcfa</td>
                            </tr>
                            <tr class="border_dotted">
                                <th class="text-danger">Total retenues sur salaire</th>
                                <td class="text-danger">{{ $finds->total_retenue }} fcfa</td>
                            </tr>
                        </table>
                        <div class="m-3">
                            <h6 class="text-center text-info">Salaire net à payer</h6>
                        </div>
                        <table style="width: 100%;">
                            <tr class="border_dotted">
                                <th class="text-danger">Salaire net</th>
                                <td class="text-danger">{{ $finds->sal_net }} fcfa</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
