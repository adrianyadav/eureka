<?php 
$google_url = "https://www.google.com/recaptcha/api/siteverify";
$secret = '6LdN5RATAAAAAJzk5HEeabDJ9EPsAegBowshBUeF';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = $_POST['data'];
    
      $url = $google_url."?secret=".$secret."&response=".$response;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_TIMEOUT, 15);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); 
    $curlData = curl_exec($curl);

    curl_close($curl);

    $res = json_decode($curlData, TRUE);
    
    if($res['success'] == 'true') 
            echo 'true';
        else
            echo 'false';

    
    // in real life you should use something like:
    // curl_setopt($ch, CURLOPT_POSTFIELDS, 
    //          http_build_query(array('postvar1' => 'value1')));

    // receive server response ...
    


    // further processing ....
    //$server_output;
}
?>