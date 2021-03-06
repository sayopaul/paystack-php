<?php
namespace Yabacon\Paystack\Tests\Routes;

use Yabacon\Paystack\Routes\Transaction;
use Yabacon\Paystack\Contracts\RouteInterface;

class TransactionTest extends \PHPUnit_Framework_TestCase
{
    public function testRoot()
    {
        $r = new Transaction();
        $this->assertEquals('/transaction', $r->root());
    }

    public function testEndpoints()
    {
        $r = new Transaction();
        $this->assertEquals('/transaction/verify/{reference}', $r->verify()[RouteInterface::ENDPOINT_KEY]);
        $this->assertEquals('/transaction', $r->getList()[RouteInterface::ENDPOINT_KEY]);
        $this->assertEquals('/transaction/{id}', $r->fetch()[RouteInterface::ENDPOINT_KEY]);
        $this->assertEquals('/transaction/initialize', $r->initialize()[RouteInterface::ENDPOINT_KEY]);
        $this->assertEquals('/transaction/charge_authorization', $r->charge()[RouteInterface::ENDPOINT_KEY]);
        $this->assertEquals('/transaction/charge_token', $r->chargeToken()[RouteInterface::ENDPOINT_KEY]);
        $this->assertEquals('/transaction/totals', $r->totals()[RouteInterface::ENDPOINT_KEY]);
        $this->assertEquals('/transaction/export', $r->export()[RouteInterface::ENDPOINT_KEY]);
    }
    
    public function testMethods()
    {
        $r = new Transaction();
        $this->assertEquals(RouteInterface::GET_METHOD, $r->verify()[RouteInterface::METHOD_KEY]);
        $this->assertEquals(RouteInterface::GET_METHOD, $r->getList()[RouteInterface::METHOD_KEY]);
        $this->assertEquals(RouteInterface::GET_METHOD, $r->fetch()[RouteInterface::METHOD_KEY]);
        $this->assertEquals(RouteInterface::POST_METHOD, $r->initialize()[RouteInterface::METHOD_KEY]);
        $this->assertEquals(RouteInterface::POST_METHOD, $r->charge()[RouteInterface::METHOD_KEY]);
        $this->assertEquals(RouteInterface::POST_METHOD, $r->chargeToken()[RouteInterface::METHOD_KEY]);
        $this->assertEquals(RouteInterface::GET_METHOD, $r->totals()[RouteInterface::METHOD_KEY]);
        $this->assertEquals(RouteInterface::GET_METHOD, $r->export()[RouteInterface::METHOD_KEY]);
    }
}
