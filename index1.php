<?php

require_once 'autoload.php';

use Entity\Ingredient;
use Entity\Pizza;

$ingredient = new Ingredient();
$ingredient->setName("Sauce Tomate");
$ingredient->setIsAllergen(false);

$ingredient2 = new Ingredient();
$ingredient2->setName("Mozzarela");
$ingredient2->setIsAllergen(true);

$pizza = new Pizza();
$pizza->setName("Margharita");
$pizza->setIngredients([$ingredient, $ingredient2]);

?>
<?php /* <?php echo $pizza->getName() ?> */ ?>
<h1><?= $pizza->getName() ?></h1>
<ul>
    <?php foreach ($pizza->getIngredients() as $ingredient): ?>
        <li><?= $ingredient->getName() ?> (allergène ?
            <?= /*$ingredient->isAllergen() ? "OUI" : "NON" */ "" ?>
            <?php if ($ingredient->getIsAllergen()) {
                echo "OUI";
            } else {
                echo "NON";
            } ?>)
        </li>
    <?php endforeach; ?>
</ul>

