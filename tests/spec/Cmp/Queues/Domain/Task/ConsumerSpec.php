<?php

namespace spec\Cmp\Queues\Domain\Task;

use Cmp\Queues\Domain\Queue\QueueReader;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConsumerSpec extends ObjectBehavior
{
    function let(
        QueueReader $queueReader
    )
    {
        $this->beConstructedWith($queueReader);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Cmp\Queues\Domain\Task\Consumer');
    }

    function it_reads_from_queue(QueueReader $queueReader)
    {
        $callback = function(){};
        $queueReader->read($callback, 1)->shouldBeCalled();
        $this->consumeOnce($callback, 1);
    }
}