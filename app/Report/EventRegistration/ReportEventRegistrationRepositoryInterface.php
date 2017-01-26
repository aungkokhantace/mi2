<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 1/24/2017
 * Time: 2:34 PM
 */
namespace App\Report\EventRegistration;

interface ReportEventRegistrationRepositoryInterface
{
    public function getEventRegistrations();
    public function getEventRegistrationsByDate($from_date, $to_date, $paramArray);
}