<?php

use Clue\CaretNotation\Encoder;

class EncoderTest extends PHPUnit_Framework_TestCase
{
    private $encoder;

    public function setUp()
    {
        $this->encoder = new Encoder();
    }

    public function testSimpleStringDoesNotChangeOutput()
    {
        $this->assertEquals('hello world', $this->encoder->encode('hello world'));
    }

    public function testLineBreaks()
    {
        $this->assertEquals('hello^M^Jworld^M^J', $this->encoder->encode("hello\r\nworld\r\n"));
    }

    public function testUtf8DoesNotChange()
    {
        $this->assertEquals('öäü', $this->encoder->encode('öäü'));
    }

    public function provideBinaryAlphabet()
    {
        $ret = array();

        foreach (range('A', 'Z') as $position => $letter) {
            $ret []= array($position +1, $letter);
        }

        return $ret;
    }


    /**
     * @param unknown $char
     * @param unknown $letter
     * @dataProvider provideBinaryAlphabet
     */
    public function testBinaryAlphabet($char, $letter)
    {
        $this->assertEquals('^' . $letter, $this->encoder->encode(chr($char)));
    }

    public function testRemainingControlCharacters()
    {
        $this->assertEquals('^@' . '^[' . '^\\' . '^]' . '^^' . '^_' . '^?', $this->encoder->encode("\x00\x1B\x1C\x1D\x1E\x1F\x7F"));
    }
}
