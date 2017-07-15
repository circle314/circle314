<?php

namespace Circle314\Concept\Ordering;

abstract class OrderingConstants
{
    const ASCENDING = 'ascending';
    const ASCENDING_NULLS_FIRST = 'ascendingNullsFirst';
    const DESCENDING = 'descending';
    const DESCENDING_NULLS_LAST = 'descendingNullsLast';

    final private function __construct()
    {

    }
}