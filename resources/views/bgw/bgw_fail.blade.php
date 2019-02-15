<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Header>
        <MonsterHeader xmlns="http://schemas.monster.com/MonsterHeader" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
            <ChannelId xmlns="http://schemas.monster.com/MonsterHeader">58</ChannelId>
            <MessageData>
                <MessageId>{{ \Carbon\Carbon::now()->timestamp }}</MessageId>
                <Timestamp>{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i:s.uP') }}</Timestamp>
                <RefToMessageId xmlns="http://schemas.monster.com/MonsterHeader">Jobs created on  {{ \Carbon\Carbon::now()->toDateTimeString()  }}</RefToMessageId>
            </MessageData>
        </MonsterHeader>
    </SOAP-ENV:Header>
    <SOAP-ENV:Body xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
        <SOAP-ENV:Fault>
            <faultcode>SOAP-ENV:Client</faultcode>
            <faultstring>
                <![CDATA[{{ $message }}]]>
            </faultstring>
        </SOAP-ENV:Fault>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>