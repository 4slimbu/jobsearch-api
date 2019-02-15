<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Header>
        <MonsterHeader xmlns="http://schemas.monster.com/MonsterHeader" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
            <ChannelId xmlns="http://schemas.monster.com/MonsterHeader">58</ChannelId>
            <MessageData>
                <MessageId>{{ \Carbon\Carbon::now()->timestamp }}</MessageId>
                <Timestamp>{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i:s.uP') }}</Timestamp>
                <RefToMessageId xmlns="http://schemas.monster.com/MonsterHeader">Company Jobs created on {{ \Carbon\Carbon::now()->toDateTimeString()  }}</RefToMessageId>
            </MessageData>
        </MonsterHeader>
    </SOAP-ENV:Header>
    <SOAP-ENV:Body xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
        <JobsResponse xmlns="http://schemas.monster.com/Monster" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
            <ProcessingReceipt xmlns="http://schemas.monster.com/Monster">
                <RequestDocElement>{http://schemas.monster.com/Monster}JobResponse</RequestDocElement>
                <Status>
                    <ReturnCode returnCodeType="success">0</ReturnCode>
                </Status>
            </ProcessingReceipt>
            @foreach($requestIds as $requestid)
                <JobResponse xmlns="http://schemas.monster.com/Monster">
                    <JobPostingResponse postingId="{{ $requestid['id'] }}">
                        <JobPostingDates>
                            <JobActiveDate>{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i:s.uP') }}</JobActiveDate>
                            <JobExpireDate>{{ \Carbon\Carbon::now()->addDays(30)->format('Y-m-d\TH:i:s.uP') }}</JobExpireDate>
                        </JobPostingDates>
                    </JobPostingResponse>
                    <Status>
                        <ReturnCode returnCodeType="success">0</ReturnCode>
                        <Descriptions>
                            <Description descriptionType="info">
                                @if($requestid['action'] == 'delete')
                                    JobPosting {{ $requestid['id'] }} expired.
                                @elseif($requestid['action'] == 'update')
                                    Job updated.
                                @else
                                    Job added.
                                @endif
                            </Description>
                        </Descriptions>
                    </Status>
                </JobResponse>
            @endforeach
        </JobsResponse>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>