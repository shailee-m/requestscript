<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "3000",
  CURLOPT_URL => "http://localhost:3000/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\t\"requestData\":\"{\\\"id\\\":\\\"7a6cb5fa7140ae70fb308bd044d3158c\\\",\\\"imp\\\":[{\\\"id\\\":\\\"7e0df2ed1b6bb51dd5ae80c4c6394dc9\\\",\\\"banner\\\":{\\\"w\\\":320,\\\"h\\\":480,\\\"id\\\":\\\"96838d7a507895b46c9aa5f31d92f509\\\",\\\"mimes\\\":[\\\"image/jpeg\\\",\\\"image/png\\\"]},\\\"displaymanager\\\":\\\"CelerumDigital\\\",\\\"instl\\\":1,\\\"bidfloor\\\":0.9,\\\"bidfloorcur\\\":\\\"USD\\\"}],\\\"app\\\":{\\\"id\\\":\\\"56026-45135-28643-64310\\\",\\\"name\\\":\\\"Underwater Survival Sim - 2\\\",\\\"bundle\\\":\\\"com.taigagames.underwatersurvivalsim2\\\",\\\"domain\\\":\\\"play.google.com/store/app/details?id=com.taigagames.underwatersurvivalsim2\\\",\\\"storeurl\\\":\\\"play.google.com/store/app/details?id=com.taigagames.underwatersurvivalsim2\\\",\\\"publisher\\\":{\\\"domain\\\":\\\"google.com\\\"},\\\"keywords\\\":\\\"\\\"},\\\"device\\\":{\\\"ua\\\":\\\"Mozilla/5.0 (Linux; Android 4.4.2; GT-P5210 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Safari/537.36\\\",\\\"geo\\\":{\\\"lat\\\":52.403082895968,\\\"lon\\\":-0.71187290992288,\\\"type\\\":2,\\\"ipservice\\\":3,\\\"country\\\":\\\"GBR\\\",\\\"region\\\":\\\"\\\"},\\\"carrier\\\":\\\"Sky Broadband\\\",\\\"dpidmd5\\\":\\\"9624a3d95bc58f220878c2dddb938bd5\\\",\\\"dpidsha1\\\":\\\"a7c0440c6128ada440311a9b9ed58de16fd0aacf\\\",\\\"ifa\\\":\\\"5aded79c-2796-46fa-9648-88d99d47de3e\\\",\\\"ip\\\":\\\"90.195.111.142\\\",\\\"devicetype\\\":1,\\\"make\\\":\\\"samsung\\\",\\\"model\\\":\\\"GT-P5210\\\",\\\"os\\\":\\\"android\\\",\\\"osv\\\":\\\"4.4.2\\\",\\\"w\\\":1280,\\\"h\\\":800,\\\"ppi\\\":160,\\\"js\\\":1,\\\"connectiontype\\\":3},\\\"user\\\":{\\\"id\\\":\\\"32283300f2e64093cb75c7bb5f479c85\\\"},\\\"test\\\":0,\\\"at\\\":1,\\\"tmax\\\":250,\\\"cur\\\":[\\\"USD\\\"],\\\"ext\\\":{\\\"arId\\\":\\\"f97cc31f7d6e748c4c09ef8659f2f0cf\\\",\\\"partner\\\":\\\"CelerumDigital_320x50\\\",\\\"ac\\\":\\\"56026-45135-28643-64310\\\",\\\"ao\\\":979}}\",\n\"urls\":{\n\t\"adservme\":\"http:\\/\\/rtb.adservme.com\\/rtb?zone=48058\",\n\t\"madgic\":\"http:\\/\\/us-east.ads.madgic.com\\/rtb\\/1733100\\/107327\",\n\t\"nativeads\":\"http:\\/\\/rtb.nativeads.com\\/rtb?zone=49469\",\n\t\"adservme1\":\"http:\\/\\/rtb.adservme.com\\/rtb?zone=48058\",\n\t\"madgic1\":\"http:\\/\\/us-east.ads.madgic.com\\/rtb\\/1733100\\/107327\",\n\t\"nativeads1\":\"http:\\/\\/rtb.nativeads.com\\/rtb?zone=49469\",\n\t\"adservme12\":\"http:\\/\\/rtb.adservme.com\\/rtb?zone=48058\",\n\t\"madgic12\":\"http:\\/\\/us-east.ads.madgic.com\\/rtb\\/1733100\\/107327\",\n\t\"nativeads12\":\"http:\\/\\/rtb.nativeads.com\\/rtb?zone=49469\",\n\t\"adservme2\":\"http:\\/\\/rtb.adservme.com\\/rtb?zone=48058\",\n\t\"madgic2\":\"http:\\/\\/us-east.ads.madgic.com\\/rtb\\/1733100\\/107327\",\n\t\"nativeads2\":\"http:\\/\\/rtb.nativeads.com\\/rtb?zone=49469\"\n},\n\"timeout\":200\n\t\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "connection: keep-alive",
    "content-type: application/json",
    "postman-token: 44ef4348-327a-b884-7e6e-4717f103038a"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}