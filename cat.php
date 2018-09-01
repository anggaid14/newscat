<?php
// FB : Manggala Febri Valentino
// Not For Sale 
// THX TO SGB TEAM

function cat($token, $jumlah, $wait){
	$x = 0; 
    while($x < $jumlah) {
		$rand = rand(1111,99999);
		
		$body = '--KONTOL
Content-Disposition: form-data; name="aid"
Content-Length: 6

'.$rand.'
--KONTOL
Content-Disposition: form-data; name="token"
Content-Length: 32

'.$token.'
--KONTOL
Content-Disposition: form-data; name="sign"
Content-Length: 32

AB10AA52B0E431D9091087795DBF6638
--KONTOL--';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://www.newscat.com/api/article/award");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: multipart/form-data; boundary=KONTOL"));
        $server_output = curl_exec ($ch);
        curl_close ($ch);
		echo $server_output."\n";
        sleep($wait);
        $x++;
        flush();
    }
}

print "TUYUL COIN NEWS CAT\n\n";

echo "TOKEN?\nInput : ";
$token = trim(fgets(STDIN));
echo "Jumlah?\nInput : ";
$jumlah = trim(fgets(STDIN));
echo "Jeda? 0-9999999999 (ex:0)\nInput : ";
$wait = trim(fgets(STDIN));
$execute = cat($token, $jumlah, $wait);
print $execute;
print "DONE ALL SEND\n";
?>
