<!DOCTYPE html>
<html>
  <head>
    <style>
      header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #1436a3;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      header img {
        height: 50px;
      }
      nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 15px;
      }
      nav ul li {
        margin: 0;
      }
      nav ul li a {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 4px;
      }
      nav ul li a:hover {
        color: #ffd600;
        background: rgba(255, 255, 255, 0.1);
      }
    </style>
  </head>

  <body>
    <header>
    <img src="{{ asset('assets/logouner.png')}}" alt="logouner">
      <nav>
        <ul>
          <li>
            <a href="{{ route('data-master-admin') }}">Data Master</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
    </header>
  </body>
</html>
