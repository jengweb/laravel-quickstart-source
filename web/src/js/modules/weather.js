let hotelWoeid;
var $elem = {};
momenttimezone.tz.add('America/Los_Angeles|PST PDT|80 70|0101|1Lzm0 1zb0 Op0');
// moment.tz('');

$elem.tempNumberC = $("#temperature #celsius");
$elem.tempNumberF = $("#temperature #fahrenheit");
$elem.tempDesc = $("#temperature #weather_text");
$elem.localTime = $("#local-time.time");
$elem.tempIcon = $("#temperature #weather_icon");

var weatherInfo = [];
var apiUrl,
    localData = localStorage.getItem("hotel_weather"),
    localWeatherUnitData = localStorage.getItem("hotel_weather_unit"),
    localJsonData = localData ? $.parseJSON(localData) : {},
    localWeatherUnitJsonData = localWeatherUnitData ? $.parseJSON(localWeatherUnitData) : {},
    todayKeyStr = momenttimezone().tz('Asia/Manila').format("YYYY-MM-DD"),
    loadNew = false, weatherResultText, condcode,
    dataKeyStr;



const getIcon = (condid) => {
    var icon = "";
    switch(condid) {
        case '0': icon  = 'wi-tornado';
            break;
        case '1': icon = 'wi-storm-showers';
            break;
        case '2': icon = 'wi-tornado';
            break;
        case '3': icon = 'wi-thunderstorm';
            break;
        case '4': icon = 'wi-thunderstorm';
            break;
        case '5': icon = 'wi-snow';
            break;
        case '6': icon = 'wi-rain-mix';
            break;
        case '7': icon = 'wi-rain-mix';
            break;
        case '8': icon = 'wi-sprinkle';
            break;
        case '9': icon = 'wi-sprinkle';
            break;
        case '10': icon = 'wi-hail';
            break;
        case '11': icon = 'wi-showers';
            break;
        case '12': icon = 'wi-showers';
            break;
        case '13': icon = 'wi-snow';
            break;
        case '14': icon = 'wi-storm-showers';
            break;
        case '15': icon = 'wi-snow';
            break;
        case '16': icon = 'wi-snow';
            break;
        case '17': icon = 'wi-hail';
            break;
        case '18': icon = 'wi-hail';
            break;
        case '19': icon = 'wi-cloudy-gusts';
            break;
        case '20': icon = 'wi-fog';
            break;
        case '21': icon = 'wi-fog';
            break;
        case '22': icon = 'wi-fog';
            break;
        case '23': icon = 'wi-cloudy-gusts';
            break;
        case '24': icon = 'wi-cloudy-windy';
            break;
        case '25': icon = 'wi-thermometer';
            break;
        case '26': icon = 'wi-cloudy';
            break;
        case '27': icon = 'wi-night-cloudy';
            break;
        case '28': icon = 'wi-day-cloudy';
            break;
        case '29': icon = 'wi-night-cloudy';
            break;
        case '30': icon = 'wi-day-cloudy';
            break;
        case '31': icon = 'wi-night-clear';
            break;
        case '32': icon = 'wi-day-sunny';
            break;
        case '33': icon = 'wi-night-clear';
            break;
        case '34': icon = 'wi-day-sunny-overcast';
            break;
        case '35': icon = 'wi-hail';
            break;
        case '36': icon = 'wi-day-sunny';
            break;
        case '37': icon = 'wi-thunderstorm';
            break;
        case '38': icon = 'wi-thunderstorm';
            break;
        case '39': icon = 'wi-thunderstorm';
            break;
        case '40': icon = 'wi-storm-showers';
            break;
        case '41': icon = 'wi-snow';
            break;
        case '42': icon = 'wi-snow';
            break;
        case '43': icon = 'wi-snow';
            break;
        case '44': icon = 'wi-cloudy';
            break;
        case '45': icon = 'wi-lightning';
            break;
        case '46': icon = 'wi-snow';
            break;
        case '47': icon = 'wi-thunderstorm';
            break;
        case '3200': icon = 'wi-cloud';
            break;
        default: icon = 'wi-cloud';
            break;
    }

    return '<i class="wi '+icon+'"></i>';
}

