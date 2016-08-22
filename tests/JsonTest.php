<?php

/**
 * MIT License
 *
 * Copyright (c) 2016 Bernardo Secades
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace BernardoSecades\Json;

class JsonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param mixed $expected
     * @param mixed $value
     * @dataProvider getFixturesProvider
     */
    public function testEncode($expected, $value)
    {
        $this->assertEquals($expected, Json::encode($value));
    }

    public function testEncodeWithOptions()
    {
        $options = new ArrayOption();
        $options[] = Option::JSON_UNESCAPED_UNICODE();

        $this->assertEquals('{"word":"धाडस"}', Json::encode(["word" => "धाडस"], $options));
    }

    /**
     * @param mixed $value
     * @param mixed $expected
     * @dataProvider getFixturesProvider
     */
    public function testDecode($value, $expected)
    {
        $this->assertEquals($expected, Json::decode($value, true));
    }

    /**
     * @expectedException \BernardoSecades\Json\EncodeException
     */
    public function testEncodeException()
    {
        $value = [
            iconv(
                'UTF-8',
                'ISO-8859-1',
                'mañana'
            )
        ];

        Json::encode($value);
    }

    /**
     * @expectedException \BernardoSecades\Json\DecodeException
     */
    public function testDecodeException()
    {
        $value = '{"wrong json"';

        Json::decode($value);
    }

    /**
     * @param mixed $value
     * @dataProvider getFixturesProvider
     */
    public function testIsValid($value)
    {
        $this->assertTrue(Json::isValid($value));
    }

    public function testIsNotValid()
    {
        $this->assertFalse(Json::isValid('{"wrong json"'));
    }

    /**
     * @return array
     */
    public function getFixturesProvider()
    {
        return [
            ['{"one":1}', ['one' => 1]],
            ['"a"' , 'a'],
            ['0', 0],
            ['null', null]
        ];
    }
}