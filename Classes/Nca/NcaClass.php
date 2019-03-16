<?php
namespace In2code\Powermail\Nca;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class NcaClass
{
    public function validateEmailDependencyInjection(GeneralUtility $generalUtility, $email)
    {
        return $generalUtility::validEmail($email);
    }

    public function validateEmailLegacy($email)
    {
        return GeneralUtility::validEmail($email);
    }
}
