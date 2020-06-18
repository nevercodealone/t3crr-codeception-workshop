<?php
namespace In2code\Powermail\Tests;

use In2code\Powermail\Tests\_generated\ApiTesterActions;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class ApiTester extends \Codeception\Actor
{
    use ApiTesterActions;

    public function postHandler($route, array $data, $status = 200)
    {
        $I = $this;

        $I->sendPOST(
            $route,
            json_encode($data)
        );

        $I->seeResponseIsJson();
        $I->seeResponseCodeIs($status);
    }
}
