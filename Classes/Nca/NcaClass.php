<?php
namespace In2code\Powermail\Nca;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class NcaClass
{
    private $status = false;

    public function validateEmailDependencyInjection(GeneralUtility $generalUtility, $email)
    {
        return $generalUtility::validEmail($email);
    }

    public function validateEmailLegacy($email)
    {
        return GeneralUtility::validEmail($email);
    }

    public function getStatus()
    {
        return $this->status;
    }
}
