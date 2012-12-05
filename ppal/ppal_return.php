<?php
require_once( 'functions.php' );
require_once("../models/db-settings.php"); //Require DB connection
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mCMS</title>
<!-- CSS for jQuery UI 1.8.23 -->
<link href="../styles/smoothness_1.8.23/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />

<!-- CSS for jQuery UI 1.7.3
<link href="../styles/smoothness_1.7.3/jquery-ui-1.7.3.custom.css" rel="stylesheet" type="text/css" />
-->

<!-- CSS for Portal -->
<link href="../styles/mcms_main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
</style>
<!-- js for jQuery UI 1.8.23 -->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"> </script>
<script src="../scripts/jquery/jquery-ui-1.8.23.custom.min.js"> </script>

<!-- js for jQuery UI 1.7.3
<script src="http://code.jquery.com/jquery-1.3.2.min.js"> </script>
<script src=""../scripts/jquert/jquery-ui-1.7.3.custom.min.js"> </script>
-->

<!-- js for plugins -->

<!-- js for ACS -->
<script type="text/javascript" src="../scripts/cocoafish/cocoafish-1.2.min.js"></script>
<script type="text/javascript" src="../acs_management/acs_sdk.js"></script>

<script type="text/javascript">

</script>
</head>

<body class="oneColLiqCtr">

<div id="container">
  
  <div id="mainContent">

		<!-- 內容文章頁的文章內容 -->
    <div id="contentBox">
			<?php // Returning from PayPal & Payment Cancelled ?>
      <?php if( isset( $_GET['paypal'] ) && $_GET['paypal'] == 'cancel' ) : ?>
    		
        <!--
        <script>if (window!=top) {top.location.replace(document.location);}</script>
        <p>Your subscription has been cancelled. <a href="<?php echo get_script_uri(); ?>" target="_top">Try again? &raquo;</a></p>
        -->
        
        <script>if (window!=top) {top.location.replace("../usr_settings.php");}</script>
        
    
      <?php // Returning from PayPal & Payment Authorised ?>
      <?php elseif( isset( $_GET['paypal'] ) && $_GET['paypal'] == 'paid' ) :
    
        // Process the payment or start the Subscription
        if( isset( $_GET['PayerID'] ) ) {
          $paypal = create_example_purchase();
          $response = $paypal->process_payment();
        } else { 
          $paypal = create_mcms_subscription(trim($_GET["period"]),trim($_GET["userid"]));
          $response = $paypal->start_subscription();

					//Retrieve settings
					global $mysqli,$db_table_prefix;
					$user_id=trim($_GET["userid"]);
					$paypal_period=trim($_GET["period"]);
					$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users SET account_type=6 WHERE id= ?" );						
					$stmt->bind_param("i",$user_id );
					$stmt->execute();	
        }
        ?>
    
        <h3>Payment Complete!</h3>
        <?php if( isset( $_GET['PayerID'] ) ) { ?>
        	<p>Thanks, userid <?php echo $_GET["userid"]; ?>, your <?php echo $_GET["period"]."ly"; ?> subscription is done</p>
          <p>Your Transaction ID is <?php echo $response['PAYMENTINFO_0_TRANSACTIONID']; ?></p>
          <p>You can use this Transaction ID to see the details of your subscription like so:</p>
          <pre><code>get_transaction_details( $response['PAYMENTINFO_0_TRANSACTIONID'] );</code></pre>
          <p><a href="<?php echo get_script_uri( 'check-profile.php?transaction_id=' . urlencode($response['PAYMENTINFO_0_TRANSACTIONID']) ) ?>" target="_top">View Transaction Details &raquo;</a></p>
          
          <?php
						//Insert Log for User_Paypal actives
						$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."users_paypal (
							id,
							period,
							profile_id,
							status,
							create_stamp,
							modify_stamp) VALUES (
							?,
							?,
							'".$response['PROFILEID']."',
							'Subscribe',
							'".time()."',
							'".time()."')" );
						$stmt->bind_param("is", $user_id,$paypal_period);
						$stmt->execute();						
					?>
           
					<script type="text/javascript">
          		//sdk_user_update_role('chihong.lin@gmail.com','hala0204',8)
          </script>
                    
        <?php } else { ?>
          <p>Your Payment Profile ID is <?php echo $response['PROFILEID']; ?></p>

          <?php echo "Back to <a href='/".$path_prefix."usr_settings.php' target='_top'>User Settings</a>."; ?>
          <!--
          <p>You can use this Profile ID to see the details of your subscription like so:</p>
          <pre><code>get_profile_details('<?php echo $response['PROFILEID']; ?>');</code></pre>
          <p><a href="<?php echo get_script_uri( 'check-profile.php?profile_id=' . urlencode($response['PROFILEID']) ) ?>" target="_top">Check Profile &raquo;</a></p>
  				-->      
				<?php } ?>
    
      <?php endif; ?>    
    </div>

<!-- end #mainContent -->
  </div>
<!-- end #container -->
</div>


<!-- Javascript Area -->
<script type="text/javascript">

</script>
</body>
</html>
