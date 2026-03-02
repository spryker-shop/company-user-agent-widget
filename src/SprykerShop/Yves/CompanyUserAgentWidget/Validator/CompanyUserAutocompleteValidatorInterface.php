<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\CompanyUserAgentWidget\Validator;

use Symfony\Component\Validator\ConstraintViolationListInterface;

interface CompanyUserAutocompleteValidatorInterface
{
    public function validate(array $query): ConstraintViolationListInterface;
}
