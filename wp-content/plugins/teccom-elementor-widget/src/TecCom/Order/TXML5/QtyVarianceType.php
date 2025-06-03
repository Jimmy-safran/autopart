<?php

namespace TecCom\Order\TXML5;

/**
 * Class representing QtyVarianceType
 *
 * 
 * XSD Type: QtyVarianceType
 */
class QtyVarianceType
{
    /**
     * The difference in quantity.
     *
     * @var \TecCom\Order\TXML5\QuantityType $quantity
     */
    private $quantity = null;

    /**
     * The nature of the difference.
     *
     * For some types of deviation reasons a modification reason **must** also be given.
     *
     * @var string $deviationReason
     */
    private $deviationReason = null;

    /**
     * The additional reason for the difference.
     *
     * @var string $modificationReason
     */
    private $modificationReason = null;

    /**
     * The explanation of the difference in human-readable form.
     *
     * @var string $qtyVarComment
     */
    private $qtyVarComment = null;

    /**
     * Gets as quantity
     *
     * The difference in quantity.
     *
     * @return \TecCom\Order\TXML5\QuantityType
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets a new quantity
     *
     * The difference in quantity.
     *
     * @param \TecCom\Order\TXML5\QuantityType $quantity
     * @return self
     */
    public function setQuantity(\TecCom\Order\TXML5\QuantityType $quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Gets as deviationReason
     *
     * The nature of the difference.
     *
     * For some types of deviation reasons a modification reason **must** also be given.
     *
     * @return string
     */
    public function getDeviationReason()
    {
        return $this->deviationReason;
    }

    /**
     * Sets a new deviationReason
     *
     * The nature of the difference.
     *
     * For some types of deviation reasons a modification reason **must** also be given.
     *
     * @param string $deviationReason
     * @return self
     */
    public function setDeviationReason($deviationReason)
    {
        $this->deviationReason = $deviationReason;
        return $this;
    }

    /**
     * Gets as modificationReason
     *
     * The additional reason for the difference.
     *
     * @return string
     */
    public function getModificationReason()
    {
        return $this->modificationReason;
    }

    /**
     * Sets a new modificationReason
     *
     * The additional reason for the difference.
     *
     * @param string $modificationReason
     * @return self
     */
    public function setModificationReason($modificationReason)
    {
        $this->modificationReason = $modificationReason;
        return $this;
    }

    /**
     * Gets as qtyVarComment
     *
     * The explanation of the difference in human-readable form.
     *
     * @return string
     */
    public function getQtyVarComment()
    {
        return $this->qtyVarComment;
    }

    /**
     * Sets a new qtyVarComment
     *
     * The explanation of the difference in human-readable form.
     *
     * @param string $qtyVarComment
     * @return self
     */
    public function setQtyVarComment($qtyVarComment)
    {
        $this->qtyVarComment = $qtyVarComment;
        return $this;
    }
}

