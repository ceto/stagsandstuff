<?php 
	if (!session_id()) session_start();
	
	if (isset($_POST['act-toggle']) ) {
		$actid = $_POST['act-toggle'];
		if ( !isset($_SESSION['actList']) ){ $_SESSION['actList']	= array(); }
		
		if ( !in_array($actid, $_SESSION['actList']) ) {
				array_push($_SESSION['actList'],$actid );
			}	elseif (count($_SESSION['actList']) > 1) {
					$_SESSION['actList']=array_diff($_SESSION['actList'], array($actid));
				} else { 
					unset($_SESSION['actList']);
				}
		}
	header( 'Location: '.$_SERVER['HTTP_REFERER'] );
	die();
?>
