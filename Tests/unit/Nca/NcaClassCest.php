<?php
namespace In2code\Powermail\Tests\Nca;
use In2code\Powermail\Nca\NcaClass;
use In2code\Powermail\Tests\UnitTester;

use Mockery as m;
use SebastianBergmann\PeekAndPoke\Proxy;

class NcaClassCest
{
    private $fixture;
    private $email;

    public function _before(UnitTester $I)
    {
        $this->fixture = new NcaClass();
        $this->email = 'rolandgolla@gmail.com';
    }

    public function validateEmailReturnFalseDependencyInjection(UnitTester $I)
    {
        $generalUtility = m::mock('alias:\TYPO3\CMS\Core\Utility\GeneralUtility');
        $generalUtility->shouldReceive([
            'validEmail' => false
        ]);

        $fixture = new NcaClass();

        $I->assertFalse($fixture->validateEmailDependencyInjection($generalUtility, $this->email));
    }

    public function validateDataReturnFalseOnInValidEmailLegacy(UnitTester $I)
    {
        $generalUtility = m::mock('alias:\TYPO3\CMS\Core\Utility\GeneralUtility');
        $generalUtility->shouldReceive([
            'validEmail' => false
        ]);

        $fixture = new NcaClass();

        $I->assertFalse($fixture->validateEmailLegacy($this->email));
    }

    public function defaultStatusIsFalse(UnitTester $I)
    {
        $I->assertFalse($this->fixture->getStatus());
    }

    public function setStatusToTrueReturnTrue(UnitTester $I)
    {
        $fixture = new Proxy($this->fixture);
        $fixture->status = true;
        $I->assertTrue($this->fixture->getStatus());
    }
}
