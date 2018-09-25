<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema Ventas Laravel Vue Js- Hielonegro">
  <meta name="author" content="Incanatoit.com">
  <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">

  <title>Sistema Ventas - Hielonegro</title>
  <!-- Main styles for this application -->
  <link href="{{asset('css/template.css')}}" rel="stylesheet">
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      @yield('login')
    </div>
    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('js/template.js')}}"></script> 
  </body>
</html>