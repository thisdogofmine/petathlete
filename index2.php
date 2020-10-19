<html>
<head> home test</head>
<body>
<h3>PetAthlete</h3>

<h2>test stuff here</h2>
<p>fun stuff for athletic pets</p>
<hr>

<?php
	print "PHP test <br />";
	
	for ($i = 1; $i <=5 ; $i++)
	{
	echo "$i kilometers =".$i*0.62140." miles. <br />";
		
	}	
?>
<p> some stuff here.</p>

<?php
	function amortizationtable($paymentnum, $periodicpayment, $balance, $monthlyinterest){
		$paymentinterest = round($balance * $monthlyinterest,2);
		$paymentprincipal = round($periodicpayment - $paymentinterest,2);
		$newbalance = round($balance - $paymentprincipal,2);
		print "<tr>
			<td>$paymentnum</td>
			<td>\$".number_format($balance,2)."</td>
			<td>\$".number_format($periodicpayment,2)."</td>
			<td>\$".number_format($paymentinterest,2)."</td>
			<td>\$".number_format($paymentprincipal,2)."</td>
			</tr>";
		# if bal not yet zero, recursively call amortizationtable()
		if ($newbalance > 0) {
			$paymentnum++;
			amortizationtable($paymentnum, $periodicpayment, $newbalance, $monthlyinterest);
		} else {
			exit;
		}
	} #end amortizationtable()
	
	$balance = 200000.00;
	$interestrate = .0575;
	$monthlyinterest = .0575 / 12;
	$termlength = 30;
	$paymentsperyear = 12;
	$paymentnumber = 1;
	$totalpayments = $termlength * $paymentsperyear;
	$intcalc = 1 + $interestrate / $paymentsperyear;
	$periodicpayment = $balance * pow($intcalc,$totalpayments) * ($intcalc - 1) / (pow($intcalc,$totalpayments) -1);
	$periodicpayment = round($periodicpayment,2);
	echo "<table width='50%' align='center' border='1'>"; 
	print "<tr>
		<th>Payment Number</th><th>Balance</th><th>Payment</th><th>Interest</th><th>Principal</th>
		</tr>";
	amortizationtable($paymentnumber, $periodicpayment, $balance, $monthlyinterest);
	print "</table>";	
	
?>
</body>
</html>
