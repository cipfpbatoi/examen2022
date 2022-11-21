<?php

class ConcursoCest
{

    public function tryConcurso3timesTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Ignasi');
        $I->fillField('password', 'pleasepleaseme');
        $I->click('submit');
        $I->amOnPage('concurso.php');
        $I->selectOption('disco', 'pleasepleaseme');
        $I->click('#continuar');
        $I->seeInCurrentUrl('concurso.php');
        $I->see('1');
        $I->selectOption('disco','beatlesforsale');
        $I->click('#continuar');
        $I->seeInCurrentUrl('concurso.php');
        $I->see('2');
        $I->selectOption('disco','withthebeatles');
        $I->click('#continuar');
        $I->seeInCurrentUrl('concurso.php');
        $I->seeInSource("<div style='clear:both'>
                <div class='picture' style='float:left;margin-right: 20px'><img src='https://rovimusic.rovicorp.com/image.jpg?c=eyIWToj7rgN1HrfDSd_4UT6KsMttLlyBmmVTZ6_CLs0=&f=2'/></div>
                <div><p>Title: <a href='/album/with-the-beatles-mw0000192941' >With the Beatles</a> (1963)<br/>Apple Records / Capitol</p></div>
                </div>");
        $I->seeInSource("<div style='clear:both'>
                <div class='picture' style='float:left;margin-right: 20px'><img src='https://rovimusic.rovicorp.com/image.jpg?c=OwSNJB4u0Jyfc9oEcOWWtFWnbEN5fCjifro6xhIBuB4=&f=2'/></div>
                <div><p>Title: <a href='/album/please-please-me-mw0000649873' >Please Please Me</a> (1963)<br/>Apple Records / Capitol</p></div>
                </div>");
    }

    public function tryConcurso2timesTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Ignasi');
        $I->fillField('password', 'pleasepleaseme');
        $I->click('submit');
        $I->amOnPage('concurso.php');
        $I->selectOption('disco', 'pleasepleaseme');
        $I->click('#continuar');
        $I->seeInCurrentUrl('concurso.php');
        $I->see('1');
        $I->selectOption('disco','withthebeatles');
        $I->click('#finalitzar');
        $I->seeInCurrentUrl('concurso.php');
        $I->seeInSource("<div style='clear:both'>
                <div class='picture' style='float:left;margin-right: 20px'><img src='https://rovimusic.rovicorp.com/image.jpg?c=eyIWToj7rgN1HrfDSd_4UT6KsMttLlyBmmVTZ6_CLs0=&f=2'/></div>
                <div><p>Title: <a href='/album/with-the-beatles-mw0000192941' >With the Beatles</a> (1963)<br/>Apple Records / Capitol</p></div>
                </div>");
        $I->seeInSource("<div style='clear:both'>
                <div class='picture' style='float:left;margin-right: 20px'><img src='https://rovimusic.rovicorp.com/image.jpg?c=OwSNJB4u0Jyfc9oEcOWWtFWnbEN5fCjifro6xhIBuB4=&f=2'/></div>
                <div><p>Title: <a href='/album/please-please-me-mw0000649873' >Please Please Me</a> (1963)<br/>Apple Records / Capitol</p></div>
                </div>");
    }



}
