<?php

namespace TecCom\Order\TXML5\DecisionType;

/**
 * Class representing ActionAType
 */
class ActionAType
{
    /**
     * @var string $declineAction
     */
    private $declineAction = null;

    /**
     * @var string $acceptAction
     */
    private $acceptAction = null;

    /**
     * Gets as declineAction
     *
     * @return string
     */
    public function getDeclineAction()
    {
        return $this->declineAction;
    }

    /**
     * Sets a new declineAction
     *
     * @param string $declineAction
     * @return self
     */
    public function setDeclineAction($declineAction)
    {
        $this->declineAction = $declineAction;
        return $this;
    }

    /**
     * Gets as acceptAction
     *
     * @return string
     */
    public function getAcceptAction()
    {
        return $this->acceptAction;
    }

    /**
     * Sets a new acceptAction
     *
     * @param string $acceptAction
     * @return self
     */
    public function setAcceptAction($acceptAction)
    {
        $this->acceptAction = $acceptAction;
        return $this;
    }
}

