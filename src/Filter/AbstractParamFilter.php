<?php
/*
* This file is part of the Zend Airbrake module
*
* For license information, please view the LICENSE file that was distributed with this source code.
* Written by Frank Houweling <fhouweling@senet.nl>, 7/24/2017
*/

namespace FrankHouweling\ZendAirbrake\Filter;

use Airbrake\Errors\Notice;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\RequestInterface;

/**
 * Class AbstractParamFilter
 * @package FrankHouweling\ZendAirbrake\Filter
 */
abstract class AbstractParamFilter implements FilterInterface
{
    /**
     * Returns the param name.
     * @return mixed
     */
    abstract protected static function getName();

    /**
     * Returns the param value.
     * @return string
     */
    abstract protected function getValue() : string;

    /**
     * @param array $notice
     * @return array
     */
    public function __invoke($notice)
    {
        $notice['params'][static::getName()] = $this->getValue();
        return $notice;
    }
}