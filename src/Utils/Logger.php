<?php

namespace VEDYWEB\WPMVC\Utils;

/**
 * Class Logger
 *
 * This class provides methods for logging informational and error messages.
 */
class Logger
{
    /**
     * Logs an informational message.
     *
     * This method outputs an informational message to the log.
     *
     * @param string $msg The message to be logged.
     * @return void
     */
    public function info(string $msg): void
    {
        echo "INFO: $msg";
    }

    /**
     * Logs an error message.
     *
     * This method outputs an error message to the log.
     *
     * @param string $msg The error message to be logged.
     * @return void
     */
    public function error(string $msg): void
    {
        echo "ERROR: $msg";
    }
}