<?php

namespace Circle314\Concept\Http;

abstract class HttpRequestMethod
{
    const CONNECT = 'CONNECT';
    const DELETE = 'DELETE';
    const GET = 'GET';
    const HEAD = 'HEAD';
    const OPTIONS = 'OPTIONS';
    const PATCH = 'PATCH';
    const POST = 'POST';
    const PUT = 'PUT';
    const TRACE = 'TRACE';

    final private function __construct()
    {

    }
}