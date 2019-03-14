<?php
namespace In2code\Powermail\Nca;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class NcaClass
{
    public function validateData(array $data)
    {
        $isEmail = $this->validateEmail($data['email']);

        if(!$isEmail) {
            return false;
        }

        return true;
    }

    public function validateEmail($email)
    {
        return GeneralUtility::validEmail($email);
    }
}