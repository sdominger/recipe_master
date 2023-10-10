<div class="page-header">
    <br>
    <h1>MODIFICATION D'UNE CATÉGORIE</h1>
</div>
<form action="<?php echo ADMIN_ROOT; ?>categories/edit/update/<?php echo $category['id']; ?>" method="post">
    <div>
        <label for="name">Nom de la catégorie :</label>
        <input type="text" id="name" name="name" placeholder="Nom" value="<?php echo $category['name']; ?>"/>
    </div>
    <div class="form-group">
        <label for="description">Description de la catégorie :</label>
        <textarea class="form-control" id="description" name="description" placeholder="Description"><?php echo $category['description']; ?></textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-lg btn-primary">Modifier la catégorie</button>
    </div>
</form>