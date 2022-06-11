<!DOCTYPE html>
<html lang="en">
<head>
    <title>Docker app</title>
</head>
<body>
    <?php
    $remote = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';
    if ($remote == '127.0.0.1' || $remote == 'localhost' || $remote == '172.17.0.1'){
        echo "IP address: ".$remote." ***** TIME UTC: ".date("Y-m-d H:i:s");
    } else {
   $url = "https://lokalizacjaip.pl/api/index/localise/";
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
       "Accept: application/json",
       "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    
    $postData = array(
        'host' => $remote
    );
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
    
    $resp = curl_exec($curl);
    curl_close($curl);
    
    $obj = json_decode($resp);
    echo "ip address: ".$obj->{'ipAddress'}."<br>"; 
    echo "timeZone: ".$obj->{'timeZone'};
}
?>
<script>
console.log("Bartłomiej Jakubowski")
</script> 
</body>
</html>
