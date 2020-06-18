<?php
namespace In2code\Powermail\Tests\Nca;

use Codeception\Stub;
use In2code\Powermail\Nca\Form;
use In2code\Powermail\Tests\UnitTester;

class FormCest
{
    public $fixture;

    public function _before(UnitTester $I)
    {
        $this->fixture = new Form();
    }

    public function checkValidMailReturnTrue(UnitTester $I)
    {
        $I->assertTrue($this->fixture->validateEmail('rolandgolla@gmail.com'));
    }

    public function checkInvalidEmailReturnFalse(UnitTester $I)
    {
        $email = 'rolandgolla';
        $I->assertFalse($this->fixture->validateEmail($email), $email);
    }

    public function spamInEmailReturnFalse(UnitTester $I)
    {
        $this->fixture = Stub::make(
            $this->fixture,
            [
                'isSpam' => false
            ]
        );

        $email = 'viagra@porn.com';
        $I->assertFalse($this->fixture->validateEmail($email), $email);
    }
}
