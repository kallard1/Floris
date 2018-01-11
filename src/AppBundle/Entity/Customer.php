<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerRepository")
 */
class Customer extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="business_name", type="string", length=255)
     */
    private $businessName;

    /**
     * @var string
     *
     * @ORM\Column(name="vat_number", type="string", length=13, unique=true)
     */
    private $vatNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="company_register", type="string", length=14, unique=true)
     */
    private $companyRegister;

    /**
     * @var string $createdFromIp
     *
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(length=45, nullable=true)
     */
    private $createdFromIp;

    /**
     * @var string $updatedFromIp
     *
     * @Gedmo\IpTraceable(on="update")
     * @ORM\Column(length=45, nullable=true)
     */
    private $updatedFromIp;


    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @var \DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime $updatedAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AddressCustomer", mappedBy="customer", cascade={"persist"})
     */
    private $addresses;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addresses = new ArrayCollection();
    }

    /**
     * Set businessName.
     *
     * @param string $businessName
     *
     * @return Customer
     */
    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;

        return $this;
    }

    /**
     * Get businessName.
     *
     * @return string
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * Set vatNumber.
     *
     * @param string $vatNumber
     *
     * @return Customer
     */
    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    /**
     * Get vatNumber.
     *
     * @return string
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * Set companyRegister.
     *
     * @param string $companyRegister
     *
     * @return Customer
     */
    public function setCompanyRegister($companyRegister)
    {
        $this->companyRegister = $companyRegister;

        return $this;
    }

    /**
     * Get companyRegister.
     *
     * @return string
     */
    public function getCompanyRegister()
    {
        return $this->companyRegister;
    }

    /**
     * Set createdFromIp.
     *
     * @param string|null $createdFromIp
     *
     * @return Customer
     */
    public function setCreatedFromIp($createdFromIp = null)
    {
        $this->createdFromIp = $createdFromIp;

        return $this;
    }

    /**
     * Get createdFromIp.
     *
     * @return string|null
     */
    public function getCreatedFromIp()
    {
        return $this->createdFromIp;
    }

    /**
     * Set updatedFromIp.
     *
     * @param string|null $updatedFromIp
     *
     * @return Customer
     */
    public function setUpdatedFromIp($updatedFromIp = null)
    {
        $this->updatedFromIp = $updatedFromIp;

        return $this;
    }

    /**
     * Get updatedFromIp.
     *
     * @return string|null
     */
    public function getUpdatedFromIp()
    {
        return $this->updatedFromIp;
    }

    /**
     * Set token.
     *
     * @param string|null $token
     *
     * @return Customer
     */
    public function setToken($token = null)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token.
     *
     * @return string|null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Customer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return Customer
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add address.
     *
     * @param \AppBundle\Entity\AddressCustomer $address
     *
     * @return Customer
     */
    public function addAddress(\AppBundle\Entity\AddressCustomer $address)
    {
        $this->addresses[] = $address;

        return $this;
    }

    /**
     * Remove address.
     *
     * @param \AppBundle\Entity\AddressCustomer $address
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAddress(\AppBundle\Entity\AddressCustomer $address)
    {
        return $this->addresses->removeElement($address);
    }

    /**
     * Get addresses.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }
}
