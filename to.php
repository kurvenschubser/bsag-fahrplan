// function curl($url) {...}

$items = ["bremen+dobbenweg" => [], "bremen+am+dobben" => []];
foreach ($items as $stationname => $resultlist) {
  $url = "https://fahrplaner.vbn.de/bin/stboard.exe/dn?selectDate=today&time=actual&input={$stationname}&disableEquivs=yes&maxJourneys=5&boardType=dep&productsFilter=11111111111&maxStops=10&rt=1&start=yes&output=xml";
  $root = new SimpleXMLElement((curl($url));

  for ($i = 0; $i < 5; $i++) {
    $path = "//JourneyList/Journey[{$i}]";
    $line = $root->xpath("$path/Attribute[@type='NAME']/Text");
    $direction = $root->xpath("$path/Attribute[@type='DIRECTION']/Text");
    $departure = $root->xpath("$path/Dep/Time");
    $delay = $root->xpath("$path/Dep/Delay");
    array_push($resultlist, [
      "line" => $line, 
      "direction" => $direction,
      "departure" => $departure,
      "delay" => $delay
      ]
    );
  }
}

return json_encode($items);
