<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\CompanyUserAgentWidget;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use SprykerShop\Yves\CompanyUserAgentWidget\Dependency\Client\CompanyUserAgentWidgetToCompanyUserAgentClientBridge;

/**
 * @method \SprykerShop\Yves\CompanyUserAgentWidget\CompanyUserAgentWidgetConfig getConfig()
 */
class CompanyUserAgentWidgetDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_COMPANY_USER_AGENT = 'CLIENT_COMPANY_USER_AGENT';

    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $container = $this->addCompanyUserAgentClient($container);

        return $container;
    }

    protected function addCompanyUserAgentClient(Container $container): Container
    {
        $container->set(static::CLIENT_COMPANY_USER_AGENT, function (Container $container) {
            return new CompanyUserAgentWidgetToCompanyUserAgentClientBridge($container->getLocator()->companyUserAgent()->client());
        });

        return $container;
    }
}
