<?php
// This plugin will alphabetise a given page array or tag array
Kirby::plugin('shoesforindustry/alphabetise', []);
function alphabetise($items, $options = array())
{
  // Default key and orderby values
  // To sort letters listed first, set 'orderby' to SORT_REGULAR
  // To sort numbers listed first, set 'orderby' to SORT_STRING
  // Other ksort sort_flags may be usuable but not tested!
  $defaults = array('key' => 'title', 'orderby' => SORT_REGULAR);

  // Merge default and options arrays
  $options = array_merge($defaults, $options);

  //Gets the input into a two dimensional array - uses '~' as separator;
  foreach ($items as $item) {
    $temp = explode('~', $item->{$options['key']}());
    $temp = $temp[0];
    $temp = strtolower($temp);
    $array[$temp][] = $item;
  }

  // Check to see array is not empty
  if ((!empty($array))) {
    //Make an array of key and data
    foreach ($array as $temp => $item) {
      if (strlen($temp) < 2) {
        $temp = $temp . $temp;
        $array[substr($temp, 0, 2)][] = $item[0];
      } else {
        $array[substr($temp, 0, 1)][] = $item[0];
      }
    unset($array[$temp]);
  }

    // Sort the $array using 'orderby' flag
    ksort($array, $options['orderby']);

  } else {

    // If there’s a problem, set $array to an error message
    $array = array(
      "Alphabetise Plugin Error: Problem with array or invalid key!
        Make sure your array is valid, not empty & that the key is valid for this type of array.  (You can probably ignore the errors after this point, until this error has been resolved.)" => "Error"
    );
  }

  return $array;
}
