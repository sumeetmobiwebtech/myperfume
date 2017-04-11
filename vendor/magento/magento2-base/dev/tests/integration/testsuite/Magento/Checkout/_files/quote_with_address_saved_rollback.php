<?php
/**
 * Rollback for quote_with_address_saved.php fixture.
 *
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/** @var $objectManager \Magento\TestFramework\ObjectManager */
$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
$quote = $objectManager->create('Magento\Quote\Model\Quote');
$quote->load('test_order_1', 'reserved_order_id')->delete();

/** @var \Magento\Quote\Model\QuoteIdMask $quoteIdMask */
$quoteIdMask = $objectManager->create('Magento\Quote\Model\QuoteIdMask');
$quoteIdMask->delete($quote->getId());

require __DIR__ . '/../../Checkout/_files/quote_with_address_rollback.php';
