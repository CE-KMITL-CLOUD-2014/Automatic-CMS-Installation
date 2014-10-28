<?php
if(!function_exists("is_admin")) { include("include.php"); }

if((filter("num", $_GET['i'])) &&
   (filter("num", $_POST['total'])) &&
   (filter("num", $_POST['refresh'])) &&
   (filter("num", $_POST['retry'])) &&
   (filter("num", $_POST['expire'])) &&
   (filter("num", $_POST['ttl'])) &&
   (filter("alphanum", $_POST['pri_dns'])) &&
   (filter("alphanum", $_POST['sec_dns']))) {
	if(!owner($_GET['i'])) {
		// The user doesn't own this zone.
		$smarty->assign("pagetitle", "Ooops!");
		$smarty->assign("reason", reason("notown"));
		$smarty->assign("template", "accessdenied.tpl");
		$smarty->assign("help", help("accessdenied"));
		$smarty->assign("menu_button", menu_buttons());
		$smarty->display("main.tpl");
		die();
	}	
	//check dup record
		$res = $dbconnect->query("SELECT * FROM records WHERE host = '" . $_POST['delhost']."' and type = '".$_POST['deltype']."' and zone = '".$_GET['i']."'");
		if($res->numRows() == 0) {
			$result = array(
				'status' => 'error',
				'message' => 'Not found this record'
			);
			echo json_encode($result);
			die();
		}
		
	
		if(($_POST['delhost']) && ($_POST['deltype'])) {
				$res = $dbconnect->query("DELETE FROM records " .
							 "WHERE host= '" . $_POST['delhost'] . "' " .
							 "AND type = '".$_POST['deltype']. "' " .
							 "AND zone = " . $_GET['i']
							);
			is_error($res);
	}
	
	
	$res = $dbconnect->query("SELECT serial " .
				 "FROM zones " .
				 "WHERE id = " . $_POST['zoneid']
				);
	is_error($res);

	// Serial fixes
	$old_serial = current($res->fetchRow(0));
	$serial = date("Ymd") . substr($old_serial + 1, -2);
	if($serial < $old_serial) {
		$serial = $old_serial + 1;
	}
	$serial = "serial = '" . $serial . "' ";

	// Owner fixes
	if(isset($_POST['owner'])) {
		$owner = "owner = '" . $_POST['owner'] . "', ";
	}
	else {
		$owner = '';
	}

	$res = $dbconnect->query("UPDATE zones " .
				 "SET updated = 'yes', " .				    
				     $serial .
				 "WHERE id = " . $_GET['i']
				);
	is_error($res);
	
	$result = array(
				'status' => 'ok',
				'message' => 'Deleted'
	);
	echo json_encode($result);
}

?>
