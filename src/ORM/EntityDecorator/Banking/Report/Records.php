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

namespace Gpupo\CommonSchema\ORM\EntityDecorator\Banking\Report;

use Gpupo\CommonSchema\ORM\EntityDecorator\AbstractCollectionDecorator;

class Records extends AbstractCollectionDecorator
{
    public function getTotalGross()
    {
        return $this->getTotalOf('gross_amount');
    }

    public function getTotalFee()
    {
        return $this->getTotalOf('fee_amount');
    }
}
