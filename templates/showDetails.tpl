<br>
<h1 class="titulo">{$films->nombre}</h1>
<div class="detalles">
  <img src="{$films->imagen}" class="img-fluid" alt="{$films->nombre}">
  <h5 class="descripcion">
    {$films->descripcion}
  </h5>
</div>
{include file="footer.tpl"}