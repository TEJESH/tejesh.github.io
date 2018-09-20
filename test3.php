<?php

$dir    = dirname(getcwd() .  '/.' . $argv[0]);
$files1 = scandir($dir);
//$files2 = scandir($dir, 1);

//print_r($files1);
//echo '</br>';
//print_r($files2);
//echo '</br>';


$dir1    = dirname(chdir(v1));
$files1 = scandir($dir1);


$di = new RecursiveDirectoryIterator(getcwd());
//$filename1 = NULL;
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    $filename1 = $filename1 . $filename . " ";
    $filename1_temp = str_replace('/Users/tejeshagrawal/Downloads/task-websites/v1/', '', $filename1);
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

$di = new RecursiveDirectoryIterator(getcwd());
//$filename2 = NULL;
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
  $filename2 = $filename2 . $filename . " ";
  $filename2_temp = str_replace('/Users/tejeshagrawal/Downloads/task-websites/v2/', '', $filename2);
    //echo $filename . ' - ' . $file->getSize() . ' bytes <br/>';
    
}

$arrayfilename2 = explode(' ', $filename2);
$arrayfilename2_temp = explode(' ', $filename2_temp);

//echo '</br>';

$diff = array_diff($files1, $files2);
$diff1 = array_intersect($files1, $files2);


$diffr1 = array_diff($arrayfilename1_temp, $arrayfilename2_temp);
$diffr2 = array_intersect($arrayfilename1_temp, $arrayfilename2_temp);

$diffr3 = array_diff($arrayfilename2_temp, $arrayfilename1_temp);
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
    $ultimatevalue1 = $ultimatevalue1 . $value ." ";
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

//print_r($files1);
//echo '</br>';
//print_r($files2);
//echo '</br>';

//print_r($diff1);
//echo '</br>';

/*function check_similar($files1, $files2) {
  if (!is_array($files1) || !is_array($files2)) return $files1 === $files2;
  foreach ($files2 as $key => $value) {
    if (!check_similar($files1[$key], $files2[$key])) return false;
  }
  foreach ($files1 as $key => $value) {
    if (!check_similar($files1[$key], $files2[$key])) return false;
  }
  return true;
}*/



chdir("../");

// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
 //           echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
        }
        closedir($dh);
    }
}


/*$original = glob(getcwd() . '/task-websites/v1/*.*');
$thumbs   = glob(getcwd() . '/task-websites/v2/*.*');

$missing = array('original' => array(), 'thumbs' => array());

$missing['original']   = array_diff($thumbs, $original);
$missing['thumbs'] = array_diff($orignal, $thumbs);*/

//print_r($missing); // Prints out a sorted array of the missing files for each dir

//echo '</br>';
//echo __DIR__, ' | ', getcwd();
//echo '</br>';

chdir("v1");
//echo getcwd();
//echo '</br>';

chdir("../");
//echo '</br>';

chdir("v2");
//echo getcwd();
//echo '</br>';


$file1 = fopen("gulpfile.js", "r") or die("Cannot open file!\n"); 
$temp1 = $file1;
chdir("../");
chdir("v1");
//echo getcwd();
//echo '</br>';

$file2 = fopen("gulpfile.js", "r") or die("Cannot open file!\n"); 
$temp2 = $file2;



while ($line1 = fgets($file1, 1024)){
while ($line2 = fgets($file2, 1024)) { 
    if (preg_match($line1, $line2)) { 
  //      echo "Found match: " . $line1; 
    } else { 
    //    echo "No match: " . $line2; 
    } 
    //echo '</br>';
} 
}
fclose($file1); 
fclose($file2); 

chdir("../");
////echo basename(__DIR__);

//echo '</br>';
//echo getcwd();



?>