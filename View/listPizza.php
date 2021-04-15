<html>
    <body>
    <?php include 'View/menu.php'?>
        <h1>Liste des pizzas</h1>
        <ul>
        <?php foreach($_SESSION['listPizza'] as $pizza) : ?>
            <li>
                <a href="/detailPizza?id=<?=$pizza->getId()?>"><?= $pizza->getName() ?></a>
                <a href="/deletePizza?id=<?=$pizza->getId()?>">Supprimer</a>
            </li>
        <?php endforeach ?>
        </ul>
    </body>
</html>