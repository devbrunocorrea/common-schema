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

abstract class AbstractSchema extends CollectionAbstract
{
    protected $type;
    protected $properties = [];

    protected function load(array $array)
    {
        $this->type = $array['@type'];

        return $this->node($array, 'main');
    }

    protected function node(array $array, $main = false)
    {
        $list = [];

        foreach ($array as $k => $v) {
            if (false !== strpos($k, '@')) {
                if (@empty($main)) {
                    $this->properties[$k] = $v;
                }
                continue;
            }

            if (is_array($v)) {
                $list[$k] = $this->node($v);
                continue;
            }

            $list[$k] = 'string';
        }

        return $list;
    }

    protected function recursiveToTemplate($k, $v)
    {
        if (is_array($v)) {
            $s = "\n";

            if (!empty($k)) {
                $s .= "'".$k."' => ";
            }
            $s .= '[';
            foreach ($v as $y => $z) {
                $s .=  '    '.$this->recursiveToTemplate($y, $z);
            }

            return  $s."\n],";
        }

        return "\n'".$k."' => '".$v."',";
    }

    public function getTemplate()
    {
        $s = "[\n";
        foreach ($this->getRawSchema() as $k => $v) {
            $s .= $this->recursiveToTemplate($k, $v);
        }

        $s .= "\n];";

        return $s;
    }

    public function validate(array $array)
    {
        $d = array_diff_key($this->getSchema(), $array);

        if (!empty($d)) {
            throw new \Exception('Invalid '.implode(',', array_keys($d)));
        }

        return true;
    }

    public function saveJson($dest)
    {
        $json = json_encode($this->getSchema(), JSON_PRETTY_PRINT);

        return file_put_contents($dest, $json);
    }
}
