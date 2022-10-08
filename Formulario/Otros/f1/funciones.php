<?php
  function suma($n1, $n2)
  {
    return ($n1 + $n2);
  }

  function resta($n1, $n2)
  {
    return ($n1 - $n2);
  }

  function factorial($n)
  {
    if ($n == 0):
      return (1);
    else:
      return ($n * factorial($n - 1));
    endif;
  }

  function multTab($n)
  {
    $tab = "";
    for($i = 0; $i <= 10; $i++)
    {
      $tab .= $n." x ".$i." = ".($n*$i)."<br>";
    }
    return $tab;
  }

  function mayor($n1, $n2)
  {
    return ($n1 > $n2) ? $n1 : $n2;
  }

  function menor($n1, $n2)
  {
    return ($n1 < $n2) ? $n1 : $n2;
  }
?>