<?php

namespace Circle314\Type\TypeInterface;

use \DateTime;

interface DateTimeTypeInterface extends TypeInterface
{
    public function format($format);
    public function hasPassed(DateTime $dateTime = null);
}
