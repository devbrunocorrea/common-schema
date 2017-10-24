<?php

/*
 * This file is part of gpupo/common-schema
 *
 * (c) Gilmar Pupo <contact@gpupo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\CommonSchema;

use Gpupo\Common\Entity\CollectionAbstract;

abstract class AbstractTranslator extends CollectionAbstract
{
    public function setNative(CollectionAbstract $collection)
    {
        $this->set('native', $collection);

        return $this;
    }

    public function getNative()
    {
        return $this->get('native');
    }

    public function setForeign(TranslatorDataCollection $collection)
    {
        $this->set('foreign', $collection);

        return $this;
    }

    public function getForeign()
    {
        $data = $this->get('foreign');

        if (!$data instanceof TranslatorDataCollection) {
            throw new TranslatorException('Foreign object missed!');
        }

        return $data;
    }

    protected function factoryOutputCollection(array $array)
    {
        return new TranslatorDataCollection($array);
    }

    abstract public function translateTo();

    abstract public function translateFrom();
}
