<?php

declare(strict_types=1);

namespace malkusch\lock\exception;

use RuntimeException;

/**
 * A deadline exception.
 *
 * @author Willem Stuursma-Ruwen <willem@stuursma.name>
 * @link bitcoin:1P5FAZ4QhXCuwYPnLZdk3PJsqePbu1UDDA Donations
 * @license WTFPL
 */
class DeadlineException extends RuntimeException implements PhpLockException
{
}
