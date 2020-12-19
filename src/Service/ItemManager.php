<?php


namespace App\Service;


class ItemManager
{
    public function getItemsInfo($item, $roomId)
    {
        $token         = 'ef061e1a717568ee5ca5c76a94cf5842';
        $registrations = [];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://demo14.secure.retreat.guru/api/v1/" . $item . "?token=" . $token . "&room_id=" . $roomId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $data     = json_decode($response, true);

        foreach ($data as $item)
        {
            $registrations[] = [
                'fullName' => $item['full_name'],
                'startDate' => $item['start_date'],
                'endDate' => $item['end_date']
            ];
        }

        return empty($registrations) ? 'false' : $registrations;
    }
}