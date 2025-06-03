<?php
use TecCom\Order\TXML5\{AvaReq, AvaReq\AvaReqAType\HeadAType, AvaReq\AvaReqAType\LineAType, AvaReq\AvaReqAType\HeadAType\AvaReqOptionsAType, PartyType1Type, ProcessingInstructionsType, QuantityType, ProductIdChoiceType};

class AvaRequestBuilder {
    public static function build(array $input): AvaReq {
        $avaReq = new AvaReq();
        $avaReq->setVersion('5.0');

        $head = new HeadAType();
        $head->setIssueDate(new \DateTime());

        $options = new AvaReqOptionsAType();
        $options->setType($input['ava_type']);
        $options->setPriceInfo(true);
        $head->setAvaReqOptions($options);

        $seller = new PartyType1Type();
        $seller->setNumber($input['seller_number']);
        $head->setSellerParty($seller);

        $buyer = new PartyType1Type();
        $buyer->setNumber($input['buyer_number']);
        $head->setBuyerParty($buyer);

        $proc = new ProcessingInstructionsType();
        $proc->setDispatchMode($input['dispatch_mode']);
        $head->setProcessingInstructions($proc);

        $avaReq->setHead($head);

        $line = new LineAType();
        $line->setNumber(1);

        $qty = new QuantityType();
        $qty->setValue((float) $input['requested_qty']);
        $qty->setUoM($input['requested_uom']);
        $line->setQuantity($qty);

        $product = new ProductIdChoiceType();
        $product->setProductNumber($input['product_number']);
        $line->setProductID($product);

        $line->setProductChangeAllowed(true);
        $avaReq->setLine([$line]);

        return $avaReq;
    }
}
