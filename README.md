BarkaPay PHP SDK

Le BarkaPay PHP SDK permet aux marchands d'intégrer facilement les services de paiement BarkaPay dans leurs applications, notamment Orange Money et Moov Money.
Installation

    Assurez-vous d'avoir installé Composer. Si ce n'est pas fait, suivez les instructions ici.
    Installez le SDK dans votre projet via Composer :

    

    composer require barkapay-sa/barkapay-php-sdk

Configuration

    Créez un fichier .env à la racine de votre projet.
    Ajoutez vos clés API dans le fichier .env :


    BKP_API_KEY=your_api_key
    BKP_API_SECRET=your_api_secret
    BKP_SCI_KEY=your_sci_key
    BKP_SCI_SECRET=your_sci_secret

Utilisation
1. Paiement Orange Money

php

require 'vendor/autoload.php';
use Services\Specs\OrangeMoneyBFBarkaPayPaymentService;

$orangeMoneyService = new OrangeMoneyBFBarkaPayPaymentService();
$paymentDetails = [
    'sender_phonenumber' => '770000000',
    'amount' => 5000,
    'otp' => '123456'
];

$response = $orangeMoneyService->proceedPayment($paymentDetails);
print_r($response);

2. Paiement Moov Money

php

require 'vendor/autoload.php';
use Services\Specs\MoovMoneyBFBarkaPayPaymentService;

$moovMoneyService = new MoovMoneyBFBarkaPayPaymentService();
$paymentDetails = [
    'sender_phonenumber' => '750000000',
    'amount' => 10000,
    'order_id' => 'ORDER123'
];

$response = $moovMoneyService->initMobilePayment($paymentDetails);
print_r($response);

3. Vérification du paiement

php

$publicId = 'public_id_recu';
$verifyResponse = $moovMoneyService->verifyMobilePayment($publicId);
print_r($verifyResponse);

Fonctions disponibles

    proceedPayment() : Paiement Orange Money.
    initMobilePayment() : Paiement Moov Money.
    verifyMobilePayment() : Vérifier l’état d’un paiement.
    getPaymentDetails() : Détails d’un paiement.
    getTransferDetails() : Détails d’un transfert.

Débogage

Si les variables d'environnement ne sont pas chargées correctement, assurez-vous que le fichier .env est bien positionné et que la configuration est correcte :

php

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Assistance

Pour toute question ou problème, veuillez contacter le support technique via support@barkapay.com.

Enregistre ce contenu dans un fichier README.md à la racine de ton projet pour fournir une documentation claire et accessible aux marchands.
Vous avez dit :
 notamment Orange Money et Moov Money.

C'est 2 sont des cas specifiques qu'on a ajouter en plus, sinon c'est APIBarkaPayPaymentService et SCIBarkaPayPaymentService qui sont les plus importants qui permettent de faire tous les types de paiements
ChatGPT a dit :
ChatGPT

Merci pour la précision. Voici une version mise à jour de la documentation pour tenir compte du fait que APIBarkaPayPaymentService et SCIBarkaPayPaymentService sont les services principaux, et que Orange Money et Moov Money sont des cas spécifiques.
BarkaPay PHP SDK

Le BarkaPay PHP SDK permet aux marchands d'intégrer facilement les services de paiement de BarkaPay dans leurs applications, en offrant une large gamme d'options de paiements via l'API principale, ainsi que des options spécifiques pour des cas comme Orange Money et Moov Money.
Installation

    Assurez-vous d'avoir installé Composer. Si ce n’est pas encore fait, suivez les instructions ici.
    Installez le SDK dans votre projet via Composer :

    

    composer require barkapay-sa/barkapay-php-sdk

Configuration

    Créez un fichier .env à la racine de votre projet.
    Ajoutez vos clés API dans le fichier .env :

    

    BKP_API_KEY=your_api_key
    BKP_API_SECRET=your_api_secret
    BKP_SCI_KEY=your_sci_key
    BKP_SCI_SECRET=your_sci_secret

Utilisation
1. Paiements via APIBarkaPayPaymentService

Le service APIBarkaPayPaymentService est le point d’entrée principal pour la plupart des types de paiements.
Exemple de paiement mobile standard :

php

require 'vendor/autoload.php';
use Services\APIBarkaPayPaymentService;

$paymentService = new APIBarkaPayPaymentService();
$paymentDetails = [
    'sender_phonenumber' => '770000000',
    'amount' => 5000,
    'order_id' => 'ORDER123'
];

$response = $paymentService->createMobilePayment($paymentDetails);
print_r($response);

2. Paiements via SCIBarkaPayPaymentService

Le service SCIBarkaPayPaymentService est utilisé pour créer des liens de paiement et des intégrations spécifiques aux scénarios de Service Client Interface.
Exemple de création de lien de paiement :

php

require 'vendor/autoload.php';
use Services\SCIBarkaPayPaymentService;

$sciPaymentService = new SCIBarkaPayPaymentService();
$paymentLinkData = [
    'amount' => 5000,
    'order_id' => 'ORDER123',
    'callback_url' => 'https://example.com/callback'
];

$response = $sciPaymentService->createPaymentLink($paymentLinkData);
print_r($response);

3. Paiement spécifique : Orange Money

Cas d'utilisation spécifique pour les paiements Orange Money au Burkina Faso :

php

require 'vendor/autoload.php';
use Services\Specs\OrangeMoneyBFBarkaPayPaymentService;

$orangeMoneyService = new OrangeMoneyBFBarkaPayPaymentService();
$paymentDetails = [
    'sender_phonenumber' => '770000000',
    'amount' => 5000,
    'otp' => '123456'
];

$response = $orangeMoneyService->proceedPayment($paymentDetails);
print_r($response);

4. Paiement spécifique : Moov Money

Pour initier un paiement via Moov Money au Burkina Faso :

php

require 'vendor/autoload.php';
use Services\Specs\MoovMoneyBFBarkaPayPaymentService;

$moovMoneyService = new MoovMoneyBFBarkaPayPaymentService();
$paymentDetails = [
    'sender_phonenumber' => '750000000',
    'amount' => 10000,
    'order_id' => 'ORDER123'
];

$response = $moovMoneyService->initMobilePayment($paymentDetails);
print_r($response);

5. Vérification du paiement

Vérifiez l’état d’un paiement avec son ID public :

php

$publicId = 'public_id_recu';
$verifyResponse = $moovMoneyService->verifyMobilePayment($publicId);
print_r($verifyResponse);

Fonctions disponibles

    createMobilePayment() : Créer un paiement mobile standard via APIBarkaPayPaymentService.
    createPaymentLink() : Créer un lien de paiement via SCIBarkaPayPaymentService.
    proceedPayment() : Effectuer un paiement Orange Money.
    initMobilePayment() : Initialiser un paiement Moov Money.
    verifyMobilePayment() : Vérifier l’état d’un paiement.
    getPaymentDetails() : Récupérer les détails d’un paiement spécifique.
    getTransferDetails() : Récupérer les détails d’un transfert spécifique.

Débogage

Si les variables d'environnement ne sont pas chargées correctement, assurez-vous que le fichier .env est bien positionné et que la configuration est correcte :

php

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Assistance

Pour toute question ou problème, veuillez contacter le support technique via support@barkapay.com.