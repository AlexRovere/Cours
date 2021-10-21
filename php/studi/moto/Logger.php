<?php

class Logger
{
    public string $date;
    public $file;

    public function __construct()
    {
        $datetime = new DateTime();
        $this->date = $datetime->format("Y-m-d H:i:s");
        $this->file = fopen(date('Y-m-d') . '.log', 'a');
        $this->log('Ouverture des logs');
    }

    public function log(string $message)
    {
        fwrite($this->file, '[' . $this->date . ']' . $message . PHP_EOL);
    }

    public function __destruct()
    {
        $this->log('Fermeture des logs');
        fclose($this->file);
    }
}
