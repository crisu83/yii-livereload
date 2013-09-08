<?php

/**
 * Application component for registering with the Grunt's live reload server.
 */
class LiveReload extends CApplicationComponent
{
    /**
     * @var string the host name of the server running the live reload server.
     */
    public $host;
    /**
     * @var array live reload ports.
     */
    public $port;
    /**
     * @var string the component ID for the client script component.
     */
    public $clientScriptID = 'clientScript';

    /**
     * Registers the live reload servers.
     */
    public function register()
    {
        /* @var CClientScript $cs */
        if (isset($this->host, $this->port) && ($cs = Yii::app()->getComponent($this->clientScriptID)) !== null) {
            $cs->registerScriptFile(
                "//{$this->host}:{$this->port}/livereload.js",
                CClientScript::POS_END
            );
        }
    }
}
