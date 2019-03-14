<?php
namespace In2code\Powermail\Tests\category;
use In2code\Powermail\Tests\AcceptanceTester;
use In2code\Powermail\Tests\Page\Category;

class FilterCest
{
    public function _before(AcceptanceTester $I, Category  $page)
    {
        $I->amOnPage($page::$URL);
        $I->waitForElement($page::$filterFirst);

    }

    // tests
    public function filterReduceResults(AcceptanceTester $I, Category $page)
    {
        $actualResult = (int)$I->grabTextFrom($page::$counter);
        $I->scrollTo($page::$filterFirst);
        $I->click($page::$filterFirst);
        $I->wait(1);
        $I->click($page::$filterFirstCheckbox);
        $I->waitForElementVisible($page::$loadingSpinner);
        $I->waitForElementNotVisible($page::$loadingSpinner);
        $newResult = (int)$I->grabTextFrom($page::$counter);
        $I->assertLessThan($actualResult,$newResult);
    }
}
