<?php

declare(strict_types=1);

namespace malkusch\lock\exception;

/**
 * Synchronized code has been executed outside of the lock exception.
 *
 * This exception should be thrown when for example the lock is released or the
 * lock times out before the synchronized code finished execution.
 *
 * Should only be used in contexts where the is being released.
 *
 * @see \malkusch\lock\mutex\SpinlockMutex::unlock()
 *
 * @author  Petr Levtonov <petr@levtonov.com>
 * @license WTFPL
 */
class ExecutionOutsideLockException extends LockReleaseException
{
    /**
     * Creates a new instance of the ExecutionOutsideLockException class.
     *
     * @param  float $elapsedTime Total elapsed time of the synchronized code
     *         callback execution.
     * @param  int   $timeout     The lock timeout in seconds.
     * @return self Synchronized code has been executed outside of the lock
     *         exception.
     */
    public static function create(float $elapsedTime, int $timeout): self
    {
        return new self(\sprintf(
            'The code executed for %.2F seconds. But the timeout is %d ' .
            'seconds. The last %.2F seconds were executed outside of the lock.',
            $elapsedTime,
            $timeout,
            $elapsedTime - $timeout
        ));
    }
}
