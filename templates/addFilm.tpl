<br>
<h3>Agregar película:</h3>
<form action="addFilm" method="POST" enctype="multipart/form-data">
<div class="mb-3">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="name" class="form-control">
</div>
<div class="mb-3">
    <label for="exampleInputEmail1">Descripción</label>
    <input type="text" name="description" class="form-control">
</div>

<div class="mb-3">
    <label for="floatingTextarea">Fecha de estreno</label>
    <input type="date" name="date" class="form-control">
</div>

<div class="mb-3">
    <label for="floatingTextarea">Duración</label>
    <input type="time" name="duration" class="form-control">
</div>

<div class="mb-3">
    <label for="floatingTextarea">Director</label>
    <input type="text" name="director" class="form-control">
</div>

<div class="mb-3">
    <label for="floatingTextarea">Género</label>
    <select class="form-select" name="genres">
        {foreach from=$genres item=$genre}
            <option value="{$genre->id_genero}">{$genre->genero}</option>
        {/foreach}
    </select>
</div>

<div class="mb-3">
    <label for="floatingTextarea">Imagen (JPG, JPEG o PNG)</label>
    <input type="file" name="image" class="form-control">
</div>
<div>
    <button type="submit" class="btn btn-success mt-3">Agregar</button>
</div>
    <br>
    {if $error} 
        <div class="alert alert-danger mb-3">
            {$error}
        </div>
    {/if}
</form>
{include file="templates/footer.tpl"}