<!DOCTYPE html>
<html lang="es">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>PeliKino</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="home">PeliKino</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Géneros
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
            {foreach from=$genres item=$genre}
              <li>
              <a class="dropdown-item" href="genres/{$genre->id_genero}">{$genre->genero}</a>
              </li>
            {/foreach}
              </ul>
              {if isset($smarty.session.USER_EMAIL)}
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="admin">Admin (géneros)</a>
              </li>
            {/if}
        </ul>
      </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    {if !isset($smarty.session.USER_EMAIL)}
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="login">Login</a>
      </li>
    {else} 
      <li class="nav-item ml-auto">
        <a class="nav-link" aria-current="page" href="logout">Logout ({$smarty.session.USER_EMAIL})</a>
      </li>
    {/if}
    </ul>
    </div>
  </nav>
  </header>
    <main class="container">
