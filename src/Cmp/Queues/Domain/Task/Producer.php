<?php
namespace Cmp\Queues\Domain\Task;

use Cmp\Queues\Domain\Queue\QueueWriter;
use Cmp\Queues\Domain\Task\Exception\TaskException;

class Producer
{
    /**
     * @var QueueWriter
     */
    protected $queueWriter;

    /**
     * @var Task[]
     */
    protected $tasks = [];

    /**
     * Producer constructor.
     * @param QueueWriter $queueWriter
     */
    public function __construct(QueueWriter $queueWriter)
    {
        $this->queueWriter = $queueWriter;
    }

    /**
     * @param TaskInterface $task
     * @return $this
     */
    public function add(TaskInterface $task)
    {
        $this->tasks[] = $task;
        return $this;
    }

    /**
     * @throws TaskException
     */
    public function produce()
    {
        if(!isset($this->tasks[0])) {
            throw new TaskException('You must add at least 1 Task before producing.');
        }
        $this->queueWriter->write($this->tasks);
        $this->tasks = [];
    }

    /**
     * @return Task[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @return QueueWriter
     */
    public function getQueueWriter()
    {
        return $this->queueWriter;
    }
}
