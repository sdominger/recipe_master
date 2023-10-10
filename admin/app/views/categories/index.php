<?php
/*
    Variables disponibles
        $categories ARRAY(ARRAY(id, name, created_at))
*/
?>
<br>
<div class="page-header">
    <h1>LISTE DES CATEGORIES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['id'] ?></td>
                <td><?php echo $category['name'] ?></td>
                <td><?php echo $category['created_at'] ?></td>
                <td><?php echo $category['description'] ?></td>
                <td>
                    <a href="<?php echo ADMIN_ROOT; ?>categories/edit/<?php echo $category['id'] ?>">
                        <button type="button" class="btn btn-primary">Modifier</button>
                    </a>
                    <a href="<?php echo ADMIN_ROOT; ?>categories/delete/<?php echo $category['id'] ?>">
                        <button type="button" class="btn btn-secondary">Supprimer</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>