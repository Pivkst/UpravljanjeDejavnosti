<?php
	echo '<head> <meta charset="UTF-8"> </head>';
	print_r($_POST);

	function parse()
	{
		$result=array();
		$result['naslov']=$_POST['naslovDejavnosti'];
		$result['mentorIme']=array();
		$result['mentorPriimek']=array();
		$stringStart=0;
		
		$imena=array();
		$priimki=array();

		for($i=0; $i<strlen($_POST['mentorIme']); $i++)
		{
			if($_POST['mentorIme'][$i]==',')
			{
				$priimki[]=substr($_POST['mentorIme'],$stringStart,$i-$stringStart);
				$stringStart=$i+1;
			}
		}
		$stringStart=0;
		
		for($i=0; $i<strlen($_POST['mentorPriimek']); $i++)
		{
			if($_POST['mentorPriimek'][$i]==',')
			{
				$imena[]=substr($_POST['mentorPriimek'],$stringStart,$i-$stringStart);
				$stringStart=$i+1;
			}
		}
		
		$size=count($imena);
		foreach( $i=0 ; $i<$size ; $i++)
		{
			$result['mentorji'][]=$imena[$i].' '.$priimki[$i];
		}
		
		if(strcmp($_POST['nacinSrecanja'],"poDogovoru")==0)
			$result['nacinSrecanja']=$_POST['nacinSrecanja'];
		else
			$result['nacinSrecanja']=$_POST['nacinSrecanja'].','.$_POST['casSrecanja'];
		
		$result['srecanjaDrugo']=$_POST['srecanjaDrugo'];
		
		$result['govorilneUre']=$_POST['govorilneUre'];
		$result['ePosta']=$_POST['ePosta'];
		$result['telefon']=$_POST['telefon'];
		$result['vpisDrugo']=$_POST['vpisDrugo'];
		
		
		if(isset($_POST['oblike']))
		{
			$oblikeTmp=$_POST['oblike'];
			
			if(empty($oblikeTmp))
			{
				$result['oblike']="/";
			}
			else
			{
				$result['oblike']=array();

				$found=array_search("pripraveNaTekmovanje",$oblikeTmp);
				if(gettype($found)!="boolean")
				{
					$oblikeTmp[$found].=','.$_POST['pripraveNaTekmovanjeSelect'];
				}
				$found=array_search("projektnoDelo",$oblikeTmp);
				if(gettype($found)!="boolean")
				{
					$oblikeTmp[$found].=','.$_POST['projektnoDeloSelect'];
				}
			
				$n=count($oblikeTmp);
				for($i=0 ; $i<$n ; $i++)
				{
					$result['oblike'][]=$oblikeTmp[$i];
				}
			}
		}
		
		$result['oblikeDrugo']=$_POST['oblikeDrugo'];
		
		$result['primernost']="";
		$primernostTmp;
		if(isset($_POST['primernost']))
		{
			$primernostTmp=$_POST['primernost'];
		}
		
		$programTmp;
		if(isset($_POST['program']))
		{
			$programTmp=$_POST['program'];
		}
		
		$letnikTmp;
		if(isset($_POST['letnik']))
		{
			$letnikTmp=$_POST['letnik'];
		}
		
		if(isset($primernostTmp))
			$found=array_search("dijakeVsehProgramov",$primernostTmp);
		else
			$found=false;
		
		if(gettype($found)!="boolean")
		{
			$result['primernost'].="Za Dijake vseh programov ";
		}
		else
		{
			if(isset($programTmp))
			{
				$result['primernost'].="Za Dijake ";
				if(count($programTmp)==3)
				{
					$result['primernost'].="vseh programov ";
				}
				else
				{
					foreach ($programTmp as $prog)
					{
						$result['primernost'].=$prog.', ';
					}
					$result['primernost']=substr($result['primernost'],0,-2);
					$result['primernost'].=' programov ';
				}
			}
		}
		
		if(isset($primernostTmp))
			$found=array_search("dijakeVsehLetnikov",$primernostTmp);
		else
			$found=false;
		
		if(gettype($found)!="boolean")
		{
			$result['primernost'].="in dijake vseh letnikov";
		}
		else
		{
			if(isset($letnikTmp))
			{
				$result['primernost'].="in dijake ";
				if(count($letnikTmp)==4)
				{
					$result['primernost'].="vseh letnikov";
				}
				else
				{
					foreach ($letnikTmp as $let)
					{
						$result['primernost'].=$let.', ';
					}
					$result['primernost']=substr($result['primernost'],0,-2);
					$result['primernost'].=' letnikov';
				}
			}
		}
		
		if($result['primernost']=="")
		{
			$result['primernost']="/";
		}
		
		$result['primernostDrugo']=$_POST['primernostDrugo'];
		
		if(isset($_POST['razvoj']))
		{
			$razvojTmp=$_POST['razvoj'];
			if(empty($razvojTmp))
			{
				$result['razvoj']="/";
			}
			else
			{
				$result['razvoj']=array();
				
				$n=count($razvojTmp);
				for($i=0 ; $i<$n ; $i++)
				{
					$result['razvoj'][]=$razvojTmp[$i];
				}
			}
		}
		
		if(isset($_POST['pomembneOpombe']))
		{
			$result['pomembneOpombe']=$_POST['pomembneOpombe'];
		}
		
		return $result;
	}
	echo '<br><br><br>';
	$data=parse();
	
	function zapisi($table)
	{
		// TUKI ZAPISES V BAZO @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@	
		$returnString="";
		$servername = "localhost";
		$username = "username";
		$password = "password";
		$dbname = "myDB";

	/*	$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
			$returnString="Connection failed: " . mysqli_connect_error();
		}
		else
		{
			$sql = "INSERT INTO Tabela (atr1)
			VALUES ('yolo')";

			if (mysqli_query($conn, $sql)) {
				$returnString = "Dogodek uspešno dodan!";
			} else {
				$returnString = "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			mysqli_close($conn);
		}*/
	
		return $returnString;
	}
	
	$result = zapisi($data);
	print_r($data);
	
	echo '<body><h1><b><center>'.$result.'</center></b></h1></body>';
?>