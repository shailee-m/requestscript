var request = require("request");
var async = require("async");

function sendRequest(url, postbody, timeout, cb) {
    var options = {
        method: 'POST',
        url: url,
        timeout: timeout,
        headers: {
            'content-type': 'application/json'
        },
        body: postbody,
        json: true
    };

    request(options, function(error, response, body) {
        if (error) {
            cb({ status: false, content: error })
        } else {
            var finalResponse = {};
            finalResponse[url] = {
                response: !body ? null : body,
                headers: response.headers
            }
            cb({ status: true, content: finalResponse })
        }

    });
}

function init(urls, request, timeoutInMS, cb) {

    if (urls.length > 0) {
        try {
            var body = JSON.parse(request);
        } catch (e) {

            cb({ status: false, content: e })
            return;
        }
        var responseArray = {
            headers:{},
            response:{}
        };
        async.each(urls, function(url, callbk) {
            sendRequest(url, body, timeoutInMS, function(resp) {
                if (!resp.status) {
                    callbk(resp)
                } else {
                    responseArray.headers[url] = resp.content[url].headers
                    responseArray.response[url] = resp.content[url].response
                    
                    callbk();
                }
            })
        }, function(e) {
            if (e) {
                cb(e)
                return;
            }
            cb(responseArray)
        });
    } else {

        cb({ status: false, content: "Insufficient " })
    }
}

// var defaultbody = '{ "id": "11bc1229120a8b508a02f3fd167c75c2", "imp": [{ "id": "13219b1d9bfaa514adb8b20fd00c55e8", "banner": { "w": 320, "h": 480, "id": "850cbe5891a8a0e8440a9aa43e29e60e", "mimes": ["image\/jpeg", "image\/png"] }, "displaymanager": "CelerumDigital", "instl": 1, "bidfloor": 0.75, "bidfloorcur": "USD" }], "app": { "id": "64983-70608-98287-49014", "name": "com.misplacedgmbh.astrodomus", "bundle": "com.misplacedgmbh.astrodomus", "domain": "play.google.com\/store\/app\/details?id=com.misplacedgmbh.astrodomus", "storeurl": "play.google.com\/store\/app\/details?id=com.misplacedgmbh.astrodomus", "publisher": { "domain": "google.com" }, "keywords": "" }, "device": { "ua": "Mozilla\/5.0 (Linux; Android 7.0; Moto G (5) Build\/NPPS25.137-33-10; wv) AppleWebKit\/537.36 (KHTML, like Gecko) Version\/4.0 Chrome\/65.0.3325.109 Mobile Safari\/537.36", "geo": { "lat": 0, "lon": 0, "type": 2, "ipservice": 3, "country": "BRA", "region": "" }, "carrier": "Provedor De Internet", "dpidmd5": "abc5ff7c4bed1c83bb8fadece779a41c", "dpidsha1": "475b03d424f4c645b7c445d721e4a7efd5104c05", "ifa": "f0dfe0fb-2a3c-464f-ad2a-d28dfe4995ef", "ip": "191.37.182.2", "devicetype": 1, "make": "motorola", "model": "Moto G (5)", "os": "android", "osv": "7.0", "w": 1080, "h": 1776, "ppi": 480, "js": 1, "connectiontype": 3 }, "user": { "id": "71b81b6b577d7f524d23aa9beec5625e" }, "test": 0, "at": 1, "tmax": 250, "cur": ["USD"], "ext": { "arId": "33c12968af50c79c36a3a1923e631829", "partner": "CelerumDigital_300x250", "ac": "64983-70608-98287-49014", "ao": 2219 } }';

// var urls = !process.argv[2] ? ["http://rtb.nativeads.com/rtb?zone=49469","http://us-east.ads.madgic.com/rtb/1733100/107327"] : JSON.parse(process.argv[2])

// var timeout = !process.argv[4] ? 2000 : process.argv[4]
// var body = !process.argv[3] ? defaultbody : process.argv[3]

// init(urls, body, timeout, function(argument) {
//     console.log("********** RESPONSE ****************\n\n")
//     console.log(JSON.stringify(argument, null, 2))
// })

module.exports=init