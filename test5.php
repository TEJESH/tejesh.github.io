<?php

$dir    = dirname(getcwd() .  '/.' . $argv[0]);
$files1 = scandir($dir);
//$files2 = scandir($dir, 1);

//print_r($files1);
//echo '</br>';
//print_r($files2);
//echo '</br>';




//////// using recursivedirectoryiterator for listing all files in dir, and subdir and putting in string, later putting in array ////////

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



chdir("../");

$dir2 = dirname(chdir(v2));
//$dir3 = dirname(chdir(css));

$files2 = scandir($dir2);
//$files3 = scandir($dir3);


//echo basename(getcwd());
$y = getcwd();
$di = new RecursiveDirectoryIterator(getcwd());
//$filename2 = NULL;
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
  $filename2 = $filename2 . $filename . " ";
  $filename2_temp = str_replace($y, '', $filename2);
    //echo $filename . ' - ' . $file->getSize() . ' bytes <br/>';
    
}

$arrayfilename2 = explode(' ', $filename2);
$arrayfilename2_temp = explode(' ', $filename2_temp);

//echo '</br>';


/////////////////////////////   getting common files and difference in files from V1 and V2   (first two cases)/////////////////////////////////////// 

$diff = array_diff($files1, $files2);
$diff1 = array_intersect($files1, $files2);


$diffr1 = array_diff($arrayfilename1_temp, $arrayfilename2_temp);                  ///////files which are in v1 but not in v2.
$diffr2 = array_intersect($arrayfilename1_temp, $arrayfilename2_temp);

$diffr3 = array_diff($arrayfilename2_temp, $arrayfilename1_temp);                  ////////files which are in v2 but not in v1.
$diffr4 = array_intersect($arrayfilename2_temp, $arrayfilename1_temp);



$diff1 = array_diff($arrayfilename1, $arrayfilename2);
$diff2 = array_intersect($arrayfilename1, $arrayfilename2);

$diff3 = array_diff($arrayfilename2, $arrayfilename1);
$diff4 = array_intersect($arrayfilename2, $arrayfilename1);



//print_r($diff3);

//print_r($arrayfilename2);

/*foreach ($arrayfilename1 as $value1) {
  $value1_temp = fopen($value1, "r");
  if($value1_temp) {
    while(($buffer1 = fgets($value1_temp, 4096)) != false) {
      echo $buffer1;
    }
    if(!feof($value1_temp)){
      echo "error \n";
    }
  }
  fclose($value1_temp);
}

foreach ($arrayfilename2 as $value2) {
  $value2_temp = fopen($value2,"r");
  if ($value2_temp) {
    while (($buffer2 = fgets($value2_temp, 4096)) != false) {
      echo $buffer2;
    }
   if (!feof($value2_temp)){
    echo "error \n";
   } 
  }
  fclose($value2_temp);
}
*/


/////////////////////////////   checking common file content from V1 and V2, using preg_match (last case)////////////////////////////////////////




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