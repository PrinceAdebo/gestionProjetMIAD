<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Dashboard - Gestion de Projets</title>
    
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Votre style personnalisé (inclus ci-dessous) -->
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
        }
        
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: #fff;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .sidebar .brand-logo {
            height: 70px;
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 0.25rem;
            margin: 0.2rem 0.5rem;
            padding: 0.8rem 1rem;
            transition: all 0.2s;
        }
        
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-weight: 500;
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 18px;
        }
        
        .main-content {
            padding: 20px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .card-stats {
            min-height: 130px;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
        }
        
        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .bg-primary-light {
            background-color: rgba(78, 115, 223, 0.1);
            color: #4e73df;
        }
        
        .bg-success-light {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .bg-info-light {
            background-color: rgba(23, 162, 184, 0.1);
            color: #17a2b8;
        }
        
        .bg-warning-light {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }
        
        .progress {
            height: 8px;
            border-radius: 10px;
        }
        
        .table-projects th, .table-projects td {
            padding: 15px 20px;
            vertical-align: middle;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #6c757d;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .recent-activities .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .recent-activities .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .dropdown-menu {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border: none;
        }
        
        .custom-control-input:checked ~ .custom-control-label::before {
            border-color: #4e73df;
            background-color: #4e73df;
        }
        
        .topbar {
            height: 70px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .search-bar input {
            border-radius: 20px;
            padding-left: 40px;
            background-color: #f8f9fa;
            border: none;
        }
        
        .search-bar i {
            position: absolute;
            left: 15px;
            top: 10px;
            color: #6c757d;
        }
        
        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="brand-logo d-flex align-items-center">
                    <i class="fas fa-project-diagram mr-2"></i>
                    <h4 class="mb-0">PROJET-MIAD1</h4>
                </div>
                <div class="mt-4">
                    <p class="text-white-50 ml-3 mb-1">MENU</p>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-tasks"></i> Projets
                            </a>
                            <!-- Exemple de sous-menu -->
                            <a class="dropdown-item" href="{{ route('projects.index') }}">Liste des projets</a>
                            <a class="dropdown-item" href="{{ route('projects.create') }}">Nouveau projet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-clipboard-list"></i> Tâches
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-users"></i> Équipe
                            </a>
                        </li>
                    </ul>
                    
                    <p class="text-white-50 ml-3 mb-1 mt-4">PARAMÈTRES</p>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user-cog"></i> Profil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-cog"></i> Configuration
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <!-- Top Bar -->
                <div class="row bg-white topbar align-items-center m-0">
                    <div class="col-md-6">
                        <div class="search-bar position-relative">
                            <i class="fas fa-search"></i>
                            <input type="text" class="form-control" placeholder="Rechercher...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <div class="dropdown mr-3">
                                <!-- Exemple de zone de notifications si besoin -->
                            </div>
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-decoration-none text-secondary" id="userDropdown" data-toggle="dropdown">
                                    @auth
                                        <div>
                                            <div class="font-weight-bold">{{ Auth::user()->name }}</div>
                                            {{-- Si vous avez un rôle unique : --}}
                                            @if(Auth::user()->role)
                                                <div class="small">{{ Auth::user()->role->name }}</div>
                                            @endif
                                        </div>
                                    @endauth
                                    <i class="fas fa-chevron-down ml-2"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">Mon Profil</a>
                                    <a class="dropdown-item" href="#">Paramètres</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Déconnexion</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Ici, on injecte le contenu dynamique -->
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts JS (jQuery, Popper, Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    
</body>
</html>
