<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion & Inscription</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }
    
    .auth-container {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 900px;
    }
    
    .auth-sidebar {
      background: linear-gradient(to bottom, #834d9b, #d04ed6);
      color: white;
      padding: 3rem 1.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      overflow: hidden;
      min-height: 100%;
    }
    
    .auth-sidebar::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
      z-index: 0;
    }
    
    .auth-sidebar h3 {
      position: relative;
      z-index: 1;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }
    
    .auth-sidebar p {
      position: relative;
      z-index: 1;
      opacity: 0.8;
    }
    
    .auth-form {
      padding: 3rem 2rem;
    }
    
    .form-control {
      border-radius: 30px;
      padding: 0.75rem 1.5rem;
      background-color: #f8f9fa;
      border: 2px solid transparent;
      transition: all 0.3s;
      margin-bottom: 1rem;
    }
    
    .form-control:focus {
      background-color: #fff;
      border-color: #6a11cb;
      box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
    }
    
    .input-group-text {
      border-radius: 30px 0 0 30px;
      background-color: #f1f1f1;
      border: none;
      padding-left: 1.5rem;
    }
    
    .input-group .form-control {
      border-radius: 0 30px 30px 0;
      margin-bottom: 0;
    }
    
    .auth-form-title {
      font-weight: 700;
      margin-bottom: 2rem;
      color: #6a11cb;
    }
    
    .btn-auth {
      border-radius: 30px;
      padding: 0.75rem 2rem;
      font-weight: 600;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s;
    }
    
    .btn-primary {
      background: linear-gradient(to right, #6a11cb, #2575fc);
      border: none;
    }
    
    .btn-primary:hover {
      background: linear-gradient(to right, #5a0cb6, #1565ec);
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    
    .btn-light {
      background-color: white;
      color: #6a11cb;
      border: 1px solid #dee2e6;
    }
    
    .btn-light:hover {
      background-color: #f8f9fa;
      transform: translateY(-2px);
    }
    
    .auth-separator {
      display: flex;
      align-items: center;
      margin: 1.5rem 0;
    }
    
    .auth-separator hr {
      flex: 1;
      border-color: #dee2e6;
    }
    
    .auth-separator span {
      padding: 0 1rem;
      color: #6c757d;
    }
    
    .social-buttons .btn {
      border-radius: 50%;
      width: 40px;
      height: 40px;
      padding: 0;
      line-height: 40px;
      margin: 0 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .auth-footer {
      margin-top: 1.5rem;
      text-align: center;
      color: #6c757d;
    }
    
    .auth-footer a {
      color: #6a11cb;
      text-decoration: none;
      font-weight: 600;
    }
    
    .nav-tabs {
      border-bottom: none;
      margin-bottom: 2rem;
    }
    
    .nav-tabs .nav-link {
      border: none;
      color: #6c757d;
      font-weight: 600;
      padding: 0.5rem 1rem;
      border-radius: 30px;
      margin-right: 0.5rem;
    }
    
    .nav-tabs .nav-link.active {
      background-color: #6a11cb;
      color: white;
    }
    
    .form-check-label {
      color: #6c757d;
    }
    
    .form-check-input {
      margin-top: 0.3rem;
    }
    
    .floating-shape {
      position: absolute;
      opacity: 0.1;
      z-index: 0;
    }
    
    .shape-1 {
      top: 10%;
      left: 10%;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-color: white;
    }
    
    .shape-2 {
      bottom: 10%;
      right: 10%;
      width: 150px;
      height: 70px;
      border-radius: 30px;
      background-color: white;
    }
    
    @media (max-width: 767.98px) {
      .auth-sidebar {
        padding: 2rem 1rem;
      }
      
      .auth-form {
        padding: 2rem 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="auth-container row no-gutters">
      <div class="col-md-5">
        <div class="auth-sidebar h-100">
          <div class="floating-shape shape-1"></div>
          <div class="floating-shape shape-2"></div>
          <h3>Bienvenue sur notre plateforme</h3>
          <p>Découvrez une expérience utilisateur exceptionnelle avec notre interface innovante et sécurisée.</p>
          <p>Rejoignez notre communauté pour accéder à des fonctionnalités exclusives et personnalisées.</p>
        </div>
      </div>
      <div class="col-md-7">
        <div class="auth-form">
          <ul class="nav nav-tabs" id="authTabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Connexion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Inscription</a>
            </li>
          </ul>
          
          <div class="tab-content" id="authTabsContent">
            <!-- Formulaire de connexion -->
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
              <h4 class="auth-form-title">Connectez-vous à votre compte</h4>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-envelope"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="Adresse email" required>
                </div>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Mot de passe" required>
                </div>
                
                <div class="form-group d-flex justify-content-between align-items-center mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                      Se souvenir de moi
                    </label>
                  </div>
                  <a href="#" class="small">Mot de passe oublié?</a>
                </div>
                
                <button type="submit" class="btn btn-primary btn-auth btn-block">Connexion</button>
              </form>
              
              <div class="auth-separator">
                <hr>
                <span>OU</span>
                <hr>
              </div>
              
              <div class="social-buttons text-center mb-3">
                <button class="btn btn-light"><i class="fab fa-google"></i></button>
                <button class="btn btn-light"><i class="fab fa-facebook-f"></i></button>
                <button class="btn btn-light"><i class="fab fa-twitter"></i></button>
              </div>
              
              <div class="auth-footer">
                <p>Vous n'avez pas de compte? <a href="#" id="showRegister">Créer un compte</a></p>
              </div>
            </div>
            
            <!-- Formulaire d'inscription -->
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
              <h4 class="auth-form-title">Créez votre compte</h4>
              <form>
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="Prénom" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="Nom" required>
                    </div>
                  </div>
                </div>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-envelope"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="Adresse email" required>
                </div>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-phone"></i>
                    </span>
                  </div>
                  <input type="tel" class="form-control" placeholder="Numéro de téléphone">
                </div>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Mot de passe" required>
                </div>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Confirmer le mot de passe" required>
                </div>
                
                <div class="form-group mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="termsAgree" required>
                    <label class="form-check-label" for="termsAgree">
                      J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a>
                    </label>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-auth btn-block">Créer un compte</button>
              </form>
              
              <div class="auth-separator">
                <hr>
                <span>OU</span>
                <hr>
              </div>
              
              <div class="social-buttons text-center mb-3">
                <button class="btn btn-light"><i class="fab fa-google"></i></button>
                <button class="btn btn-light"><i class="fab fa-facebook-f"></i></button>
                <button class="btn btn-light"><i class="fab fa-twitter"></i></button>
              </div>
              
              <div class="auth-footer">
                <p>Vous avez déjà un compte? <a href="#" id="showLogin">Se connecter</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Changer entre les onglets connexion et inscription
      $('#showRegister').click(function(e) {
        e.preventDefault();
        $('#register-tab').tab('show');
      });
      
      $('#showLogin').click(function(e) {
        e.preventDefault();
        $('#login-tab').tab('show');
      });
      
      // Animation des champs du formulaire
      $('.form-control').focus(function() {
        $(this).parent().addClass('focused');
      });
      
      $('.form-control').blur(function() {
        if ($(this).val() === '') {
          $(this).parent().removeClass('focused');
        }
      });
    });
  </script>
</body>
</html>