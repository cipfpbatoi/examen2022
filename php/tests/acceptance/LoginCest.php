<?php

class LoginCest
{

    public function tryLoginSuccessfulTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick','Ignasi');
        $I->fillField('password','pleasepleaseme');
        $I->click('submit');
        $I->seeInCurrentUrl('/main.php');
        $I->see('Benvingut Ignasi');
        $I->see('Apple Records / Capitol');
        $I->seeInSource("<div style='clear:both'>
                <div class='picture' style='float:left;margin-right: 20px'><img src='https://rovimusic.rovicorp.com/image.jpg?c=OwSNJB4u0Jyfc9oEcOWWtFWnbEN5fCjifro6xhIBuB4=&f=2'/></div>
                <div><p>Title: <a href='/album/please-please-me-mw0000649873' >Please Please Me</a> (1963)<br/>Apple Records / Capitol</p></div>
                </div>");

    }
    public function tryLoginAnotherSuccessfulTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Pepe');
        $I->fillField('password', 'withthebeatles');
        $I->click('submit');
        $I->seeInCurrentUrl('/main.php');
        $I->see('Benvingut Pepe');
        $I->seeInSource("<div style='clear:both'>
                <div class='picture' style='float:left;margin-right: 20px'><img src='https://rovimusic.rovicorp.com/image.jpg?c=eyIWToj7rgN1HrfDSd_4UT6KsMttLlyBmmVTZ6_CLs0=&f=2'/></div>
                <div><p>Title: <a href='/album/with-the-beatles-mw0000192941' >With the Beatles</a> (1963)<br/>Apple Records / Capitol</p></div>
                </div>");
    }
    public function tryLoginFailTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Pepe');
        $I->fillField('password', 'withthebeatle');
        $I->click('submit');
        $I->seeInCurrentUrl('/login.html');
    }

    public function tryFastLoginTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.php');
        $I->seeInCurrentUrl('/login.html');
    }

    public function trylogoutTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login.html');
        $I->fillField('nick', 'Pepe');
        $I->fillField('password', 'withthebeatles');
        $I->click('submit');
        $I->seeInCurrentUrl('/main.php');
        $I->amOnPage('/logout.php');
        $I->seeInCurrentUrl('/login.html');
        $I->amOnPage('/autorizacion.php');
        $I->seeInCurrentUrl('/login.html');
    }



}
