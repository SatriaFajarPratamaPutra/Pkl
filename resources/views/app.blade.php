<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .sidebar {
      background-color: #f8f9fa;
      min-height: 100vh;
      width: 300px;
      padding: 1rem;
      border-right: 1px solid #ddd;
    }
    .profile-box {
      background-color: #DBEAD5;
      border: 1px solid #0BAF6A;
      border-radius: 9px;
      padding: 15px;
      text-align: center;
      margin-bottom: 20px;
      width: 200px;
      height: 200px;
      margin-left: 40px;
    }
    .nav{
    background-color: #DBEAD5;
      border: 1px solid #0BAF6A;
      border-radius: 9px;
      padding: 15px;
      text-align: center;
      margin-bottom: 20px;
      width: 200px;
      height: 250px;
      margin-left: 40px;
      font-family: 'Nunito',
    }
    .nav-link {
     color: #15400E;
    }

    .nav-link:hover {
    color: #15400E;
    background-color: white;
    border-radius: 9px;
    }

    .profile-box img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
    }
    .card-custom {
      background: linear-gradient(to right, #0BAF6A, #5BE584);
      color: white;
    }
    .sub-divisi {
      background: linear-gradient(to right, #0BAF6A, #5BE584);
      color: white;}
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 sidebar">
      <div class="text-center mb-3">
        <img src="{{ asset('images/logo.png') }}" class="img-fluid mb-2" style="height: 80px;" alt="Logo">
      </div>
      <div class="profile-box">
        <img src="{{ asset('images/admin.jpg') }}" alt="Admin">
        <h5>Admin</h5>
        <p>Divisi 1 Sumatra</p>
      </div>
      <nav class="nav flex-column">
        <a class="nav-link" href="{{ url('/beranda') }}"><img src="{{ asset('images/beranda.png') }}" alt="Profil Icon" style="width: 13px; height: 13px; margin-right: 7px; margin-bottom:5px;">Beranda</a>
        <a class="nav-link" href="{{ url('/anggota') }}"><img src="{{ asset('images/user.png') }}" alt="Profil Icon" style="width: 13px; height: 13px; margin-right: 7px; margin-bottom:5px;">Anggota</a>
        <a class="nav-link" href="{{ url('/divisi') }}"><img src="{{ asset('images/grup.png') }}" alt="Profil Icon" style="width: 13px; height: 13px; margin-right: 7px; margin-bottom:5px;">Sub Divisi</a>
        <a class="nav-link" href="{{ url('/profil') }}"><img src="{{ asset('images/Vector.png') }}" alt="Profil Icon" style="width: 13px; height: 13px; margin-right: 7px; margin-bottom:5px;">Ubah Sandi</a>
        <a class="nav-link" href="{{ url('/') }}"><img src="{{ asset('images/keluar.png') }}" alt="Profil Icon" style="width: 13px; height: 13px; margin-right: 7px; margin-bottom:5px;">Keluar</a>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="col-md-9 p-4">
      @yield('content')
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
