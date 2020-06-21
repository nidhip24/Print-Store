<?php 

    // Start the session
    session_start();

	// following files need to be included
	require_once("../../lib/config_paytm.php");
	require_once("../../lib/encdec_paytm.php");

	$requestParamList = array();
	$responseParamList = array();

    if ( isset($_SESSION["adminuname"]) ) {
    	if( isset( $_POST["ordernum"] ) ){

    		$ORDER_ID = $_POST["ordernum"];

			// Create an array having all required parameters for status query.
			$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
			
			$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
			
			$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

			// Call the PG's getTxnStatusNew() function for verifying the transaction status.
			$responseParamList = getTxnStatusNew($requestParamList);
			?>
			<div class="row" style="padding: 10px">
				<table>
					<tbody>
						<tr>
							<td><label>ORDER_ID::*</label></td>
							<td><?php echo $ORDER_ID ?></td>
						</tr>

						<?php
						foreach($responseParamList as $paramName => $paramValue) {
						?>
							<tr>
								<td><label><?php echo $paramName?></label></td>
								<td><?php echo $paramValue?></td>
							</tr>
						<?php
							}
						?>

					</tbody>
				</table>
			</div>

		<?php
    	}else{
    		echo "parameter missing";
    	}
    }else{
    	echo "login";
    }