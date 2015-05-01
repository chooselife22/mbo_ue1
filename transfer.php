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
$account_number = $_GET['Var_Account_Number'];
$pin_number = $_GET['Var_Pin_Number'];
$status = 'negative';
//query
$query = "SELECT * from kunde INNER JOIN kontostand ON kunde.kontonummer=kontostand.kontonummer where kunde.kontonummer = $account_number and kunde.pin = $pin_number";
$result = mysql_query($query) or die ("Error - with query: " . mysql_error());
$row = mysql_fetch_assoc($result);
if ($row["guthaben"] > 0) {
	$status = 'positive';
}

echo $status;
?>

  <form>
    <block>
      <var name="status" expr="'<?=$status?>'"/>
      <return namelist="status"/>
    </block>
  </form>
</vxml>