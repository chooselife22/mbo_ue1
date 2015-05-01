<?php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<vxml version=\"2.1\" >";
//diese Werte nicht aendern!!!!!
$host = '127.0.0.1';
$login = 'root';
$password = '';
$connection = mysql_connect($host, $login, $password) or die ("Error - no connection"); 
$db = mysql_select_db("voicexml_bank", $connection) or die("Error - while selecting database: " . mysql_error());
//vars
$account_number = $_GET['Account_Number'];
$pin_number = $_GET['Pin_Number'];
$status = 'failure';
//query
$query = "SELECT * from kunde where kontonummer = $account_number and pin = $pin_number";
$result = mysql_query($query) or die ("Error - with query: " . mysql_error());
$kunde = mysql_fetch_assoc($result);
if (mysql_num_rows($result) > 0) {
	$status = 'success';
}
echo "<h1>$status</h1>";
echo "<h1>$pin_number</h1>";
echo "<h1>$account_number</h1>";
?>

  <form>
    <block>
      <var name="status" expr="'<?=$status?>'"/>
      <return namelist="status"/>
    </block>
  </form>
</vxml>