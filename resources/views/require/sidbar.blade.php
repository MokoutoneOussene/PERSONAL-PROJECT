<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Pages</div>
                    <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        TABLEAU DE BORD
                    </a>
                    <hr>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError1" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="users"></i></div>
                        PERSONNEL
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError1" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('gestion_personnel.create') }}">Ajouter personnel</a>
                            <a class="nav-link" href="{{ route('gestion_personnel.index') }}">Liste personnel</a>
                        </nav>
                    </div>
                    <hr>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError33" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="users"></i></div>
                        ENFANTS
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError33" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('gestion_enfant.create') }}">Ajouter un enfant</a>
                            <a class="nav-link" href="{{ route('gestion_enfant.index') }}">Liste des enfants</a>
                        </nav>
                    </div>
                    <hr>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError3" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        CONTRAT
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError3" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('gestion_contrat.create') }}">Signer un contrat</a>
                            <a class="nav-link" href="{{ route('gestion_contrat.index') }}">Liste des contractuels</a>
                        </nav>
                    </div>
                    <hr>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError2" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                        MISSION
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError2" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('gestion_mission.create') }}">Programmer mission</a>
                            <a class="nav-link" href="{{ route('gestion_mission.index') }}">Liste des mission</a>
                        </nav>
                    </div>
                    <hr>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError4" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        DEPENSE
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError4" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('gestion_personnel.create') }}">Ajouter depense</a>
                            <a class="nav-link" href="{{ route('gestion_personnel.index') }}">Liste depenses</a>
                        </nav>
                    </div>
                    <hr>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError5" aria-expanded="false"
                        aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="package"></i></div>
                        PAIEMENT
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError5" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('gestion_paiement.index') }}">Traitement salaire</a>
                            <a class="nav-link" href="{{ route('Generation_plusieurs') }}">Paiement salaire</a>
                            <a class="nav-link" href="{{ route('paies') }}">Liste paiements</a>
                        </nav>
                    </div>
                    <hr>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError7" aria-expanded="false"
                        aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="package"></i></div>
                        INSTITUT BANQUAIRE
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError7" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('gestion_institut_banquaire.index') }}">Gestion des
                                banques</a>
                        </nav>
                    </div>
                    <hr>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError6" aria-expanded="false"
                        aria-controls="pagesCollapseError">
                        <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                        PARAMETRAGE
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError6" data-bs-parent="#accordionSidenavPagesMenu">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('gestion_utilisateur.index') }}">Utilisateurs</a>
                            <a class="nav-link" href="#">Parametre</a>
                        </nav>
                    </div>
                </div>
            </div>
            @if (Auth::user()->photo == '')
                <img class="img-account-profile rounded-circle mb-2" src="{{ asset('images/user-placeholder.svg') }}"
                    alt="logo user" />
            @else
                <img class="img-account-profile m-3"
                    src="{{ asset('storage') . '/' . Auth::user()->photo }}" alt="logo user" />
            @endif
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Utilisateur connecté(e):</div>
                    <div class="sidenav-footer-title">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</div>
                </div>
            </div>
        </nav>
    </div>
