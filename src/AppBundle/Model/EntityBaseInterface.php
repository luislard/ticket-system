<?php
namespace AppBundle\Model;
/**
 * Description of EntityBaseInterface
 *
 * @author Rene Ramirez <rene.ramirez@4pixels.co>
 */
interface EntityBaseInterface {
  /**
   * Returns the user unique id.
   *
   * @return mixed
   */
  public function getId();
  /**
   * Returns Entity Created Date
   *
   * @return \DateTime
   */
  public function getCreatedAt();
  /**
   * Set Entity Create Date
   * 
   * @param \DateTime $createdAt
   * 
   * @return self
   */
  public function setCreatedAt($createdAt);
  /**
   * Returns Entity last updated date
   *
   * @return \DateTime
   */
  public function getUpdatedAt();
  
  /**
   * Returns Entity Create Date string
   *
   * @return string
   */
  public function getDateCreated();
  /**
   * Set update date of entity
   *
   * @param \DateTime $updatedAt
   *
   * @return self
   */
  public function setUpdatedAt($updatedAt);
}