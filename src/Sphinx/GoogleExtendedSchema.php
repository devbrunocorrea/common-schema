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

/**
 * {@inheritdoc}
 */
class GoogleExtendedSchema extends GoogleSchema
{
    public $extra_field = [
        'document_slug' => ['attr' => 'string'],
    ];

    public $extra_attr = [
        'sale_price_discount'   => ['type' => 'float'],
        'sale_price_percentage' => ['type' => 'float'],
    ];

    public function __construct()
    {
        $this->field = array_merge($this->field, $this->extra_field);
        $this->attr = array_merge($this->attr, $this->extra_attr);

        parent::__construct();
    }
}
