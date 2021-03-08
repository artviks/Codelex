<?php

class FlowerShop
{
    private FlowerCollection $flowers;

    public function setFlowersFromSupplier(WarehouseInterface $warehouse): void
    {
        $this->flowers->setFlowers($warehouse->getFlowers()->getFlowers());
    }

    public function setFlowersFromSuppliers(array $warehouses): void
    {
        foreach ($warehouses as $warehouse) {
            $this->setFlowersFromSupplier($warehouse);
        }
    }

}
