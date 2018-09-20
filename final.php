<?php
//echo getcwd();

//Interface Filecomparison {
//	 function Filecomparison();
//}

class Filecomparison {

	//function __construct() {                // a class constructor is always public.
		//echo "new file comparison\n";
	//}


	function Filecomparison1(){
		 $dir1   = dirname(chdir(v1));
		 $files1 = scandir($dir1);

		$x = getcwd();
		$di = new RecursiveDirectoryIterator(getcwd());
		//$filename1 = NULL;
			foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
   				 $filename1 = $filename1 . $filename . " ";
    			 $filename1_temp = str_replace($x, '', $filename1);
   				 //echo $filename . ' - ' . $file->getSize() . ' bytes <br/>';
    
			}
 
		$arrayfilename1 = explode(' ', $filename1);
		$arrayfilename1_temp = explode(' ', $filename1_temp);

		return $arrayfilename1_temp;
	}




	function Filecomparison2(){
		 chdir("../");
		 $dir2   = dirname(chdir(v2));
		 $files2 = scandir($dir2);

		$x = getcwd();
		$di = new RecursiveDirectoryIterator(getcwd());
		//$filename1 = NULL;
			foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
   				 $filename2 = $filename2 . $filename . " ";
    			 $filename2_temp = str_replace($x, '', $filename2);
   				 //echo $filename . ' - ' . $file->getSize() . ' bytes <br/>';
    
			}
 
		$arrayfilename2 = explode(' ', $filename2);
		$arrayfilename2_temp = explode(' ', $filename2_temp);

		return $arrayfilename2_temp;
	}





	/*function &Filecomparison3($diffr2){
			foreach ($diffr2 as $value) {
				$final = NULL;
				$value2 = getcwd().'/'.$value;
				$value2_temp = fopen($value2,"r");

				chdir("../");
				chdir("v1");

				$value1 = getcwd().'/'.$value;
				$value1_temp = fopen($value1,"r");
				chdir("../");
				chdir("v2");

				  if ($value1_temp && $value2_temp) {
				    while ((($buffer1 = fgets($value1_temp, 4096)) && ($buffer2 = fgets($value2_temp, 4096))) != false) {
				      if ($buffer1 == $buffer2) {
				        $final = $final . "ok \n";
				      }
				      else
				        $final = $final . "not \n";
				    }
				   if (!feof($value1_temp) || !feof($value2_temp)){
				    $final = $final . "error \n";
				   } 

				   if(preg_match("/not/", $final, $matchess)){
				    $ultimatevalue1 = $ultimatevalue1 . $value ." ";                   ////////////  file common in v1 and v2, but content is not same.
				    //print_r($matchess);
				   }
				   else
				    $ultimatevalue2 = $ultimatevalue2 . $value . " ";
				    //echo '</br> </br>';
				  }



	  		fclose($value1_temp);
  			fclose($value2_temp);
			}

  		$ultimatevalue1 = explode(' ', $ultimatevalue1);
  		$ultimatevalue2 = explode(' ', $ultimatevalue2);
  		print_r($ultimatevalue1);	

  		return $ultimatevalue1;


	}*/




}





$filecompare1 = new Filecomparison;
$filecompare2 = new Filecomparison;

$a = $filecompare1->Filecomparison1();
$b = $filecompare2->Filecomparison2();

$diffr1 = array_diff($a, $b);                                   				 ///////files which are in v1 but not in v2.
$diffr3 = array_diff($b, $a);													 ///////files which are in v2 but not in v2.
$diffr2 = array_intersect($a, $b);

//print_r($diffr2);
//echo getcwd();



		foreach ($diffr2 as $value) {
				$final = NULL;
				$value2 = getcwd().'/'.$value;
				$value2_temp = fopen($value2,"r");

				chdir("../");
				chdir("v1");

				$value1 = getcwd().'/'.$value;
				$value1_temp = fopen($value1,"r");
				chdir("../");
				chdir("v2");

				  if ($value1_temp && $value2_temp) {
				    while ((($buffer1 = fgets($value1_temp, 4096)) && ($buffer2 = fgets($value2_temp, 4096))) != false) {
				      if ($buffer1 == $buffer2) {
				        $final = $final . "ok \n";
				      }
				      else
				        $final = $final . "not \n";
				    }
				   if (!feof($value1_temp) || !feof($value2_temp)){
				    $final = $final . "error \n";
				   } 

				   if(preg_match("/not/", $final, $matchess)){
				    $ultimatevalue1 = $ultimatevalue1 . $value ." ";                   ////////////  file common in v1 and v2, but content is not same.
				    //print_r($matchess);
				   }
				   else
				    $ultimatevalue2 = $ultimatevalue2 . $value . " ";
				    //echo '</br> </br>';
				  }



	  		fclose($value1_temp);
  			fclose($value2_temp);
		
		}

  		$ultimatevalue1 = explode(' ', $ultimatevalue1);
  		$ultimatevalue2 = explode(' ', $ultimatevalue2);
  		//print_r($ultimatevalue1);	


?>