<?php

require_once __DIR__ . '/../classes/CategoryError.php';
require_once __DIR__ . '/../classes/UserError.php';
require_once __DIR__ . '/../classes/ProductError.php';

function errorMessage(int $errorCode): string
{
    return match ($errorCode) {
        CategoryError::NAME_REQUIRED => "Le nom est obligatoire",
        ProductError::NAME_REQUIRED => "Le nom est obligatoire",
        ProductError::PRICE_REQUIRED => "Le prix est obligatoire",
        ProductError::COVER_REQUIRED => "L' image est obligatoire",
        ProductError::DESCRIPTION_REQUIRED => "La description est obligatoire",
        UserError::LOGIN_REQUIRED => "Le login est obligatoire",
        UserError::PASSWORD_REQUIRED => "Le mot de passe est obligatoire",
        UserError::LOGIN_ALREADY_EXISTS => "Un compte avec ce login existe déja",
        UserError::ACCESS_DENIED => "Accès refusé, veuillez vérifier votre identifiant et mot de passe",

        default => "Une erreur est survenue"
    };

    // switch ($errorCode) {
    //     case 1:
    //         $errorMsg = "Le nom est obligatoire";
    //         break;
    //     default:
    //         $errorMsg = "Une erreur est survenue";
    // }

    // return $errorMsg;
}