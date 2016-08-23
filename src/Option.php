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

use MyCLabs\Enum\Enum;

/**
 * The following constants can be combined to form options for json_encode().
 *
 * @method static Option JSON_NONE()
 * @method static Option JSON_HEX_TAG()
 * @method static Option JSON_HEX_AMP()
 * @method static Option JSON_HEX_APOS()
 * @method static Option JSON_HEX_QUOT()
 * @method static Option JSON_FORCE_OBJECT()
 * @method static Option JSON_NUMERIC_CHECK()
 * @method static Option JSON_BIGINT_AS_STRING()
 * @method static Option JSON_PRETTY_PRINT()
 * @method static Option JSON_UNESCAPED_SLASHES()
 * @method static Option JSON_UNESCAPED_UNICODE()
 * @method static Option JSON_PARTIAL_OUTPUT_ON_ERROR()
 *
 * @link   http://php.net/manual/en/json.constants.php
 * @author bernardosecades <bernardosecades@gmail.com>
 */
class Option extends Enum
{
    const JSON_NONE                    = 0;
    const JSON_HEX_TAG                 = JSON_HEX_TAG;
    const JSON_HEX_AMP                 = JSON_HEX_AMP;
    const JSON_HEX_APOS                = JSON_HEX_APOS;
    const JSON_HEX_QUOT                = JSON_HEX_QUOT;
    const JSON_FORCE_OBJECT            = JSON_FORCE_OBJECT;
    const JSON_NUMERIC_CHECK           = JSON_NUMERIC_CHECK;
    const JSON_BIGINT_AS_STRING        = JSON_BIGINT_AS_STRING;
    const JSON_PRETTY_PRINT            = JSON_PRETTY_PRINT;
    const JSON_UNESCAPED_SLASHES       = JSON_UNESCAPED_SLASHES;
    const JSON_UNESCAPED_UNICODE       = JSON_UNESCAPED_UNICODE;
    const JSON_PARTIAL_OUTPUT_ON_ERROR = JSON_PARTIAL_OUTPUT_ON_ERROR;
}
