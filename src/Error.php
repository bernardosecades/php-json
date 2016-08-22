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
 * The following constants indicate the type of error returned by json_last_error().
 *
 * @method static Error JSON_ERROR_NONE()
 * @method static Error JSON_ERROR_DEPTH()
 * @method static Error JSON_ERROR_STATE_MISMATCH()
 * @method static Error JSON_ERROR_CTRL_CHAR()
 * @method static Error JSON_ERROR_SYNTAX()
 * @method static Error JSON_ERROR_UTF8()
 * @method static Error JSON_ERROR_RECURSION()
 * @method static Error JSON_ERROR_INF_OR_NAN()
 * @method static Error JSON_ERROR_UNSUPPORTED_TYPE()
 *
 * @link   http://php.net/manual/en/json.constants.php
 * @author bernardosecades <bernardosecades@gmail.com>
 */
class Error extends Enum
{
    const JSON_ERROR_NONE             = JSON_ERROR_NONE;
    const JSON_ERROR_DEPTH            = JSON_ERROR_DEPTH;
    const JSON_ERROR_STATE_MISMATCH   = JSON_ERROR_STATE_MISMATCH;
    const JSON_ERROR_CTRL_CHAR        = JSON_ERROR_CTRL_CHAR;
    const JSON_ERROR_SYNTAX           = JSON_ERROR_SYNTAX;
    const JSON_ERROR_UTF8             = JSON_ERROR_UTF8;
    const JSON_ERROR_RECURSION        = JSON_ERROR_RECURSION;
    const JSON_ERROR_INF_OR_NAN       = JSON_ERROR_INF_OR_NAN;
    const JSON_ERROR_UNSUPPORTED_TYPE = JSON_ERROR_UNSUPPORTED_TYPE;
}
