<?php

class Spreadsheet
{

    private $configFile = 'app/config/spreadsheets.json';
    private $csvFileFormat = 'app/database/%s.csv';

    private $name = '';
    private $csvFile = '';
    private $config = '';

    public function __construct($name)
    {
        $this->name = $name;
        $this->csvFile = sprintf($this->csvFileFormat, $this->name);
        $config = file_get_contents($this->configFile);
        $config = preg_replace('/\/\/.*/', '', $config);
        $this->config = json_decode($config, true)[$this->name];
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function check()
    {
        // download file older than one day
        return file_exists($this->csvFile)
            && filemtime($this->csvFile) > time() - 24 * 60 * 60
            ? strlen(file_get_contents($this->csvFile))
            : $this->downloadCSV();
    }

    public function readCSV()
    {
        $this->check();
        $csv = array();
        if (($handle = fopen($this->csvFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1024, ",")) !== FALSE) {
                if (empty($header)) {
                    $header = $data;
                    continue;
                }
                $csv[] = $this->filterDataByFields(array_combine($header, $data));
            }
            fclose($handle);
        }
        return $csv;
    }

    public function downloadCSV()
    {
        $spreadsheetUrl = "https://docs.google.com/spreadsheet/pub?"
            . http_build_query(array(
                  'single' => 'true'
                , 'output' => 'csv'
                , 'gid' => $this->config['gid']
                , 'key' => $this->config['key']
        ));
        
        $fileSize = file_put_contents($this->csvFile, file_get_contents($spreadsheetUrl));
        if (! $fileSize)
            throw new Exception('CSV download failed for: ' . $csvFile);
        
        return $fileSize;
    }

    private function filterDataByFields($data)
    {
        $_data = array();
        foreach ($this->config['fields'] as $index => $key)
        {
            $_data[is_string($index) ? $index : $key] = $data[$key];
        }
        return $_data;
    }
}