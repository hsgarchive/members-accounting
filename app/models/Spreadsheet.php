<?php

class Spreadsheet
{

    private $configFile = 'config/spreadsheets.json';
    private $csvFileFormat = "app/database/%s.csv";

    private $name = '';
    private $csvFile = '';

    public function __construct($name)
    {
        $this->name = $name;
        $this->csvFile = sprintf($this->csvFileFormat, $this->name);
        
    }

    public function readCSV()
    {
        if (($handle = fopen($this->configFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1024, ",")) !== FALSE) {
                if (empty($header)) {
                    $header = $data;
                    continue;
                }
                $data = array_combine($header, $data);
                $csv[] = $data;
            }
            fclose($handle);
        }
        return $csv;
    }

    public function downloadCSV()
    {
        $config = json_decode(file_get_contents($this->configFile), true)[$this->name];
        $spreadsheetUrl = "https://docs.google.com/spreadsheet/pub?"
            . http_build_query(array(
                  'single' => 'true'
                , 'output' => 'csv'
                , 'gid' => $config['gid']
                , 'key' => $config['key']
        ));
        
        $fileSize = file_put_contents($this->csvFile, file_get_contents($spreadsheetUrl));
        if (! $fileSize)
            throw new Exception('CSV download failed for: ' . $csvFile);
        
        return $fileSize;
    }
}