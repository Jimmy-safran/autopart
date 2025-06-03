<?php

namespace TecCom\Order\TXML5;

use TecCom\Order\TXML5\OrdRspUpd\OrdRspUpdAType;

/**
 * Class representing OrdRspUpd
 *
 * The order response update is used by the seller to send an update to a previous asynchronous order response or order response update.
 *
 * 1. The seller **must not** send an order response update without having sent an asynchronous order response first.
 *
 * 2. The buyer **must** evaluate the order response update in full to understand how the seller has modified the order.
 */
class OrdRspUpd extends OrdRspUpdAType
{
}

