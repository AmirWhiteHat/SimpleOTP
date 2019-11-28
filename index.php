<?php
$timehash = date("Ymdhi");
$hash = hash_hmac('md5',  "Riz$timehash", false);
foreach(str_split($hash, 2) as $hex) {
$hmac[] = hexdec($hex);
}
$offset = $hmac[16] & 0xf;
$code = ($hmac[$offset+0] & 0x7F) << 24 |
        ($hmac[$offset + 1] & 0xFF) << 16 |
        ($hmac[$offset + 2] & 0xFF) << 8 |
        ($hmac[$offset + 3] & 0xFF);
echo "$code" % pow(10,5);
