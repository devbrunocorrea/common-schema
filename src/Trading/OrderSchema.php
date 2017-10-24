<?php

/*
 * This file is part of gpupo/common-schema
 *
 * (c) Gilmar Pupo <contact@gpupo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\CommonSchema\Trading;

use Gpupo\CommonSchema\AbstractSchema;

class OrderSchema extends AbstractSchema
{
    public function getSchema()
    {
        return require __DIR__.'/order.schema.php';
    }
    /**
     * @see https://developers.google.com/schemas/reference/order
     */
    public function getRawSchema()
    {
        $content = file_get_contents(__DIR__.'/order.schema.json');

        return $this->load(json_decode($content, true));
    }
}
