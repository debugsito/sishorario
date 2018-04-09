<?php
$dni = $_GET['dni'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://votoinformado.pe/voto/miembro_mesa.aspx",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"__EVENTTARGET\"\r\n\r\nbtnCongrDNI\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"__EVENTARGUMENT\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"__VIEWSTATE\"\r\n\r\nGk9rMk+LNPJ089tJhQNmjwc92wiCRmfFOUHT6Xt7MPAn5HQ2oMeogOKdHmLEnZu/VIUWybOAWADsSLT9PyfANxaHeWcmuBVGElTWpG7wQbqvE0AReuXZkpQyQHk=\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"__VIEWSTATEGENERATOR\"\r\n\r\nA8656B09\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"__EVENTVALIDATION\"\r\n\r\ne3rqdlDfr0de4VnTUu/BDA0NEds++2fT7wXynEzpyusYJK0ZJgG3giNyRt7PEw3UOYPaPpHqx97aWmisoMiA1XhDlIPzVtgL2Vfi+G+vWZuid3KXwlQ30fJXWit/EEh7MhPOXSg1ADAomty/TVEES+oUdtvfJTIOCRnfrQ==\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"txtCongrDNI\"\r\n\r\n$dni\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Postman-Token: 851089e4-98cb-a6b1-56bc-d04902573722",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    
    
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($response);
libxml_clear_errors();
$xpath = new DOMXpath($dom);

$data = array();
// obtener todas las filas y filas de la tabla que no son encabezados
$table_rows = $xpath->query('//table[@class="tblRespuesta"]/tr');
foreach($table_rows as $row => $tr) {
    foreach($tr->childNodes as $td) {
        $data[$row][] = preg_replace('~[\r\n]+~', '', trim($td->nodeValue));
    }
    $data[$row] = array_values(array_filter($data[$row]));
}
header('Content-type: application/json');
echo json_encode($data);
}