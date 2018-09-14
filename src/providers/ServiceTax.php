<?php

namespace zacksleo\incometax\providers;

use zacksleo\incometax\interfaces\TaxInterface;

/**
 * 个税所得计算类
 *
 * @category  Library
 * @package   IncomeTax
 * @author    zacksleo <zacksleo@gmail.com>
 * @copyright 2018 zacksleo
 * @license   MIT https://github.com/zacksleo/income-tax/blob/master/LICENSE
 * @link      https://github.com/zacksleo/income-tax
 */
class ServiceTax implements TaxInterface
{
    private $tax;

    private $taxIncome;

    private $deduction;

    private $taxRate;

    function __construct($income)
    {
        if ($income <= 800) {
            $this->tax = 0;
            $this->taxIncome = 0;
            $this->deduction = 0;
            $this->taxRate = 0;
            return;
        } elseif ($income <= 4000) {
            $this->taxIncome = $income - 800;
        } else {
            $this->taxIncome = $income * 0.8;
        }
        if ($this->taxIncome < 20000) {
            $this->taxRate = 0.2;
            $this->deduction = 0;
        } elseif ($this->taxIncome < 50000) {
            $this->taxRate = 0.3;
            $this->deduction = 2000;
        } else {
            $this->taxRate = 0.4;
            $this->deduction = 7000;
        }
        $this->tax = floatval(round($this->taxIncome * $this->taxRate - $this->deduction, 2));
    }

    /**
     * 计算应纳税额
     *
     * @return float
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * 计算应纳税所得额
     *
     * @return float
     */
    public function getTaxIncome()
    {
        return $this->taxIncome;
    }

    /**
     * 适用税率
     *
     * @return float
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * 计算税率和速算扣除数
     *
     * @return float
     */
    public function getDeduction()
    {
        return $this->deduction;
    }
}
