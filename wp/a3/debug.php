<?php

/* Important Notice:
 *  Do not use on Coreteaching servers. Use debug module instead.
 *  This code is only for local and protected cloud servers.
 *  It is a violation of RMIT policy to use this on Coreteaching servers.
 */
 
if (strpos($_SERVER['SERVER_NAME'],'csit.rmit.edu.au') !== false) 
  include_once('/home/eh1/e54061/public_html/wp/debug.php');
else {
  error_reporting(0);
  
  $sessionMsg='';
  if(!isset($_SESSION)) {
    $sessionMsg="*** need session_start() ***\n";
    session_start();
  }

// string to boolean conversion funtions
  function b2s($bP)
  {
    return $bP ? "true" : "false";
  }
  function s2b($sP)
  {
    return ($sP == "true");
  }

// Action flag defaults
  $flags['Reverse']=false;
  $flags['KeepOpen']=true;
  $flags['LargeFont']=false;
  $flags['StickyBtm']=false;

  
// Modify flags
  function cookFlag($fP)
  {
    global $flags;
    $exp=time()+3600*24*7*12; // 12 weeks
    $logicCombo = ((isset($_POST['action']) && $_POST['action'] == $fP) ? 1 : 0);
    $logicCombo += (isset($_COOKIE[$fP]) ? 2 : 0);
    //$_SESSION['debug']['Flags checked'][]=$fP;
    //$_SESSION['debug'][$fP]=$logicCombo;
    
    switch ($logicCombo) {
      case 0: // first time, no cookie, no action - set default flag
      case 1: // no cookie, action pressed; won't happen, safety fallback
        setcookie($fP,b2s($flags[$fP]),$exp);
        break;
      case 2: // cookie set, no action, update flag from cookie
        $flags[$fP] = s2b($_COOKIE[$fP]);
        break;
      case 3: // cookie set, action pressed, toggle cookie and flag
        setcookie($fP,( (s2b($_COOKIE[$fP]) ? 'false' : 'true')),$exp);
        $flags[$fP] = !s2b($_COOKIE[$fP]);
        break;
    }    
  }

// 20171010: Testing cookies setting, seems to be disabled after recent systems update
  $cookiesDisabled = false;
  $cookiesDisabled = !setcookie("test","testing cookies",$exp);

// update flags from cookies - re-disabled ... no idea, maybe it's me ....
//  if (!$cookiesDisabled) { 
  cookFlag('Reverse');
  cookFlag('KeepOpen');
  cookFlag('LargeFont');
  cookFlag('StickyBtm'); 
//  }

    
// Takes a pipe delimited names string, returns a session branch
  function makeSessionBranch($nameP)
  {
    $nameA = explode('|',$nameP); 
    $nameE='$_SESSION';
    foreach ($nameA as $segment)
    {
      if (preg_match('/^[0-9]+$/',$segment))
        $nameE.="[$segment]";
      else
        $nameE.="['$segment']";
        
    }
    return $nameE;
  }

  if (isset($_POST['action']))
  {
    if ($_POST['action']=='Reset')
    {
      if(empty($_POST['name']))
      {
        foreach ($_SESSION as $key => $value)  
          if ($key!='hood')
            unset($_SESSION[$key]);
      }
      else
        eval('unset('.makeSessionBranch($_POST['name']).');');
    } 
    else if ($_POST['action']=='Set')
    {
      $nameE = makeSessionBranch($_POST['name']);
      if(empty($_POST['value']) || $_POST['value'] == 'false')
        $nameE.'=false;';
      else if($_POST['value']=='true')
        $nameE.='=true;';
      else 
        $nameE.='=$_POST[\'value\'];';    
      eval($nameE);      
    }
  }

  $colors = ( ($flags['Reverse'] ) ?
  'background-color:#ffe; color:#006' :
  'background-color:black; color:yellow' );


  $fontSize = ( ($flags['LargeFont'] ) ?
  'font-size:14pt;' :
  'font-size:10pt;' );

  $open = ( ($flags['KeepOpen'] ) ?
  ' open' :
  '' );
  
  $stickyBtm = ( ($flags['StickyBtm'] ) ?
  '.css(\'top\',\'90vh\')' :
  '' );

?>
<style>

  #WP-debug {
    z-index: 10;
    box-shadow: 0px 0px 5px 5px rgba(255,255,255,0.9);
    clear:both;
    display:block;
    background-color: rgba(255,255,255,0.9);
    margin: 0px 10px;
    box-sizing: border-box;
    width: calc(100vw - 20px);
    color:black;
  }
  #WP-debug * {
    font-family: "Courier New", monospace !important;
    color: #b3e9f3;
  }
  #WP-debug summary {
    padding: 10px 0px;
  }
  #WP-debug details {
    overflow: visible;
  }

  #WP-debug pre {
    white-space: pre-wrap;       /* css-3 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word;       /* Internet Explorer 5.5+ */
    text-align:left;
    <?php echo $fontSize; ?>
    padding-left: 10px;
    min-width:900px;
    padding-bottom:100px;
    <?php echo $colors; ?>
  }
  
  #WP-debug pre ol {
    list-style-type: decimal;  
  }
 
 #WP-debug pre ol li {
    float:none;
  }
  
  #WP-debug form span {
    box-shadow: 0px 0px 2px 2px rgba(0,0,0,0.3);
    margin: 3px 0px;
    padding: 5px;
    display: inline-block;
  }
  #WP-debug input { max-width: 100px; }
  
}
</style>

<div id='WP-debug'>
<details <?php echo ($open) ; ?>>
  
<summary>Debug Show/Hide  <span style='cursor: move'>&#10538;-DRAG-&#10541;</span></summary>
<p>
  <form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' >
    <span>SESSION Control<br>
      Name:<input type=text name=name placeholder='eg cart|0'/>
      Value: <input type=text name=value />
      <input type=submit name=action value=Set />
      <input type=submit name=action value=Reset />
    </span>
    <span>localStorage<br>
      <input type='button' value='Log to Console' onclick='console.log(localStorage);' />
      <input type='button' value='Clear' onclick='localStorage.clear();' />
    </span> 
    <?php if(!$cookiesDisabled) echo "<span>Helpful Features<br>\n
      <input type=submit name=action value='KeepOpen' />\n
      <input type=submit name=action value='Reverse' />\n
      <input type=submit name=action value='LargeFont' />\n
      <input type=submit name=action value='StickyBtm' />\n
    </span>"; ?>
  </form>
</p>

<pre>
$_SESSION contains:
<?php echo $sessionMsg; print_r($_SESSION); ?>

$_POST contains:
<?php print_r($_POST); ?>

$_GET contains:
<?php print_r($_GET); ?>

$_COOKIE contains:
<?php print_r($_COOKIE); ?>

$flags contains:
<?php print_r($flags); ?>

<?php
  error_reporting(0);
  // start lite version: protection removed 
    echo "Teacher / User Athenticated<hr>";
    $lines=file($_SERVER['SCRIPT_FILENAME']);
    echo "<ol>";
    foreach($lines as $i => $line)
      printf("<li>%1s</li>",preg_replace("/\t/",'  ',htmlentities($line)));
    echo "</ol>";
    echo "<hr>";
  // end lite version: protection removed 
 
?>
</pre>
</details>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#WP-debug" ).resizable({ grid:[50,50] }).draggable({ 
      handle:'summary',
      grid:[50,50]
    })<?php echo $stickyBtm; ?>;
  });
</script>
<?php } ?>