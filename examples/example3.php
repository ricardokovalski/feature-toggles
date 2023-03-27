<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use RicardoKovalski\Toggles\Adapter\V2\SplitAdapter;
use RicardoKovalski\Toggles\Collection\AccountIdCollection;
use RicardoKovalski\Toggles\Client\SplitClient;

$splitAdapter = new SplitAdapter(SplitClient::getInstance());
$accountIdsCollection = new AccountIdCollection(1,2,3,4,5,6,7,8,9,10);
$accountsFiltered = [];

foreach ($accountIdsCollection->getIterator() as $accountId) {
    $toggle = $splitAdapter->isEnabled(
        key: 'app',
        toggleName: 'APP_ACCOUNTS_ENABLED',
        attributes: ['ACCOUNT_ID' => $accountId]
    );
    if (! $toggle) {
        continue;
    }
    $accountsFiltered[] = $accountId;
}
dd(new AccountIdCollection(... $accountsFiltered));
