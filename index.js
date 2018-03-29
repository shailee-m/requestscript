var express = require('express')
var bodyParser = require('body-parser')
var requestInitScript = require('./requestInitScript')
var app = express()
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.post('/', function(req, res) {
    var body = req.body;
    if (!body.requestData || !body.urls || !body.timeout) {
        res.status(500).send({
            status: false,
            content: "One of the following keys not specified: requestData,urls,timeout"
        })
    } else if (typeof body.requestData !== "string") {
        res.status(500).send({
            status: false,
            content: "Expected RequestedData to be json string"
        })
    } else if (!Array.isArray(body.urls)) {
        res.status(500).send({
            status: false,
            content: "expected urls to be an array of strings"
        })
    } else if (typeof body.timeout !== "number") {
        res.status(500).send({
            status: false,
            content: "Expected timeout to be numeric"
        })
    } else {
        requestInitScript(body.urls, body.requestData, body.timeout, function(resp) {
            res.status(resp.status == false ? 500 : 200).send(resp)
        })
    }

})


app.listen(process.env.PORT || 3000);