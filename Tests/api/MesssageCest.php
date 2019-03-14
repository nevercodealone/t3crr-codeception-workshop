<?php

namespace In2code\Powermail\Tests;
use In2code\Powermail\Tests\ApiTester;

class MesssageCest
{
    // tests
    public function validDataGoToDatabas(ApiTester $I)
    {
        $time = microtime();
        $data = [
            'email' => 'rolandgolla@gmail.com',
            'message' => 'email|17624747727|Testify',
            'name' => 'Roland Golla ' . $time
        ];

        $I->sendPOST(
            '/api/messages',
            json_encode($data)
        );

        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);

        $I->seeNumRecords(
            1,
            'message',
            $data
        );
    }

    public function emptyEmailDontGoToDatabase(ApiTester $I) {
        $time = microtime();
        $data = [
            'email' => '',
            'message' => 'email|17624747727|Testify',
            'name' => 'Roland Golla ' . $time
        ];

        $I->sendPOST(
            '/api/message',
            json_encode($data)
        );

        $I->seeResponseCodeIs(404);
    }
}
