<?php

require 'vendor/autoload.php';

use Services\BaseBarkaPayPaymentService;

try {
    // Instancie le service avec les clés API via .env
    $paymentService = new BaseBarkaPayPaymentService();

    // Appel des différentes fonctions et affichage des résultats
    echo "Vérification des informations d'authentification :\n";
    print_r($paymentService->verifyCredentials());

    echo "\nServices disponibles :\n";
    print_r($paymentService->getAvailableServices());

    echo "\nInformations de l'utilisateur :\n";
    print_r($paymentService->getUserInfos());

    echo "\nSoldes des comptes :\n";
    print_r($paymentService->getAccountsBalances());

    echo "\nInformations des opérateurs :\n";
    print_r($paymentService->getOperatorsInfos());

} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
