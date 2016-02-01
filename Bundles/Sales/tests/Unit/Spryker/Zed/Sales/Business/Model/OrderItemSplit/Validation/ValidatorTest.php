<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Unit\Spryker\Zed\Sales\Business\Model\OrderItemSplit\Validation;

use Propel\Runtime\Collection\Collection;
use Spryker\Zed\Sales\Business\Model\Split\Validation\Validator;
use Spryker\Zed\Sales\Business\Model\Split\Validation\Messages;
use Orm\Zed\Sales\Persistence\SpySalesDiscount;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesOrderItemOption;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testInvalidQuantity()
    {
        $validator = $this->getValidator();
        $spySalesOrderItem = $this->getSalesOrderItem(1);

        $validateResponse = $validator->isValid($spySalesOrderItem, 666);
        $validationMessages = $validator->getMessages();

        $this->assertFalse($validateResponse);
        $this->assertEquals(Messages::VALIDATE_QUANTITY_MESSAGE, $validationMessages[0]);
    }

    /**
     * @return void
     */
    public function testValidateIsProductBundled()
    {
        $validator = $this->getValidator();
        $spySalesOrderItem = $this->getSalesOrderItem();
        $spySalesOrderItem->setFkSalesOrderItemBundle(1);

        $validateResponse = $validator->isValid($spySalesOrderItem, 1);
        $validationMessages = $validator->getMessages();

        $this->assertFalse($validateResponse);
        $this->assertEquals(Messages::VALIDATE_BUNDLE_MESSAGE, $validationMessages[0]);
    }

    /**
     * @return void
     */
    public function testValidateIsDiscounted()
    {
        $validator = $this->getValidator();
        $spySalesOrderItem = $this->getSalesOrderItem();

        $discountCollection = new Collection();
        $discountCollection->append(new SpySalesDiscount());
        $spySalesOrderItem->setDiscounts($discountCollection);

        $validateResponse = $validator->isValid($spySalesOrderItem, 1);
        $validationMessages = $validator->getMessages();

        $this->assertFalse($validateResponse);
        $this->assertEquals(Messages::VALIDATE_DISCOUNTED_MESSAGE, $validationMessages[0]);
    }

    /**
     * @return void
     */
    public function testValidateIsOptionDiscounted()
    {
        $validator = $this->getValidator();
        $spySalesOrderItem = $this->getSalesOrderItem();

        $orderItemOptionDiscount = new SpySalesDiscount();
        $discountCollection = new Collection();
        $discountCollection->append($orderItemOptionDiscount);

        $salesOrderItemOption = new SpySalesOrderItemOption();
        $salesOrderItemOption->setDiscounts($discountCollection);

        $optionCollection = new Collection();
        $optionCollection->append($salesOrderItemOption);
        $spySalesOrderItem->setOptions($optionCollection);

        $validateResponse = $validator->isValid($spySalesOrderItem, 1);
        $validationMessages = $validator->getMessages();

        $this->assertFalse($validateResponse);
        $this->assertEquals(Messages::VALIDATE_DISCOUNTED_OPTION_MESSAGE, $validationMessages[0]);
    }

    /**
     * @return void
     */
    public function testValidOrderItem()
    {
        $validator = $this->getValidator();
        $spySalesOrderItem = $this->getSalesOrderItem();

        $validateResponse = $validator->isValid($spySalesOrderItem, 1);

        $this->assertTrue($validateResponse);
    }

    /**
     * @return \Spryker\Zed\Sales\Business\Model\Split\Validation\Validator
     */
    protected function getValidator()
    {
        return new Validator();
    }

    /**
     * @param int $quantity
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderItem
     */
    protected function getSalesOrderItem($quantity = 2)
    {
        $spySalesOrderItem = new SpySalesOrderItem();
        $spySalesOrderItem->setQuantity($quantity);

        return $spySalesOrderItem;
    }

}
