

<?php
function do_post($url, $params) {
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => $params
        )
    );
    $result = file_get_contents($url, false, stream_context_create($options));
    return $result;
}


 function cURL($url, $json)
    {
        // Create curl resource
        $ch = curl_init($url);

        // Request headers
        $headers = array();
        $headers[] = 'Content-Type: application/json';

        // Return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // to return a response 1=true
        curl_setopt($ch, CURLOPT_POST, 1); //TRUE to do a regular HTTP POST.
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json)); // دي الداتا اللي عايز ابعتها
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); //An array of HTTP header fields to set, in the format array('Content-type: text/plain', 'Content-length: 100')

        // $output contains the output string
        $output = curl_exec($ch);

        // Close curl resource to free up system resources
        curl_close($ch);
        echo $output;
    }
    
    $x = [
        "username"=>"etS93DRV",
        "password"=>"aC3eCqG3Nw",
        "language"=>"English1",
        "sender"=>"abdo",
        "message"=>"test msg",
        "mobile"=>"01012895020"
    ];
    // echo json_encode($x);
 cURL('https://smsmisr.com/api/webapi/?',json_encode($x));
//echo do_post('https://smsmisr.com/api/webapi/?', "username=etS93DRV&password=aC3eCqG3Nw&language=English1&sender=abdo&message=Encoded Message&mobile=201012895020");
?>
