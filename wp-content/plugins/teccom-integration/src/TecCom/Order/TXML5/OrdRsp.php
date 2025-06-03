<?php

namespace TecCom\Order\TXML5;

use TecCom\Order\TXML5\OrdRsp\OrdRspAType;

/**
 * Class representing OrdRsp
 *
 * The order response is used by the seller to confirm or deny the acceptance of the order of the buyer.
 *
 * The buyer **must** evaluate the order response in full to understand how the order was confirmed or why it was denied by the seller.
 */
class OrdRsp extends OrdRspAType
{
}

