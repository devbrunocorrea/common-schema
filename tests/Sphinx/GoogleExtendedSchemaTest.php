<?php

/*
 * This file is part of gpupo/common-schema
 *
 * (c) Gilmar Pupo <contact@gpupo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gpupo\Tests\CommonSchema\Sphinx;

use Gpupo\CommonSchema\Sphinx\GoogleExtendedSchema;

class GoogleExtendedSchemaTest extends GoogleSchemaTest
{
    protected function factory()
    {
        $schema = new GoogleExtendedSchema();

        return $schema;
    }
}
