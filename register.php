<?php
$stream=$_GET[stream];
$url_1 = 'http://stream.aff-id.com/aff_c?offer_id=44&aff_id=1278&aff_sub='.$stream; // URL MegaFlix (US/CA/UK/DE/FR/ES)
$url_2 = 'http://stream.aff-id.com/aff_c?offer_id=44&aff_id=1278&aff_sub='.$stream; // URL MegaFlix (US/CA/UK/DE/FR/ES)
$url_3 = 'http://stream.aff-id.com/aff_c?offer_id=46&aff_id=1278&aff_sub='.$stream; // URL MegaFlix International

function get_ip()
{
if (!empty($_SERVER['HTTP_CLIENT_IP'])) //check ip from share internet
{
$ip=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //to check ip is pass from proxy
{
$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
$ip=$_SERVER['REMOTE_ADDR'];
}
return $ip;
}

$country = file_get_contents('http://labs.stoodioo.com/geoip/country.php?ip='.get_ip());

switch ($country) {
    case "GB":
        $aff_url =  $url_1;
        break;
    case "US":
        $aff_url =  $url_2;
        break;
    case "CA":
        $aff_url =  $url_2;
        break;
    case "DE":
        $aff_url =  $url_2;
        break;
    case "FR":
        $aff_url =  $url_2;
        break;
    case "ES":
        $aff_url =  $url_2;
        break;
    default:
        $aff_url =  $url_3;
}

header('Location: '.$aff_url.'');
?>