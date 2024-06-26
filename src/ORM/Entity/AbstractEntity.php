<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/common-schema created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\CommonSchema\ORM\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gpupo\Common\Entity\AbstractORMEntity as Core;
use Gpupo\Common\Traits\PreviousAwareTrait;
use Gpupo\CommonSchema\ORM\EntityDecorator\CollectionContainerTrait;

/**
 * @ORM\MappedSuperclass
 */
abstract class AbstractEntity extends Core implements EntityInterface
{
    use CollectionContainerTrait;
    use PreviousAwareTrait;

    protected $propertyNamingMode = 'snake_case';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var DateTime (Record creation timestamp)
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @var DateTime (Record update timestamp)
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_at;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deleted_at;

    /**
     * @var null|array
     *
     * @ORM\Column(name="expands", type="array", nullable=true)
     */
    protected $expands;

    /**
     * @var null|array
     *
     * @ORM\Column(type="json_array",nullable=true,options={"jsonb"=true})
     */
    protected $expandb;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $created_by;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $updated_by;

    public function __toString()
    {
        foreach (['name', 'description', 'key', 'id'] as $k) {
            if (property_exists($this, $k)) {
                $getter = sprintf('get%s', ucfirst($k));

                return (string) $this->{$getter}();
            }
        }
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns created_at.
     *
     * @return DateTime
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->created_at;
    }

    /**
     * Returns updated_at.
     *
     * @return DateTime
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updated_at;
    }

    /**
     * Sets created_at.
     *
     * @param DateTime $created_at
     */
    public function setCreatedAt(?DateTime $created_at = null): void
    {
        $this->created_at = $created_at;
    }

    /**
     * Sets updated_at.
     *
     * @param DateTime $updated_at
     */
    public function setUpdatedAt(?DateTime $updated_at = null): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * Sets deleted_at.
     */
    public function setDeletedAt(?DateTime $deleted_at = null): void
    {
        $this->deleted_at = $deleted_at;
    }

    /**
     * Returns deleted_at.
     *
     * @return DateTime
     */
    public function getDeletedAt(): ?DateTime
    {
        return $this->deleted_at;
    }

    /**
     * Returns created_by.
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set created_by.
     *
     * @param string
     * @param mixed $string
     */
    public function setCreatedBy($string)
    {
        $this->created_by = $string;
    }

    /**
     * Set updated_by.
     *
     * @param string
     * @param mixed $string
     */
    public function setUpdatedBy($string)
    {
        $this->updated_by = $string;
    }

    /**
     * Returns updated_by.
     *
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Is deleted?
     */
    public function isDeleted(): bool
    {
        return null !== $this->deleted_at;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function addTag($tag)
    {
        return $this->setTags(array_merge((array) $this->getTags(), [$tag]));
    }

    /**
     * Set expands.
     *
     * @param null|array $expands
     */
    public function setExpands(array $expands = null)
    {
        $this->expands = $expands;

        return $this;
    }

    /**
     * Set expandb.
     *
     * @param null|array $expandb
     */
    public function setExpandb(array $array = null)
    {
        $this->expandb = $array;

        return $this;
    }

    /**
     * Get expands.
     *
     * @return null|array
     */
    public function getExpands()
    {
        return $this->expands;
    }

    /**
     * Get Jsonb expands.
     *
     * @return null|array
     */
    public function getExpandb()
    {
        return $this->expandb;
    }

    public function addExpand($key, $value)
    {
        $array = (array) $this->getExpands();
        $array[$key] = $value;

        return $this->setExpands($array);
    }

    public function get($key)
    {
        $method = sprintf('get%s', ucfirst($key));

        return $this->{$method}();
    }

    public function getSchema(): array
    {
        return [
        ];
    }
}
