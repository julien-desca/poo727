<html>
    <body>
        <h1><?= $_SESSION['pizza']->getName() ?></h1>
        <form method="POST">
            <?php foreach($_SESSION['listIngredients'] as $ingredient) : ?>
                <label>
                    <input type="checkbox" value="<?=$ingredient->getId()?>" name="ingredient[]" 
                        <?php if(array_key_exists($ingredient->getId(), $_SESSION['pizza']->getIngredients())) 
                        {
                            echo "checked";
                        }?>
                    /><?= $ingredient->getName() ?>
                    <br/>
                </label>
            <?php endforeach ?>
            <input type="submit"/>
        </form>
    </body>
</html>