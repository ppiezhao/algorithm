<?php 
     $str1 = '3';
     $str2 = '436';
     if(strlen($str1)>strlen($str2)){
         $max_str = $str1;
	 $min_str = $str2;
	 $max_len = strlen($str1);
	 $min_len = strlen($str2);
     }else{
         $max_str = $str2;
	 $min_str = $str1;
	 $max_len = strlen($str2);
	 $min_len = strlen($str1);

     }
	$len =  $max_len+$min_len;
     $m = 0;
     $arr = array();
     for($i=$min_len-1;$i>=0;$i--){
         $n = 0;
	 for($j=$max_len-1+$m;$j>=0;$j--){
            $arr[$m][$n] = $min_str[$i]*$max_str[$j];
	    $n++;
	 }
	 $m++;
     } 
    for($i=0;$i<$min_len;$i++){
	for($j=0;$j<$len;$j++){
	    $arr[$n][$j] +=$arr[$i][$j]; 
	}
    }	
for($i=0;$i<$len;$i++){
         if($arr[$n][$i]>9){
	 $arr[$n][$i+1]+=floor($arr[$n][$i]/10); 
		$arr[$n][$i] = $arr[$n][$i]%10;
	}
    
}
if($arr[$n][$len-1]>0){
 	$end = $arr[$n][$len-1];
}else{
	$end = "";
}
for($i=$len-2;$i>=0;$i--){
	$end .=$arr[$n][$i];
}
echo $end;
 // print_r($arr[$n]);
    
?>
