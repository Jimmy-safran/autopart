<?php
use TecCom\Order\FunctionCallRequest\{
    FunctionCallRequest,
    DTODateTimeType,
    AuthenticationDataType,
    ServiceDataType,
    ParameterDataType
};

class FunctionCallBuilder {
    public static function build(
        string $avaReqXml,
        array $auth,
        string $functionID = 'Order_SubmitInquiry',
        string $parameterType = 'Inquiry'
    ): FunctionCallRequest {
        $fc = new FunctionCallRequest();

        // Timestamp
        $ts = new DTODateTimeType();
        $ts->setDateString(date('Y-m-d\TH:i:s'));
        $ts->setFormat('iso8601');
        $ts->setTimeBase('localtime');
        $fc->setTimestamp($ts);

        // Authentication
        $au = new AuthenticationDataType();
        $au->setUser($auth['user'] ?? '');
        $au->setPassword($auth['password'] ?? '');
        $au->setLanguage($auth['language'] ?? 'EN');
        $fc->setAuthentication($au);

        // Service and Parameters
        $svc = new ServiceDataType();
        $svc->setFunctionID($functionID);

        $param = new ParameterDataType();
        $param->setParameterValue($avaReqXml);
        $param->setParameterType($parameterType);

        $svc->setParameterList([$param]);
        $fc->setRequestedFunction($svc);

        return $fc;
    }
}
