<?php
namespace In2code\Powermail\Tests\Page;

class Startpage
{
    // include url of current page
    public static $URL = '/';

    public static $searchInput = '#tx-solr-search-form-pi-results > input.search-form-ajax-autocomplete';
    public static $searchButton = '#tx-solr-search-form-pi-results > button';
    public static $searchAutoCompletionList = '#tx-solr-search-main-form > div';
    public static $searchAutoCompletionListItems = '#tx-solr-search-main-form > div > div:nth-child(4) > div.autocomplete-suggestion';
    public static $searchAutoCompletionListFirstItem = '#tx-solr-search-main-form > div > div:nth-child(4) > div:nth-child(2)';

    public static $searchResultPageInputField = '#tx-solr-search-form-pi-results > input.search-page-form.input-field';
    public static $searchResultPageResultItemsHeadLines = 'h3.title';
}
