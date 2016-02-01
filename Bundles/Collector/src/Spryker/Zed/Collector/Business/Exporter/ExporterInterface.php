<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Collector\Business\Exporter;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;

interface ExporterInterface
{

    /**
     * @param string $type
     * @param LocaleTransfer $locale
     *
     * @return \Spryker\Zed\Collector\Business\Model\BatchResultInterface
     */
    public function exportByType($type, LocaleTransfer $locale);

}
