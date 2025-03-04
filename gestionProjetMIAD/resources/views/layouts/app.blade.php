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
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                                    <div class="dropdown-header">Notifications</div>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3 text-primary">
                                                <i class="fas fa-user-plus"></i>
                                            </div>
                                            <div>
                                                <div class="small text-muted">Il y a 3 heures</div>
                                                <div>Nouveau membre a rejoint l'équipe</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3 text-warning">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
                                            <div>
                                                <div class="small text-muted">Il y a 5 heures</div>
                                                <div>Tâche en retard: "Maquette design"</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3 text-success">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div>
                                                <div class="small text-muted">Il y a 1 jour</div>
                                                <div>Projet "E-commerce" complété</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-decoration-none text-secondary" id="userDropdown" data-toggle="dropdown">
                                   
                                    <div>
                                        <div class="font-weight-bold">{{ Auth::user()->name }}</div>
                                        <div class="small">{{ Auth::user()->role->name }}</div>
                                    </div>
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
                
                <!-- Dashboard Content -->
                <div class="main-content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="h3 mb-0">Dashboard</h1>
                            
                            <a class="btn btn-primary" href="{{ route('projects.create') }}">Nouveau projet</a>
                     
                      </div>
                    
                    <!-- Stats Cards Row -->
                    <div class="row">
                       
                        
                        
                    
                    </div>
                    
                    <!-- Projects and Activities Row -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-projects">
                                            <thead>
                                                <tr>
                                                    <th>Projet</th>
                                                    <th>Chef de projet</th>
                                                    <th>Statut</th>
                                                    <th>Progrès</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="font-weight-bold">Site Web E-commerce</div>
                                                        <div class="small text-muted">Client: FashionTech</div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar mr-2 bg-primary text-white">TM</div>
                                                            <div>Thomas M.</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="status-badge bg-success text-white">Terminé</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress flex-grow-1 mr-2">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div>100%</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-secondary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="font-weight-bold">Application Mobile</div>
                                                        <div class="small text-muted">Client: HealthApp</div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar mr-2 bg-info text-white">SL</div>
                                                            <div>Sophie L.</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="status-badge bg-primary text-white">En cours</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress flex-grow-1 mr-2">
                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div>65%</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-secondary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="font-weight-bold">Refonte CRM</div>
                                                        <div class="small text-muted">Client: TechServices</div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar mr-2 bg-warning text-white">JD</div>
                                                            <div>Jean D.</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="status-badge bg-warning text-white">En attente</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress flex-grow-1 mr-2">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div>30%</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-secondary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="font-weight-bold">Campagne Marketing</div>
                                                        <div class="small text-muted">Client: EventPro</div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar mr-2 bg-danger text-white">AM</div>
                                                            <div>Anne M.</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="status-badge bg-danger text-white">En retard</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress flex-grow-1 mr-2">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div>45%</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-secondary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            
                            
                               