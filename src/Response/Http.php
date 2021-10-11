<?php

/**
 * @see       https://github.com/laminas/laminas-xmlrpc for the canonical source repository
 * @copyright https://github.com/laminas/laminas-xmlrpc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-xmlrpc/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\XmlRpc\Response;

use Laminas\XmlRpc\Response as XmlRpcResponse;

use function header;
use function headers_sent;

/**
 * HTTP response
 */
class Http extends XmlRpcResponse
{
    /**
     * Override __toString() to send HTTP Content-Type header
     *
     * @return string
     */
    public function __toString()
    {
        if (! headers_sent()) {
            header('Content-Type: text/xml; charset=' . $this->getEncoding());
        }

        return parent::__toString();
    }
}
