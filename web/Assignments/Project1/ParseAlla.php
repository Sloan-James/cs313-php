<?php
require '../connectDatabase.php';
// simple_html_dom is authored by S.C. Chen received from http://simplehtmldom.sourceforge.net/
include "simple_html_dom.php";
  
$expansion = $_POST["expansion"];

$url = $_POST["itemLink"];
$html = new simple_html_dom();
$html->load_file($url);
$item = $html->find('.nobgrd', 0)->innertext;
$itemName = $html->find('.shottitle', 0)->plaintext;
$spliturl = split("=",$url);
$itemid = $spliturl[1];

$statement = $db->prepare("SELECT * FROM itemdb WHERE itemid = :itemid");
$statement->execute(array(':itemid' => $itemid));
$result = $statement->fetch(PDO::FETCH_ASSOC);
if ($result["itemid"] == $itemid){
    header("Location: Additem.php?add=0");
}

$statement = $db->prepare("INSERT INTO itemdb (itemname,itemid,expansion,url) VALUES (:itemname,:itemid,:expansion,:url)");
$statement->execute(array(':itemname' => $itemName,':itemid' => $itemid, ':expansion' => $expansion, ':url' => $url));

$lines = split("<br>",$item);

foreach ($lines as $line){
    $splitline = split(' ', $line);
    switch ($splitline[1]){
        case "AC:":
            echo "ac started<br>";
            $stmt = $db->prepare("UPDATE itemdb SET ac = :ac WHERE itemid = :itemid");
             $stmt->execute(array(':ac' => $splitline[2], ':itemid' => $itemid));
             echo "added ac<br>";
            break;
        case "STR:":
        case "STA:":
        case "AGI:":
        case "DEX:":
        case "WIS:":
        case "INT:":
        case "CHA:":
        case "HP:":
        case "MANA:":
        case "ENDUR:":
            echo "stats started<br>";
            foreach ($splitline as $key => $stat){
                switch ($stat){
                    case "STR:":
                        $stmt = $db->prepare("UPDATE itemdb SET str = :str WHERE itemid = :itemid");
                        $stmt->execute(array(':str' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "STA:":
                        $stmt = $db->prepare("UPDATE itemdb SET sta = :sta WHERE itemid = :itemid");
                        $stmt->execute(array(':sta' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "AGI:":
                        $stmt = $db->prepare("UPDATE itemdb SET agi = :agi WHERE itemid = :itemid");
                        $stmt->execute(array(':agi' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "DEX:":
                        $stmt = $db->prepare("UPDATE itemdb SET dex = :dex WHERE itemid = :itemid");
                        $stmt->execute(array(':dex' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "WIS:":
                        $stmt = $db->prepare("UPDATE itemdb SET wis = :wis WHERE itemid = :itemid");
                        $stmt->execute(array(':wis' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "INT:":
                        $stmt = $db->prepare("UPDATE itemdb SET int = :int WHERE itemid = :itemid");
                        $stmt->execute(array(':int' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "CHA:":
                        $stmt = $db->prepare("UPDATE itemdb SET cha = :cha WHERE itemid = :itemid");
                        $stmt->execute(array(':cha' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "HP:":
                        if( $splitline[$key + 1] !== "Regen"){
                            $stmt = $db->prepare("UPDATE itemdb SET hp = :hp WHERE itemid = :itemid");
                            $stmt->execute(array(':hp' => $splitline[$key + 1], ':itemid' => $itemid));
                        }
                        break;
                        
                    case "MANA:":
                        $stmt = $db->prepare("UPDATE itemdb SET mana = :mana WHERE itemid = :itemid");
                        $stmt->execute(array(':mana' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "ENDUR:":
                        $stmt = $db->prepare("UPDATE itemdb SET endu = :endu WHERE itemid = :itemid");
                        $stmt->execute(array(':endu' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                }
            }
            echo "stats added<br>";
            break;
        case "SV":
            echo "resists started<br>";
            foreach ($splitline as $key => $stat){
                switch($stat){
                    case "FIRE:":
                        $stmt = $db->prepare("UPDATE itemdb SET fire = :fire WHERE itemid = :itemid");
                        $stmt->execute(array(':fire' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "DISEASE:":
                        $stmt = $db->prepare("UPDATE itemdb SET disease = :disease WHERE itemid = :itemid");
                        $stmt->execute(array(':disease' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "COLD:":
                        $stmt = $db->prepare("UPDATE itemdb SET cold = :cold WHERE itemid = :itemid");
                        $stmt->execute(array(':cold' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "MAGIC:":
                        $stmt = $db->prepare("UPDATE itemdb SET magic = :magic WHERE itemid = :itemid");
                        $stmt->execute(array(':magic' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                    case "POISON:":
                        $stmt = $db->prepare("UPDATE itemdb SET poison = :poison WHERE itemid = :itemid");
                        $stmt->execute(array(':poison' => $splitline[$key + 1], ':itemid' => $itemid));
                        break;
                }
                    
            }
            echo "resists added<br>";
            break;
        case "Focus:":
            echo "focus started<br>";
            $link = strstr($line,'<a>');
            echo $line . "<br>";
            echo $link . "<br>";
            $stmt = $db->prepare("UPDATE itemdb SET focus = :focus WHERE itemid = :itemid");
            $stmt->execute(array(':focus' => $link, ':itemid' => $itemid));
            echo "focus added<br>";
            break;
        case "Effect:":
            echo "effect started<br>";
            $link = strstr($line,'<a>');
            $stmt = $db->prepare("UPDATE itemdb SET effect = :effect WHERE itemid = :itemid");
            $stmt->execute(array(':effect' => $link, ':itemid' => $itemid));
            echo "effect added<br>";
            break;
        case "Haste:";
            echo "haste started<br>";
            echo $splitline[2] . "<br>";
            $haste = split('%',$splitline[2]);
            echo $haste[0] . "<br>";
            $stmt = $db->prepare("UPDATE itemdb SET haste = :haste WHERE itemid = :itemid");
            $stmt->execute(array(':haste' => $haste[0], ':itemid' => $itemid));
            echo "haste added<br>";
            break;
        case "Mana":// check needs to be combined with attack
            echo "mana regen started<br>";
            if ($splitline[$key + 2] === "Regeneration:"){
                $stmt = $db->prepare("UPDATE itemdb SET manaregen = :manaregen WHERE itemid = :itemid");
                $stmt->execute(array(':manaregen' => $splitline[$key + 3], ':itemid' => $itemid));
            }
            
            echo "mana regen added<br>";
            break;
        case "HP":// check needs to be combined with attack
            echo "hp regen started<br>";
            if( $splitline[$key + 2] === "Regen"){
                $stmt = $db->prepare("UPDATE itemdb SET hpregen = :hpregen WHERE itemid = :itemid");
                $stmt->execute(array(':hpregen' => $splitline[$key + 3], ':itemid' => $itemid));
            }
            echo "hp regen added<br>";
            break;
        case "Class:":
            echo "classes started<br>";
            $classes = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
            $add = true;
            foreach ($splitline as $class){
                echo "starting switch (class)<br>";
                echo $class . "<br>";
                switch ($class){
                    case "BRD":
                        if ($add){
                            $classes[0] = 1;
                        } else {
                            $classes[0] = 0;
                        }
                        break;
                    case "BST":
                        if ($add){
                            $classes[1] = 1;
                        } else {
                            $classes[1] = 0;
                        }
                        break;
                    case "BER":
                        if ($add){
                            $classes[2] = 1;
                        } else {
                            $classes[2] = 0;
                        }
                        break;
                    case "CLR":
                        if ($add){
                            $classes[3] = 1;
                        } else {
                            $classes[3] = 0;
                        }
                        break;
                    case "DRU":
                        if ($add){
                            $classes[4] = 1;
                        } else {
                            $classes[4] = 0;
                        }
                        break;
                    case "ENC":
                        if ($add){
                            $classes[5] = 1;
                        } else {
                            $classes[5] = 0;
                        }
                        break;
                    case "MAG":
                        if ($add){
                            $classes[6] = 1;
                        } else {
                            $classes[6] = 0;
                        }
                        break;
                    case "MNK":
                        if ($add){
                            $classes[7] = 1;
                        } else {
                            $classes[7] = 0;
                        }
                        break;
                    case "NEC":
                        if ($add){
                            $classes[8] = 1;
                        } else {
                            $classes[8] = 0;
                        }
                        break;
                    case "PAL":
                        if ($add){
                            $classes[9] = 1;
                        } else {
                            $classes[9] = 0;
                        }
                        break;
                    case "RNG":
                        if ($add){
                            $classes[10] = 1;
                        } else {
                            $classes[10] = 0;
                        }
                        break;
                    case "ROG":
                        if ($add){
                            $classes[11] = 1;
                        } else {
                            $classes[11] = 0;
                        }
                        break;
                    case "SHD":
                        if ($add){
                            $classes[12] = 1;
                        } else {
                            $classes[12] = 0;
                        }
                        break;
                    case "SHM":
                        if ($add){
                            $classes[13] = 1;
                        } else {
                            $classes[13] = 0;
                        }
                        break;
                    case "WAR":
                        if ($add){
                            $classes[14] = 1;
                        } else {
                            $classes[14] = 0;
                        }
                        break;
                    case "WIZ":
                        if ($add){
                            $classes[15] = 1;
                        } else {
                            $classes[15] = 0;
                        }
                        break;
                    case "ALL":
                        $classes = array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
                        break;
                    case "except":
                        $add = false;
                        break;
                }
            }
            
            foreach ($classes as $key => $cls){
                $sql = "UPDATE itemdb SET classes[" . ($key+1) . "] = '" . $cls . "' WHERE itemid = " . $itemid;
                echo $sql . "<br>";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                //$stmt = $db->prepare("UPDATE itemdb SET classes = :classes WHERE itemid = :itemid");
                //$stmt->execute(array(':classes' => $classes, ':itemid' => $itemid));
            }
            
            echo "classes added<br>";
            break;
        case "Race:":
            echo "races started<br>";
            $races = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
            $add = true;
            foreach ($splitline as $race){
                echo "starting switch (race)<br>";
                switch ($race){
                    case "BAR":
                        if ($add){
                            $races[0] = 1;
                        } else {
                            $races[0] = 0;
                        }
                        break;
                    case "DEF":
                        if ($add){
                            $races[1] = 1;
                        } else {
                            $races[1] = 0;
                        }
                        break;
                    case "DRK":
                        if ($add){
                            $races[2] = 1;
                        } else {
                            $races[2] = 0;
                        }
                        break;
                    case "DWF":
                        if ($add){
                            $races[3] = 1;
                        } else {
                            $races[3] = 0;
                        }
                        break;
                    case "ERU":
                        if ($add){
                            $races[4] = 1;
                        } else {
                            $races[4] = 0;
                        }
                        break;
                    case "FRG":
                        if ($add){
                            $races[5] = 1;
                        } else {
                            $races[5] = 0;
                        }
                        break;
                    case "GNM":
                        if ($add){
                            $races[6] = 1;
                        } else {
                            $races[6] = 0;
                        }
                        break;
                    case "HEF":
                        if ($add){
                            $races[7] = 1;
                        } else {
                            $races[7] = 0;
                        }
                        break;
                    case "HFL":
                        if ($add){
                            $races[8] = 1;
                        } else {
                            $races[8] = 0;
                        }
                        break;
                    case "HIE":
                        if ($add){
                            $races[9] = 1;
                        } else {
                            $races[9] = 0;
                        }
                        break;
                    case "HUM":
                        if ($add){
                            $races[10] = 1;
                        } else {
                            $races[10] = 0;
                        }
                        break;
                    case "IKS":
                        if ($add){
                            $races[11] = 1;
                        } else {
                            $races[11] = 0;
                        }
                        break;
                    case "OGR":
                        if ($add){
                            $races[12] = 1;
                        } else {
                            $races[12] = 0;
                        }
                        break;
                    case "TRL":
                        if ($add){
                            $races[13] = 1;
                        } else {
                            $races[13] = 0;
                        }
                        break;
                    case "VAH":
                        if ($add){
                            $races[14] = 1;
                        } else {
                            $races[14] = 0;
                        }
                        break;
                    case "ELF":
                        if ($add){
                            $races[15] = 1;
                        } else {
                            $races[15] = 0;
                        }
                        break;
                    case "ALL":
                        $races = array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
                        break;
                    case "except":
                        $add = false;
                        break;
                }
            }
            foreach ($races as $key => $rce){
                $sql = "UPDATE itemdb SET races[" . ($key+1) . "] = '" . $rce . "' WHERE itemid = " . $itemid;
                echo $sql; echo "<br>";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                //$stmt = $db->prepare("UPDATE itemdb SET races = :races WHERE itemid = :itemid");
                //$stmt->execute(array(':races' => $races, ':itemid' => $itemid));
            }
            
            echo "races Added<br>";
            break;
        case "Deity:":
            // Add deity check
            echo "Deity check<br>";
            break;
        case "Slot:":
            echo "slots started<br>";
            for ($i = 2; $i < count($splitline); $i++){
                echo "slot " . $i . " adding<br>";
                echo $splitline[$i] . "<br>";
                $sql = "UPDATE itemdb SET slots[" . ($i-1) . "] = '" . $splitline[$i] . "' WHERE itemid = " . $itemid;
                echo $sql . "<br>";
                //$stmt = $db->prepare("UPDATE itemdb SET :slotarray = ':slots' WHERE itemid = :itemid");
                //$stmt->execute(array(':slots' => $splitline[$i], ':itemid' => $itemid));
                $stmt = $db->prepare($sql);
                $stmt->execute();
                echo "slot " . $i . " added<br>";
            }
            echo "slots added<br>";
            break;
        case "Attack:":
            // add attack check, probably needs to be added with hp/mana checks
            echo "attack check<br>";
            break;
        case "Skill Mod:":
            // add Skill mod check
            echo "Skill Mod check<br>";
            break;
        case "DMG:":
            // add Weapon stats
            echo "weapon stats check<br>";
            break;
        case "Skill:":
            echo "weapon skill check<br>";
            break;
            
    }
}

//header('Location: Additem.php?add=1');


