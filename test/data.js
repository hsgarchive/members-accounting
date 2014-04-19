/*global describe:false, it:false, before:false, after:false, afterEach:false*/

'use strict';


var app = require('../index'),
    kraken = require('kraken-js'),
    request = require('supertest'),
    https = require('https'),
    fs = require('fs'),
    assert = require('assert');


describe('data', function () {
    it('should download CSV files', function (done) {
        var config = fs.readFile('config/data.json', 'utf8', function (err, data) {
            if (err) {
                return console.log(err);
            }
            data = JSON.parse(data);
        
            for (var i in data)
            {
                // console.log(data[i]);
                var spreadsheetUrl = "https://docs.google.com/spreadsheet/pub?single=true&output=csv&gid=" + data[i].gid + "&key=" + data[i].key;
                console.log(spreadsheetUrl, "data/" + i + ".csv");
                var file = fs.createWriteStream("data/" + i + ".csv");
                var request = https.get(spreadsheetUrl, function(response) {
                    console.log(response)
                    // response.pipe(file);
                });
            }
        });
    });
});