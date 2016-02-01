<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Client\Catalog\Model\Builder;

use Elastica\Aggregation\AbstractAggregation;

interface FacetAggregationBuilderInterface
{

    /**
     * @param string $fieldName
     *
     * @return \Elastica\Aggregation\AbstractAggregation
     */
    public function createNumberFacetAggregation($fieldName);

    /**
     * @param string $fieldName
     *
     * @return \Elastica\Aggregation\AbstractAggregation
     */
    public function createStringFacetAggregation($fieldName);

}
