<?php
/**
 * Class for NextCeph Curl Requests
 * by mamanberliansyah
 */

namespace OCA\NextCeph\Curl;

class NextCurl {

  private $url;
  private $login;
  private $pass;

  public function __construct($url,$login,$pass){
    $this->url = $url;
    $this->login = $login;
    $this->pass = $pass;
  }

  public function get_request() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$this->url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$this->login:$this->pass");
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }

  public function post_request($prefix){
    $prefix = json_encode($prefix);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$this->login:$this->pass");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $prefix);

    $result = curl_exec($ch);
    $obj = json_decode($result);
    curl_close($ch);

    return $obj;
  }

  public function patch_request($prefix){
    $prefix = json_encode($prefix);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$this->login:$this->pass");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $prefix);

    $result = curl_exec($ch);
    $obj = json_decode($result);
    curl_close($ch);

    return $obj;
  }

  public function delete_request($prefix){
    $prefix = json_encode($prefix);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$this->login:$this->pass");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $prefix);

    $result = curl_exec($ch);
    $obj = json_decode($result);
    curl_close($ch);

    return $obj;
  }
}
