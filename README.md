## The configuration parameter "componentType" is required for...

This module is designed to fix a simple problem. Apparently after migrating data from Magento 1.x to Magento 2.1, this error is encountered. I believe this is due to a problem with how the attribute sets are copied.

The solution is inspired from:
 - https://github.com/magento/magento2/issues/5645
 - https://github.com/magento/magento2/issues/5236
 - https://github.com/magento/magento2/pull/5411
 
## Installation

This is super simple:

```
composer require swiftotter/advanced-pricing-bug
php bin/magento module:enable swiftotter/advanced-pricing-bug
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:clean
php bin/magento cache:flush
php bin/magento indexer:reindex
```

## If you encounter "Invalid Form Key" Error while saving products
add this line in your .ini file
```
max_input_vars=10000
```
or put this in your index.php file
```
ini_set("max_input_vars",10000);
```
