<?php

namespace MaximeRainville\SilverstripeBehatLogJsError;

use SilverStripe\Control\HTTPRequest;

class Controller extends \SilverStripe\Control\Controller
{

    /**
     * @var array
     */
    private static $allowed_actions = [
        'log'
    ];

    private static $url_handlers = [
        'POST /' => 'log',
    ];

    public function log(HTTPRequest $request)
    {
        if ($request->getIP() !== '127.0.0.1') {
            return $this->httpError(403);
        };

        $message = $request->postVar('message') ?: '';
        $file = $request->postVar('file') ?: '';
        $line = $request->postVar('line') ?: '';
        $url = $request->postVar('url') ?: '';

        file_put_contents('php://stderr', sprintf("JSERROR \n\t%s :: %s \n\t%s \n\t%s\n", $file, $line, $url, $message));
    }

}
