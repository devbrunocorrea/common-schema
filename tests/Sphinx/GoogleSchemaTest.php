<?php

/*
 * This file is part of gpupo/common-schema
 *
 * (c) Gilmar Pupo <contact@gpupo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\Tests\CommonSchema\Sphinx;

use Gpupo\CommonSchema\Sphinx\GoogleSchema;

class GoogleSchemaTest extends \PHPUnit_Framework_TestCase
{
    protected function factory()
    {
        $schema = new GoogleSchema();

        return $schema;
    }
    /**
     * @dataProvider dataProviderFieldsToNormalize
     */
    public function testNormalizeFieldName($name, $expected)
    {
        $this->assertSame($this->factory()->normalizeFieldName($name), $expected);
    }

    public function dataProviderFieldsToNormalize()
    {
        return [
            ['g:gtin', 'sku'],
            ['g:product_type', 'type'],
            ['g:google_product_category', 'category'],
            ['g:product_review_count', 'review_count'],
            ['g:product_review_average', 'review_average'],

        ];
    }
}
