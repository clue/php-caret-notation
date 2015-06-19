<?php

namespace Clue\CaretNotation;

class Encoder
{
    /**
     * replace ASCII control codes with caret notation
     *
     * @param string $message "hello\nworld\0"
     * @return string "hello^Jworld^@"
     */
    public function encode($message)
    {
        return preg_replace_callback(
            '#([\x00-\x1F\x7F])#',
            function ($char) {
                return '^' . chr((ord($char[1]) + 64) % 128);
            },
            $message
        );
    }
}
