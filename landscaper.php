<?php
$game_finished = false;
$money = 0;
$tools = array();
while($game_finished === false) {
  global $game_finished; $money; $tools;
  print_r($tools);
  if($money >= 1000 && in_array('team_of_starving_students', $tools)){
    break;
  };
  echo "You have $$money\n";
  echo "Use numerical input for options!\n";
  echo "0. Go to store!\n";
  echo "1. Use teeth to cut grass\n";
  
  if (in_array('scissors', $tools)){
    echo "2. Use scissors to cut grass\n";
  };
  if (in_array('push_lawnmower', $tools)){
    echo "3. Use push_lawnmower to cut grass\n";
  };
  if (in_array('battery_powered_lawnmower', $tools)){
    echo "4. Use battery_powered_lawnmower to cut grass\n";
  };
  if (in_array('team_of_starving_students', $tools)){
    echo "5. Use team_of_starving_students to cut grass\n";
  };
  $response = trim(fgets( STDIN ));
  if ($response === "1"){
    echo "You used teeth to cut grass and made $1\n";
    $money++;
  }
  if ($response === "2" && in_array('scissors', $tools)){
    echo "You used scissors to cut grass and made $5\n";
    $money = $money + 5;
  }
  if ($response === "3" && in_array('push_lawnmower', $tools)){
    echo "You used push lawnmover to cut grass and made $25\n";
    $money = $money + 25;
  }
  if ($response === "4" && in_array('battery_powered_lawnmower', $tools)){
    echo "You used battery_powered_lawnmower to cut grass and made $250\n";
    $money = $money + 100;
  }
  if ($response === "5" && in_array('team_of_starving_students', $tools)){
    echo "You used team_of_starving_students to cut grass and made $250\n";
    $money = $money + 250;
  }
  if ($response === "0") {
    echo "You have $$money\n";
    echo "Use numerical input for options!\n";
    echo "0. Buy scissors for $5\n";
    if (in_array('scissors', $tools)){ 
    echo "1. Buy push_lawnmower for $25\n";
    }
    if (in_array('push_lawnmower', $tools)){ 
    echo "2. Buy battery_powered_lawnmower for $250\n";
    }
    if (in_array('battery_powered_lawnmower', $tools)){ 
      echo "3. Hire team_of_starving_students for $500\n";
    }
    $response = trim(fgets( STDIN ));
    if ($response === "0" && $money >= 5) {
      $money = $money - 5;
      $tools[0] = 'scissors';
      echo "You bought scissors for $5\n";
    } elseif ($response === "1" && $money >= 25 && in_array('scissors', $tools)){
      $money = $money - 25;
      $tools[1] = 'push_lawnmower';
      echo "You bought push_lawmower for $25\n";
    } elseif ($response === "2" && $money >= 250 && in_array('push_lawnmower', $tools)){
      $money = $money - 250;
      $tools[2] = 'battery_powered_lawnmower';
      echo "You bought battery_powered_lawnmower for $250\n";
    } elseif ($response === '3' && $money >= 500 && in_array('battery_powered_lawnmower', $tools)){
      $money = $money - 500;
      $tools[3] = 'team_of_starving_students';
      echo "You hired a team_of_starving_students for $500\n";
    } 
    else {
      echo "Invalid input!\n";
    }
  };
};
echo "You won the game!!!\n";
?>