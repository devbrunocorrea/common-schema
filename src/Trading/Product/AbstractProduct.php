<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/common-schema
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 *
 */

namespace Gpupo\CommonSchema\Trading\Product;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

abstract class AbstractProduct extends EntityAbstract implements EntityInterface, CollectionInterface
{
    protected $primaryKey = 'id';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            'id' => 'integer',
            'title' => 'string',
            'gtin' => 'string',
            'description' => 'string',
            'category_id' => 'string',
            'brand' => 'string',
            'condition' => 'string',
            'price' => 'number',
            //Objects
            'attributes' => 'object',
            'variation_id' => 'integer',
            'variation_attributes' => 'array',
            //extra
            'tags' => 'array',
            'expands' => 'array',
        ];
    }
}
