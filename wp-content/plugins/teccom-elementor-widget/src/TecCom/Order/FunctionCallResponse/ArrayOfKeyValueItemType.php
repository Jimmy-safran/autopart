<?php

namespace TecCom\Order\FunctionCallResponse;

/**
 * Class representing ArrayOfKeyValueItemType
 *
 * 
 * XSD Type: ArrayOfKeyValueItem
 */
class ArrayOfKeyValueItemType
{
    /**
     * @var \TecCom\Order\FunctionCallResponse\KeyValueItemType[] $keyValueItem
     */
    private $keyValueItem = [
        
    ];

    /**
     * Adds as keyValueItem
     *
     * @return self
     * @param \TecCom\Order\FunctionCallResponse\KeyValueItemType $keyValueItem
     */
    public function addToKeyValueItem(\TecCom\Order\FunctionCallResponse\KeyValueItemType $keyValueItem)
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
     * @return \TecCom\Order\FunctionCallResponse\KeyValueItemType[]
     */
    public function getKeyValueItem()
    {
        return $this->keyValueItem;
    }

    /**
     * Sets a new keyValueItem
     *
     * @param \TecCom\Order\FunctionCallResponse\KeyValueItemType[] $keyValueItem
     * @return self
     */
    public function setKeyValueItem(?array $keyValueItem = null)
    {
        $this->keyValueItem = $keyValueItem;
        return $this;
    }
}

