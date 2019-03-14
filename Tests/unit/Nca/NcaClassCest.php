<?php
namespace In2code\Powermail\Tests\Nca;
use Codeception\Stub;
use In2code\Powermail\Nca\NcaClass;
use In2code\Powermail\Tests\UnitTester;

class NcaClassCest
{
    private $fixture;

    public function _before(UnitTester $I)
    {
        $this->fixture = new NcaClass();
    }

    public function validateDataReturnTrueOnValidEmail(UnitTester $I)
    {
        $data = [
            'email' => 'rolandgolla@gmail.com'
        ];

        $I->assertTrue($this->fixture->validateData($data));
    }

    public function validateDataReturnFalseOnInValidEmail(UnitTester $I)
    {
        $this->fixture = Stub::make(
            $this->fixture,
            [
                'validateEmail' => false,
            ]
        );

        $data = [
            'email' => ''
        ];

        $I->assertFalse($this->fixture->validateData($data));
    }
}
