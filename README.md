## The configuration parameter "componentType" is required for...

This module is designed to fix a simple problem. Apparently after migrating data from Magento 1.x to Magento 2.1, this error is encountered. I believe this is due to a problem with how the attribute sets are copied.

The solution is inspired from:
 - https://github.com/magento/magento2/issues/5645
 - https://github.com/magento/magento2/issues/5236
 - https://github.com/magento/magento2/pull/5411
 
## Installation

This is super simple:

```
composer install swiftotter/advanced-pricing-bug
```