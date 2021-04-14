<html>

    <body>
    <?php include 'View/menu.php'?>
        <h1>Liste des ingrédients</h1>
        <?php foreach($_SESSION['listIngredient'] as $ingredients) : ?>
            <?php if($ingredients->getIsAllergen()): ?>
                <p><strong><?= $ingredients->getName() ?></strong></p>
            <?php else : ?>
                <p><?= $ingredients->getName()?></p>
            <?php endif ?>
            <a href="/deleteIngredient?id=<?=$ingredients->getId()?>">Supprimer</a>
            <br/>
        <?php endforeach ?>        
    </body>
</html>