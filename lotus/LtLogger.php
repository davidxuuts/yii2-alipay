<?php

namespace davidxu\alipay\lotus;

class LtLogger
{
    public $conf = array(
        "separator" => "\t",
        "log_file" => ""
    );

    private $fileHandle;

    public function log($logData) {
        if ("" == $logData || array() == $logData) {
            return false;
        }
        if (is_array($logData)) {
            $logData = implode($this->conf["separator"], $logData);
        }
        $logData = $logData. "\n";
        fwrite($this->getFileHandle(), $logData);
    }

    protected function getFileHandle() {
        if (null === $this->fileHandle) {
            if (empty($this->conf["log_file"])) {
                trigger_error("no log file spcified.");
            }

            $logDir = dirname($this->conf["log_file"]);
            if (!is_dir($logDir)) {
                mkdir($logDir, 0755, true);
            }
            $this->fileHandle = fopen($this->conf["log_file"], "a");
        }
        return $this->fileHandle;
    }
}