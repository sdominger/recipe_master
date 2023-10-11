<div class="page-header">
    <br>
    <h1>AJOUT D'UNE RECETTE</h1>
</div>
<form action="<?php echo ADMIN_ROOT; ?>recipes/create" method="post">
    <div>
        <label for="name">Nom de la recette :</label>
        <input type="text" id="name" name="name" placeholder="Nom" />
    </div>
    <div class="form-group">
        <label for="description">Description de la recette :</label>
        <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
    </div>
    <div>
        <label for="prep_time">Temps de préparation (en minutes) :</label>
        <input type="text" id="prep_time" name="prep_time" placeholder="Temps de préparation (ex: 30 minutes)" />
    </div>
    <div>
        <label for="portions">Nombre de portions :</label>
        <input type="number" id="portions" name="portions" placeholder="Nombre de portions (ex: 4)" />
    </div>
    <div>
        <label for="user_name">Utilisateur :</label>
        <select id="user_name" name="user_name">
            <?php foreach ($users as $user) : ?>
            <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="category">Catégorie :</label>
        <select id="category" name="category">
            <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label>Ingrédients :</label>
        <?php foreach ($ingredients as $ingredient) : ?>
        <br>
        <input type="checkbox" id="<?php echo $ingredient['id'] ?>" name="ingredients[]" value="<?php echo $ingredient['id'] ?>">
        <label for="<?php echo $ingredient['name'] ?>"><?php echo $ingredient['name']; ?></label>
        <!-- Ajoutez un champ de saisie pour la quantité -->
        <input type="text" name="ingredient_quantity[<?php echo $ingredient['id'] ?>]" placeholder="Quantité" />
        <?php endforeach; ?>
    </div>
    <div>
        <button type="submit" class="btn btn-lg btn-primary">Créer la recette</button>
    </div>
</form>
