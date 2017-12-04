<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Model\EntityBase;
use AppBundle\Entity\Issue;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * IssueStatus
 * 
 * @ApiResource
 *
 * @ORM\Table(name="issues")
 * @Gedmo\Tree(type="nested")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\NestedTreeRepository")
 */
class Issue extends EntityBase
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
     * @var string
     * 
     * @ORM\Column(name="intervention",type="string", length=150, nullable=true)
     */
    protected $intervention;
    
    /**
     * @var string
     * @ORM\Column(name="description",type="text", nullable=true)
     */
    protected $description;
    
    /**
     * 
     * @var IssueCategory()
     * 
     * @ORM\ManyToOne(targetEntity="IssueCategory")
     * @ORM\JoinColumn(name="issue_category", referencedColumnName="id", nullable=true)
     */
    protected $issueCategory;
    
    /**
     * @var IssueStatus()
     * @ORM\ManyToOne(targetEntity="IssueStatus")
     * @ORM\JoinColumn(name="issue_status", referencedColumnName="id", nullable=true)
     */
    protected $issueStatus;
    
    /**
     * @var integer
     * @Gedmo\TreeLeft
     * @ORM\Column(name="lft", type="integer")
     */
    private $lft;

    /**
     * @var integer
     * @Gedmo\TreeLevel
     * @ORM\Column(name="lvl", type="integer")
     */
    private $lvl;

    /**
     * @var integer
     * @Gedmo\TreeRight
     * @ORM\Column(name="rgt", type="integer")
     */
    private $rgt;

    /**
     * @var Issue()
     * @Gedmo\TreeRoot
     * @ORM\ManyToOne(targetEntity="Issue")
     * @ORM\JoinColumn(name="tree_root", referencedColumnName="id", onDelete="CASCADE")
     */
    private $root;

    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="Issue", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="Issue", mappedBy="parent")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    private $children;

    public function getId()
    {
        return $this->id;
    }

    public function setIntervention($intervention)
    {
        $this->intervention = $intervention;
    }

    public function getIntervention()
    {
        return $this->intervention;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function setParent(Issue $parent = null)
    {
        $this->parent = $parent;
    }

    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set lft
     *
     * @param integer $lft
     *
     * @return Issue
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     *
     * @return Issue
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     *
     * @return Issue
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set issueType
     *
     * @param \AppBundle\Entity\IssueType $issueType
     *
     * @return Issue
     */
    public function setIssueCategory(\AppBundle\Entity\IssueCategory $issueCategory = null)
    {
        $this->issueCategory = $issueCategory;

        return $this;
    }

    /**
     * Get issueCategory
     *
     * @return \AppBundle\Entity\IssueCategory
     */
    public function getIssueCategory()
    {
        return $this->issueCategory;
    }

    /**
     * Set issueStatus
     *
     * @param \AppBundle\Entity\IssueStatus $issueStatus
     *
     * @return Issue
     */
    public function setIssueStatus(\AppBundle\Entity\IssueStatus $issueStatus = null)
    {
        $this->issueStatus = $issueStatus;

        return $this;
    }

    /**
     * Get issueStatus
     *
     * @return \AppBundle\Entity\IssueStatus
     */
    public function getIssueStatus()
    {
        return $this->issueStatus;
    }

    /**
     * Set root
     *
     * @param \AppBundle\Entity\Issue $root
     *
     * @return Issue
     */
    public function setRoot(\AppBundle\Entity\Issue $root = null)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Add child
     *
     * @param \AppBundle\Entity\Issue $child
     *
     * @return Issue
     */
    public function addChild(\AppBundle\Entity\Issue $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \AppBundle\Entity\Issue $child
     */
    public function removeChild(\AppBundle\Entity\Issue $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }
}

