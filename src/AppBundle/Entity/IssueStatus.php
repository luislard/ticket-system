<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use AppBundle\Model\EntityBase;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * IssueStatus
 * 
 * @ApiResource
 *
 * @ORM\Table(name="issue_statuses")
 * @ORM\Entity(repositoryClass="")
 * @UniqueEntity("label")
 */
class IssueStatus extends EntityBase
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(name="label",type="string", length=150, nullable=false, unique=true)
     */
    protected $label;
    
    /**
        * @ORM\Column(name="description",type="text", nullable=true)
     */
    protected $description;
    

    /**
     * Set label
     *
     * @param string $label
     *
     * @return IssueType
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return IssueType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
