<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriesProduct
 *
 * @ORM\Table(name="categories_product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriesProductRepository")
 */
class CategoriesProduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Products", inversedBy="id")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    private $productId;

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categories", inversedBy="id")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private $categoryId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     *
     * @return CategoriesProduct
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return CategoriesProduct
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
}

