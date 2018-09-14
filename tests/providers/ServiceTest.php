<?php

namespace zacksleo\demo\tests\providers;

use zacksleo\incometax\providers\ServiceTax;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ServiceTest extends TestCase
{
    public function testGetTax()
    {
        $tax = new ServiceTax(10000);
        $this->assertEquals($tax->getTax(), 1600);
        $this->assertEquals($tax->getDeduction(), 0);

        $tax2 = new ServiceTax(80000);
        $this->assertEquals($tax2->getTax(), 18600);
        $this->assertEquals($tax2->getTaxIncome(), 64000);

        $tax3 = new ServiceTax(600);
        $this->assertEquals($tax3->getTax(), 0);
        $this->assertEquals($tax3->getTaxIncome(), 0);
    }
}
