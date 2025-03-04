<!-- resources/views/dashboard/index.blade.php -->
@extends('layouts.app')

@section('title', 'Tableau de Bord - Gestion de Projet')

@section('content')
    @include('profile.partials.dashboard_header')
    
    <!-- Cartes statistiques -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-stats primary h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="icon-circle bg-primary text-white rounded-circle p-3">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <h5 class="card-title text-uppercase text-muted mb-0">Projets</h5>
                            <span class="h2 font-weight-bold mb-0"></span>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Depuis le mois dernier</span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Répétez pour les autres cartes statistiques -->
        <!-- ... -->
    </div>
    
    <!-- Résumé des projets récents -->
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                    <h6 class="mb-0">Projets récents</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Projet</th>
                                <th>Client</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Autres widgets du dashboard -->
        <!-- ... -->
    </div>
