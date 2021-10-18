<?php

namespace App\Http\Controllers;

use App\Models\Datetime as DatetimeModel;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class ConvertUTC extends Controller
{
    private $countries = [
        ['id' => 1, 'name' => 'Bolivia', 'tz' => 'America/La_Paz', 'datetime' =>  ''],
        ['id' => 2, 'name' => 'Peru', 'tz' => 'America/Lima', 'datetime' =>  ''],
        ['id' => 3, 'name' => 'United States', 'tz' => 'America/New_York', 'datetime' =>  ''],
        ['id' => 4, 'name' => 'España', 'tz' => 'Europe/Madrid', 'datetime' =>  ''],
    ];


    public function __invoke(Request $request)
    {
        $datetimeModel = new DatetimeModel();
        $datetimeModel->utc = $request->get('datetime');
        $datetimeModel->save();

        $this->convertForCountries($datetimeModel->utc);

        return response()->json($this->countries);
    }

    private function convertForCountries($datetime)
    {
        foreach ($this->countries as &$country) {
            $country['datetime'] = $this->convertTZ($datetime, $country['tz']);
        }
    }

    private function convertTZ($datetime, $tzString) {
        $tz = new DateTimeZone($tzString);

        $date = new DateTime($datetime);
        $date->setTimezone($tz);

        return $date->format('Y-m-d H:i:s');
    }
}
