<?php

namespace Cmp\Queues\Infrastructure\AWS\v20121105\DomainEvent;

use Aws\Sns\SnsClient;
use Cmp\Queues\Domain\Event\Publisher as DomainPublisher;
use Cmp\Queues\Infrastructure\AWS\v20121105\Queue\QueueWriter;
use Psr\Log\LoggerInterface;

class Publisher extends DomainPublisher
{
    /**
     * @param string          $region
     * @param string          $topicArn
     * @param LoggerInterface $logger
     */
    public function __construct($region, $topicArn, LoggerInterface $logger)
    {
        $sns = SnsClient::factory(['region' => $region, 'version' => '2010-03-31']);
        $queueWriter = new QueueWriter(
            $sns,
            $topicArn,
            $logger
        );
        parent::__construct($queueWriter);
    }
}
