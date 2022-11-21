<?php

class AutorizacionCest
{

    public function tryAutorizacionTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Ignasi');
        $I->fillField('password', 'pleasepleaseme');
        $I->click('submit');
        $I->amOnPage('autorizacion.php');
        $I->fillField('nombre', 'Ignasi gomis');
        $I->fillField('email', 'ignasi.gomi@gmail.com');
        $I->fillField('nacimiento', 2000);
        $I->checkOption('consentimiento');
        $I->attachFile('foto', 'Foto.jpg');
        $I->click('submit');
    }


    public function tryAutorizacionFailNombreTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Ignasi');
        $I->fillField('password', 'pleasepleaseme');
        $I->click('submit');
        $I->amOnPage('autorizacion.php');
        $I->fillField('nombre', 'IgnasiGomis');
        $I->click('submit');
        $I->seeInCurrentUrl('autorizacion.php');
        $I->seeInSource("<p style='color: red'>El nom no és vàlid</p>");
        $I->seeInSource('<input id="nombre" name="nombre" placeholder="Escriu el teu nom complet" type="text" value="IgnasiGomis" class="form-control">');
    }

    public function tryAutorizacionFailEmailTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Ignasi');
        $I->fillField('password', 'pleasepleaseme');
        $I->click('submit');
        $I->amOnPage('autorizacion.php');
        $I->fillField('nombre', 'Ignasi Gomis');
        $I->fillField('email', 'ignasi');
        $I->fillField('nacimiento', 2000);
        $I->checkOption('consentimiento');
        $I->attachFile('foto', 'Foto.jpg');
        $I->click('submit');
        $I->seeInCurrentUrl('autorizacion.php');
        $I->seeInSource("<p style='color: red'>El email no és vàlid</p>");
        $I->seeInSource('<input id="nombre" name="nombre" placeholder="Escriu el teu nom complet" type="text" value="Ignasi Gomis" class="form-control">');
    }

    public function tryAutorizacionFailNacimientoTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Ignasi');
        $I->fillField('password', 'pleasepleaseme');
        $I->click('submit');
        $I->amOnPage('autorizacion.php');
        $I->fillField('nombre', 'Ignasi Gomis');
        $I->fillField('email', 'ignasi@gmail.com');
        $I->fillField('nacimiento', 2002);
        $I->checkOption('consentimiento');
        $I->attachFile('foto', 'Foto.jpg');
        $I->click('submit');
        $I->seeInCurrentUrl('autorizacion.php');
        $I->seeInSource("<p style='color: red'>La data de naixement ha d'estar entre 1970 i 2000</p>");
        $I->seeInSource('<input id="nombre" name="nombre" placeholder="Escriu el teu nom complet" type="text" value="Ignasi Gomis" class="form-control">');
    }

    public function tryAutorizacionFailConsetimientoTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Ignasi');
        $I->fillField('password', 'pleasepleaseme');
        $I->click('submit');
        $I->amOnPage('autorizacion.php');
        $I->fillField('nombre', 'Ignasi Gomis');
        $I->fillField('email', 'ignasi@gmail.com');
        $I->fillField('nacimiento', 2000);
        $I->attachFile('foto', 'Foto.jpg');
        $I->click('submit');
        $I->seeInCurrentUrl('autorizacion.php');
        $I->seeInSource("<p style='color: red'>Has de marcar el consentiment</p>");
        $I->seeInSource('<input id="nombre" name="nombre" placeholder="Escriu el teu nom complet" type="text" value="Ignasi Gomis" class="form-control">');
    }

    public function tryAutorizacionFailFileTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Ignasi');
        $I->fillField('password', 'pleasepleaseme');
        $I->click('submit');
        $I->amOnPage('autorizacion.php');
        $I->fillField('nombre', 'Ignasi Gomis');
        $I->fillField('email', 'ignasi@gmail.com');
        $I->fillField('nacimiento', 2000);
        $I->attachFile('foto', 'convalidacio.pdf');
        $I->checkOption('consentimiento');
        $I->click('submit');
        $I->seeInCurrentUrl('autorizacion.php');
        $I->seeInSource("<p style='color: red'>Fichero no es una imagen</p>");
        $I->seeInSource('<input id="nombre" name="nombre" placeholder="Escriu el teu nom complet" type="text" value="Ignasi Gomis" class="form-control">');
    }


}
