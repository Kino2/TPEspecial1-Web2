<br>
<h3>Editar género</h3>
<form action="editGenre/{$genres->id_genero}" method="POST">
<div class="mb-3">
<label>Género</label>
<input type="text" name="genre"class="form-control" value="{$genres->genero}">
<button type="submit" class="btn btn-primary mt-3">Editar</button>
</div>
</form>
{include file="templates/footer.tpl"}


