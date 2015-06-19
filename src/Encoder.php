<?php

namespace Clue\CaretNotation;

class Encoder
{
    private $map = array(
        "\x00" => '^@', // \0
        "\x01" => '^A',
        "\x02" => '^B',
        "\x03" => '^C',
        "\x04" => '^D',
        "\x05" => '^E',
        "\x06" => '^F',
        "\x07" => '^G',
        "\x08" => '^H',
        "\x09" => '^I', // \t
        "\x0A" => '^J', // \n
        "\x0B" => '^K',
        "\x0C" => '^L',
        "\x0D" => '^M', // \r
        "\x0E" => '^N',
        "\x0F" => '^O',
        "\x10" => '^P',
        "\x11" => '^Q',
        "\x12" => '^R',
        "\x13" => '^S',
        "\x14" => '^T',
        "\x15" => '^U',
        "\x16" => '^V',
        "\x17" => '^W',
        "\x18" => '^X',
        "\x19" => '^Y',
        "\x1A" => '^Z',
        "\x1B" => '^[', // \e
        "\x1C" => '^\\',
        "\x1D" => '^]',
        "\x1E" => '^^',
        "\x1F" => '^_',
        "\x7F" => '^?',
    );

    /**
     * instantiate new Encoder, optional accepts a whitelist of characters that will be left as-is
     *
     * @param string $whitelist (optional) whitelist of characters that will be left as-is
     */
    public function __construct($whitelist = '')
    {
        foreach (str_split($whitelist) as $char) {
            unset($this->map[$char]);
        }
    }

    /**
     * replace ASCII control codes with caret notation
     *
     * @param string $message "hello\nworld\0"
     * @return string "hello^Jworld^@"
     */
    public function encode($message)
    {
        return strtr($message, $this->map);
    }
}
