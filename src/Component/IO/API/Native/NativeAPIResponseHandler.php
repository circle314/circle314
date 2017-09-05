<?php

namespace Circle314\Component\IO\API\Native;

use Circle314\Component\Encoding\EncodingHandlerInterface;
use Circle314\Component\IO\API\AbstractAPIResponseHandler;
use Circle314\Component\IO\Response\ResponseInterface;

class NativeAPIResponseHandler extends AbstractAPIResponseHandler
{
    #region Properties
    /** @var EncodingHandlerInterface */
    protected $encodingHandler;
    #endregion

    #region Constructor
    public function __construct(
        EncodingHandlerInterface        $encodingHandler
    ) {
        $this->encodingHandler          = $encodingHandler;
        parent::__construct();
    }
    #endregion

    #region Public Methods
    public function generateResponse(ResponseInterface $apiResponse)
    {
        return $this->encodingHandler()->encode($apiResponse->processResponse());
    }
    #endregion

    #region Protected Methods
    protected function preProcessResponseCode(ResponseInterface $response) {}
    protected function postProcessResponseCode(ResponseInterface $response) {}

    /**
     * @return EncodingHandlerInterface
     */
    protected function encodingHandler()
    {
        return $this->encodingHandler;
    }
    #endregion
}

?>