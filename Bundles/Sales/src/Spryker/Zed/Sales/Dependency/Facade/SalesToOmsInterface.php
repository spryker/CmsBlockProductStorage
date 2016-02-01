<?php

namespace Spryker\Zed\Sales\Dependency\Facade;

use Generated\Shared\Transfer\OrderTransfer;
use Orm\Zed\Oms\Persistence\SpyOmsOrderItemState;
use Orm\Zed\Oms\Persistence\SpyOmsOrderProcess;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;

interface SalesToOmsInterface
{

    /**
     * @return \Orm\Zed\Oms\Persistence\SpyOmsOrderItemState
     */
    public function getInitialStateEntity();

    /**
     * @param string $processName
     *
     * @return \Orm\Zed\Oms\Persistence\SpyOmsOrderProcess
     */
    public function getProcessEntity($processName);

    /**
     * @param OrderTransfer $transferOrder
     *
     * @return string
     */
    public function selectProcess(OrderTransfer $transferOrder);

    /**
     * @return array
     */
    public function getOrderItemMatrix();

    /**
     * @param int $idOrderItem
     *
     * @return string[]
     */
    public function getManualEvents($idOrderItem);

    /**
     * @param SpySalesOrder $order
     * @param string $flag
     *
     * @return SpySalesOrderItem[]
     */
    public function getItemsWithFlag(SpySalesOrder $order, $flag);

}
