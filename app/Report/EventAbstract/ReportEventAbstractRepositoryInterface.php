<?php
/**
 * Created by PhpStorm.
 * User: william
 * Author: william
 * Date: 1/24/2017
 * Time: 4:43 PM
 */

namespace App\Report\EventAbstract;

interface ReportEventAbstractRepositoryInterface
{
    public function getEventAbstracts();
    public function getEventAbstractsByDate($from_date, $to_date, $paramArray);
}