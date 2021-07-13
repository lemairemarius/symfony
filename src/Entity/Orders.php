<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="CustomerID", columns={"CustomerID"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="OrderID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="EmployeeID", type="integer", nullable=true)
     */
    private $employeeid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="OrderDate", type="datetime", nullable=true)
     */
    private $orderdate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="RequiredDate", type="datetime", nullable=true)
     */
    private $requireddate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ShippedDate", type="datetime", nullable=true)
     */
    private $shippeddate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ShipVia", type="integer", nullable=true)
     */
    private $shipvia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Freight", type="decimal", precision=10, scale=4, nullable=true, options={"default"="0.0000"})
     */
    private $freight = '0.0000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ShipName", type="string", length=40, nullable=true)
     */
    private $shipname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ShipAddress", type="string", length=60, nullable=true)
     */
    private $shipaddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ShipCity", type="string", length=15, nullable=true)
     */
    private $shipcity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ShipRegion", type="string", length=15, nullable=true)
     */
    private $shipregion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ShipPostalCode", type="string", length=10, nullable=true)
     */
    private $shippostalcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ShipCountry", type="string", length=15, nullable=true)
     */
    private $shipcountry;

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CustomerID", referencedColumnName="CustomerID")
     * })
     */
    private $customerid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Products", inversedBy="orderid")
     * @ORM\JoinTable(name="order_details",
     *   joinColumns={
     *     @ORM\JoinColumn(name="OrderID", referencedColumnName="OrderID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ProductID", referencedColumnName="ProductID")
     *   }
     * )
     */
    private $productid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getOrderid(): ?int
    {
        return $this->orderid;
    }

    public function getEmployeeid(): ?int
    {
        return $this->employeeid;
    }

    public function setEmployeeid(?int $employeeid): self
    {
        $this->employeeid = $employeeid;

        return $this;
    }

    public function getOrderdate(): ?\DateTimeInterface
    {
        return $this->orderdate;
    }

    public function setOrderdate(?\DateTimeInterface $orderdate): self
    {
        $this->orderdate = $orderdate;

        return $this;
    }

    public function getRequireddate(): ?\DateTimeInterface
    {
        return $this->requireddate;
    }

    public function setRequireddate(?\DateTimeInterface $requireddate): self
    {
        $this->requireddate = $requireddate;

        return $this;
    }

    public function getShippeddate(): ?\DateTimeInterface
    {
        return $this->shippeddate;
    }

    public function setShippeddate(?\DateTimeInterface $shippeddate): self
    {
        $this->shippeddate = $shippeddate;

        return $this;
    }

    public function getShipvia(): ?int
    {
        return $this->shipvia;
    }

    public function setShipvia(?int $shipvia): self
    {
        $this->shipvia = $shipvia;

        return $this;
    }

    public function getFreight(): ?string
    {
        return $this->freight;
    }

    public function setFreight(?string $freight): self
    {
        $this->freight = $freight;

        return $this;
    }

    public function getShipname(): ?string
    {
        return $this->shipname;
    }

    public function setShipname(?string $shipname): self
    {
        $this->shipname = $shipname;

        return $this;
    }

    public function getShipaddress(): ?string
    {
        return $this->shipaddress;
    }

    public function setShipaddress(?string $shipaddress): self
    {
        $this->shipaddress = $shipaddress;

        return $this;
    }

    public function getShipcity(): ?string
    {
        return $this->shipcity;
    }

    public function setShipcity(?string $shipcity): self
    {
        $this->shipcity = $shipcity;

        return $this;
    }

    public function getShipregion(): ?string
    {
        return $this->shipregion;
    }

    public function setShipregion(?string $shipregion): self
    {
        $this->shipregion = $shipregion;

        return $this;
    }

    public function getShippostalcode(): ?string
    {
        return $this->shippostalcode;
    }

    public function setShippostalcode(?string $shippostalcode): self
    {
        $this->shippostalcode = $shippostalcode;

        return $this;
    }

    public function getShipcountry(): ?string
    {
        return $this->shipcountry;
    }

    public function setShipcountry(?string $shipcountry): self
    {
        $this->shipcountry = $shipcountry;

        return $this;
    }

    public function getCustomerid(): ?Customers
    {
        return $this->customerid;
    }

    public function setCustomerid(?Customers $customerid): self
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProductid(): Collection
    {
        return $this->productid;
    }

    public function addProductid(Products $productid): self
    {
        if (!$this->productid->contains($productid)) {
            $this->productid[] = $productid;
        }

        return $this;
    }

    public function removeProductid(Products $productid): self
    {
        $this->productid->removeElement($productid);

        return $this;
    }
    /**
     * Transform to string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->orderid;
    }

}
