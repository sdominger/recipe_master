<div class="page-header">
    <br>
    <h1>AJOUT D'UNE CATÉGORIE</h1>
</div>
<form action="<?php echo ADMIN_ROOT; ?>categories/create" method="post">
    <div>
        <label for="test">Nom de la catégorie :</label>
        <input type="text" id="name" name="name" placeholder="Nom" />
    </div>
    <div class="form-group">
        <label for="description">Description de la catégorie :</label>
        <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-lg btn-primary">Créer la catégorie</button>
    </div>
</form>