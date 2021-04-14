<html>
    <body>
    <?php include 'View/menu.php'?>
        <h1>Liste des ingrédients</h1>
        <?php foreach($_SESSION['listIngredient'] as $ingredients) : ?>
            <p><?= $ingredients->getName()?></p>
        <?php endforeach ?>        
    </body>
</html>