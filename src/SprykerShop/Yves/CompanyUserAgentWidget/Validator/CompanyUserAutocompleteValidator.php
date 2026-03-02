<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\CompanyUserAgentWidget\Validator;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CompanyUserAutocompleteValidator implements CompanyUserAutocompleteValidatorInterface
{
    /**
     * @var \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    protected $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate(array $query): ConstraintViolationListInterface
    {
        $constraint = new Collection(
            $this->getPatternValidations(),
        );

        return $this->validator->validate($query, $constraint);
    }

    protected function getPatternValidations(): array
    {
        return [
            'pattern' => [
                new NotBlank(),
                new Length(['min' => 3]),
            ],
        ];
    }
}
