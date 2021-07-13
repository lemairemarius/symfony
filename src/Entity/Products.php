<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", indexes={@ORM\Index(name="SupplierID", columns={"SupplierID"})})
 * @ORM\Entity
 */
class Products
{
    /**
     * @var int
     *
     * @ORM\Column(name="ProductID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productid;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductName", type="string", length=40, nullable=false)
     */
    private $productname;

    /**
     * @var int|null
     *
     * @ORM\Column(name="CategoryID", type="integer", nullable=true)
     */
    private $categoryid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="QuantityPerUnit", type="string", length=20, nullable=true)
     */
    private $quantityperunit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitPrice", type="decimal", precision=10, scale=4, nullable=true, options={"default"="0.0000"})
     */
    private $unitprice = '0.0000';

    /**
     * @var int|null
     *
     * @ORM\Column(name="UnitsInStock", type="smallint", nullable=true)
     */
    private $unitsinstock = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="UnitsOnOrder", type="smallint", nullable=true)
     */
    private $unitsonorder = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ReorderLevel", type="smallint", nullable=true)
     */
    private $reorderlevel = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="Discontinued", type="boolean", nullable=false)
     */
    private $discontinued = '0';

    /**
     * @var \Suppliers
     *
     * @ORM\ManyToOne(targetEntity="Suppliers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="SupplierID", referencedColumnName="SupplierID")
     * })
     */
    private $supplierid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Orders", mappedBy="productid")
     */
    private $orderid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getProductid(): ?int
    {
        return $this->productid;
    }

    public function getProductname(): ?string
    {
        return $this->productname;
    }

    public function setProductname(string $productname): self
    {
        $this->productname = $productname;

        return $this;
    }

    public function getCategoryid(): ?int
    {
        return $this->categoryid;
    }

    public function setCategoryid(?int $categoryid): self
    {
        $this->categoryid = $categoryid;

        return $this;
    }

    public function getQuantityperunit(): ?string
    {
        return $this->quantityperunit;
    }

    public function setQuantityperunit(?string $quantityperunit): self
    {
        $this->quantityperunit = $quantityperunit;

        return $this;
    }

    public function getUnitprice(): ?string
    {
        return $this->unitprice;
    }

    public function setUnitprice(?string $unitprice): self
    {
        $this->unitprice = $unitprice;

        return $this;
    }

    public function getUnitsinstock(): ?int
    {
        return $this->unitsinstock;
    }

    public function setUnitsinstock(?int $unitsinstock): self
    {
        $this->unitsinstock = $unitsinstock;

        return $this;
    }

    public function getUnitsonorder(): ?int
    {
        return $this->unitsonorder;
    }

    public function setUnitsonorder(?int $unitsonorder): self
    {
        $this->unitsonorder = $unitsonorder;

        return $this;
    }

    public function getReorderlevel(): ?int
    {
        return $this->reorderlevel;
    }

    public function setReorderlevel(?int $reorderlevel): self
    {
        $this->reorderlevel = $reorderlevel;

        return $this;
    }

    public function getDiscontinued(): ?bool
    {
        return $this->discontinued;
    }

    public function setDiscontinued(bool $discontinued): self
    {
        $this->discontinued = $discontinued;

        return $this;
    }

    public function getSupplierid(): ?Suppliers
    {
        return $this->supplierid;
    }

    public function setSupplierid(?Suppliers $supplierid): self
    {
        $this->supplierid = $supplierid;

        return $this;
    }

    /**
     * @return Collection|Orders[]
     */
    public function getOrderid(): Collection
    {
        return $this->orderid;
    }

    public function addOrderid(Orders $orderid): self
    {
        if (!$this->orderid->contains($orderid)) {
            $this->orderid[] = $orderid;
            $orderid->addProductid($this);
        }

        return $this;
    }

    public function removeOrderid(Orders $orderid): self
    {
        if ($this->orderid->removeElement($orderid)) {
            $orderid->removeProductid($this);
        }

        return $this;
    }

}
