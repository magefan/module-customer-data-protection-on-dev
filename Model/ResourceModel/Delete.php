<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 *
 * Glory to Ukraine! Glory to the heroes!
 */

declare(strict_types=1);

namespace Magefan\CustomerDataProtectionOnDev\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Delete extends AbstractDb
{
    /**
     * @return void
     */
    public function deleteCustomerData()
    {
        foreach ($this->getTablesForDelete() as $table) {
            $connection = $this->getConnection();
            if ($connection->isTableExists($this->getTable($table))) {
                $connection->delete($this->getTable($table));
            }
        }
    }

    /**
     * @return string[]
     */
    public function getTablesForDelete(): array
    {
        return [
            'customer_entity',
            'sales_order',
            'sales_invoice',
            'sales_shipment',
            'sales_creditmemo',
            'newsletter_subscriber',
            'customer_grid_flat',
            'sales_order_grid',
            'sales_invoice_grid',
            'sales_shipment_grid',
            'sales_creditmemo_grid',
            'magefan_magento_marketplace_order',
            'magefan_an_feed_view',
            'magefan_product_key',
            'mst_push_notification_subscriber',
            'kiwicommerce_activity',
            'magefan_an_feed_view',
            'report_viewed_product_index',
            'customer_visitor',
            'report_event',
            'salesrule_coupon',
            'magefan_download_history',
            'kiwicommerce_activity_log',
            'customer_log',
            'report_viewed_product_aggregated_daily',
            'kiwicommerce_login_activity',
            'magefan_login_as_customer',
            'report_viewed_product_aggregated_daily',
            'report_viewed_product_aggregated_monthly',
            'report_viewed_product_aggregated_yearly',
            'salesrule_coupon_aggregated',
            'salesrule_coupon_aggregated_order',
            'salesrule_coupon_aggregated_updated',
            'sales_bestsellers_aggregated_daily',
            'sales_bestsellers_aggregated_monthly',
            'sales_bestsellers_aggregated_yearly',
            'sales_invoiced_aggregated',
            'sales_invoiced_aggregated_order',
            'sales_order_aggregated_created',
            'sales_order_aggregated_updated',
            'sales_refunded_aggregated',
            'sales_refunded_aggregated_order',
            'sales_shipping_aggregated',
            'sales_shipping_aggregated_order',
            'tax_order_aggregated_created',
            'tax_order_aggregated_updated',
            'tmp_sub',
            'downloadable_link_purchased',
            'downloadable_link_purchased_item',
            'aw_acr_cart_history',
            'aw_acr_cart_restore',
            'aw_acr_queue',
            'download_history',
            'email_contact',
            'magefan_mauticintegration_sync',
            'message',
            'mf_wayforpay_quote',
            'password_reset_request_event',
            'ves_testimonial_testimonial',
            'mst_push_notification_log',
            'mst_push_notification_message',
            'mst_cache_warmer_page',
            'mageplaza_smtp_log',
            'magefan_secretshare',
        ];
    }
}

