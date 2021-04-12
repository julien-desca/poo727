<?php

function autoload($className){
    /* $className est le nom COMPLET de la class (ex: App\Cat)
    que php tente de charger */

    /* remplace le \ (séparateur de namespace)
    par le séparateur de fichiers de notre OS */
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

    require $className.'.php';
}

/* Enregister notre fonction autoload
   en tant que chargeur automatique */
spl_autoload_register('autoload');