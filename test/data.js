/*global describe:false, it:false, before:false, after:false, afterEach:false*/

'use strict';


var app = require('../index'),
    kraken = require('kraken-js'),
    request = require('supertest'),
    https = require('https'),
    fs = require('fs'),
    assert = require('assert');

function downloadCSV(name, data, o) {
    var spreadsheetUrl = "https://docs.google.com/spreadsheet/pub?single=true&output=csv&gid="
        + data.gid + "&key=" + data.key;
    var csvFile = "data/" + name + ".csv";
    var httpsRequest = https.get(spreadsheetUrl, function(response) {
        var file = fs.createWriteStream(csvFile);
        response.pipe(file);
        ++ o.counter >= o.dataLength && o.callback();
    });
}

describe('data', function () {
    it('should download CSV files', function (done) {
        var config = fs.readFile('config/data.json', 'utf8', function (err, data) {
            if (err) {
                return console.log(err);
            }
            data = JSON.parse(data);
            
            var opt = {
                counter: 0,
                dataLength: Object.keys(data).length,
                callback: done
            };
            
            for (var i in data)
            {
                downloadCSV(i, data[i], opt);
            }
        });
    });
});