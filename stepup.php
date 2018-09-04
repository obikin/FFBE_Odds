<?php
############
#Parameters
############
$nbRainbows = 68;
$nbBannerRainbows = 2;
$nbDesiredRainbows = 10;
$nbRotations = 3;
$nbTries = 1000000;

$banner = array(
	'normal' => 47,
	'p1' => 5,
	'normalx15' => 0,
	'p1x15' => 0,
	'normalx2' => 0,
	'p1x2' => 0,
	'normalx3' => 0,
	'p1x3' => 0,
	'normalx5' => 0,
	'p1x5' => 0,
	'randomRainbow' => 1,
	'bannerRainbow' => 1,
	'10RainbowTicket' => 1,
	'30RainbowTicket' => 0
);

# Global Step-up BannerRainbowA / BannerRainbowB

		#Step 1: 10% Trust Moogle									N:10   		+1:1
		#Step 2: guaranteed silt									N:9 		+1:1
		#Step 3: Guaranteed 5★										N:9			+1:1
		#Step 4: 10% 5★ ticket 										N:10		+1:1
		#Step 5: Guaranteed BannerRainbowA OR BannerRainbowB 						N:9			+1:1

		# normal pulls : 47
		# normal +1 : 5
		# 10% 5★ ticket : 1
		# random rainbow : 1
		# banner rainbow : 1
		# + Silt mais osef


$total = array(
	'nbBannerRainbowA' => 0,
	'BannerRainbowA' => 0,
	'BannerRainbowA7' => 0,
	'BannerRainbowASTMR' => 0,
	'nbBannerRainbowB' => 0,
	'BannerRainbowB' => 0,
	'BannerRainbowB7' => 0,
	'BannerRainbowBSTMR' => 0,
	'Both' => 0,
	'Both7' => 0,
	'BothSTMR' => 0,
	'any7' => 0,
	'anySTMR' => 0,
	'almostSTMRA' => 0,
	'almostSTMRA+' => 0,
	'almostSTMRB' => 0,
	'almostSTMRB+' => 0,
	'almostSTMR' => 0,
	'almostSTMR+' => 0,
	'1Cloud2Elfreeda' => 0,
	'2Cloud4Elfreeda' => 0,
	'nbOffbanner' => 0,
	'nbDesiredOffbanner' => 0,
	'DesiredOffbanner' => 0,
	'Lightning' => 0,
	'GuaranteedOnly' => 0
);

$i=1;

