<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Data Master</title>
    <link rel="stylesheet" href="../../CSS/admin.css">
  </head>

  <body>
    @include('Partials.navbar-admin')
    <main>
      <div class="button-container">
        <div class="menu-box">
          <a href="{{ route('Admin.daftar-user') }}">Data User</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('Admin.daftar-manajemen-role') }}">Manajemen Role</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('Admin.daftar-jenis-hewan') }}">Jenis Hewan</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('Admin.daftar-ras-hewan') }}">Ras Hewan</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('Admin.daftar-pemilik') }}">Data Pemilik</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('Admin.daftar-pet') }}">Data Pet</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('Admin.daftar-kategori') }}">Data Kategori</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('Admin.daftar-kategori-klinis') }}">Data Kategori Klinis</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('Admin.daftar-tindakan-terapi') }}">Data Tindakan Terapi</a>
        </div>
      </div>
    </main>
  </body>