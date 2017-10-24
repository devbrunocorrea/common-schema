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

use Gpupo\CommonSchema\Trading\ProductSchema;

/**
 * @coversDefaultClass \Gpupo\CommonSchema\Trading\ProductSchema
 */
class ProductSchemaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \Gpupo\CommonSchema\Trading\ProductSchema
     */
    public function dataProviderProductSchema()
    {
        return [[new ProductSchema()]];
    }

    protected function recursiveAssert($array)
    {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $this->recursiveAssert($v);
                continue;
            }
            $this->assertSame('string', $v, $k.json_encode($array));
        }
    }

    /**
     * @testdox ``getSchema()``
     * @cover ::getSchema
     * @dataProvider dataProviderProductSchema
     * @test
     */
    public function getSchema(ProductSchema $productSchema)
    {
        $this->assertInternalType('array', $productSchema->getSchema());
        $this->recursiveAssert($productSchema->getSchema());
    }

    /**
     * @testdox ``saveJson()``
     * @cover ::saveJson
     * @dataProvider dataProviderProductSchema
     * @test
     */
    public function saveJson(ProductSchema $productSchema)
    {
        $this->assertGreaterThan(100, $productSchema->saveJson(__DIR__.'/../../Resources/fixtures/trading/product.json'));
    }

    /**
     * @testdox ``getTemplate()``
     * @cover ::getTemplate
     * @dataProvider dataProviderProductSchema
     * @test
     */
    public function getTemplate(ProductSchema $productSchema)
    {
        $this->assertInternalType('string', $productSchema->getTemplate());
    }

    /**
     * @testdox ``validate() Fail if not equal schema``
     * @cover ::validate
     * @expectedException Exception
     * @dataProvider dataProviderProductSchema
     * @test
     */
    public function validateFail(ProductSchema $productSchema)
    {
        $productSchema->validate([]);
    }

    /**
     * @testdox ``validate() Success if equal schema``
     * @cover ::validate
     * @dataProvider dataProviderProductSchema
     * @test
     */
    public function validateSuccess(ProductSchema $productSchema)
    {
        $this->assertTrue($productSchema->validate($productSchema->getSchema()));
    }
}
