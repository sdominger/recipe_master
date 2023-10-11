<br>
<div class="page-header">
    <h1>LISTE DES RECETTES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Prep_time</th>
            <th>Portion(s)</th>
            <th>Created_at</th>
            <th>User_name</th>
            <th>Category_name</th>
            <th>Ingredients</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?php echo $recipe['id'] ?></td>
                <td><?php echo $recipe['name'] ?></td>
                <td><?php echo $recipe['description'] ?></td>
                <td><?php echo $recipe['prep_time'] ?></td>
                <td><?php echo $recipe['portions'] ?></td>
                <td><?php echo $recipe['created_at'] ?></td>
                <td><?php echo $recipe['user_name'] ?></td>
                <td><?php echo $recipe['category_name'] ?></td>
                <td><?php echo $recipe['ingredients'] ?></td>
                <td>
                    <a href="#">
                        <button type="button" class="btn btn-primary">Modifier</button>
                    </a>
                    <a href="<?php echo ADMIN_ROOT; ?>recipes/delete/<?php echo $recipe['id']; ?>">
                        <button type="button" class="btn btn-secondary">Supprimer</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>