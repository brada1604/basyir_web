<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OneSignalController extends BaseController
{
    public function index()
    {
        $data['session'] = session();
        echo view('site_subscribe', $data);
    }

    function send_message($headings, $content, $link) {
        $content = array(
            "en" => $content // Change this to your desired notification message
        );

        $headings = array(
            "en" => $headings
        );

        $fields = array(
            'app_id' => '1ab33eb7-d6a4-49f6-ad9e-44f65aead8fd', // Replace with your OneSignal App ID
            'included_segments' => array('All'),
            'data' => array("foo" => "bar"), // Optional additional data
            'contents' => $content,
            'headings' => $headings
        );

        $fields = json_encode($fields);
        $url = 'https://onesignal.com/api/v1/notifications';
        $headers = array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic ZmRlMjk5N2MtNjEwOS00YTI4LThiMjEtZjI1YzdlNGIxMTdm' // Replace with your OneSignal REST API Key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);

        // return $result;

        return redirect()->to('/'.$link);
    }




    function send_message2(){
        $message = "testt";
        $user_id = "123456789";
        $url = "http://onesignal.loc";
        $headings = "judul";
        $img = "http://onesignal.loc/img/pic.gif";
        
        
        $content = array(
            "en" => "$message"
        );
        $headings = array(
            "en" => "$headings"
        );

        $fields = array(
            'app_id' => '1ab33eb7-d6a4-49f6-ad9e-44f65aead8fd',
            'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
            'url' => $url,
            'contents' => $content,
            'chrome_web_icon' => $img,
            'headings' => $headings
        );

        $fields = json_encode($fields);
        //print("\nJSON sent:\n");
        //print($fields);
        
        
        
        echo '<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">';
        echo '<div class="row"><div class="col-md-12"><p class="text-center"><h3 class="text-center" style="color:#00e600;font-weight: 700;">Message sent</h3></p>';
        // echo '<p class="text-center"><button onclick="location.href=\''.CMS_URI.'/admin\';" type="button" class="btn btn-success">SEND ANOTHER MESSAGE</button></p>';
        echo '</div></div>';




        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic '.'ZmRlMjk5N2MtNjEwOS00YTI4LThiMjEtZjI1YzdlNGIxMTdm'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
       return $response;
    }
}
