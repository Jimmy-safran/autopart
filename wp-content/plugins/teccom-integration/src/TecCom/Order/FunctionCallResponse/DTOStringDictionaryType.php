<?php

namespace TecCom\Order\FunctionCallResponse;

/**
 * Class representing DTOStringDictionaryType
 *
 * 
 * XSD Type: DTOStringDictionary
 */
class DTOStringDictionaryType
{
    /**
     * @var \TecCom\Order\FunctionCallResponse\KeyValueItemType[] $items
     */
    private $items = null;

    /**
     * Adds as keyValueItem
     *
     * @return self
     * @param \TecCom\Order\FunctionCallResponse\KeyValueItemType $keyValueItem
     */
    public function addToItems(\TecCom\Order\FunctionCallResponse\KeyValueItemType $keyValueItem)
    {
        $this->items[] = $keyValueItem;
        return $this;
    }

    /**
     * isset items
     *
     * @param int|string $index
     * @return bool
     */
    public function issetItems($index)
    {
        return isset($this->items[$index]);
    }

    /**
     * unset items
     *
     * @param int|string $index
     * @return void
     */
    public function unsetItems($index)
    {
        unset($this->items[$index]);
    }

    /**
     * Gets as items
     *
     * @return \TecCom\Order\FunctionCallResponse\KeyValueItemType[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Sets a new items
     *
     * @param \TecCom\Order\FunctionCallResponse\KeyValueItemType[] $items
     * @return self
     */
    public function setItems(?array $items = null)
    {
        $this->items = $items;
        return $this;
    }
}

