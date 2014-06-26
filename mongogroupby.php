<?php 

$f = $_REQUEST['f'];
if (!$f) {
  $f = 'Year'; // default Key
}


// print_r($f);

echo '<h1>MongoDB Group By and Counter PHP Code</h1>';
echo '<h1>usage: <a href="?d=DataBaseName&c=CollectionName&f=Key1,Key2">?d=DataBaseName&c=CollectionName&f=Key1,Key2</a> ie. Year,Make | parameter separated by comma ,  for nested keys use address.zipcode use dot . </h1> ';

$f = explode(',', $f);

foreach ($f as $k => $v) {
	$fkeys[$v] = 1;
}

echo '<h2>Combination Keys</h2>';

echo '<pre>';
print_r($fkeys);
echo '</pre>';


// $dbname = 'default db';
if ($_REQUEST['d']){
    $dbname = $_REQUEST['d'];
}

// $colname = 'default collection'; 
if ($_REQUEST['c']){
    $colname = $_REQUEST['c'];
}


$mc = new MongoClient(); 

$cars = $mc->selectCollection($dbname, $colname);

$cursor = $cars->find();
$cursor->limit(1);
$mongoresult = iterator_to_array($cursor);

echo "<h2>Data Structure Example - Use names from here to create new combination keys</h2><pre>";
print_r($mongoresult);


// to use all fields leave array empty array();
//$keys = array('address.stateCode' => 1);
$keys = $fkeys; 
print_r($keys);
// set intial values
$initial = array('count' => 0);
// JavaScript function to perform
$reduce = 'function (obj, prev) { prev.count++; }';
// only use documents where the "a" field is greater than 1
// $condition = array('condition' => array("a" => array( '$gt' => 1)));
$condition = array();

$g = $cars->group($keys, $initial, $reduce, $condition);

function multiSort() { 
    //get args of the function 
    $args = func_get_args(); 
    $c = count($args); 
    if ($c < 2) { 
        return false; 
    } 
    //get the array to sort 
    $array = array_splice($args, 0, 1); 
    $array = $array[0]; 
    //sort with an anoymous function using args 
    usort($array, function($a, $b) use($args) { 
    
        $i = 0; 
        $c = count($args); 
        $cmp = 0; 
        while($cmp == 0 && $i < $c) 
        { 
        	// String comparison
            //$cmp = strcmp($a[ $args[ $i ] ], $b[ $args[ $i ] ]); 
            //Numeric comparison
            $cmp = $a[ $args[ $i ] ] - $b[ $args[ $i ] ];
            $i++; 
        } 
        return $cmp; 
    }); 
    return $array; 
}
//sortarray (asc)
$g['retval'] = multiSort($g['retval'], 'count');
//reverseorder (desc)
krsort($g['retval']);


// $baseurl = 'https://m.leasetrader.com';
$baseurl = '';

$n = 0;

echo '<h2>Count:' . $g['count'] . ' | Keys:' . $g['keys'] . '</h2>';
echo '<h3>n  ponderated%   cumulative%   item%  itemcount  key</h3>';


foreach ($g['retval'] as $k => $v) {
    $n++;
	// echo '<br>'.$v['Year'].'<br>';
	$slink = '/';
	foreach ($fkeys as $fk => $fv) {
		// echo '<br>'.$fk.'<br>';
		$slink = $slink.'-'.str_ireplace(' ', '-', $v[$fk]);
	}
	$slink = str_ireplace('/-', '/', $slink);
	$slink = str_ireplace('--', '-', $slink);
	$slink = str_ireplace('--', '-', $slink);
	$slink = $baseurl.$slink;
    // percentage 
    $pntg = ($v['count'] / $g['count']) * 100;
    // cumulative percentage
    $cpntg = $cpntg + $pntg;

    // $pntg = number_format($pntg, 2);
    // $cpntg = number_format($cpntg, 2);

    // percentage of total keys
    $pospntg = (1 / $g['keys']) * 100;
    // cumulative percentage of total keys
    $cpospntg = $cpospntg + $pospntg;

    echo $n.' - '.number_format($pntg, 2).'% - '.number_format($cpntg, 2).'% - '.number_format($cpospntg, 2).'% - ('.$v['count'].') <a href="'.$slink.'">'.$slink.'</a><br>';
}


// echo '<pre>';
// print_r($g);
// echo '</pre>';



?>
