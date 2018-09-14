<?php

namespace zacksleo\incometax\interfaces;

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
interface TaxInterface
{

    function __construct($income);

    /**
     * 计算应纳税额
     *
     * @return float
     */
    public function getTax();

    /**
     * 计算应纳税所得额
     *
     * @return float
     */
    public function getTaxIncome();


    /**
     * 适用税率
     *
     * @return float
     */
    public function getTaxRate();

    /**
     * 计算税率和速算扣除数
     *
     * @return float
     */
    public function getDeduction();
}
