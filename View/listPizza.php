<html>
    <body>
        <h1>Liste des pizzas</h1>
        <?php foreach($_SESSION['listPizza'] as $pizza) : ?>
            <p><?= $pizza->getName() ?></p>
        <?php endforeach ?>
    </body>
</html>