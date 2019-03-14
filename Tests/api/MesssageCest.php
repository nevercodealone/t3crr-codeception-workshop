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

        $I->postHandler('/api/messages', $data);

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

        $I->postHandler('/api/messages', $data, 400);
    }

    public function emptyValueDontGoToDatabase(ApiTester $I) {
        $time = microtime();
        $data = [
            'email' => 'rolandgolla@gmail.com',
            'message' => 'email|17624747727|Testify',
            'name' => 'Roland Golla ' . $time
        ];

        foreach ($data as $key => $value) {
            $tempData = $data;
            $tempData[$key] = '';

            $I->postHandler('/api/messages', $tempData, 400);
        }
    }

    public function emptyKeyDontGoToDatabase(ApiTester $I)
    {
        $time = microtime();
        $data = [
            'email' => 'rolandgolla@gmail.com',
            'message' => 'email|17624747727|Testify',
            'name' => 'Roland Golla ' . $time
        ];
        foreach ($data as $key => $value) {
            $temporaryData  =  $data;
            unset($temporaryData[$key]);
            $I->postHandler('/api/messages', $temporaryData, 401);
        }
    }
}
