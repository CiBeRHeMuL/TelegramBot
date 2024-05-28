<?php

namespace AndrewGos\TelegramBot\Client\UpdateSource;

use AndrewGos\TelegramBot\Builder\ClassBuilderInterface;

/**
 * Get updates from php input
 */
class PhpInputUpdateSource extends CustomInputUpdateSource
{
    public function __construct(ClassBuilderInterface $builder)
    {
        parent::__construct('php://input', $builder);
    }
}
