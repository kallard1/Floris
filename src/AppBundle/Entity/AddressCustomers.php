<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AddressCustomers
 *
 * @ORM\Table(name="address_customers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressCustomersRepository")
 */
class AddressCustomers
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
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=15, unique=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="street1", type="string", length=50)
     */
    private $street1;

    /**
     * @var string
     *
     * @ORM\Column(name="streetÂ2", type="string", length=50, nullable=true)
     */
    private $streetÂ2;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=12)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50)
     */
    private $city;

    /**
     * @var bool
     *
     * @ORM\Column(name="as_default", type="boolean")
     */
    private $asDefault;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


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
     * Set phone
     *
     * @param string $phone
     *
     * @return AddressCustomers
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set street1
     *
     * @param string $street1
     *
     * @return AddressCustomers
     */
    public function setStreet1($street1)
    {
        $this->street1 = $street1;

        return $this;
    }

    /**
     * Get street1
     *
     * @return string
     */
    public function getStreet1()
    {
        return $this->street1;
    }

    /**
     * Set streetÂ2
     *
     * @param string $streetÂ2
     *
     * @return AddressCustomers
     */
    public function setStreetÂ2($streetÂ2)
    {
        $this->streetÂ2 = $streetÂ2;

        return $this;
    }

    /**
     * Get streetÂ2
     *
     * @return string
     */
    public function getStreetÂ2()
    {
        return $this->streetÂ2;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return AddressCustomers
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return AddressCustomers
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set asDefault
     *
     * @param boolean $asDefault
     *
     * @return AddressCustomers
     */
    public function setAsDefault($asDefault)
    {
        $this->asDefault = $asDefault;

        return $this;
    }

    /**
     * Get asDefault
     *
     * @return bool
     */
    public function getAsDefault()
    {
        return $this->asDefault;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AddressCustomers
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return AddressCustomers
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}

