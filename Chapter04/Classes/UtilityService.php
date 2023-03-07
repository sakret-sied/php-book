<?php

namespace Chapter04\Classes;

use Chapter04\Traits\PriceUtilities;
use Chapter04\Traits\TaxTools;

class UtilityService extends Service
{
    use PriceUtilities, TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
        PriceUtilities::calculateTax as basicTax;
    }
}