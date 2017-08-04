xhr = jQuery.get("https://fahrplaner.vbn.de/bin/stboard.exe/dn?selectDate=today&time=actual&input=bremen+dobbenweg&disableEquivs=yes&maxJourneys=50&boardType=dep&productsFilter=11111111111&maxStops=10&rt=1&start=yes&output=xml","",function(data) {console.log(data);}, "xml")
xml = jQuery(xhr.responseXML)
xml.find("JourneyList Journey:nth-child(3) Attribute[type='NAME'] Text")[0].innerHTML
xml.find("JourneyList Journey:nth-child(3) Attribute[type='DIRECTION'] Text")[0].innerHTML
xml.find("JourneyList Journey:nth-child(3) Dep Time")[0].innerHTML
xml.find("JourneyList Journey:nth-child(3) Dep Delay")[0].innerHTML
