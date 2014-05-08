<?php

class SpreadsheetTest extends TestCase
{

    public function testMembersCsv()
    {
        $csv = new Spreadsheet('members');
        $this->assertGreaterThan(0, $csv->check());
        $data = $csv->readCSV();
        $this->assertInternalType('array', $data);
        foreach ($csv->getConfig()['fields'] as $field)
            $this->assertArrayHasKey($field, reset($data));
    }

    public function testPaypalCsv()
    {
        $csv = new Spreadsheet('paypal');
        $this->assertGreaterThan(0, $csv->check());
        $data = $csv->readCSV();
        $this->assertInternalType('array', $data);
        foreach ($csv->getConfig()['fields'] as $field)
            $this->assertArrayHasKey($field, reset($data));
    }

    public function testStanchartCsv()
    {
        $csv = new Spreadsheet('stanchart');
        $this->assertGreaterThan(0, $csv->check());
        $data = $csv->readCSV();
        $this->assertInternalType('array', $data);
        foreach ($csv->getConfig()['fields'] as $field)
            $this->assertArrayHasKey($field, reset($data));
    }
}
