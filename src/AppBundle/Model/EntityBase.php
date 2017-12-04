<?php
namespace AppBundle\Model;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Description of EntityBase
 *
 * @author Rene Ramirez <rene.ramirez@4pixels.co>
 */
abstract class EntityBase implements EntityBaseInterface {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    protected $updatedAt;
    /**
     * {@inheritDoc}
     */
    public function getId() {
        return $this->id;
    }
    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt) {
    $this->createdAt = $createdAt;
    return $this;
    }
    /**
     * {@inheritDoc}
     */
    public function getCreatedAt() {
    return $this->createdAt;
    }
    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt) {
    $this->updatedAt = $updatedAt;
    return $this;
    }
    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt() {
    return $this->updatedAt;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getDateCreated()
    {
        return $this->createdAt->format('Y-m-d');
    }
}