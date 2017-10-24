<?php

/*
 * This file is part of gpupo/common-schema
 *
 * (c) Gilmar Pupo <contact@gpupo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\Tests\CommonSchema\Trading;

use Gpupo\CommonSchema\Trading\OrderSchema;

/**
 * @coversDefaultClass \Gpupo\CommonSchema\Trading\OrderSchema
 */
class OrderSchemaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \Gpupo\CommonSchema\Trading\OrderSchema
     */
    public function dataProviderOrderSchema()
    {
        return [[new OrderSchema()]];
    }

    protected function recursiveAssert($array)
    {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $this->recursiveAssert($v);
                continue;
            }
            $this->assertSame('string', $v, $k);
        }
    }

    /**
     * @testdox ``getSchema()``
     * @cover ::getSchema
     * @dataProvider dataProviderOrderSchema
     * @test
     */
    public function getSchema(OrderSchema $orderSchema)
    {
        $this->assertInternalType('array', $orderSchema->getSchema());
        $this->recursiveAssert($orderSchema->getSchema());
    }

    /**
     * @testdox ``saveJson()``
     * @cover ::saveJson
     * @dataProvider dataProviderOrderSchema
     * @test
     */
    public function saveJson(OrderSchema $orderSchema)
    {
        $this->assertGreaterThan(100, $orderSchema->saveJson(__DIR__.'/../../Resources/fixtures/trading/order.json'));
    }

    /**
     * @testdox ``getTemplate()``
     * @cover ::getTemplate
     * @dataProvider dataProviderOrderSchema
     * @test
     */
    public function getTemplate(OrderSchema $orderSchema)
    {
        $this->assertInternalType('string', $orderSchema->getTemplate());
    }

    /**
     * @testdox ``validate() Fail if not equal schema``
     * @cover ::validate
     * @expectedException Exception
     * @dataProvider dataProviderOrderSchema
     * @test
     */
    public function validateFail(OrderSchema $orderSchema)
    {
        $orderSchema->validate([]);
    }

    /**
     * @testdox ``validate() Success if equal schema``
     * @cover ::validate
     * @dataProvider dataProviderOrderSchema
     * @test
     */
    public function validateSuccess(OrderSchema $orderSchema)
    {
        $this->assertTrue($orderSchema->validate($orderSchema->getSchema()));
    }
}
