<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 *
 * Glory to Ukraine! Glory to the heroes!
 */

declare(strict_types=1);

namespace Magefan\CustomerDataProtectionOnDev\Model\Delete;


use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{

    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {

    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [];
    }
}