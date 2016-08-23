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
class Json
{
    const ENCODE_OPERATION = 0;
    const DECODE_OPERATION = 1;

    /**
     * @param mixed            $value
     * @param ArrayOption|null $options
     * @param int              $depth
     * @return string
     */
    public static function encode($value, ArrayOption $options = null, $depth = 512)
    {
        if (null === $options) {
            $options = new ArrayOption();
            $options[] = Option::JSON_NONE();
        }

        $data = json_encode($value, $options->getValueOptions(), $depth);

        self::handleError(self::ENCODE_OPERATION);

        return $data;
    }

    /**
     * @param mixed      $value
     * @param bool|false $assoc
     * @return mixed
     */
    public static function decode($value, $assoc = false)
    {
        $data = json_decode($value, $assoc);

        self::handleError(self::DECODE_OPERATION);

        return $data;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public static function isValid($value)
    {
        try {
            self::decode($value);
            return true;
        } catch (DecodeException $exception) {
            return false;
        }
    }

    /**
     * @param int $operation
     *
     * @throws EncodeException
     * @throws DecodeException
     */
    protected static function handleError($operation)
    {
        $errorCode = json_last_error();

        if (Error::JSON_ERROR_NONE !== $errorCode) {
            $errorMsg = json_last_error_msg();
            switch ($operation) {
                case self::ENCODE_OPERATION:
                    throw new EncodeException($errorMsg, $errorCode);
                case self::DECODE_OPERATION:
                    throw new DecodeException($errorMsg, $errorCode);
                // @codeCoverageIgnoreStart
                default:
                    throw new \LogicException(sprintf('Operation "%d" is not allowed', $operation));
            }   // @codeCoverageIgnoreEnd
        }
    }
}
