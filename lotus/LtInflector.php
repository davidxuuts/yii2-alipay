<?php

namespace davidxu\alipay\lotus;

class LtInflector
{
    public $conf = array("separator" => "_");

    /**
     * @param $unCamelizedWords
     * @return string
     */
    public function camelize($unCamelizedWords) {
        $unCamelizedWords = $this->conf["separator"]
            . str_replace($this->conf["separator"] , " ", strtolower($unCamelizedWords));
        return ltrim(str_replace(" ", "", ucwords($unCamelizedWords)), $this->conf["separator"] );
    }

    /**
     * @param $camelCaps
     * @return string
     */
    public function uncamelize($camelCaps) {
        return strtolower(preg_replace(
            '/([a-z])([A-Z])/',
                "$1" . $this->conf["separator"] . "$2",
                $camelCaps)
        );
    }
}
