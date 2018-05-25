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

return [
    'metadata' => [
        'context' => 'http://schema.org/OrderItem',
        'type' => 'OrderItem',
        'description' => '',
    ],
    'expands' => [],

      'itemOffered' => [
          'name' => 'string',
          'sku' => 'string',
          'gtin' => 'string',
          'brand' => 'string',
      ],
      'price' => 'string',
      'price' => 'string',
      'discount' => 'string',
      'quantity' => 'string',
      'freight' => 'string',
      'total' => 'string',
  ];