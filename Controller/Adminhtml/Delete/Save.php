<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 *
 * Glory to Ukraine! Glory to the heroes!
 */

declare(strict_types=1);

namespace Magefan\CustomerDataProtectionOnDev\Controller\Adminhtml\Delete;

class Save extends \Magento\Backend\App\Action
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $domainName = (string)$this->getRequest()->getParam('domain_name');

        try {
            if ($domainName != parse_url($this->getUrl(), PHP_URL_HOST)) {
                throw new \Exception($domainName . ' domain name is not the same as ' . parse_url($this->getUrl(), PHP_URL_HOST));
            }

            // init model and delete
            $model = $this->_objectManager->create(\Magefan\CustomerDataProtectionOnDev\Model\ResourceModel\Delete::class);
            $model->deleteCustomerData();

            $resourceConfig = $this->_objectManager->get(\Magento\Config\Model\ResourceModel\Config::class);
            $cacheTypeList = $this->_objectManager->get(\Magento\Framework\App\Cache\TypeListInterface::class);

            $resourceConfig->saveConfig(
                'magefan_customerdataprotectionondev/data/deleted',
                1,
            );
            $cacheTypeList->cleanType(\Magento\Framework\App\Cache\Type\Config::TYPE_IDENTIFIER);

            // display success message
            $this->messageManager->addSuccessMessage(__('You deleted customers data.'));
            // go to grid
            return $resultRedirect->setPath('customer/index');
        } catch (\Exception $e) {
            // display error message
            $this->messageManager->addErrorMessage($e->getMessage());
            // go back to edit form
            return $resultRedirect->setPath('*/*/edit');
        }

        return $resultRedirect->setPath('customer/index');
    }
}

