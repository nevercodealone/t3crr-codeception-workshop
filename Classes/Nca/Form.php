<?php


namespace In2code\Powermail\Nca;


use TYPO3\CMS\Core\Utility\GeneralUtility;

class Form
{

    public function validateEmail($email)
    {
        if (!$this->isSpam($email))
        {
            return false;
        }
        return GeneralUtility::validEmail($email);
    }

    public function isSpam($email)
    {
        $status = 'service return';

        if (strpos($email, 'viagra') !== false)
        {
            return false;
        }

        return true;
    }

}
