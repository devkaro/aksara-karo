<?php

function aksara($text)
{

	$n = strlen($text);
	for ($i = 1; $i <= $n; $i++)
	{
		$j = $i - 1;
		$A[$i] = substr($text, $j, 1);

		if ($A[$i] == 'a' or $A[$i] == 'i' or $A[$i] == 'u' or $A[$i] == 'e' or $A[$i] == 'o')
		{
			$B[$i] = 1;
		}
		else
		{
			if ($A[$i] == 'b' or $A[$i] == 'c' or $A[$i] == 'd' or $A[$i] == 'f' or 
				$A[$i] == 'g' or $A[$i] == 'h' or $A[$i] == 'j' or $A[$i] == 'k' or 
				$A[$i] == 'v' or $A[$i] == 'w' or $A[$i] == 'x' or $A[$i] == 'y' or 
				$A[$i] == 'z')
			{

				$B[$i] = 0;
			}
			else
			{
				$B[$i] = 2;
			}
		}
	}

	$dua = array(
		'ha' => 'huruf/ha.png',
		'hi' => 'huruf/hi.png',
		'ho' => 'huruf/ho.png',
		'hu' => 'huruf/hu.png',
		'he' => 'huruf/he.png',
		'hÃ©' => 'huruf/hÃ©.png',
		'bÃ©' => 'huruf/bÃ©.png',
		'ba' => 'huruf/ba.png',
		'bi' => 'huruf/bi.png',
		'bu' => 'huruf/bu.png',
		'be' => 'huruf/be.png',
		'bo' => 'huruf/bo.png',
		'ka' => 'huruf/ka.png',
		'ki' => 'huruf/ki.png',
		'ko' => 'huruf/ko.png',
		'ku' => 'huruf/ku.png',
		'ke' => 'huruf/ke.png',
	);
	$satu = array(
		'a' => 'huruf/a.png',
		'b' => 'huruf/b.png',
		'c' => 'huruf/c.png',
		'd' => 'huruf/d.png',
		'x' => 'huruf/x.png',
		'y' => 'huruf/y.png',
		'z' => 'huruf/z.png',
		'Ã©' => 'huruf/Ã©.png'
	);
	$khusus = array(
		'nga' => 'huruf/nga.png',
		'ngi' => 'huruf/ngi.png',
		'mbÃ©' => 'huruf/mbÃ©.png',
		'mbo' => 'huruf/mbo.png'
	);
	$angka = array(
		'0' => 'huruf/0.png',
	);
	$tandabaca = array(
		'.' => 'huruf/period.png',
		',' => 'huruf/,.png',
	);
	$operator = array(
		'+' => 'huruf/+.png',
		'-' => 'huruf/-.png',
	);
	$karakter = array(
		'&' => 'huruf/&.png',
		'@' => 'huruf/@.png',
		'#' => 'huruf/pagar.png',
	);

	$text = "";


	echo "&nbsp;";
	for ($i = 1; $i <= $n; $i++)
	{
		if ($A[$i] <> " ") 
		{

			if ($A[$i] == "0" or $A[$i] == "1" or $A[$i] == "2" or $A[$i] == "3" or $A[$i] == "4" or $A[$i] == "5" or $A[$i] == "6" or $A[$i] == "7" or $A[$i] == "8" or $A[$i] == "9")
			{
				echo $A[$i];
				foreach($angka as $id => $img)
				{
					if ($id == $A[$i])
					{
						$A[$i] = "<img src='$angka[$id]' />";
					}
				}
				$text = $text . $A[$i];
				echo $A[$i]; 
			}
			else
			{

				if ($A[$i] == "." or $A[$i] == "," or $A[$i] == "?" or $A[$i] == "!" or $A[$i] == "'" or $A[$i] == "\"" or $A[$i] == ";" or $A[$i] == ":")
				{
					echo $A[$i];
					foreach($tandabaca as $id => $img)
					{
						if ($id == $A[$i])
						{
							$A[$i] = "<img src='$tandabaca[$id]' />";
						}
					}

					$text = $text . $A[$i];
					echo $A[$i];
				}
				else
				{

					if ($A[$i] == "+" or $A[$i] == "-" or $A[$i] == "*" or $A[$i] == "/" or $A[$i] == "^" or $A[$i] == "=" or $A[$i] == "<" or $A[$i] == ">")
					{
						echo $A[$i];
						foreach($operator as $id => $img)
						{
							if ($id == $A[$i])
							{
								$A[$i] = "<img src='$operator[$id]' />";
							}
						}

						$text = $text . $A[$i];
						echo $A[$i];
					}
					else
					{ 
						if ($B[$i] == 2)
						{
							echo $A[$i];
							foreach($karakter as $id => $img)
							{
								if ($id == $A[$i])
								{
									$A[$i] = "<img src='$karakter[$id]' />";
								}
							}

							$text = $text . $A[$i];
							echo $A[$i];
						}
						else
						{

							if ($B[$i + 1] == 0 or $B[$i + 1] == 1) 
							{
								if (($B[$i] == 0) and ($B[$i + 1] == 1))
								{
									$gabung = $A[$i] . $A[$i + 1];

									echo $gabung;
									foreach($dua as $id => $img)
									{
										if ($id == $gabung)
										{
											$gabung = "<img src='$dua[$id]' />";
										}
									}

									$text = $text . $gabung;
									echo $gabung;
									$i = $i + 1;
								}
								else
								{
									$gabung = $A[$i] . $A[$i + 1];
									if (($gabung == 'ng') and (($B[$i + 2] == 2) or ($B[$i + 2] == 0)))
									{
										echo $gabung;
										$A[$i] = "<img src='huruf/ng.png' />";
										$text = $text . $A[$i];
										echo $A[$i];
										$i = $i + 1;
									}
									else
									{
										$gabung = $A[$i] . $A[$i + 1] . $A[$i + 2];
										if ($gabung == 'nga' or $gabung == 'ngi' or $gabung == 'ngu' or $gabung == 'nge' or $gabung == 'ngÃ©' or $gabung == 'ngo' or $gabung == 'nda' or $gabung == 'ndi' or $gabung == 'ndu' or $gabung == 'nde' or $gabung == 'ndÃ©' or $gabung == 'ndo' or $gabung == 'mba' or $gabung == 'mbi' or $gabung == 'mbu' or $gabung == 'mbe' or $gabung == 'mbÃ©' or $gabung == 'mbo')
										{
											echo $gabung;
											foreach($khusus as $khusus2 => $img)
											{
												$gabung = str_replace($khusus2, "<img src='{$img}' />", $gabung);
											}

											$text = $text . $gabung;
											echo $gabung;
											$i = $i + 2;
										}
										else
										{
											echo $A[$i];

											foreach($satu as $id => $img)
											{
												if ($id == $A[$i])
												{
													$A[$i] = "<img src='$satu[$id]' />";
												}
											}

											$text = $text . $A[$i];
											echo $A[$i];
										} 
									} 
								} 
							}
							else

							{
								echo $A[$i];
								foreach($satu as $id => $img)
								{
									if ($id == $A[$i])
									{
										$A[$i] = "<img src='$satu[$id]' />";
									}
								}

								$text = $text . $A[$i];
								echo $A[$i];
							} 
						} 
					} 
				} 
			} 
		} 
		else
		{
			$A[$i] = "<img src='huruf/spasi.png' />";
			$text = $text . $A[$i];
			echo $A[$i];
		}
	} 
	echo "</strong><br /><br /><br /> <font size=4>Hasilnya </font><br /><br />" . $text;
	return $text;
} 

?>
