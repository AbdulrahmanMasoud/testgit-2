<?php

class SmsMisr {

    private $username = "etS93DRV", $password='aC3eCqG3Nw', $sender_name='abdo', $phone_number='201012895020', $message='test';
    private $languages = ['en'=>1,'ar'=>2,'unicode'=>3];
    private $language = 1;


    public function send(){
        $result = $this->curl_request(
            "https://smsmisr.com/api/v2/",
            [
                'username'=> $this->username,
                'password'=> $this->password,
                'language'=> $this->language,
                'sender'=> $this->sender_name,
                'mobile'=> $this->phone_number,
                'message'=> $this->message
            ],
            [
                'Content-Type: application/json',
                'Accept: application/json',
                'Accept-Language: en-US'
            ]);

        $result = json_decode($result,true);
        if (isset($result['code']) && in_array($result['code'],[1901,6000]) ) return true;
        return false;
    }


    private function curl_request ($url, $fields, $headers = []){
        $payload = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $result = curl_exec($ch);
        curl_close($ch);
        echo $result;
    }
}
$x = new SmsMisr();
 $x->send();

?>
