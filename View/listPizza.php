<html>
    <body>
    <?php include 'View/menu.php'?>
        <h1>Liste des pizzas</h1>
        <ul>
        <?php foreach($_SESSION['listPizza'] as $pizza) : ?>
            <li>

            <?php 
                $isAllergen = false;
                foreach($pizza->getIngredients() as $ingredient){
                    if($ingredient->getIsAllergen()){
                        $isAllergen = true;
                        break;
                    }
                }
                ?>

                <?php if($isAllergen) : ?>
                    <a href="/detailPizza?id=<?=$pizza->getId()?>"><strong><?= $pizza->getName() ?></strong></a>
                <?php else: ?>
                    <a href="/detailPizza?id=<?=$pizza->getId()?>"><?= $pizza->getName() ?></a>
                <?php endif ?>
                <a href="/deletePizza?id=<?=$pizza->getId()?>">Supprimer</a>
            </li>
        <?php endforeach ?>
        </ul>
    </body>
</html>