<?php

/*
 * This file is part of gpupo/common-schema
 *
 * (c) Gilmar Pupo <contact@gpupo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$sku = [
     'itemOffered' => [
         'name'  => 'string',
         'sku'   => 'string',
         'gtin'  => 'string',
         'brand' => 'string',
     ],
     'price'    => 'string',
     'price'    => 'string',
     'discount' => 'string',
     'quantity' => 'string',
     'freight'  => 'string',
     'total'    => 'string',
 ];

 return [
    'merchant' => [
        'name'         => 'string',
        'marketplace'  => 'string',
        'originNumber' => 'string',
    ],
    'orderNumber'   => 'string',
    'currency'      => 'string',
    'price'         => 'string',
    'quantity'      => 'string',
    'total'         => 'string',
    'freight'       => 'string',
    'acceptedOffer' => [
        $sku,
    ],
    'url'             => 'string',
    'orderStatus'     => 'string',
    'paymentMethod'   => 'string',
    'paymentMethodId' => 'string',
    'orderDate'       => 'string',
    'isGift'          => 'string',
    'discount'        => 'string',
    'customer'        => [
        'name'      => 'string',
        'document'  => 'string',
        'birthDate' => 'string',
        'email'     => 'string',
        'gender'    => 'string',
        'telephone' => 'string',
        'cellphone' => 'string',
    ],
    'billingAddress' => [
        'name'                => 'string',
        'streetAddress'       => 'string',
        'addressLocality'     => 'string',
        'addressRegion'       => 'string',
        'addressCountry'      => 'string',
        'postalCode'          => 'string',
        'postOfficeBoxNumber' => 'string',
        'addressComplement'   => 'string',
        'addressNumber'       => 'string',
        'addressNeighborhood' => 'string',
        'addressReference'    => 'string',
    ],
    'invoice' => [
        'number'    => 'string',
        'line'      => 'string',
        'accessKey' => 'string',
        'issueDate' => 'string',
        'shipDate'  => 'string',
        'url'       => 'string',
    ],
    'tracking' => [
        'carrier'               => 'string',
        'deliveryDate'          => 'string',
        'estimatedDeliveryDate' => 'string',
        'deliveryService'       => 'string',
        'shipDate'              => 'string',
        'trackingLink'          => 'string',
        'trackingNumber'        => 'string',
        'trackingShipDate'      => 'string',
    ],
 ];