while ( $i <= $nbTries ) {
	$result = array(
		'BannerRainbowA' => 0,
		'BannerRainbowB' => 0,
		'DesiredOffbanner' => [],
		'notGuaranteedRainbows' => 0
	);

	for ($a=1; $a <= $nbDesiredRainbows; $a++) { 
		$result['DesiredOffbanner'][$a]=0;
	}

	$rotation = 1;
	while($rotation <= $nbRotations){

		#normal pulls
		$j = 1;
		while ($j <= $banner['normal']) {
			$pull = random_int(1, 100);

			if($pull == 1){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 3) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		#+1 pulls
		$j = 1;
		while ($j <= $banner['p1']) {
			$pull = random_int(1, 10000);

			if($pull <= 375){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 500) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		# x1.5 pull : 10

		$j = 1;
		while ($j <= $banner['normalx15']) {
			$pull = random_int(1, 1000);

			if($pull <= 15){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 45) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		# x1.5 +1 : 1

		$j = 1;
		while ($j <= $banner['p1x15']) {
			$pull = random_int(1, 100000);

			if($pull <= 5625){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 7500) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		# x2 pulls : 9

		$j = 1;
		while ($j <= $banner['normalx2']) {
			$pull = random_int(1, 100);

			if($pull <= 2){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 6) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		# x2 +1 : 1

		$j = 1;
		while ($j <= $banner['p1x2']) {
			$pull = random_int(1, 1000);

			if($pull <= 75){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 100) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		# x3 pulls : 9

		$j = 1;
		while ($j <= $banner['normalx3']) {
			$pull = random_int(1, 100);

			if($pull <= 3){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 9) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		# x3 +1 : 1

		$j = 1;
		while ($j <= $banner['p1x3']) {
			$pull = random_int(1, 10000);

			if($pull <= 1125){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 1500) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		# x5 pulls

		$j = 1;
		while ($j <= $banner['normalx5']) {
			$pull = random_int(1, 100);

			if($pull <= 5){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 7) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		# x5 +1

		$j = 1;
		while ($j <= $banner['p1x5']) {
			$pull = random_int(1, 10000);

			if($pull <= 1875){
				$result['notGuaranteedRainbows']++;
				if($nbBannerRainbows>1){
					$rainbow = random_int(1, 2);
					if ($rainbow == 1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$result['BannerRainbowA']++;
				}
			}
			elseif ($pull <= 2000) {
				$result['notGuaranteedRainbows']++;
				$total['nbOffbanner']+=1;
				$rainbow = random_int(1, $nbRainbows-2);
				if($rainbow <= $nbDesiredRainbows){
					$result['DesiredOffbanner'][$rainbow]++;
				}
			}

			$j++;
		}

		# random rainbow

		$j = 1;
		while ($j <= $banner['randomRainbow']) {
			$rainbow = random_int(1, $nbRainbows);
			$bannerRainbow = $nbRainbows - $rainbow;
			if ($bannerRainbow == 0) {
				$result['BannerRainbowA']++;
			}
			elseif ($bannerRainbow == 1 && $nbBannerRainbows>1) {
					$result['BannerRainbowB']++;
			}
			else{
				$total['nbOffbanner']+=1;
			}
			if($rainbow <= $nbDesiredRainbows){
				$result['DesiredOffbanner'][$rainbow]++;
			}
			$j++;
		}

		# banner rainbow

		$j = 1;
		while ($j <= $banner['bannerRainbow']) {
			if($nbBannerRainbows>1){
				$rainbow = random_int(1, 2);
				if ($rainbow == 1) {
					$result['BannerRainbowA']++;
				}
				else{
					$result['BannerRainbowB']++;
				}
			}
			else{
				$result['BannerRainbowA']++;
			}

			$j++;
		}

		# 10% rainbow ticket

		$j = 1;
		while ($j <= $banner['10RainbowTicket']) {
			$rainbow = random_int(1, 100);
			if ($rainbow <= 10) {
				$result['notGuaranteedRainbows']++;
				$rainbow = random_int(1, 3);
				if ($rainbow == 1) {
					$rainbow = random_int(1, 2);
					if ($rainbow == 1 || $nbBannerRainbows==1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$total['nbOffbanner']+=1;
					$rainbow = random_int(1, $nbRainbows-2);
					if($rainbow <= $nbDesiredRainbows){
						$result['DesiredOffbanner'][$rainbow]++;
					}
				}
			}
			$j++;
		}

		# 30% rainbow ticket

		$j = 1;
		while ($j <= $banner['30RainbowTicket']) {
			$rainbow = random_int(1, 100);
			if ($rainbow <= 30) {
				$result['notGuaranteedRainbows']++;
				$rainbow = random_int(1, 3);
				if ($rainbow == 1) {
					$rainbow = random_int(1, 2);
					if ($rainbow == 1 || $nbBannerRainbows==1) {
						$result['BannerRainbowA']++;
					}
					else{
						$result['BannerRainbowB']++;
					}
				}
				else{
					$total['nbOffbanner']+=1;
					$rainbow = random_int(1, $nbRainbows-2);
					if($rainbow <= $nbDesiredRainbows){
						$result['DesiredOffbanner'][$rainbow]++;
					}
				}
			}
			$j++;
		}
		
		$rotation++;
	}

	# process results

	$total['nbBannerRainbowA']+=$result['BannerRainbowA'];

	if ($result['BannerRainbowA'] >= 1) {
		$total['BannerRainbowA']++;
	}
	if ($result['BannerRainbowA'] >= 2) {
		$total['BannerRainbowA7']++;
	}
	if ($result['BannerRainbowA'] >= 4) {
		$total['BannerRainbowASTMR']++;
	}

	$total['nbBannerRainbowB']+=$result['BannerRainbowB'];

	if ($result['BannerRainbowB'] >= 1) {
		$total['BannerRainbowB']++;
	}
	if ($result['BannerRainbowB'] >= 2) {
		$total['BannerRainbowB7']++;
	}
	if ($result['BannerRainbowB'] >= 4) {
		$total['BannerRainbowBSTMR']++;
	}

	if ($result['BannerRainbowB'] >= 1 && $result['BannerRainbowA'] >= 1) {
		$total['Both']++;
	}

	if ($result['BannerRainbowB'] >= 2 && $result['BannerRainbowA'] >= 2) {
		$total['Both7']++;
	}

	if ($result['BannerRainbowB'] >= 2 || $result['BannerRainbowA'] >= 2) {
		$total['any7']++;
	}

	if ($result['BannerRainbowB'] >= 4 && $result['BannerRainbowA'] >= 4) {
		$total['BothSTMR']++;
	}

	if ($result['BannerRainbowB'] >= 2 && $result['BannerRainbowA'] >= 1) {
		$total['1Cloud2Elfreeda']++;
	}

	if ($result['BannerRainbowB'] >= 4 && $result['BannerRainbowA'] >= 2) {
		$total['2Cloud4Elfreeda']++;
	}

	if ($result['BannerRainbowB'] >= 4 || $result['BannerRainbowA'] >= 4) {
		$total['anySTMR']++;
	}

	if ($result['BannerRainbowA'] == 3) {
		$total['almostSTMRA']++;
	}

	if ($result['BannerRainbowA'] >= 3) {
		$total['almostSTMRA+']++;
	}

	if ($result['BannerRainbowB'] == 3) {
		$total['almostSTMRB']++;
	}

	if ($result['BannerRainbowB'] >= 3) {
		$total['almostSTMRB+']++;
	}

	if ($result['BannerRainbowB'] == 3 || $result['BannerRainbowA'] == 3) {
		$total['almostSTMR']++;
	}

	if ($result['BannerRainbowB'] >= 3 || $result['BannerRainbowA'] >= 3) {
		$total['almostSTMR+']++;
	}

	if($result['DesiredOffbanner'][1] > 0){
		$total['Lightning']++;
	}

	if($result['notGuaranteedRainbows'] == 0){
		$total['GuaranteedOnly']++;
	}

	for ($a=1; $a <= $nbDesiredRainbows; $a++) { 
		$total['nbDesiredOffbanner']+=$result['DesiredOffbanner'][$a];
	}

	if(array_sum($result['DesiredOffbanner']) > 0){
		$total['DesiredOffbanner']++;
	}

	$i++;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Step Up GL</title>
</head>
<body>
	<table>
		<thead>Global Cloud (A)/Elfreeda (B) banner results for <?php echo $nbTries; ?> tries of <?php echo $nbRotations; ?> full rotations :</thead>
		<tbody>
			<tr>
				<th>Total Banner Rainbows</th>
				<td><?php echo ($total['nbBannerRainbowA']+$total['nbBannerRainbowB']); ?></td>
			</tr>
			<tr>
				<th>Total OffBanner Rainbows</th>
				<td><?php echo $total['nbOffbanner']; ?></td>
			</tr>
			<tr>
				<th>Total Rainbows</th>
				<td><?php echo ($total['nbBannerRainbowA']+$total['nbBannerRainbowB']+$total['nbOffbanner']); ?></td>
			</tr>
			<tr>
				<th>Nb BannerRainbow A</th>
				<td><?php echo $total['nbBannerRainbowA']; ?></td>
			</tr>
			<tr>
				<th>Nb BannerRainbow B</th>
				<td><?php echo $total['nbBannerRainbowB']; ?></td>
			</tr>
			<tr>
				<th>Nb Desired Offbanner Rainbows</th>
				<td><?php echo $total['nbDesiredOffbanner']; ?></td>
			</tr>
			<tr>
				<th>BannerRainbow A</th>
				<td><?php echo $total['BannerRainbowA']; ?></td>
			</tr>
			<tr>
				<th>BannerRainbow A 7☆</th>
				<td><?php echo $total['BannerRainbowA7']; ?></td>
			</tr>
			<tr>
				<th>BannerRainbow A STMR</th>
				<td><?php echo $total['BannerRainbowASTMR']; ?></td>
			</tr>
			<tr>
				<th>BannerRainbow B</th>
				<td><?php echo $total['BannerRainbowB']; ?></td>
			</tr>
			<tr>
				<th>BannerRainbow B 7☆</th>
				<td><?php echo $total['BannerRainbowB7']; ?></td>
			</tr>
			<tr>
				<th>BannerRainbow B STMR</th>
				<td><?php echo $total['BannerRainbowBSTMR']; ?></td>
			</tr>
			<tr>
				<th>Both</th>
				<td><?php echo $total['Both']; ?></td>
			</tr>
			<tr>
				<th>Both 7☆</th>
				<td><?php echo $total['Both7']; ?></td>
			</tr>
			<tr>
				<th>Both STMR</th>
				<td><?php echo $total['BothSTMR']; ?></td>
			</tr>
			<tr>
				<th>1 Cloud, 2 Elfreeda</th>
				<td><?php echo $total['1Cloud2Elfreeda']; ?></td>
			</tr>
			<tr>
				<th>2 Cloud, 4 Elfreeda</th>
				<td><?php echo $total['2Cloud4Elfreeda']; ?></td>
			</tr>
			<tr>
				<th>Any 7☆</th>
				<td><?php echo $total['any7']; ?></td>
			</tr>
			<tr>
				<th>Any STMR</th>
				<td><?php echo $total['anySTMR']; ?></td>
			</tr>
			<tr>
				<th>Almost STMR A</th>
				<td><?php echo $total['almostSTMRA']; ?></td>
			</tr>
			<tr>
				<th>Almost STMR and STMR A</th>
				<td><?php echo $total['almostSTMRA+']; ?></td>
			</tr>
			<tr>
				<th>Almost STMR B</th>
				<td><?php echo $total['almostSTMRB']; ?></td>
			</tr>
			<tr>
				<th>Almost STMR and STMR B</th>
				<td><?php echo $total['almostSTMRB+']; ?></td>
			</tr>
			<tr>
				<th>Almost STMR</th>
				<td><?php echo $total['almostSTMR']; ?></td>
			</tr>
			<tr>
				<th>Almost STMR and STMR</th>
				<td><?php echo $total['almostSTMR+']; ?></td>
			</tr>
			<tr>
				<th>Desired Rainbows</th>
				<td><?php echo $total['DesiredOffbanner']; ?></td>
			</tr>
			<tr>
				<th>Lightning</th>
				<td><?php echo $total['Lightning']; ?></td>
			</tr>
			<tr>
				<th>Guaranteed Rainbows Only</th>
				<td><?php echo $total['GuaranteedOnly']; ?></td>
			</tr>
		</tbody>
	</table>

</body>
</html>
