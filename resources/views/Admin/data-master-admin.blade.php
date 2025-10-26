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
          <a href="{{ route('daftar-user') }}">Data User</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('daftar-manajemen-role') }}">Manajemen Role</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('daftar-jenis-hewan') }}">Jenis Hewan</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('daftar-ras-hewan') }}">Ras Hewan</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('daftar-pemilik') }}">Data Pemilik</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('daftar-pet') }}">Data Pet</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('daftar-kategori') }}">Data Kategori</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('daftar-kategori-klinis') }}">Data Kategori Klinis</a>
        </div>
        <div class="menu-box">
          <a href="{{ route('daftar-tindakan-terapi') }}">Data Tindakan Terapi</a>
        </div>
      </div>
    </main>
  </body>