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

/**
 * @author bernardosecades <bernardosecades@gmail.com>
 */
class ArrayOption implements \ArrayAccess, \Countable
{
    protected $options = [];

    /**
     * @param mixed $index
     * @return bool
     */
    public function offsetExists($index)
    {
        return isset($this->options[$index]);
    }

    /**
     * @param mixed $index
     * @return bool
     */
    public function offsetGet($index)
    {
        if($this->offsetExists($index)) {
            return $this->options[$index];
        }

        return false;
    }

    /**
     * @param mixed $index
     * @param mixed $value
     * @return bool
     */
    public function offsetSet($index, $value)
    {
        if (!$value instanceof Option) {
            throw new \UnexpectedValueException('Only allowed value type Option');
        }

        if (null !== $index) {
            $this->options[$index] = $value;
        } else {
            $this->options[] = $value;
        }

        return true;
    }

    /**
     * @param mixed $index
     * @return bool
     */
    public function offsetUnset($index)
    {
        unset($this->options[$index]);

        return true;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->options);
    }

    /**
     * @return int
     */
    public function getValueOptions()
    {
        if (empty($this->options)) {
            return Option::JSON_NONE;
        }

        if (1 == $this->count()) {
            /** @var Option $option */
            $option = $this->options[0];
            return $option->getValue();
        }

        /** @var Option $firstOption */
        $firstOption = $this->options[0];
        $bitwiseResult  = $firstOption->getValue();
        $options = array_slice($this->options, 1);

        /** @var Option $option */
        foreach ($options as $option) {
            if (Option::JSON_NONE === $option->getValue()) {
                continue;
            }
            $bitwiseResult = $bitwiseResult | $option->getValue();
        }

        return $bitwiseResult;
    }
}
