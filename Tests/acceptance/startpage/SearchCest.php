<?php
namespace In2code\Powermail\Tests\startpage;

use In2code\Powermail\Tests\AcceptanceTester;
use In2code\Powermail\Tests\Page\Startpage;

class SearchCest
{
    public function _before(AcceptanceTester $I, Startpage $page)
    {
        $I->amOnPage($page::$URL);
        $I->waitForElement($page::$searchInput);
    }

    public function searchWithValidValueCheckAutoComplitionAndResultPage(AcceptanceTester $I, Startpage $page)
    {
        $searchString = 'farb';
        $I->fillField($page::$searchInput, $searchString);
        $I->waitForElement($page::$searchAutoCompletionListItems);

        $listItems = $I->grabMultiple($page::$searchAutoCompletionListItems);

        foreach ($listItems as $listItem) {
            $I->assertContains($searchString, strtolower($listItem));
        }

        $I->scrollTo($page::$searchButton);
        $I->click($page::$searchButton);
        $I->waitForElement($page::$searchResultPageInputField);
        $I->assertSame($searchString, $I->grabValueFrom($page::$searchResultPageInputField));

        $I->canSeeInCurrentUrl('q=' . $searchString);

        $headLines = $I->grabMultiple($page::$searchResultPageResultItemsHeadLines);
        foreach ($headLines as $headLine) {
            $I->assertContains($searchString, strtolower($headLine));
        }
    }


}
