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

class ArrayOptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ArrayOption
     */
    protected $options;

    protected function setUp()
    {
        $this->options = new ArrayOption();
    }

    public function testAddValue()
    {
        $this->options[0] = Option::JSON_FORCE_OBJECT();
        $this->options[] = Option::JSON_BIGINT_AS_STRING();

        $this->assertInstanceOf(Option::class, $this->options[0]);
        $this->assertInstanceOf(Option::class, $this->options[1]);
        $this->assertCount(2, $this->options);

        $options[0] = Option::JSON_FORCE_OBJECT();

        $this->assertCount(2, $this->options);
        $this->assertFalse($this->options[3]);
    }

    public function testRemoveValue()
    {
        $this->options[] = Option::JSON_FORCE_OBJECT();

        unset($this->options[0]);

        $this->assertCount(0, $this->options);
    }

    public function testGetOptions()
    {
        $this->options[] = Option::JSON_FORCE_OBJECT();
        $this->options[] = Option::JSON_BIGINT_AS_STRING();
        $this->options[] = Option::JSON_FORCE_OBJECT(); // Repeated but should not affect to result
        $this->options[] = Option::JSON_NONE(); // This is ignore in result getValueOptions

        $this->assertEquals(Option::JSON_FORCE_OBJECT | Option::JSON_BIGINT_AS_STRING, $this->options->getValueOptions());
    }

    public function testGetOptionsEmptyArrayOption()
    {
        $this->assertEquals(Option::JSON_NONE, $this->options->getValueOptions());
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testAddValueException()
    {
        $this->options[] = 'bad value';
    }
}