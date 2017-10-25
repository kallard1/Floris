<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
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
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=15)
     * @Assert\Ip()
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     */
    private $token;

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
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AddressCustomer", mappedBy="customer")
     */
    private $address;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Quote", mappedBy="customer")
     */
    private $quote;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        $this->address = new ArrayCollection();
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
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Customer
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Customer
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

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
     * Set createdAt
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
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updatedAt
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
     * @return mixed
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param mixed $quote
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
    }
}

