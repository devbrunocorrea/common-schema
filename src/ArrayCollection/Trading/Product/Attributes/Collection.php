<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/common-schema created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\CommonSchema\ArrayCollection\Trading\Product\Attributes;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CommonSdk\Entity\CollectionAbstract;
use Gpupo\CommonSdk\Entity\CollectionContainerInterface;

final class Collection extends CollectionAbstract implements CollectionInterface, CollectionContainerInterface
{
    public function factoryElement($data)
    {
        return new Attribute($data);
    }
}
