<?php
// Exercise 2a
echo "<h2>The given array is: </h2>";
echo "<h3>[1,5,4,6,7,100, -2, 10]</h3>";
function findMax($listNums)
{
  $currMax = $listNums[0];
  foreach($listNums as $eachNum)
  {
    if($currMax < $eachNum)
    {
      $currMax = $eachNum;
    }
  }
  return $currMax;
}
echo "The maximum number is: ";
print_r(findMax([1,5,4,6,7,100, -2, 10]));


function findMin($listNums)
{
  $currMin = $listNums[0];
  foreach($listNums as $eachNum)
  {
    if($currMin > $eachNum)
    {
      $currMin = $eachNum;
    }
  }
  return $currMin;
}
echo "<br/>";
echo "The minimum number is:";
print_r(findMin([1,5,4,6,7,100, -2, 10]));

// Exercise 2b
echo "<h1>Exercise 2</h1>";
function sortAscending($listNums)
{
  $leftArray = array();
  $rightArray = array();
  if (count($listNums) < 2)
  {
    return $listNums;
  }
  $pivol = $listNums[0];
  for($i = 1; $i < count($listNums); $i++)
  {
    if($listNums[$i] <= $pivol)
    {
      $leftArray[] = $listNums[$i];
    }
    else
    {
      $rightArray[] = $listNums[$i];
    }
  }
  return array_merge(sortAscending($leftArray), array($pivol), sortAscending($rightArray));
}
echo "<br/>"; 
echo "The ascending order is : ";
print_r(sortAscending([1,5,4,6,7,100, -2, 10]));


function sortDescending($listNums)
{
  $leftArray = array();
  $rightArray = array();
  if (count($listNums) < 2)
  {
    return $listNums;
  }
  $pivol = $listNums[0];
  for($i = 1; $i < count($listNums); $i++)
  {
    if($listNums[$i] <= $pivol)
    {
      $leftArray[] = $listNums[$i];
    }
    else
    {
      $rightArray[] = $listNums[$i];
    }
  }
  return array_merge(sortDescending($rightArray), array($pivol), sortDescending($leftArray));
}
echo "<br/>"; 
echo "The descending order is : ";
print_r(sortDescending([1,5,4,6,7,100, -2, 10]));
?>