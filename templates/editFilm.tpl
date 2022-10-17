<br>
<h3>Editar Película:</h3>
<form action="editFilm/{$film->id_pelicula}" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nombre</label>
        <input name="name" type="text" class="form-control" value="{$film->nombre}">
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <input name="description" type="text" class="form-control" value="{$film->descripcion}">
    </div>

    <div class="mb-3">
        <label>Fecha de estreno</label>
        <input name="date" type="date" class="form-control" value="{$film->fecha}">
    </div>
    <div class="mb-3">
        <label>Duración</label>
        <input name="duration" type="time" class="form-control" value="{$film->duracion}">
    </div>

    <div class="mb-3">
        <label>Director</label>
        <input name="director" type="text" class="form-control" value="{$film->director}">
    </div>

    <div class="mb-3">
        <label>Género</label>
        <select class="form-select" name="genres" value="{$film->genero}">
            {foreach from=$genres item=$genre}
                <option value="{$genre->id_genero}" {if $film->id_genero_fk == $genre->id_genero}selected{/if}>
                    {$genre->genero}</option>
            {/foreach}
        </select>
    </div>

    <div class="mb-3">
        <label>Imagen (JPG, JPEG o PNG)</label>
        <input type="file" name="image" class="form-control">
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mt-3">Editar</button>
        </div>

        {if $error}
            <div class="alert alert-danger mb-3">
                {$error}
            </div>
        {/if}
</form>
{include file="templates/footer.tpl"}