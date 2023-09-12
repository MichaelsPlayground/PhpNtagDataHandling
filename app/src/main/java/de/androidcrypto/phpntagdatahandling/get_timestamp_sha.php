<?php

// important: use "abc" instead of 'abc', otherwise linebreak won't work !

// this tries to receive an uid in uid, makes a filename like uid.txt, and writes the uid to the file in append mode
// additionally it verifies the mac against the uid, the mac is sha256 of the uid

// add: get the timestamp of the server and show it, then calculate the sha over uid and timestamp

// eg call http://fluttercrypto.bplaced.net/apps/ntag/get_timestamp_sha.php?uid=01020304050607&mac=78339717
// a60a107d
// call valid on 12.09.2023: http://fluttercrypto.bplaced.net/apps/ntag/get_timestamp_sha.php?uid=01020304050607&mac=a60a107d

$uid = $_GET['uid'];
$mac = $_GET['mac'];

// verify mac
// 01020304050607 gives sha256: 783397175344fc84c0526b617652fd9b766febe64515b6a397f289168e81d830:783397175344fc84c0526b617652fd9b766febe64515b6a397f289168e81d830
// 01020304050607 gives 78339717 (first 8 chars)
// 11020304050607 gives sha256: 44a852f03a6370ca0286d8abe9150e3acd5f9cc87f2a74a1756ecae2f3e2b8e6:44a852f03a6370ca0286d8abe9150e3acd5f9cc87f2a74a1756ecae2f3e2b8e6
// 11020304050607 gives sha256: 44a852f0
$uidMac = hash('sha256', $uid, true);
$uidMacHex = bin2hex($uidMac);
echo "$uidMacHex:".$uidMacHex."<br />";
$uidMacHex8Chars = substr($uidMacHex, 0, 8);
echo "$uidMacHex8Chars:".$uidMacHex8Chars."<br />";
if ($uidMacHex8Chars == $mac) {
    echo "mac is VERIFIED"."<br />";
} else {
	echo "mac is FAILING"."<br />";
}

$handle = null;
if ($uid == null) {
    $name = 'guest';
} else {
  $filename = $uid . ".txt";
  echo "$uid gets:".$filename."<br />";
  $fullFilename = dirname(__FILE__). '/data/' . $filename;
  echo "$fullFilename:".$fullFilenamefilename."<br />";
  $handle = fopen($fullFilename, "a");
}  
  if ($handle) {
	  $line = PHP_EOL . $uid;
    $writeResult = fwrite($handle, $line);
  }
fclose($handle);

$message = $_GET['message'];

if ($message == null) {
    $message = 'hello there';
}

// final json = '{"title": "Hello", "body": "body text", "userId": 1}';

$arr = array('title' => $name, 'body' => 2, 'userId' => 3);

echo json_encode($arr)."<br />";

echo "$name says: $message"."<br />";

// methods

function getTimestampDate() {
  $timestamp = time();
  //echo "timestamp: " . $timestamp ."<br />";
  $tsDate = date("d_m_Y", $timestamp);
  //echo "tsDate:" . $tsDate ."<br />";
  return $tsDate;
}

// returns the 8 character long sha-256 value of $uidHexString_$timestampString
function calculateShortSha($uidHexString, $timestampString) {
  $shaData = $uidHexString . "_" . $timestampString;
  //echo "shaData: " . $shaData . "<br />";
  $shaDataValue = hash('sha256', $shaData, true);
  $shaDataValueHex = bin2hex($shaDataValue);
  //echo "shaDataValueHex:".$shaDataValueHex."<br />";
  $shaDataValueHex8Chars = substr($shaDataValueHex, 0, 8);
  //echo "shaDataValueHex8Chars:".$shaDataValueHex8Chars."<br />";
  return $shaDataValueHex8Chars;
}

function verifyMac($uidHexString, $receivedMac) {
  $uidMac = hash('sha256', $uidHexString, true);
  $uidMacHex = bin2hex($uidMac);
  //echo "$uidMacHex:".$uidMacHex."<br />";
  $uidMacHex8Chars = substr($uidMacHex, 0, 8);
  //echo "$uidMacHex8Chars:".$uidMacHex8Chars."<br />";
  if ($uidMacHex8Chars == $receivedMac) {
    echo "mac is VERIFIED"."<br />";
    return true;
  } else {
	echo "mac is FAILING"."<br />";
	return false;
  }
}

function verifyMacTimestamp($uidHexString, $receivedMac) {
  $tsDate = getTimestampDate();
  $shaMac = calculateShortSha($uidHexString, $tsDateTest);
  //echo "shaMac:" . $shaMac . "<br />";
  if ($shaMac == $receivedMac) {
    echo "mac is VERIFIED"."<br />";
    return true;
  } else {
	echo "mac is FAILING"."<br />";
	return false;
  }
}

// get the server's timestamp
$timestamp = time();
$datum = date("d.m.Y - H:i", $timestamp);
echo $datum ."<br />"; // 12.09.2023 - 12:53
$datum = date("d_m_Y_H", $timestamp);
echo $datum ."<br />"; // 12_09_2023_12
// timestamp has only day_month_year dd_mm_yyyy
$datum = date("d_m_Y", $timestamp);
echo $datum ."<br />"; // 12_09_2023

// calculate the sha256 of uid_timestamp = uuuuuuuuuuuuuu_dd_mm_yyyy
echo "calculate the sha256 of uid_timestamp = uuuuuuuuuuuuuu_dd_mm_yyyy" ."<br />";
$shaData = $uid . "_" . $datum;
echo "shaData: " . $shaData . "<br />";
$shaDataValue = hash('sha256', $shaData, true);
$shaDataValueHex = bin2hex($uidMac);
echo "shaDataValueHex:".$shaDataValueHex."<br />";
$shaDataValueHex8Chars = substr($shaDataValueHex, 0, 8);
echo "shaDataValueHex8Chars:".$shaDataValueHex8Chars."<br />";
/*
calculate the sha256 of uid_timestamp = uuuuuuuuuuuuuu_dd_mm_yyyy
shaData: 01020304050607_12_09_2023
shaDataValueHex:783397175344fc84c0526b617652fd9b766febe64515b6a397f289168e81d830
shaDataValueHex8Chars:78339717
*/

// function test
$tsDateTest = getTimestampDate();
echo "tsDateTest:" . $tsDateTest ."<br />";
$uidTest = $uid;
$shaMac = calculateShortSha($uidTest, $tsDateTest);
echo "shaMac:" . $shaMac . "<br />";
echo "======" . "<br />";
echo "verify MAC" . "<br />";
$verified = verifyMac($uid, $mac);
echo "result: " . $verified . "<br />";
echo "======" . "<br />";
echo "verify timestamped MAC" . "<br />";
$verified = verifyMacTimestamp($uid, $mac);
echo "result: " . $verified . "<br />";

echo "=== END ===" . "<br />";
