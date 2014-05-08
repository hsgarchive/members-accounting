<?php

class SpreadsheetTest extends TestCase
{

    public function testDownloadMembersCsv()
    {
        $csv = new Spreadsheet('members');
        $this->assertGreaterThan(0, $csv->downloadCSV());
    }

    public function testDownloadPaypalCsv()
    {
        $csv = new Spreadsheet('paypal');
        $this->assertGreaterThan(0, $csv->downloadCSV());
    }

    public function testDownloadStanchartCsv()
    {
        $csv = new Spreadsheet('stanchart');
        $this->assertGreaterThan(0, $csv->downloadCSV());
    }
}
