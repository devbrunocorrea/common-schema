<?php

/*
 * This file is part of gpupo/common-schema
 *
 * (c) Gilmar Pupo <contact@gpupo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\CommonSchema\Sphinx;

use Gpupo\CommonSchema\SchemaAbstract;
use Gpupo\CommonSchema\SchemaInterface;

/**
 * Products Feed Specification https://support.google.com/merchants/answer/188494?hl=pt-BR.
 */
class GoogleSchema extends SchemaAbstract implements SchemaInterface
{
    public $field = [
        'channel'      => ['attr' => 'string'],
        'title'        => ['attr' => 'string'],
        'description'  => ['attr' => 'string'],
        'sku'          => ['attr' => 'string'],
        'category'     => ['attr' => 'string'],
        'type'         => ['attr' => 'string'],
        'brand'        => ['attr' => 'string'],
        'size'         => ['attr' => 'string'],
        'color'        => ['attr' => 'string'],
        'gender'       => ['attr' => 'string'],
        'availability' => ['attr' => 'string'],
    ];

    public $attr = [
        'link'                      => ['type' => 'string'],
        'id'                        => ['type' => 'int', 'bits' => 20],
        'price'                     => ['type' => 'float'],
        'sale_price'                => ['type' => 'float'],
        'sale_price_effective_date' => ['type' => 'string'],
        'mpn'                       => ['type' => 'string'],
        'image_link'                => ['type' => 'string'],
        'condition'                 => ['type' => 'string'],
        'age_group'                 => ['type' => 'string'],
        'shipping_weight'           => ['type' => 'string'],
        'online_only'               => ['type' => 'string'],
        'installment_months'        => ['type' => 'int', 'bits' => 5],
        'installment_amount'        => ['type' => 'float'],
        'review_count'              => ['type' => 'int', 'bits' => 5],
        'review_average'            => ['type' => 'int', 'bits' => 5],
    ];

    public $key_conversion = [
        'g:'                      => '',
        'gtin'                    => 'sku',
        'product_type'            => 'type',
        'google_product_category' => 'category',
        'product_review_count'    => 'review_count',
        'product_review_average'  => 'review_average',
    ];

    public function normalizeFieldName($name)
    {
        $tag = str_replace(array_keys($this->key_conversion), $this->key_conversion, $name);

        if (in_array($tag, ['months', 'amount'], true)) {
            $tag = 'installment_'.$tag;
        }

        return $tag;
    }

    public function getSluggables()
    {
        return  [
            'title',
            'category',
            'brand',
            'size',
            'color',
            'availability',
        ];
    }
}
