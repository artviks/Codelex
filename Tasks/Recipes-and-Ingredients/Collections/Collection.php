<?php

abstract class Collection
{
    protected array $items = [];

    public function getCollection(): array
    {
        return $this->items;
    }

    public function setMany(array $items): void
    {
        foreach ($items as $item) {
            $this->setOne($item);
        }
    }

    public function getNames(): array
    {
        $names = [];
        foreach ($this->items as $item) {
            $names[] = $item->getName();
        }
        return $names;
    }

    public function unsetItems(string $name): void
    {
        unset($this->items[$this->findIndexByName($name)]);
    }

    protected function findIndexByName(string $name): ?int
    {
        foreach ($this->items as $index => $item) {
            if ($name === $item->getName()) {
                return $index;
            }
        }
        return null;
    }
}