<?php

namespace TecCom\Order\TXML5;

use TecCom\Order\TXML5\AvaRsp\AvaRspAType;

/**
 * Class representing AvaRsp
 *
 * The availability response is used by the seller to inform the buyer about the availability of the requested articles. 
 *
 * The seller can also provide additional information like prices, allowances or charges, prospective shipping dates and other.
 *
 * The availability response **does not** imply that the seller has reserved articles for the buyer. The returned information is only a snapshot at this point of time.
 */
class AvaRsp extends AvaRspAType
{
}

