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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get businessName
     *
     * @return string
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * Set businessName
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
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Customer
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get vatNumber
     *
     * @return string
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * Set vatNumber
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
     * Get companyRegister
     *
     * @return string
     */
    public function getCompanyRegister()
    {
        return $this->companyRegister;
    }

    /**
     * Set companyRegister
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
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Customer
     */
    public function setToken($token)
    {
        $this->token = $token;

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
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return ArrayCollection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param ArrayCollection $addresses
     * @internal param ArrayCollection $address
     */
    public function setAddresses(ArrayCollection $addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @return string
     */
    public function getCreatedFromIp()
    {
        return $this->createdFromIp;
    }

    /**
     * @param string $createdFromIp
     */
    public function setCreatedFromIp($createdFromIp)
    {
        $this->createdFromIp = $createdFromIp;
    }

    /**
     * @return string
     */
    public function getUpdatedFromIp()
    {
        return $this->updatedFromIp;
    }

    /**
     * @param string $updatedFromIp
     */
    public function setUpdatedFromIp($updatedFromIp)
    {
        $this->updatedFromIp = $updatedFromIp;
    }
}