const renderWeatherList = () => {
    $elem.tempNumberC.text(weatherInfo[0].high);
    $elem.tempNumberF.text(weatherInfo[0].fahrenheit);
    $elem.tempIcon.html(weatherInfo[0].icon);
    $elem.tempDesc.text(weatherInfo[0].desc);


    var clientTime = momenttimezone(weatherInfo[0].dayKey), diffHour,
        currentTimeZone = clientTime.clone().format("Z"),
        targetTimeZone = clientTime.clone().tz('Asia/Manila').format('Z'),
        newTime;
    currentTimeZone = currentTimeZone.replace(/[+0:]/g, "");
    targetTimeZone = targetTimeZone.replace(/[+0:]/g, "");
    currentTimeZone = parseInt(currentTimeZone, 10);
    targetTimeZone = parseInt(targetTimeZone, 10);

    if (currentTimeZone > targetTimeZone) {
        newTime = momenttimezone().subtract(currentTimeZone - targetTimeZone, 'h');
    } else if (currentTimeZone < targetTimeZone) {
        newTime = momenttimezone().add(targetTimeZone - currentTimeZone, 'h');
    } else {
        newTime = momenttimezone();
    }

    var g = null,
        split_afternoon = 12, //24hr time to split the afternoon
        split_evening = 17, //24hr time to split the evening
        currentHour = parseFloat(newTime.format("HH"));

    if(currentHour >= split_afternoon && currentHour <= split_evening) {
        g = "Good afternoon";
    } else if(currentHour >= split_evening) {
        g = "Good evening";
    } else {
        g = "Good morning";
    }


    $elem.localTime.text(newTime.format("LT"));

    $(".weather-widget-wrapper").addClass("show");
}

const init = (weatherData) => {
    hotelWoeid = weatherData.keyCode;
    apiUrl = 'http://query.yahooapis.com/v1/public/yql?q=select * from weather.forecast where woeid in (select woeid from geo.places(1) where woeid="' + hotelWoeid + '")&format=json';

    $.getJSON(apiUrl).then(function (resp) {
        var respData = resp,
            resultData = {},
            jsonData = {},
            unitInfo = {};

        if (respData.hasOwnProperty("query") &&
            respData.query.hasOwnProperty("results") &&
            respData.query.results.hasOwnProperty("channel") &&
            respData.query.results.channel.hasOwnProperty("item") &&
            respData.query.results.channel.item.hasOwnProperty("forecast")) {
            resultData = respData.query.results.channel.item.forecast;
            unitInfo = respData.query.results.channel.units;
        }

        $.each(resultData, function (idx, item) {
            dataKeyStr = momenttimezone(item.date, "DD MMM YYYY").format("YYYY-MM-DD");
            weatherResultText = item.text;
            condcode = item.code;
            localJsonData[dataKeyStr] = {
                "date": item.date,
                "day": item.day,
                "high": item.high,
                "fahrenheit": item.fahrenheit,
                "low": item.low,
                "text": weatherResultText
            };

            if (todayKeyStr === dataKeyStr) {
                localJsonData[dataKeyStr].loaded = true;
            }
            if (dataKeyStr === todayKeyStr) {
                weatherInfo.push({
                    "dayKey": dataKeyStr,
                    "high": (unitInfo.temperature.toUpperCase() === "F" ? Math.floor((item.high - 32) / 1.800) : item.high),
                    "fahrenheit": item.high,
                    "desc": weatherResultText,
                    "icon": getIcon(condcode)
                });
            }
        });

        // if(weatherInfo.length > 1 ) {
        renderWeatherList();
        // }


    });
};

export { init };