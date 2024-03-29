<?php


/**
 * Dev en cours
 */

class Use_Curl {

  public $url;
  public $config;

  public function __construct($url, $config = []) {

    $this->url = $url;
    $this->config = $config;

  }

  public function post($endPath, $datas){

    $curl = curl_init();
    $url  = $this->base_url . $endPath;

    // $headers = [
    //   'content-type: application/json',
    //   'mail: ' . $this->mail,
    //   'password: ' . $this->password
    // ];

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    //curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($datas));

    $info = curl_getinfo($curl);
    $resp = curl_exec($curl);

    curl_close($curl);

    return json_decode($resp);

  }

  public function get() {

    $ch = curl_init();

    //curl_setopt($ch, CURLOPT_URL, trim($url));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION , 1);

    $data = curl_exec($ch);
    curl_close($ch);
    
    if ($data) return json_decode($data);
    return false;

  }

}
