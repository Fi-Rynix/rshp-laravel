
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dashboard Dokter</title>
    <link rel="stylesheet" href="{{asset ('CSS/dashboard.css')}}">
  </head>

  <body>
    @include('partials.navbar-admin')
    <main>
      <h1>Selamat datang, {{ Auth::user()->nama }}!</h1>
      <p>Anda login sebagai {{ session('role') }}</p>
    </main>
  </body>
</html>