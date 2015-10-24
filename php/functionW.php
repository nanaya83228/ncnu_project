<?php
date_default_timezone_set('Asia/Taipei');
$chineseWeek = array('日', '一', '二', '三', '四', '五', '六');
$cityList = array(
    '南投縣'
);
/**
 * fetch Weekly forecasting, accept city parameter to return particular
 * @param  string $city
 * @return array  forecasting data
 */
function fetchWeatherWeekly()
{
    $url = "http://opendata.cwb.gov.tw/opendata/MFC/F-C0032-005.xml"; // 7days
   // $url = "F-C0032-005.xml";
    $forecasting = fetchWeather($url);
    
    return $forecasting;
}
/**
 *  fetch weather from cwb opendata http://opendata.cwb.gov.tw
 *  @param url: opendata xml url
 *  @return array cities weather data
 *
 */
function fetchWeather($url)
{
    if (!strlen($url)) {
        return [];
    }
    $xmlstring = file_get_contents($url);
    $forecasting = xml2array($xmlstring);
    $cities = [];
    foreach ($forecasting['dataset']['location'] as $city) {
        $cityName = $city['locationName'];
        $cityName = str_replace('臺', '台', $cityName);
        $element = $city['weatherElement'];
        $cities[$cityName] = parseCityForecastData($element);
    }
    return $cities;
}
/**
 * parse city forecasting element
 * @param  array  $elements from opendata xml weatherElement data
 * @return array  associate with reformated date, hour and element name(weather data type)
 */
function parseCityForecastData(array $elements)
{
    $weather = [];
    foreach ($elements as $element) {
        $elementName = strtolower($element['elementName']);
        foreach ($element['time'] as $time) {
            $foo = reformatTime($time['startTime']);
            $sDate = $foo['date'];
            $sHour = $foo['hour'];
            $foo = reformatTime($time['endTime']);
            $eDate = $foo['date'];
            $eHour = $foo['hour'];
            $parameterName = (string) $time['parameter']['parameterName'];
            $weather[$sDate][$sHour][$elementName] = $parameterName;
            $weather[$eDate][$eHour][$elementName] = $parameterName;
        }
    }
    return $weather;
}
/**
 * reformat time string to desite format
 * @param  string $timeStr time string
 * @return array  with date and hour data
 */
function reformatTime($timeStr)
{
    global $chineseWeek;
    $time = strtotime($timeStr);
    $weekName = $chineseWeek[date('w', $time)];
    $date = date('m-d', $time) . '(' . $weekName . ')';
    $hour = date('H', $time);
    return compact('date', 'hour');
}
/**
 * convert xml string to array using simpleXML parser and json (de)encoder
 * @param  string $xmlstring xml string
 * @return array
 */
function xml2array($xmlstring)
{
    $xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
    $jsonData = json_encode($xml);
    return json_decode($jsonData, true);
}