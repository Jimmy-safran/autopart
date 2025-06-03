<?php

namespace TecCom\Order\FunctionCallRequest;

/**
 * Class representing ArrayOfKeyValueItemType
 *
 * 
 * XSD Type: ArrayOfKeyValueItem
 */
class ArrayOfKeyValueItemType
{
    /**
     * @var \TecCom\Order\FunctionCallRequest\KeyValueItemType[] $keyValueItem
     */
    private $keyValueItem = [
        
    ];

    /**
     * Adds as keyValueItem
     *
     * @return self
     * @param \TecCom\Order\FunctionCallRequest\KeyValueItemType $keyValueItem
     */
    public function addToKeyValueItem(\TecCom\Order\FunctionCallRequest\KeyValueItemType $keyValueItem)
    {
        $this->keyValueItem[] = $keyValueItem;
        return $this;
    }

    /**
     * isset keyValueItem
     *
     * @param int|string $index
     * @return bool
     */
    public function issetKeyValueItem($index)
    {
        return isset($this->keyValueItem[$index]);
    }

    /**
     * unset keyValueItem
     *
     * @param int|string $index
     * @return void
     */
    public function unsetKeyValueItem($index)
    {
        unset($this->keyValueItem[$index]);
    }

    /**
     * Gets as keyValueItem
     *
     * @return \TecCom\Order\FunctionCallRequest\KeyValueItemType[]
     */
    public function getKeyValueItem()
    {
        return $this->keyValueItem;
    }

    /**
     * Sets a new keyValueItem
     *
     * @param \TecCom\Order\FunctionCallRequest\KeyValueItemType[] $keyValueItem
     * @return self
     */
    public function setKeyValueItem(?array $keyValueItem = null)
    {
        $this->keyValueItem = $keyValueItem;
        return $this;
    }
}

