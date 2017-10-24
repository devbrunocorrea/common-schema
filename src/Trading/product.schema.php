<?php

/*
 * This file is part of gpupo/common-schema
 *
 * (c) Gilmar Pupo <contact@gpupo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$asset = [
    'name' => 'string',
    'url'  => 'string',
];

$media = [
    'images' => [
        $asset,
    ],
    'videos' => [
        $asset,
    ],
];

$attributes = [
    [
        'name'  => 'string',
        'value' => 'string',
    ],
];

$sku = [
    'skuId'       => 'string',
    'gtin'        => 'string',
    'name'        => 'string',
    'description' => 'string',
    'color'       => 'string',
    'size'        => 'string',
    'gender'      => 'string',
    'media'       => $media,
    'height'      => 'string',
    'width'       => 'string',
    'depth'       => 'string',
    'weight'      => 'string',
    'listPrice'   => 'string',
    'sellPrice'   => 'string',
    'stock'       => 'string',
    'status'      => 'string',
    'attributes'  => $attributes,
];

 return [
     'productId'   => 'string',
     'productType' => 'string',
     'department'  => 'string',
     'category'    => 'string',
     'brand'       => 'string',
     'skus'        => [$sku],
     'media'       => $media,
     'attributes'  => $attributes,
 ];
