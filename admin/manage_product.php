<?php
require('connection.inc.php');
require('functions.inc.php');
if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
} else {
    redirect('login.php');
    die();
}

$categories_id = '';
$brand_id = '';
$name = '';
$osv = '';
$osicon = '';
// Moblie
// Performance KS
$perfks1 = '';
$perfks2 = '';
$perfks3 = '';
// Display
$dispks1 = '';
$dispks2 = '';
$dispks3 = '';
// Camera
$cameks1 = '';
$cameks2 = '';
$cameks3 = '';
// Battery
$batks1 = '';
$batks2 = '';
$batks3 = '';
// Key Specs
$ramemory = '';
$mcamera = '';
$process = '';
$rcam = '';
$fcam = '';
$disp = '';
// General
$ldate = '';
$cui = '';
// Performance
$chip = '';
$mchip = '';
$cpunit = '';
$mprocessspeed = '';
$mPCores = '';
$archi = '';
$fab = '';
$graph = '';
$ramtype = '';
// Display
$distype = '';
$screensize = '';
$mscreensize = '';
$disres = '';
$aspratio = '';
$pixden = '';
$screenbody = '';
$screenprot = '';
$bezdisp = '';
$touchscreen = '';
$bright = '';
$hd = '';
$refrate = '';
// Design
$hei = '';
$wid = '';
$thick = '';
$weig = '';
$buildM = '';
$col = '';
$water = '';
$rugg = '';
// Camera
$camset = '';
$res1 = '';
$resfl1 = '';
$res2 = '';
$resfl2 = '';
$res3 = '';
$resfl3 = '';
$res4 = '';
$resfl4 = '';
$sens = '';
$af = '';
$oi = '';
$flas = '';
$imgres = '';
$sett = '';
$shootmode1 = '';
$shootmode2 = '';
$shootmode3 = '';
$camfea1 = '';
$camfea2 = '';
$camfea3 = '';
$camfea4 = '';
$camfea5 = '';
$vidrec1 = '';
$vidrec2 = '';
$vidrec3 = '';
$vidrec4 = '';
$fcamset = '';
$fres = '';
$fresfl = '';
$faf = '';
$frflash = '';
$fvidrec1 = '';
$fvidrec2 = '';
// Battery
$cap = '';
$typ = '';
$remove = '';
$talktime = '';
$wcharge = '';
$qcharge = '';
// Storage
$userstore = '';
$usbotg = '';
$usbc = '';
$intmem = '';
$expmem = '';
$storetype = '';
// Network & Connectivity
$simslot = '';
$simsize = '';
$netsupp = '';
$volt = '';
$sim4g = '';
$sim3g = '';
$sim2g = '';
$gprs = '';
$edge = '';
$sim24g = '';
$sim23g = '';
$sim22g = '';
$gprs2 = '';
$edge2 = '';
$wifi = '';
$wififea = '';
$wificall = '';
$blue = '';
$gps = '';
$nfc = '';
$usbconn = '';
// Multimedia
$fmr = '';
$loud = '';
$audjack = '';
$audfea = '';
// Sensors
$finger = '';
$fingerPos = '';
$fingerType = '';
$faceunlock = '';
$othersens = '';

// Tablet
// Performance KS
$tperfks1 = '';
$tperfks2 = '';
$tperfks3 = '';
// Display
$tdispks1 = '';
$tdispks2 = '';
$tdispks3 = '';
// Camera
$tcameks1 = '';
$tcameks2 = '';
$tcameks3 = '';
// Battery
$tbatks1 = '';
$tbatks2 = '';
$tbatks3 = '';
// General
$tldate = '';
$tcui = '';
// Design
$theight = '';
$twidth = '';
$tthick = '';
$tweight = '';
$tbuildM = '';
$tcolor = '';
// Display
$tscreenSize = '';
$tactualscreen = '';
$tscreenRes = '';
$tpixDen = '';
$tdisType = '';
$tscreenP = '';
$ttouchScreen = '';
$tscreenRatio = '';
// Performance
$tchip = '';
$tchipName = '';
$tPcore = '';
$tprocess = '';
$tarchi = '';
$tgraph = '';
$tram = '';
// Storage
$tintMem = '';
$texpMem = '';
$tuserStore = '';
$tusbotg = '';
// Camera
$tmaincam = '';
$tres1 = '';
$tresfl1 = '';
$tres2 = '';
$tresfl2 = '';
$tres3 = '';
$tresfl3 = '';
$tres4 = '';
$tresfl4 = '';
$taf = '';
$tflash = '';
$timgRes = '';
$tsett = '';
$tshootmode1 = '';
$tshootmode2 = '';
$tshootmode3 = '';
$tcamFea1 = '';
$tcamFea2 = '';
$tcamFea3 = '';
$tcamFea4 = '';
$tcamFea5 = '';
$tvidRec1 = '';
$tvidRec2 = '';
$tvidRec3 = '';
$tfcam = '';
$tfres1 = '';
$tfresfl1 = '';
$tfres2 = '';
$tfresfl2 = '';
$tfflash = '';
$tfvidrec1 = '';
$tfvidrec2 = '';
// Battery
$tcap = '';
$ttype = '';
$tuserR = '';
$tquickC = '';
$tusbC = '';
// Network & Connectivity
$tsimsize = '';
$tnetsupp = '';
$tvolt = '';
$tsim4g = '';
$tsim3g = '';
$tsim2g = '';
$tgprs = '';
$tedge = '';
$tvoiceCall = '';
$twifi = '';
$twifiFea = '';
$tblue = '';
$tnfc = '';
$tusbConn = '';
$thdmi = '';
// Multimedia
$tfmr = '';
$taudioJ = '';
$taudioF = '';
// Special Features
$tfinger = '';
$tfingerPos = '';
$totherSens = '';

// Laptop
// Performance KS
$lperfks1 = '';
$lperfks2 = '';
$lperfks3 = '';
// Design
$desiks1 = '';
$desiks2 = '';
$desiks3 = '';
// Storage
$storks1 = '';
$storks2 = '';
$storks3 = '';
// Battery
$lbatks1 = '';
$lbatks2 = '';
$lbatks3 = '';
// General Information
$lmodel = '';
$ldimen = '';
$lweight = '';
$lcolor = '';
$lostype = '';
$lultrabook = '';
$lconvertible = '';
$ldetachable = '';
// Display Details
$ldisSize = '';
$lactualdisSize = '';
$ldisRes = '';
$lpixden = '';
$ldisType = '';
$ldisFea = '';
$ldisTouch = '';
// Performance
$lprocess = '';
$lprocessCSpeed = '';
$lgraphProcess = '';
$lgraphM = '';
$lgraphActMem = '';
$lprocessortype = '';
$lprocessorGen = '';
// Memory
$lcapacity = '';
$lramType = '';
$lmemSlot = '';
$lmemLayout = '';
$lmemoryexpand = '';
// Storage
$lstoreageC = '';
$lstoragetype = '';
// Battery
$lbatType = '';
$lpowS = '';
$lbatLife = '';
// Networking
$lwireLAN = '';
$lblue = '';
$lblueV = '';
// Ports
$lusb3 = '';
$lusb2 = '';
$lHDMI = '';
$llockPort = '';
$lusbtypeC = '';
$lsdCard = '';
$lheadJ = '';
$lmicroJ = '';
// Multimedia
$lwebC = '';
$lvidRec = '';
$lsecondC = '';
$lspeaker = '';
$lsoundTech = '';
$lmicro = '';
$lmicroType = '';
$lotherControl = '';
// Peripherals
$loptD = '';
$lpoiD = '';
$lkey = '';
$lbacklit = '';
$lfinger = '';
$lfaceunlock = '';
// Others
$lwarranty = '';
$lsalesP = '';

// Audio
// Design
$adesiks1 = '';
$adesiks2 = '';
$adesiks3 = '';
// Features
$afeaks1 = '';
$afeaks2 = '';
$afeaks3 = '';
// Battery
$abatks1 = '';
$abatks2 = '';
$abatks3 = '';
// General
$aboxC = '';
// Design
$atype = '';
$adesign = '';
$aopenCloseB = '';
$afit = '';
// Performance
$adriver = '';
$aImpedance = '';
$aSensitivity = '';
$afreqRange = '';
// Physical Design
$aearbudDim = '';
$aearbudWei = '';
$acaseDim = '';
$acaseWei = '';
$adura = '';
$acableLen = '';
$acol = '';
// Features
$anoise = '';
$acall = '';
$amusic = '';
$aambient = '';
$aother = '';
// Connectivity
$aconn = '';
$ablueV = '';
$ablueRange = '';
// Microphone
$amicroI = '';
$amicroN = '';
// Battery
$aplay = '';
$abattcapE = '';
$abattcapC = '';
// Compatibility
$acompatM = '';

// Watch
// Design
$wdesiks1 = '';
$wdesiks2 = '';
$wdesiks3 = '';
// Display
$wdisks1 = '';
$wdisks2 = '';
$wdisks3 = '';
// Features
$wfeaks1 = '';
$wfeaks2 = '';
$wfeaks3 = '';
// Battery
$wbatks1 = '';
$wbatks2 = '';
$wbatks3 = '';
// General
$wops = '';
$wboxC = '';
// Design
$wshapeS = '';
$wdim = '';
$wwei = '';
$wbodyM = '';
$wstrapM = '';
$wcol = '';
$wchangeStrap = '';
// Display
$wscreenSize = '';
$wscreenRes = '';
$wpixD = '';
$wdisT = '';
$wtouchScreen = '';
// Compatibility
$wcompOS = '';
// Battery
$wbattCap = '';
$wusageH = '';
$wusagetype = '';
$wchargeM = '';
// Connectivity
$wblueI = '';
$wblue = '';
$wwirePI = '';
$wwireP = '';
$wsimI = '';
$wsim = '';
$wusbCI = '';
$wusbC = '';
$wnfcI = '';
$wnavI = '';
$wnav = '';
// Sensors
$wacc = '';
$wgyro = '';
$wlight = '';
$wgpsI = '';
$wgps = '';
// Hardware
$wprocess = '';
$wram = '';
$wintMem = '';
// Notifications
$wtextM = '';
$wincomeCall = '';
$walarm = '';
$wcalR = '';
$wtime = '';
$wweather = '';
// Smartphone Remote Features
$wmakeCall = '';
$wcameraS = '';
// Activity Tracker
$wcal = '';
$wstep = '';
$wsleep = '';
$whours = '';
$wwheart = '';
$wdistance = '';
// Multimedia
$wspeak = '';
// Features
$wwaterResI = '';
$wwaterRes = '';
$wvoiceCI = '';
$wvoiceC = '';
// Additional Features
$walarmC = '';
$wremind = '';
$wstopW = '';

// Television
// Display
$tvdisks1 = '';
$tvdisks2 = '';
$tvdisks3 = '';
// Features
$tvfeaks1 = '';
$tvfeaks2 = '';
$tvfeaks3 = '';
// Connectivity
$tvconks1 = '';
$tvconks2 = '';
$tvconks3 = '';
// Smart Features
$tvsmfeaks1 = '';
$tvsmfeaks2 = '';
$tvsmfeaks3 = '';
// General
$tvseries = '';
$tvwarranty = '';
$tvboxC = '';
// Display
$tvtype = '';
$tvdistype = '';
$tvsize = '';
$tvreso = '';
$tvresoFilter = '';
$tvRefRate = '';
$tvaspRatio = '';
$tvhoriView = '';
$tvvertView = '';
$tv3D = '';
$tvcurved = '';
$tvultraSlim = '';
$tvotherDispFea = '';
// Physical Design
$tvcolor = '';
$tvweight = '';
$tvweightStand = '';
$tvdimStand = '';
$tvdim = '';
$tvstandType = '';
$tvstandColor = '';
$tvstandFea = '';
$tvwllMountDim = '';
// Video
$tvdigitalRF = '';
$tvvideoF = '';
$tvimageF = '';
$tvupscale = '';
// Audio
$tvsoundtype = '';
$tvsoundTech = '';
$tvaudioF = '';
$tvtotalSO = '';
$tvspeakerF = '';
$tvotherSA = '';
// Connectivity/Ports
$tvusbP = '';
$tvusbS = '';
$tvhdmi = '';
$tvdigitalOA = '';
$tvrfI = '';
$tvethernetS = '';
// Smart TV Features
$tvsmartv = '';
$tvandroid = '';
$tvwifiP = '';
$tvwifiD = '';
$tvmiracast = '';
$tvblue = '';
$tvblueV = '';
$tvinbuiltI = '';
$tvinbuiltA = '';
$tvfacebook = '';
$tvgame = '';
$tvvoice = '';
$tvotherSF = '';
// Remote
$tvinternetA = '';
// Power Supply
$tvvolt = '';
$tvfreq = '';
$tvpowerCR = '';
$tvpowerCS = '';

$meta_keyword = '';
$image = '';
$mrp = '';
$url = '';
$amazon_url = '';
$amazon_mrp = '';
$flipkart_url = '';
$flipkart_mrp = '';
$croma_url = '';
$croma_mrp = '';
$multipleImageArr = [];

$msg = '';
$image_required = 'required';

$attrProduct[0]['product_id'] = '';
$attrProduct[0]['variant_id'] = '';
$attrProduct[0]['pid'] = '';
$attrProduct[0]['id'] = '';

if (isset($_GET['pi']) && $_GET['pi'] > 0) {
    $pi = get_safe_value($con, $_GET['pi']);
    $delete_sql = "delete from product_images where id='$pi'";
    mysqli_query($con, $delete_sql);
}

if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from product where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories_id = $row['categories_id'];
        $brand_id = $row['brand_id'];
        $name = $row['name'];
        $osv = $row['osv'];
        $osicon = $row['osicon'];
        // Mobile
        // Performance KS
        $perfks1 = $row['perfks1'];
        $perfks2 = $row['perfks2'];
        $perfks3 = $row['perfks3'];
        // Display
        $dispks1 = $row['dispks1'];
        $dispks2 = $row['dispks2'];
        $dispks3 = $row['dispks3'];
        // Camera
        $cameks1 = $row['cameks1'];
        $cameks2 = $row['cameks2'];
        $cameks3 = $row['cameks3'];
        // Battery
        $batks1 = $row['batks1'];
        $batks2 = $row['batks2'];
        $batks3 = $row['batks3'];
        // Key Specs
        $ramemory = $row['ramemory'];
        $process = $row['process'];
        $mcamera = $row['mcamera'];
        $rcam = $row['rcam'];
        $fcam = $row['fcam'];
        $disp = $row['disp'];
        // General
        $ldate = $row['ldate'];
        $cui = $row['cui'];
        // Performance
        $chip = $row['chip'];
        $mchip = $row['mchip'];
        $cpunit = $row['cpunit'];
        $mprocessspeed = $row['mprocessspeed'];
        $mPCores = $row['mPCores'];
        $archi = $row['archi'];
        $fab = $row['fab'];
        $graph = $row['graph'];
        $ramtype = $row['ramtype'];
        // Display
        $distype = $row['distype'];
        $screensize = $row['screensize'];
        $mscreensize = $row['mscreensize'];
        $disres = $row['disres'];
        $aspratio = $row['aspratio'];
        $pixden = $row['pixden'];
        $screenbody = $row['screenbody'];
        $screenprot = $row['screenprot'];
        $bezdisp = $row['bezdisp'];
        $touchscreen = $row['touchscreen'];
        $bright = $row['bright'];
        $hd = $row['hd'];
        $refrate = $row['refrate'];
        // Design
        $hei = $row['hei'];
        $wid = $row['wid'];
        $thick = $row['thick'];
        $weig = $row['weig'];
        $buildM = $row['buildM'];
        $col = $row['col'];
        $water = $row['water'];
        $rugg = $row['rugg'];
        // Camera
        $camset = $row['camset'];
        $res1 = $row['res1'];
        $resfl1 = $row['resfl1'];
        $res2 = $row['res2'];
        $resfl2 = $row['resfl2'];
        $res3 = $row['res3'];
        $resfl3 = $row['resfl3'];
        $res4 = $row['res4'];
        $resfl4 = $row['resfl4'];
        $sens = $row['sens'];
        $af = $row['af'];
        $oi = $row['oi'];
        $flas = $row['flas'];
        $imgres = $row['imgres'];
        $sett = $row['sett'];
        $shootmode1 = $row['shootmode1'];
        $shootmode2 = $row['shootmode2'];
        $shootmode3 = $row['shootmode3'];
        $camfea1 = $row['camfea1'];
        $camfea2 = $row['camfea2'];
        $camfea3 = $row['camfea3'];
        $camfea4 = $row['camfea4'];
        $camfea5 = $row['camfea5'];
        $vidrec1 = $row['vidrec1'];
        $vidrec2 = $row['vidrec2'];
        $vidrec3 = $row['vidrec3'];
        $vidrec4 = $row['vidrec4'];
        $fcamset = $row['fcamset'];
        $fres = $row['fres'];
        $fresfl = $row['fresfl'];
        $faf = $row['faf'];
        $frflash = $row['frflash'];
        $fvidrec1 = $row['fvidrec1'];
        $fvidrec2 = $row['fvidrec2'];
        // Battery
        $cap = $row['cap'];
        $typ = $row['typ'];
        $remove = $row['remove'];
        $talktime = $row['talktime'];
        $wcharge = $row['wcharge'];
        $qcharge = $row['qcharge'];
        // Storage
        $userstore = $row['userstore'];
        $usbotg = $row['usbotg'];
        $usbc = $row['usbc'];
        $intmem = $row['intmem'];
        $expmem = $row['expmem'];
        $storetype = $row['storetype'];
        // Network & Connectivity
        $simslot = $row['simslot'];
        $simsize = $row['simsize'];
        $netsupp = $row['netsupp'];
        $volt = $row['volt'];
        $sim4g = $row['sim4g'];
        $sim3g = $row['sim3g'];
        $sim2g = $row['sim2g'];
        $gprs = $row['gprs'];
        $edge = $row['edge'];
        $sim24g = $row['sim24g'];
        $sim23g = $row['sim23g'];
        $sim22g = $row['sim22g'];
        $gprs2 = $row['gprs2'];
        $edge2 = $row['edge2'];
        $wifi = $row['wifi'];
        $wififea = $row['wififea'];
        $wificall = $row['wificall'];
        $blue = $row['blue'];
        $gps = $row['gps'];
        $nfc = $row['nfc'];
        $usbconn = $row['usbconn'];
        // Multimedia
        $fmr = $row['fmr'];
        $loud = $row['loud'];
        $audjack = $row['audjack'];
        $audfea = $row['audfea'];
        // Sensors
        $finger = $row['finger'];
        $fingerPos = $row['fingerPos'];
        $fingerType = $row['fingerType'];
        $faceunlock = $row['faceunlock'];
        $othersens = $row['othersens'];

        // Tablet
        // Performance KS
        $tperfks1 = $row['tperfks1'];
        $tperfks2 = $row['tperfks2'];
        $tperfks3 = $row['tperfks3'];
        // Display
        $tdispks1 = $row['tdispks1'];
        $tdispks2 = $row['tdispks2'];
        $tdispks3 = $row['tdispks3'];
        // Camera
        $tcameks1 = $row['tcameks1'];
        $tcameks2 = $row['tcameks2'];
        $tcameks3 = $row['tcameks3'];
        // Battery
        $tbatks1 = $row['tbatks1'];
        $tbatks2 = $row['tbatks2'];
        $tbatks3 = $row['tbatks3'];
        // General
        $tldate = $row['tldate'];
        $tcui = $row['tcui'];
        // Design
        $theight = $row['theight'];
        $twidth = $row['twidth'];
        $tthick = $row['tthick'];
        $tweight = $row['tweight'];
        $tbuildM = $row['tbuildM'];
        $tcolor = $row['tcolor'];
        // Display
        $tscreenSize = $row['tscreenSize'];
        $tactualscreen = $row['tactualscreen'];
        $tscreenRes = $row['tscreenRes'];
        $tpixDen = $row['tpixDen'];
        $tdisType = $row['tdisType'];
        $tscreenP = $row['tscreenP'];
        $ttouchScreen = $row['ttouchScreen'];
        $tscreenRatio = $row['tscreenRatio'];
        // Performance
        $tchip = $row['tchip'];
        $tchipName = $row['tchipName'];
        $tPcore = $row['tPcore'];
        $tprocess = $row['tprocess'];
        $tarchi = $row['tarchi'];
        $tgraph = $row['tgraph'];
        $tram = $row['tram'];
        // Storage
        $tintMem = $row['tintMem'];
        $texpMem = $row['texpMem'];
        $tuserStore = $row['tuserStore'];
        $tusbotg = $row['tusbotg'];
        // Camera
        $tmaincam = $row['tmaincam'];
        $tres1 = $row['tres1'];
        $tresfl1 = $row['tresfl1'];
        $tres2 = $row['tres2'];
        $tresfl2 = $row['tresfl2'];
        $tres3 = $row['tres3'];
        $tresfl3 = $row['tresfl3'];
        $tres4 = $row['tres4'];
        $tresfl4 = $row['tresfl4'];
        $taf = $row['taf'];
        $tflash = $row['tflash'];
        $timgRes = $row['timgRes'];
        $tsett = $row['tsett'];
        $tshootmode1 = $row['tshootmode1'];
        $tshootmode2 = $row['tshootmode2'];
        $tshootmode3 = $row['tshootmode3'];
        $tcamFea1 = $row['tcamFea1'];
        $tcamFea2 = $row['tcamFea2'];
        $tcamFea3 = $row['tcamFea3'];
        $tcamFea4 = $row['tcamFea4'];
        $tcamFea5 = $row['tcamFea5'];
        $tvidRec1 = $row['tvidRec1'];
        $tvidRec2 = $row['tvidRec2'];
        $tvidRec3 = $row['tvidRec3'];
        $tfcam = $row['tfcam'];
        $tfres1 = $row['tfres1'];
        $tfresfl1 = $row['tfresfl1'];
        $tfres2 = $row['tfres2'];
        $tfresfl2 = $row['tfresfl2'];
        $tfflash = $row['tfflash'];
        $tfvidrec1 = $row['tfvidrec1'];
        $tfvidrec2 = $row['tfvidrec2'];
        // Battery
        $tcap = $row['tcap'];
        $ttype = $row['ttype'];
        $tuserR = $row['tuserR'];
        $tquickC = $row['tquickC'];
        $tusbC = $row['tusbC'];
        // Network & Connectivity
        $tsimsize = $row['tsimsize'];
        $tnetsupp = $row['tnetsupp'];
        $tvolt = $row['tvolt'];
        $tsim4g = $row['tsim4g'];
        $tsim3g = $row['tsim3g'];
        $tsim2g = $row['tsim2g'];
        $tgprs = $row['tgprs'];
        $tedge = $row['tedge'];
        $tvoiceCall = $row['tvoiceCall'];
        $twifi = $row['twifi'];
        $twifiFea = $row['twifiFea'];
        $tblue = $row['tblue'];
        $tnfc = $row['tnfc'];
        $tusbConn = $row['tusbConn'];
        $thdmi = $row['thdmi'];
        // Multimedia
        $tfmr = $row['tfmr'];
        $taudioJ = $row['taudioJ'];
        $taudioF = $row['taudioF'];
        // Special Features
        $tfinger = $row['tfinger'];
        $tfingerPos = $row['tfingerPos'];
        $totherSens = $row['totherSens'];

        // Laptop
        // Performance KS
        $lperfks1 = $row['lperfks1'];
        $lperfks2 = $row['lperfks2'];
        $lperfks3 = $row['lperfks3'];
        // Design
        $desiks1 = $row['desiks1'];
        $desiks2 = $row['desiks2'];
        $desiks3 = $row['desiks3'];
        // Storage
        $storks1 = $row['storks1'];
        $storks2 = $row['storks2'];
        $storks3 = $row['storks3'];
        // Battery
        $lbatks1 = $row['lbatks1'];
        $lbatks2 = $row['lbatks2'];
        $lbatks3 = $row['lbatks3'];
        // General Information
        $lmodel = $row['lmodel'];
        $ldimen = $row['ldimen'];
        $lweight = $row['lweight'];
        $lcolor = $row['lcolor'];
        $lostype = $row['lostype'];
        $lultrabook = $row['lultrabook'];
        $lconvertible = $row['lconvertible'];
        $ldetachable = $row['ldetachable'];
        // Display Details
        $ldisSize = $row['ldisSize'];
        $lactualdisSize = $row['lactualdisSize'];
        $ldisRes = $row['ldisRes'];
        $lpixden = $row['lpixden'];
        $ldisType = $row['ldisType'];
        $ldisFea = $row['ldisFea'];
        $ldisTouch = $row['ldisTouch'];
        // Performance
        $lprocess = $row['lprocess'];
        $lprocessCSpeed = $row['lprocessCSpeed'];
        $lgraphProcess = $row['lgraphProcess'];
        $lgraphM = $row['lgraphM'];
        $lgraphActMem = $row['lgraphActMem'];
        $lprocessortype = $row['lprocessortype'];
        $lprocessorGen = $row['lprocessorGen'];
        // Memory
        $lcapacity = $row['lcapacity'];
        $lramType = $row['lramType'];
        $lmemSlot = $row['lmemSlot'];
        $lmemLayout = $row['lmemLayout'];
        $lmemoryexpand = $row['lmemoryexpand'];
        // Storage
        $lstoreageC = $row['lstoreageC'];
        $lstoragetype = $row['lstoragetype'];
        // Battery
        $lbatType = $row['lbatType'];
        $lpowS = $row['lpowS'];
        $lbatLife = $row['lbatLife'];
        // Networking
        $lwireLAN = $row['lwireLAN'];
        $lblue = $row['lblue'];
        $lblueV = $row['lblueV'];
        // Ports
        $lusb3 = $row['lusb3'];
        $lusb2 = $row['lusb2'];
        $lHDMI = $row['lHDMI'];
        $llockPort = $row['llockPort'];
        $lusbtypeC = $row['lusbtypeC'];
        $lsdCard = $row['lsdCard'];
        $lheadJ = $row['lheadJ'];
        $lmicroJ = $row['lmicroJ'];
        // Multimedia
        $lwebC = $row['lwebC'];
        $lvidRec = $row['lvidRec'];
        $lsecondC = $row['lsecondC'];
        $lspeaker = $row['lspeaker'];
        $lsoundTech = $row['lsoundTech'];
        $lmicro = $row['lmicro'];
        $lmicroType = $row['lmicroType'];
        $lotherControl = $row['lotherControl'];
        // Peripherals
        $loptD = $row['loptD'];
        $lpoiD = $row['lpoiD'];
        $lkey = $row['lkey'];
        $lbacklit = $row['lbacklit'];
        $lfinger = $row['lfinger'];
        $lfaceunlock = $row['lfaceunlock'];
        // Others
        $lwarranty = $row['lwarranty'];
        $lsalesP = $row['lsalesP'];

        // Audios
        // Design
        $adesiks1 = $row['adesiks1'];
        $adesiks2 = $row['adesiks2'];
        $adesiks3 = $row['adesiks3'];
        // Features
        $afeaks1 = $row['afeaks1'];
        $afeaks2 = $row['afeaks2'];
        $afeaks3 = $row['afeaks3'];
        // Battery
        $abatks1 = $row['abatks1'];
        $abatks2 = $row['abatks2'];
        $abatks3 = $row['abatks3'];
        // General
        $aboxC = $row['aboxC'];
        // Design
        $atype = $row['atype'];
        $adesign = $row['adesign'];
        $aopenCloseB = $row['aopenCloseB'];
        $afit = $row['afit'];
        // Performance
        $adriver = $row['adriver'];
        $aImpedance = $row['aImpedance'];
        $aSensitivity = $row['aSensitivity'];
        $afreqRange = $row['afreqRange'];
        // Physical Design
        $aearbudDim = $row['aearbudDim'];
        $aearbudWei = $row['aearbudWei'];
        $acaseDim = $row['acaseDim'];
        $acaseWei = $row['acaseWei'];
        $adura = $row['adura'];
        $acableLen = $row['acableLen'];
        $acol = $row['acol'];
        // Features
        $anoise = $row['anoise'];
        $acall = $row['acall'];
        $amusic = $row['amusic'];
        $aambient = $row['aambient'];
        $aother = $row['aother'];
        // Connectivity
        $aconn = $row['aconn'];
        $ablueV = $row['ablueV'];
        $ablueRange = $row['ablueRange'];
        // Microphone
        $amicroI = $row['amicroI'];
        $amicroN = $row['amicroN'];
        // Battery
        $aplay = $row['aplay'];
        $abattcapE = $row['abattcapE'];
        $abattcapC = $row['abattcapC'];
        // Compatibility
        $acompatM = $row['acompatM'];

        // Watch
        // Design
        $wdesiks1 = $row['wdesiks1'];
        $wdesiks2 = $row['wdesiks2'];
        $wdesiks3 = $row['wdesiks3'];
        // Display
        $wdisks1 = $row['wdisks1'];
        $wdisks2 = $row['wdisks2'];
        $wdisks3 = $row['wdisks3'];
        // Features
        $wfeaks1 = $row['wfeaks1'];
        $wfeaks2 = $row['wfeaks2'];
        $wfeaks3 = $row['wfeaks3'];
        // Battery
        $wbatks1 = $row['wbatks1'];
        $wbatks2 = $row['wbatks2'];
        $wbatks3 = $row['wbatks3'];
        // General
        $wops = $row['wops'];
        $wboxC = $row['wboxC'];
        // Design
        $wshapeS = $row['wshapeS'];
        $wdim = $row['wdim'];
        $wwei = $row['wwei'];
        $wbodyM = $row['wbodyM'];
        $wstrapM = $row['wstrapM'];
        $wcol = $row['wcol'];
        $wchangeStrap = $row['wchangeStrap'];
        // Display
        $wscreenSize = $row['wscreenSize'];
        $wscreenRes = $row['wscreenRes'];
        $wpixD = $row['wpixD'];
        $wdisT = $row['wdisT'];
        $wtouchScreen = $row['wtouchScreen'];
        // Compatibility
        $wcompOS = $row['wcompOS'];
        // Battery
        $wbattCap = $row['wbattCap'];
        $wusageH = $row['wusageH'];
        $wusagetype = $row['wusagetype'];
        $wchargeM = $row['wchargeM'];
        // Connectivity
        $wblueI = $row['wblueI'];
        $wblue = $row['wblue'];
        $wwirePI = $row['wwirePI'];
        $wwireP = $row['wwireP'];
        $wsimI = $row['wsimI'];
        $wsim = $row['wsim'];
        $wusbCI = $row['wusbCI'];
        $wusbC = $row['wusbC'];
        $wnfcI = $row['wnfcI'];
        $wnavI = $row['wnavI'];
        $wnav = $row['wnav'];
        // Sensors
        $wacc = $row['wacc'];
        $wgyro = $row['wgyro'];
        $wlight = $row['wlight'];
        $wgpsI = $row['wgpsI'];
        $wgps = $row['wgps'];
        // Hardware
        $wprocess = $row['wprocess'];
        $wram = $row['wram'];
        $wintMem = $row['wintMem'];
        // Notifications
        $wtextM = $row['wtextM'];
        $wincomeCall = $row['wincomeCall'];
        $walarm = $row['walarm'];
        $wcalR = $row['wcalR'];
        $wtime = $row['wtime'];
        $wweather = $row['wweather'];
        // Smartphone Remote Features
        $wmakeCall = $row['wmakeCall'];
        $wcameraS = $row['wcameraS'];
        // Activity Tracker
        $wcal = $row['wcal'];
        $wstep = $row['wstep'];
        $wsleep = $row['wsleep'];
        $whours = $row['whours'];
        $wwheart = $row['wwheart'];
        $wdistance = $row['wdistance'];
        // Multimedia
        $wspeak = $row['wspeak'];
        // Features
        $wwaterResI = $row['wwaterResI'];
        $wwaterRes = $row['wwaterRes'];
        $wvoiceCI = $row['wvoiceCI'];
        $wvoiceC = $row['wvoiceC'];
        // Additional Features
        $walarmC = $row['walarmC'];
        $wremind = $row['wremind'];
        $wstopW = $row['wstopW'];

        // Television
        // Display
        $tvdisks1 = $row['tvdisks1'];
        $tvdisks2 = $row['tvdisks2'];
        $tvdisks3 = $row['tvdisks3'];
        // Features
        $tvfeaks1 = $row['tvfeaks1'];
        $tvfeaks2 = $row['tvfeaks2'];
        $tvfeaks3 = $row['tvfeaks3'];
        // Connectivity
        $tvconks1 = $row['tvconks1'];
        $tvconks2 = $row['tvconks2'];
        $tvconks3 = $row['tvconks3'];
        // Smart Features
        $tvsmfeaks1 = $row['tvsmfeaks1'];
        $tvsmfeaks2 = $row['tvsmfeaks2'];
        $tvsmfeaks3 = $row['tvsmfeaks3'];
        // General
        $tvseries = $row['tvseries'];
        $tvwarranty = $row['tvwarranty'];
        $tvboxC = $row['tvboxC'];
        // Display
        $tvtype = $row['tvtype'];
        $tvdistype = $row['tvdistype'];
        $tvsize = $row['tvsize'];
        $tvreso = $row['tvreso'];
        $tvresoFilter = $row['tvresoFilter'];
        $tvRefRate = $row['tvRefRate'];
        $tvaspRatio = $row['tvaspRatio'];
        $tvhoriView = $row['tvhoriView'];
        $tvvertView = $row['tvvertView'];
        $tv3D = $row['tv3D'];
        $tvcurved = $row['tvcurved'];
        $tvultraSlim = $row['tvultraSlim'];
        $tvotherDispFea = $row['tvotherDispFea'];
        $tvcolor = $row['tvcolor'];
        // Physical Design
        $tvweight = $row['tvweight'];
        $tvweightStand = $row['tvweightStand'];
        $tvdimStand = $row['tvdimStand'];
        $tvdim = $row['tvdim'];
        $tvstandType = $row['tvstandType'];
        $tvstandColor = $row['tvstandColor'];
        $tvstandFea = $row['tvstandFea'];
        $tvwllMountDim = $row['tvwllMountDim'];
        // Video
        $tvdigitalRF = $row['tvdigitalRF'];
        $tvvideoF = $row['tvvideoF'];
        $tvimageF = $row['tvimageF'];
        $tvupscale = $row['tvupscale'];
        // Audio
        $tvsoundtype = $row['tvsoundtype'];
        $tvsoundTech = $row['tvsoundTech'];
        $tvaudioF = $row['tvaudioF'];
        $tvtotalSO = $row['tvtotalSO'];
        $tvspeakerF = $row['tvspeakerF'];
        $tvotherSA = $row['tvotherSA'];
        // Connectivity/Ports
        $tvusbP = $row['tvusbP'];
        $tvusbS = $row['tvusbS'];
        $tvhdmi = $row['tvhdmi'];
        $tvdigitalOA = $row['tvdigitalOA'];
        $tvrfI = $row['tvrfI'];
        $tvethernetS = $row['tvethernetS'];
        // Smart TV Features
        $tvsmartv = $row['tvsmartv'];
        $tvandroid = $row['tvandroid'];
        $tvwifiP = $row['tvwifiP'];
        $tvwifiD = $row['tvwifiD'];
        $tvmiracast = $row['tvmiracast'];
        $tvblue = $row['tvblue'];
        $tvblueV = $row['tvblueV'];
        $tvinbuiltI = $row['tvinbuiltI'];
        $tvinbuiltA = $row['tvinbuiltA'];
        $tvfacebook = $row['tvfacebook'];
        $tvgame = $row['tvgame'];
        $tvvoice = $row['tvvoice'];
        $tvotherSF = $row['tvotherSF'];
        // Remote
        $tvinternetA = $row['tvinternetA'];
        // Power Supply
        $tvvolt = $row['tvvolt'];
        $tvfreq = $row['tvfreq'];
        $tvpowerCR = $row['tvpowerCR'];
        $tvpowerCS = $row['tvpowerCS'];

        $meta_keyword = $row['meta_keyword'];
        $image = $row['image'];
        $mrp = $row['mrp'];
        $url = $row['url'];
        $amazon_url = $row['amazon_url'];
        $amazon_mrp = $row['amazon_mrp'];
        $flipkart_url = $row['flipkart_url'];
        $flipkart_mrp = $row['flipkart_mrp'];
        $croma_url = $row['croma_url'];
        $croma_mrp = $row['croma_mrp'];

        $resMultipleImage = mysqli_query($con, "select id,product_images from product_images where product_id='$id'");
        if (mysqli_num_rows($resMultipleImage) > 0) {
            $jj = 0;
            while ($rowMultipleImage = mysqli_fetch_assoc($resMultipleImage)) {
                $multipleImageArr[$jj]['product_images'] = $rowMultipleImage['product_images'];
                $multipleImageArr[$jj]['id'] = $rowMultipleImage['id'];
                $jj++;
            }
        }

        $resProductAttr = mysqli_query($con, "select * from product_attributes where product_id='$id'");
        $jj = 0;
        while ($rowProductAttr = mysqli_fetch_assoc($resProductAttr)) {
            $attrProduct[$jj]['product_id'] = $rowProductAttr['product_id'];
            $attrProduct[$jj]['variant_id'] = $rowProductAttr['variant_id'];
            $attrProduct[$jj]['pid'] = $rowProductAttr['pid'];
            $attrProduct[$jj]['id'] = $rowProductAttr['id'];
            $jj++;
        }
    } else {
        redirect('product.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $categories_id = get_safe_value($con, $_POST['categories_id']);
    $brand_id = get_safe_value($con, $_POST['brand_id']);
    $name = get_safe_value($con, $_POST['name']);
    if (isset($_POST['osv']) && isset($_POST['osicon'])) {
        $osv = get_safe_value($con, $_POST['osv']);
        $osicon = get_safe_value($con, $_POST['osicon']);
    }
    // Mobile
    // Performance KS
    $perfks1 = get_safe_value($con, $_POST['perfks1']);
    $perfks2 = get_safe_value($con, $_POST['perfks2']);
    $perfks3 = get_safe_value($con, $_POST['perfks3']);
    // Display
    $dispks1 = get_safe_value($con, $_POST['dispks1']);
    $dispks2 = get_safe_value($con, $_POST['dispks2']);
    $dispks3 = get_safe_value($con, $_POST['dispks3']);
    // Camera
    $cameks1 = get_safe_value($con, $_POST['cameks1']);
    $cameks2 = get_safe_value($con, $_POST['cameks2']);
    $cameks3 = get_safe_value($con, $_POST['cameks3']);
    // Battery
    $batks1 = get_safe_value($con, $_POST['batks1']);
    $batks2 = get_safe_value($con, $_POST['batks2']);
    $batks3 = get_safe_value($con, $_POST['batks3']);
    // Key Specs
    if (isset($_POST['ramemory'])) {
        $ramemory = get_safe_value($con, $_POST['ramemory']);
    }
    $process = get_safe_value($con, $_POST['process']);
    if (isset($_POST['mcamera'])) {
        $mcamera = get_safe_value($con, $_POST['mcamera']);
    }
    $rcam = get_safe_value($con, $_POST['rcam']);
    if (isset($_POST['fcam'])) {
        $fcam = get_safe_value($con, $_POST['fcam']);
    }
    $disp = get_safe_value($con, $_POST['disp']);
    // General
    $ldate = get_safe_value($con, $_POST['ldate']);
    $cui = get_safe_value($con, $_POST['cui']);
    // Performance
    $chip = get_safe_value($con, $_POST['chip']);
    $mchip = get_safe_value($con, $_POST['mchip']);
    $cpunit = get_safe_value($con, $_POST['cpunit']);
    if (isset($_POST['mprocessspeed'])) {
        $mprocessspeed = get_safe_value($con, $_POST['mprocessspeed']);
    }
    $mPCores = get_safe_value($con, $_POST['mPCores']);
    $archi = get_safe_value($con, $_POST['archi']);
    $fab = get_safe_value($con, $_POST['fab']);
    $graph = get_safe_value($con, $_POST['graph']);
    $ramtype = get_safe_value($con, $_POST['ramtype']);
    // Display
    $distype = get_safe_value($con, $_POST['distype']);
    $screensize = get_safe_value($con, $_POST['screensize']);
    if (isset($_POST['mscreensize'])) {
        $mscreensize = get_safe_value($con, $_POST['mscreensize']);
    }
    $disres = get_safe_value($con, $_POST['disres']);
    $aspratio = get_safe_value($con, $_POST['aspratio']);
    if (isset($_POST['pixden'])) {
        $pixden = get_safe_value($con, $_POST['pixden']);
    }
    $screenbody = get_safe_value($con, $_POST['screenbody']);
    $screenprot = get_safe_value($con, $_POST['screenprot']);
    $bezdisp = get_safe_value($con, $_POST['bezdisp']);
    $touchscreen = get_safe_value($con, $_POST['touchscreen']);
    $bright = get_safe_value($con, $_POST['bright']);
    $hd = get_safe_value($con, $_POST['hd']);
    $refrate = get_safe_value($con, $_POST['refrate']);
    // Design
    $hei = get_safe_value($con, $_POST['hei']);
    $wid = get_safe_value($con, $_POST['wid']);
    $thick = get_safe_value($con, $_POST['thick']);
    $weig = get_safe_value($con, $_POST['weig']);
    $buildM = get_safe_value($con, $_POST['buildM']);
    $col = get_safe_value($con, $_POST['col']);
    $water = get_safe_value($con, $_POST['water']);
    $rugg = get_safe_value($con, $_POST['rugg']);
    // Camera
    $camset = get_safe_value($con, $_POST['camset']);
    $res1 = get_safe_value($con, $_POST['res1']);
    $resfl1 = get_safe_value($con, $_POST['resfl1']);
    $res2 = get_safe_value($con, $_POST['res2']);
    $resfl2 = get_safe_value($con, $_POST['resfl2']);
    $res3 = get_safe_value($con, $_POST['res3']);
    $resfl3 = get_safe_value($con, $_POST['resfl3']);
    $res4 = get_safe_value($con, $_POST['res4']);
    $resfl4 = get_safe_value($con, $_POST['resfl4']);
    $sens = get_safe_value($con, $_POST['sens']);
    $af = get_safe_value($con, $_POST['af']);
    $oi = get_safe_value($con, $_POST['oi']);
    $flas = get_safe_value($con, $_POST['flas']);
    $imgres = get_safe_value($con, $_POST['imgres']);
    $sett = get_safe_value($con, $_POST['sett']);
    $shootmode1 = get_safe_value($con, $_POST['shootmode1']);
    $shootmode2 = get_safe_value($con, $_POST['shootmode2']);
    $shootmode3 = get_safe_value($con, $_POST['shootmode3']);
    $camfea1 = get_safe_value($con, $_POST['camfea1']);
    $camfea2 = get_safe_value($con, $_POST['camfea2']);
    $camfea3 = get_safe_value($con, $_POST['camfea3']);
    $camfea4 = get_safe_value($con, $_POST['camfea4']);
    $camfea5 = get_safe_value($con, $_POST['camfea5']);
    $vidrec1 = get_safe_value($con, $_POST['vidrec1']);
    $vidrec2 = get_safe_value($con, $_POST['vidrec2']);
    $vidrec3 = get_safe_value($con, $_POST['vidrec3']);
    $vidrec4 = get_safe_value($con, $_POST['vidrec4']);
    $fcamset = get_safe_value($con, $_POST['fcamset']);
    $fres = get_safe_value($con, $_POST['fres']);
    $fresfl = get_safe_value($con, $_POST['fresfl']);
    $faf = get_safe_value($con, $_POST['faf']);
    $frflash = get_safe_value($con, $_POST['frflash']);
    $fvidrec1 = get_safe_value($con, $_POST['fvidrec1']);
    $fvidrec2 = get_safe_value($con, $_POST['fvidrec2']);
    // Battery
    if (isset($_POST['cap'])) {
        $cap = get_safe_value($con, $_POST['cap']);
    }
    $typ = get_safe_value($con, $_POST['typ']);
    $remove = get_safe_value($con, $_POST['remove']);
    $talktime = get_safe_value($con, $_POST['talktime']);
    $wcharge = get_safe_value($con, $_POST['wcharge']);
    $qcharge = get_safe_value($con, $_POST['qcharge']);
    // Storage
    $userstore = get_safe_value($con, $_POST['userstore']);
    $usbotg = get_safe_value($con, $_POST['usbotg']);
    $usbc = get_safe_value($con, $_POST['usbc']);
    if (isset($_POST['intmem'])) {
        $intmem = get_safe_value($con, $_POST['intmem']);
    }
    $expmem = get_safe_value($con, $_POST['expmem']);
    $storetype = get_safe_value($con, $_POST['storetype']);
    // Network & Connectivity
    $simslot = get_safe_value($con, $_POST['simslot']);
    $simsize = get_safe_value($con, $_POST['simsize']);
    $netsupp = get_safe_value($con, $_POST['netsupp']);
    $volt = get_safe_value($con, $_POST['volt']);
    $sim4g = get_safe_value($con, $_POST['sim4g']);
    $sim3g = get_safe_value($con, $_POST['sim3g']);
    $sim2g = get_safe_value($con, $_POST['sim2g']);
    $gprs = get_safe_value($con, $_POST['gprs']);
    $edge = get_safe_value($con, $_POST['edge']);
    $sim24g = get_safe_value($con, $_POST['sim24g']);
    $sim23g = get_safe_value($con, $_POST['sim23g']);
    $sim22g = get_safe_value($con, $_POST['sim22g']);
    $gprs2 = get_safe_value($con, $_POST['gprs2']);
    $edge2 = get_safe_value($con, $_POST['edge2']);
    $wifi = get_safe_value($con, $_POST['wifi']);
    $wififea = get_safe_value($con, $_POST['wififea']);
    $wificall = get_safe_value($con, $_POST['wificall']);
    $blue = get_safe_value($con, $_POST['blue']);
    $gps = get_safe_value($con, $_POST['gps']);
    $nfc = get_safe_value($con, $_POST['nfc']);
    $usbconn = get_safe_value($con, $_POST['usbconn']);
    // Multimedia
    $fmr = get_safe_value($con, $_POST['fmr']);
    $loud = get_safe_value($con, $_POST['loud']);
    $audjack = get_safe_value($con, $_POST['audjack']);
    $audfea = get_safe_value($con, $_POST['audfea']);
    // Sensors
    $finger = get_safe_value($con, $_POST['finger']);
    $fingerPos = get_safe_value($con, $_POST['fingerPos']);
    if (isset($_POST['fingerType'])) {
        $fingerType = get_safe_value($con, $_POST['fingerType']);
    }
    $faceunlock = get_safe_value($con, $_POST['faceunlock']);
    $othersens = get_safe_value($con, $_POST['othersens']);

    // Tablet
    // Performance KS
    if (isset($_POST['tperfks1'])) {
        $tperfks1 = get_safe_value($con, $_POST['tperfks1']);
    }
    $tperfks2 = get_safe_value($con, $_POST['tperfks2']);
    $tperfks3 = get_safe_value($con, $_POST['tperfks3']);
    // Display
    $tdispks1 = get_safe_value($con, $_POST['tdispks1']);
    $tdispks2 = get_safe_value($con, $_POST['tdispks2']);
    $tdispks3 = get_safe_value($con, $_POST['tdispks3']);
    // Camera
    $tcameks1 = get_safe_value($con, $_POST['tcameks1']);
    $tcameks2 = get_safe_value($con, $_POST['tcameks2']);
    $tcameks3 = get_safe_value($con, $_POST['tcameks3']);
    // Battery
    $tbatks1 = get_safe_value($con, $_POST['tbatks1']);
    $tbatks2 = get_safe_value($con, $_POST['tbatks2']);
    $tbatks3 = get_safe_value($con, $_POST['tbatks3']);
    // General
    $tldate = get_safe_value($con, $_POST['tldate']);
    $tcui = get_safe_value($con, $_POST['tcui']);
    // Design
    $theight = get_safe_value($con, $_POST['theight']);
    $twidth = get_safe_value($con, $_POST['twidth']);
    $tthick = get_safe_value($con, $_POST['tthick']);
    $tweight = get_safe_value($con, $_POST['tweight']);
    $tbuildM = get_safe_value($con, $_POST['tbuildM']);
    $tcolor = get_safe_value($con, $_POST['tcolor']);
    // Display
    $tscreenSize = get_safe_value($con, $_POST['tscreenSize']);
    if (isset($_POST['tactualscreen'])) {
        $tactualscreen = get_safe_value($con, $_POST['tactualscreen']);
    }
    $tscreenRes = get_safe_value($con, $_POST['tscreenRes']);
    $tpixDen = get_safe_value($con, $_POST['tpixDen']);
    $tdisType = get_safe_value($con, $_POST['tdisType']);
    $tscreenP = get_safe_value($con, $_POST['tscreenP']);
    $ttouchScreen = get_safe_value($con, $_POST['ttouchScreen']);
    $tscreenRatio = get_safe_value($con, $_POST['tscreenRatio']);
    // Performance
    $tchip = get_safe_value($con, $_POST['tchip']);
    $tchipName = get_safe_value($con, $_POST['tchipName']);
    $tPcore = get_safe_value($con, $_POST['tPcore']);
    $tprocess = get_safe_value($con, $_POST['tprocess']);
    $tarchi = get_safe_value($con, $_POST['tarchi']);
    $tgraph = get_safe_value($con, $_POST['tgraph']);
    if (isset($_POST['tram'])) {
        $tram = get_safe_value($con, $_POST['tram']);
    }
    // Storage
    if (isset($_POST['tintMem'])) {
        $tintMem = get_safe_value($con, $_POST['tintMem']);
    }
    $texpMem = get_safe_value($con, $_POST['texpMem']);
    $tuserStore = get_safe_value($con, $_POST['tuserStore']);
    $tusbotg = get_safe_value($con, $_POST['tusbotg']);
    // Camera
    if (isset($_POST['tmaincam'])) {
        $tmaincam = get_safe_value($con, $_POST['tmaincam']);
    }
    $tres1 = get_safe_value($con, $_POST['tres1']);
    $tresfl1 = get_safe_value($con, $_POST['tresfl1']);
    $tres2 = get_safe_value($con, $_POST['tres2']);
    $tresfl2 = get_safe_value($con, $_POST['tresfl2']);
    $tres3 = get_safe_value($con, $_POST['tres3']);
    $tresfl3 = get_safe_value($con, $_POST['tresfl3']);
    $tres4 = get_safe_value($con, $_POST['tres4']);
    $tresfl4 = get_safe_value($con, $_POST['tresfl4']);
    $taf = get_safe_value($con, $_POST['taf']);
    $tflash = get_safe_value($con, $_POST['tflash']);
    $timgRes = get_safe_value($con, $_POST['timgRes']);
    $tsett = get_safe_value($con, $_POST['tsett']);
    $tshootmode1 = get_safe_value($con, $_POST['tshootmode1']);
    $tshootmode2 = get_safe_value($con, $_POST['tshootmode2']);
    $tshootmode3 = get_safe_value($con, $_POST['tshootmode3']);
    $tcamFea1 = get_safe_value($con, $_POST['tcamFea1']);
    $tcamFea2 = get_safe_value($con, $_POST['tcamFea2']);
    $tcamFea3 = get_safe_value($con, $_POST['tcamFea3']);
    $tcamFea4 = get_safe_value($con, $_POST['tcamFea4']);
    $tcamFea5 = get_safe_value($con, $_POST['tcamFea5']);
    $tvidRec1 = get_safe_value($con, $_POST['tvidRec1']);
    $tvidRec2 = get_safe_value($con, $_POST['tvidRec2']);
    $tvidRec3 = get_safe_value($con, $_POST['tvidRec3']);
    if (isset($_POST['tfcam'])) {
        $tfcam = get_safe_value($con, $_POST['tfcam']);
    }
    $tfres1 = get_safe_value($con, $_POST['tfres1']);
    $tfresfl1 = get_safe_value($con, $_POST['tfresfl1']);
    $tfres2 = get_safe_value($con, $_POST['tfres2']);
    $tfresfl2 = get_safe_value($con, $_POST['tfresfl2']);
    $tfflash = get_safe_value($con, $_POST['tfflash']);
    $tfvidrec1 = get_safe_value($con, $_POST['tfvidrec1']);
    $tfvidrec2 = get_safe_value($con, $_POST['tfvidrec2']);
    // Battery
    $tcap = get_safe_value($con, $_POST['tcap']);
    $ttype = get_safe_value($con, $_POST['ttype']);
    $tuserR = get_safe_value($con, $_POST['tuserR']);
    $tquickC = get_safe_value($con, $_POST['tquickC']);
    $tusbC = get_safe_value($con, $_POST['tusbC']);
    // Network & Connectivity
    $tsimsize = get_safe_value($con, $_POST['tsimsize']);
    $tnetsupp = get_safe_value($con, $_POST['tnetsupp']);
    $tvolt = get_safe_value($con, $_POST['tvolt']);
    $tsim4g = get_safe_value($con, $_POST['tsim4g']);
    $tsim3g = get_safe_value($con, $_POST['tsim3g']);
    $tsim2g = get_safe_value($con, $_POST['tsim2g']);
    $tgprs = get_safe_value($con, $_POST['tgprs']);
    $tedge = get_safe_value($con, $_POST['tedge']);
    $tvoiceCall = get_safe_value($con, $_POST['tvoiceCall']);
    $twifi = get_safe_value($con, $_POST['twifi']);
    $twifiFea = get_safe_value($con, $_POST['twifiFea']);
    $tblue = get_safe_value($con, $_POST['tblue']);
    $tnfc = get_safe_value($con, $_POST['tnfc']);
    $tusbConn = get_safe_value($con, $_POST['tusbConn']);
    $thdmi = get_safe_value($con, $_POST['thdmi']);
    // Multimedia
    $tfmr = get_safe_value($con, $_POST['tfmr']);
    $taudioJ = get_safe_value($con, $_POST['taudioJ']);
    $taudioF = get_safe_value($con, $_POST['taudioF']);
    // Special Features
    $tfinger = get_safe_value($con, $_POST['tfinger']);
    $tfingerPos = get_safe_value($con, $_POST['tfingerPos']);
    $totherSens = get_safe_value($con, $_POST['totherSens']);

    // Laptop
    // Performance KS
    $lperfks1 = get_safe_value($con, $_POST['lperfks1']);
    $lperfks2 = get_safe_value($con, $_POST['lperfks2']);
    $lperfks3 = get_safe_value($con, $_POST['lperfks3']);
    // Design
    $desiks1 = get_safe_value($con, $_POST['desiks1']);
    $desiks2 = get_safe_value($con, $_POST['desiks2']);
    $desiks3 = get_safe_value($con, $_POST['desiks3']);
    // Storage
    $storks1 = get_safe_value($con, $_POST['storks1']);
    $storks2 = get_safe_value($con, $_POST['storks2']);
    $storks3 = get_safe_value($con, $_POST['storks3']);
    // Battery
    $lbatks1 = get_safe_value($con, $_POST['lbatks1']);
    $lbatks2 = get_safe_value($con, $_POST['lbatks2']);
    $lbatks3 = get_safe_value($con, $_POST['lbatks3']);
    // General Information
    $lmodel = get_safe_value($con, $_POST['lmodel']);
    $ldimen = get_safe_value($con, $_POST['ldimen']);
    $lweight = get_safe_value($con, $_POST['lweight']);
    $lcolor = get_safe_value($con, $_POST['lcolor']);
    $lostype = get_safe_value($con, $_POST['lostype']);
    if (isset($_POST['lultrabook']) && isset($_POST['lconvertible']) && isset($_POST['ldetachable'])) {
        $lultrabook = get_safe_value($con, $_POST['lultrabook']);
        $lconvertible = get_safe_value($con, $_POST['lconvertible']);
        $ldetachable = get_safe_value($con, $_POST['ldetachable']);
    }
    // Display Details
    $ldisSize = get_safe_value($con, $_POST['ldisSize']);
    $lactualdisSize = get_safe_value($con, $_POST['lactualdisSize']);
    $ldisRes = get_safe_value($con, $_POST['ldisRes']);
    $lpixden = get_safe_value($con, $_POST['lpixden']);
    $ldisType = get_safe_value($con, $_POST['ldisType']);
    $ldisFea = get_safe_value($con, $_POST['ldisFea']);
    $ldisTouch = get_safe_value($con, $_POST['ldisTouch']);
    // Performance
    $lprocess = get_safe_value($con, $_POST['lprocess']);
    $lprocessCSpeed = get_safe_value($con, $_POST['lprocessCSpeed']);
    $lgraphProcess = get_safe_value($con, $_POST['lgraphProcess']);
    $lgraphM = get_safe_value($con, $_POST['lgraphM']);
    $lgraphActMem = get_safe_value($con, $_POST['lgraphActMem']);
    if (isset($_POST['lprocessortype'])) {
        $lprocessortype = get_safe_value($con, $_POST['lprocessortype']);
    }
    if (isset($_POST['lprocessorGen'])) {
        $lprocessorGen = get_safe_value($con, $_POST['lprocessorGen']);
    }
    // Memory
    $lcapacity = get_safe_value($con, $_POST['lcapacity']);
    $lramType = get_safe_value($con, $_POST['lramType']);
    $lmemSlot = get_safe_value($con, $_POST['lmemSlot']);
    $lmemLayout = get_safe_value($con, $_POST['lmemLayout']);
    $lmemoryexpand = get_safe_value($con, $_POST['lmemoryexpand']);
    // Storage
    $lstoreageC = get_safe_value($con, $_POST['lstoreageC']);
    if (isset($_POST['lstoragetype'])) {
        $lstoragetype = get_safe_value($con, $_POST['lstoragetype']);
    }
    // Battery
    $lbatType = get_safe_value($con, $_POST['lbatType']);
    $lpowS = get_safe_value($con, $_POST['lpowS']);
    $lbatLife = get_safe_value($con, $_POST['lbatLife']);
    // Networking
    $lwireLAN = get_safe_value($con, $_POST['lwireLAN']);
    $lblue = get_safe_value($con, $_POST['lblue']);
    $lblueV = get_safe_value($con, $_POST['lblueV']);
    // Ports
    $lusb3 = get_safe_value($con, $_POST['lusb3']);
    $lusb2 = get_safe_value($con, $_POST['lusb2']);
    $lHDMI = get_safe_value($con, $_POST['lHDMI']);
    $llockPort = get_safe_value($con, $_POST['llockPort']);
    $lusbtypeC = get_safe_value($con, $_POST['lusbtypeC']);
    $lsdCard = get_safe_value($con, $_POST['lsdCard']);
    $lheadJ = get_safe_value($con, $_POST['lheadJ']);
    $lmicroJ = get_safe_value($con, $_POST['lmicroJ']);
    // Multimedia
    $lwebC = get_safe_value($con, $_POST['lwebC']);
    $lvidRec = get_safe_value($con, $_POST['lvidRec']);
    $lsecondC = get_safe_value($con, $_POST['lsecondC']);
    $lspeaker = get_safe_value($con, $_POST['lspeaker']);
    $lsoundTech = get_safe_value($con, $_POST['lsoundTech']);
    $lmicro = get_safe_value($con, $_POST['lmicro']);
    $lmicroType = get_safe_value($con, $_POST['lmicroType']);
    $lotherControl = get_safe_value($con, $_POST['lotherControl']);
    // Peripherals
    $loptD = get_safe_value($con, $_POST['loptD']);
    $lpoiD = get_safe_value($con, $_POST['lpoiD']);
    $lkey = get_safe_value($con, $_POST['lkey']);
    $lbacklit = get_safe_value($con, $_POST['lbacklit']);
    $lfinger = get_safe_value($con, $_POST['lfinger']);
    $lfaceunlock = get_safe_value($con, $_POST['lfaceunlock']);
    // Others
    $lwarranty = get_safe_value($con, $_POST['lwarranty']);
    $lsalesP = get_safe_value($con, $_POST['lsalesP']);

    // Audios
    // Design
    $adesiks1 = get_safe_value($con, $_POST['adesiks1']);
    $adesiks2 = get_safe_value($con, $_POST['adesiks2']);
    $adesiks3 = get_safe_value($con, $_POST['adesiks3']);
    // Features
    $afeaks1 = get_safe_value($con, $_POST['afeaks1']);
    $afeaks2 = get_safe_value($con, $_POST['afeaks2']);
    $afeaks3 = get_safe_value($con, $_POST['afeaks3']);
    // Battery
    $abatks1 = get_safe_value($con, $_POST['abatks1']);
    $abatks2 = get_safe_value($con, $_POST['abatks2']);
    $abatks3 = get_safe_value($con, $_POST['abatks3']);
    // General
    $aboxC = get_safe_value($con, $_POST['aboxC']);
    // Design
    $atype = get_safe_value($con, $_POST['atype']);
    $adesign = get_safe_value($con, $_POST['adesign']);
    $aopenCloseB = get_safe_value($con, $_POST['aopenCloseB']);
    $afit = get_safe_value($con, $_POST['afit']);
    // Performance
    $adriver = get_safe_value($con, $_POST['adriver']);
    $aImpedance = get_safe_value($con, $_POST['aImpedance']);
    $aSensitivity = get_safe_value($con, $_POST['aSensitivity']);
    $afreqRange = get_safe_value($con, $_POST['afreqRange']);
    // Physical Design
    $aearbudDim = get_safe_value($con, $_POST['aearbudDim']);
    $aearbudWei = get_safe_value($con, $_POST['aearbudWei']);
    $acaseDim = get_safe_value($con, $_POST['acaseDim']);
    $acaseWei = get_safe_value($con, $_POST['acaseWei']);
    $adura = get_safe_value($con, $_POST['adura']);
    $acableLen = get_safe_value($con, $_POST['acableLen']);
    $acol = get_safe_value($con, $_POST['acol']);
    // Features
    if (isset($_POST['anoise']) && isset($_POST['acall']) && isset($_POST['amusic']) && isset($_POST['aambient']) && isset($_POST['aother'])) {
        $anoise = get_safe_value($con, $_POST['anoise']);
        $acall = get_safe_value($con, $_POST['acall']);
        $amusic = get_safe_value($con, $_POST['amusic']);
        $aambient = get_safe_value($con, $_POST['aambient']);
        $aother = get_safe_value($con, $_POST['aother']);
    }
    // Connectivity
    $aconn = get_safe_value($con, $_POST['aconn']);
    $ablueV = get_safe_value($con, $_POST['ablueV']);
    $ablueRange = get_safe_value($con, $_POST['ablueRange']);
    // Microphone
    if (isset($_POST['amicroI'])) {
        $amicroI = get_safe_value($con, $_POST['amicroI']);
    }
    $amicroN = get_safe_value($con, $_POST['amicroN']);
    // Battery
    $aplay = get_safe_value($con, $_POST['aplay']);
    $abattcapE = get_safe_value($con, $_POST['abattcapE']);
    $abattcapC = get_safe_value($con, $_POST['abattcapC']);
    // Compatibility
    $acompatM = get_safe_value($con, $_POST['acompatM']);

    // Watch
    // Design
    $wdesiks1 = get_safe_value($con, $_POST['wdesiks1']);
    $wdesiks2 = get_safe_value($con, $_POST['wdesiks2']);
    $wdesiks3 = get_safe_value($con, $_POST['wdesiks3']);
    // Display
    $wdisks1 = get_safe_value($con, $_POST['wdisks1']);
    $wdisks2 = get_safe_value($con, $_POST['wdisks2']);
    $wdisks3 = get_safe_value($con, $_POST['wdisks3']);
    // Features
    $wfeaks1 = get_safe_value($con, $_POST['wfeaks1']);
    $wfeaks2 = get_safe_value($con, $_POST['wfeaks2']);
    $wfeaks3 = get_safe_value($con, $_POST['wfeaks3']);
    // Battery
    $wbatks1 = get_safe_value($con, $_POST['wbatks1']);
    $wbatks2 = get_safe_value($con, $_POST['wbatks2']);
    $wbatks3 = get_safe_value($con, $_POST['wbatks3']);
    // General
    $wshapeS = get_safe_value($con, $_POST['wshapeS']);
    $wboxC = get_safe_value($con, $_POST['wboxC']);
    // Design
    $wdim = get_safe_value($con, $_POST['wdim']);
    $wwei = get_safe_value($con, $_POST['wwei']);
    $wbodyM = get_safe_value($con, $_POST['wbodyM']);
    $wstrapM = get_safe_value($con, $_POST['wstrapM']);
    $wcol = get_safe_value($con, $_POST['wcol']);
    if (isset($_POST['wchangeStrap'])) {
        $wchangeStrap = get_safe_value($con, $_POST['wchangeStrap']);
    }
    // Display
    $wops = get_safe_value($con, $_POST['wops']);
    $wscreenSize = get_safe_value($con, $_POST['wscreenSize']);
    $wscreenRes = get_safe_value($con, $_POST['wscreenRes']);
    $wpixD = get_safe_value($con, $_POST['wpixD']);
    $wdisT = get_safe_value($con, $_POST['wdisT']);
    $wtouchScreen = get_safe_value($con, $_POST['wtouchScreen']);
    // Compatibility
    $wcompOS = get_safe_value($con, $_POST['wcompOS']);
    // Battery
    $wbattCap = get_safe_value($con, $_POST['wbattCap']);
    $wusageH = get_safe_value($con, $_POST['wusageH']);
    if (isset($_POST['wusagetype'])) {
        $wusagetype = get_safe_value($con, $_POST['wusagetype']);
    }
    $wchargeM = get_safe_value($con, $_POST['wchargeM']);
    // Connectivity
    if (isset($_POST['wblueI']) && isset($_POST['wblue']) && isset($_POST['wwirePI']) && isset($_POST['wwireP']) && isset($_POST['wsimI']) && isset($_POST['wsim']) && isset($_POST['wusbCI']) && isset($_POST['wusbC']) && isset($_POST['wnfcI']) && isset($_POST['wnavI']) && isset($_POST['wnav'])) {
        $wblueI = get_safe_value($con, $_POST['wblueI']);
        $wblue = get_safe_value($con, $_POST['wblue']);
        $wwirePI = get_safe_value($con, $_POST['wwirePI']);
        $wwireP = get_safe_value($con, $_POST['wwireP']);
        $wsimI = get_safe_value($con, $_POST['wsimI']);
        $wsim = get_safe_value($con, $_POST['wsim']);
        $wusbCI = get_safe_value($con, $_POST['wusbCI']);
        $wusbC = get_safe_value($con, $_POST['wusbC']);
        $wnfcI = get_safe_value($con, $_POST['wnfcI']);
        $wnavI = get_safe_value($con, $_POST['wnavI']);
        $wnav = get_safe_value($con, $_POST['wnav']);
    }
    // Sensors
    if (isset($_POST['wacc']) && isset($_POST['wgyro']) && isset($_POST['wlight']) && isset($_POST['wgpsI']) && isset($_POST['wgps'])) {
        $wacc = get_safe_value($con, $_POST['wacc']);
        $wgyro = get_safe_value($con, $_POST['wgyro']);
        $wlight = get_safe_value($con, $_POST['wlight']);
        $wgpsI = get_safe_value($con, $_POST['wgpsI']);
        $wgps = get_safe_value($con, $_POST['wgps']);
    }
    // Hardware
    $wprocess = get_safe_value($con, $_POST['wprocess']);
    $wram = get_safe_value($con, $_POST['wram']);
    $wintMem = get_safe_value($con, $_POST['wintMem']);
    // Notifications
    if (isset($_POST['wtextM']) && isset($_POST['wincomeCall']) && isset($_POST['walarm']) && isset($_POST['wcalR']) && isset($_POST['wtime']) && isset($_POST['wweather'])) {
        $wtextM = get_safe_value($con, $_POST['wtextM']);
        $wincomeCall = get_safe_value($con, $_POST['wincomeCall']);
        $walarm = get_safe_value($con, $_POST['walarm']);
        $wcalR = get_safe_value($con, $_POST['wcalR']);
        $wtime = get_safe_value($con, $_POST['wtime']);
        $wweather = get_safe_value($con, $_POST['wweather']);
    }
    // Smartphone Remote Features
    if (isset($_POST['wmakeCall']) && isset($_POST['wcameraS'])) {
        $wmakeCall = get_safe_value($con, $_POST['wmakeCall']);
        $wcameraS = get_safe_value($con, $_POST['wcameraS']);
    }
    // Activity Tracker
    if (isset($_POST['wcal']) && isset($_POST['wstep']) && isset($_POST['wsleep']) && isset($_POST['whours']) && isset($_POST['wwheart']) && isset($_POST['wdistance'])) {
        $wcal = get_safe_value($con, $_POST['wcal']);
        $wstep = get_safe_value($con, $_POST['wstep']);
        $wsleep = get_safe_value($con, $_POST['wsleep']);
        $whours = get_safe_value($con, $_POST['whours']);
        $wwheart = get_safe_value($con, $_POST['wwheart']);
        $wdistance = get_safe_value($con, $_POST['wdistance']);
    }
    // Multimedia
    if (isset($_POST['wspeak'])) {
        $wspeak = get_safe_value($con, $_POST['wspeak']);
    }
    // Features
    if (isset($_POST['wwaterResI'])) {
        $wwaterResI = get_safe_value($con, $_POST['wwaterResI']);
    }
    $wwaterRes = get_safe_value($con, $_POST['wwaterRes']);
    if (isset($_POST['wvoiceCI'])) {
        $wvoiceCI = get_safe_value($con, $_POST['wvoiceCI']);
    }
    $wvoiceC = get_safe_value($con, $_POST['wvoiceC']);
    // Additional Features
    if (isset($_POST['walarmC']) && isset($_POST['wremind']) && isset($_POST['wstopW'])) {
        $walarmC = get_safe_value($con, $_POST['walarmC']);
        $wremind = get_safe_value($con, $_POST['wremind']);
        $wstopW = get_safe_value($con, $_POST['wstopW']);
    }

    // Television
    // Display
    $tvdisks1 = get_safe_value($con, $_POST['tvdisks1']);
    $tvdisks2 = get_safe_value($con, $_POST['tvdisks2']);
    $tvdisks3 = get_safe_value($con, $_POST['tvdisks3']);
    // Features
    $tvfeaks1 = get_safe_value($con, $_POST['tvfeaks1']);
    $tvfeaks2 = get_safe_value($con, $_POST['tvfeaks2']);
    $tvfeaks3 = get_safe_value($con, $_POST['tvfeaks3']);
    // Connectivity
    $tvconks1 = get_safe_value($con, $_POST['tvconks1']);
    $tvconks2 = get_safe_value($con, $_POST['tvconks2']);
    $tvconks3 = get_safe_value($con, $_POST['tvconks3']);
    // Smart Features
    $tvsmfeaks1 = get_safe_value($con, $_POST['tvsmfeaks1']);
    $tvsmfeaks2 = get_safe_value($con, $_POST['tvsmfeaks2']);
    $tvsmfeaks3 = get_safe_value($con, $_POST['tvsmfeaks3']);
    // General
    $tvseries = get_safe_value($con, $_POST['tvseries']);
    $tvwarranty = get_safe_value($con, $_POST['tvwarranty']);
    $tvboxC = get_safe_value($con, $_POST['tvboxC']);
    // Display
    $tvtype = get_safe_value($con, $_POST['tvtype']);
    if (isset($_POST['tvdistype'])) {
        $tvdistype = get_safe_value($con, $_POST['tvdistype']);
    }
    $tvsize = get_safe_value($con, $_POST['tvsize']);
    $tvreso = get_safe_value($con, $_POST['tvreso']);
    if (isset($_POST['tvresoFilter'])) {
        $tvresoFilter = get_safe_value($con, $_POST['tvresoFilter']);
    }
    $tvRefRate = get_safe_value($con, $_POST['tvRefRate']);
    $tvaspRatio = get_safe_value($con, $_POST['tvaspRatio']);
    $tvhoriView = get_safe_value($con, $_POST['tvhoriView']);
    $tvvertView = get_safe_value($con, $_POST['tvvertView']);
    if (isset($_POST['tv3D']) && isset($_POST['tvcurved']) && isset($_POST['tvultraSlim'])) {
        $tv3D = get_safe_value($con, $_POST['tv3D']);
        $tvcurved = get_safe_value($con, $_POST['tvcurved']);
        $tvultraSlim = get_safe_value($con, $_POST['tvultraSlim']);
    }
    $tvotherDispFea = get_safe_value($con, $_POST['tvotherDispFea']);
    // Physical Design
    $tvcolor = get_safe_value($con, $_POST['tvcolor']);
    $tvweight = get_safe_value($con, $_POST['tvweight']);
    $tvweightStand = get_safe_value($con, $_POST['tvweightStand']);
    $tvdimStand = get_safe_value($con, $_POST['tvdimStand']);
    $tvdim = get_safe_value($con, $_POST['tvdim']);
    $tvstandType = get_safe_value($con, $_POST['tvstandType']);
    $tvstandColor = get_safe_value($con, $_POST['tvstandColor']);
    $tvstandFea = get_safe_value($con, $_POST['tvstandFea']);
    $tvwllMountDim = get_safe_value($con, $_POST['tvwllMountDim']);
    // Video
    $tvdigitalRF = get_safe_value($con, $_POST['tvdigitalRF']);
    $tvvideoF = get_safe_value($con, $_POST['tvvideoF']);
    $tvimageF = get_safe_value($con, $_POST['tvimageF']);
    $tvupscale = get_safe_value($con, $_POST['tvupscale']);
    // Audio
    $tvsoundtype = get_safe_value($con, $_POST['tvsoundtype']);
    $tvsoundTech = get_safe_value($con, $_POST['tvsoundTech']);
    $tvaudioF = get_safe_value($con, $_POST['tvaudioF']);
    $tvtotalSO = get_safe_value($con, $_POST['tvtotalSO']);
    $tvspeakerF = get_safe_value($con, $_POST['tvspeakerF']);
    $tvotherSA = get_safe_value($con, $_POST['tvotherSA']);
    // Connectivity/Ports
    $tvusbP = get_safe_value($con, $_POST['tvusbP']);
    $tvusbS = get_safe_value($con, $_POST['tvusbS']);
    $tvhdmi = get_safe_value($con, $_POST['tvhdmi']);
    $tvdigitalOA = get_safe_value($con, $_POST['tvdigitalOA']);
    $tvrfI = get_safe_value($con, $_POST['tvrfI']);
    $tvethernetS = get_safe_value($con, $_POST['tvethernetS']);
    // Smart TV Features
    if (isset($_POST['tvsmartv']) && isset($_POST['tvandroid']) && isset($_POST['tvwifiP']) && isset($_POST['tvwifiD']) && isset($_POST['tvmiracast']) && isset($_POST['tvblue']) && isset($_POST['tvinbuiltI']) && isset($_POST['tvfacebook']) && isset($_POST['tvgame']) && isset($_POST['tvvoice'])) {
        $tvsmartv = get_safe_value($con, $_POST['tvsmartv']);
        $tvandroid = get_safe_value($con, $_POST['tvandroid']);
        $tvwifiP = get_safe_value($con, $_POST['tvwifiP']);
        $tvwifiD = get_safe_value($con, $_POST['tvwifiD']);
        $tvmiracast = get_safe_value($con, $_POST['tvmiracast']);
        $tvblue = get_safe_value($con, $_POST['tvblue']);
        $tvinbuiltI = get_safe_value($con, $_POST['tvinbuiltI']);
        $tvfacebook = get_safe_value($con, $_POST['tvfacebook']);
        $tvgame = get_safe_value($con, $_POST['tvgame']);
        $tvvoice = get_safe_value($con, $_POST['tvvoice']);
    }
    $tvblueV = get_safe_value($con, $_POST['tvblueV']);
    $tvinbuiltA = get_safe_value($con, $_POST['tvinbuiltA']);
    $tvotherSF = get_safe_value($con, $_POST['tvotherSF']);
    // Remote
    if (isset($_POST['tvinternetA'])) {
        $tvinternetA = get_safe_value($con, $_POST['tvinternetA']);
    }
    // Power Supply
    $tvvolt = get_safe_value($con, $_POST['tvvolt']);
    $tvfreq = get_safe_value($con, $_POST['tvfreq']);
    $tvpowerCR = get_safe_value($con, $_POST['tvpowerCR']);
    $tvpowerCS = get_safe_value($con, $_POST['tvpowerCS']);

    $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);
    $mrp = get_safe_value($con, $_POST['mrp']);
    $url = get_safe_value($con, $_POST['url']);
    $amazon_url = get_safe_value($con, $_POST['amazon_url']);
    $amazon_mrp = get_safe_value($con, $_POST['amazon_mrp']);
    $flipkart_url = get_safe_value($con, $_POST['flipkart_url']);
    $flipkart_mrp = get_safe_value($con, $_POST['flipkart_mrp']);
    $croma_url = get_safe_value($con, $_POST['croma_url']);
    $croma_mrp = get_safe_value($con, $_POST['croma_mrp']);
    $added_on = date('Y-m-d');

    $res = mysqli_query($con, "select * from product where name='$name'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Product already exist";
            }
        } else {
            $msg = "Product already exist";
        }
    }

    if (isset($_GET['id']) && $_GET['id'] == 0) {
        if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg' && $_FILES['image']['type'] != 'image/webp') {
            $msg = "Please select only png,jpg,jpeg and webp image formate";
        }
    } else {
        if ($_FILES['image']['type'] != '') {
            if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg' && $_FILES['image']['type'] != 'image/webp') {
                $msg = "Please select only png,jpg and jpeg image formate";
            }
        }
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] != '') {
                $image = date("d-m-Y") . "-" . time() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
                $update_sql = "update product set categories_id = '$categories_id', brand_id = '$brand_id', name = '$name', osv = '$osv', osicon = '$osicon', perfks1 = NULLIF('$perfks1', ''), perfks2 = NULLIF('$perfks2', ''), perfks3 = NULLIF('$perfks3', ''), dispks1 = NULLIF('$dispks1', ''), dispks2 = NULLIF('$dispks2', ''), dispks3 = NULLIF('$dispks3', ''), cameks1 = NULLIF('$cameks1', ''), cameks2 = NULLIF('$cameks2', ''), cameks3 = NULLIF('$cameks3', ''), batks1 = NULLIF('$batks1', ''), batks2 = NULLIF('$batks2', ''), batks3 = NULLIF('$batks3', ''), ramemory = NULLIF('$ramemory', ''), mcamera = NULLIF('$mcamera', ''), process = '$process', rcam = '$rcam', fcam = NULLIF('$fcam', ''), disp = NULLIF('$disp', ''), ldate = NULLIF('$ldate', ''), cui = NULLIF('$cui', ''), chip = NULLIF('$chip', ''), mchip = NULLIF('$mchip', ''), cpunit = NULLIF('$cpunit', ''), mprocessspeed = NULLIF('$mprocessspeed', ''), mPCores = NULLIF('$mPCores', ''), archi = NULLIF('$archi', ''), fab = NULLIF('$fab', ''), graph = NULLIF('$graph', ''), ramtype = NULLIF('$ramtype', ''), distype =  NULLIF('$distype', ''), screensize = NULLIF('$screensize', ''), mscreensize = NULLIF('$mscreensize', ''), disres = NULLIF('$disres', ''), aspratio = NULLIF('$aspratio', ''), pixden = NULLIF('$pixden', ''), screenbody = NULLIF('$screenbody', ''), screenprot = NULLIF('$screenprot', ''), bezdisp = NULLIF('$bezdisp', ''), touchscreen = NULLIF('$touchscreen', ''), bright = NULLIF('$bright', ''), hd = NULLIF('$hd', ''), refrate = NULLIF('$refrate', ''), hei = NULLIF('$hei', ''), wid = NULLIF('$wid', ''), thick = NULLIF('$thick', ''), weig = NULLIF('$weig', ''), buildM = NULLIF('$buildM', ''), col = NULLIF('$col', ''), water = NULLIF('$water', ''), rugg = NULLIF('$rugg', ''), camset = NULLIF('$camset', ''), res1 = NULLIF('$res1', ''), resfl1 = NULLIF('$resfl1', ''), res2 = NULLIF('$res2', ''), resfl2 = NULLIF('$resfl2', ''), res3 = NULLIF('$res3', ''), resfl3 = NULLIF('$resfl3', ''), res4 = NULLIF('$res4', ''), resfl4 = NULLIF('$resfl4', ''), sens = NULLIF('$sens', ''), af = NULLIF('$af', ''), oi = NULLIF('$oi', ''), flas = NULLIF('$flas', ''), imgres = NULLIF('$imgres', ''), sett = NULLIF('$sett', ''), shootmode1 = NULLIF('$shootmode1', ''), shootmode2 = NULLIF('$shootmode2', ''), shootmode3 = NULLIF('$shootmode3', ''), camfea1 = NULLIF('$camfea1', ''), camfea2 = NULLIF('$camfea2', ''), camfea3 = NULLIF('$camfea3', ''), camfea4 = NULLIF('$camfea4', ''), camfea5 = NULLIF('$camfea5', ''), vidrec1 = NULLIF('$vidrec1', ''), vidrec2 = NULLIF('$vidrec2', ''), vidrec3 = NULLIF('$vidrec3', ''), vidrec4 = NULLIF('$vidrec4', ''), fcamset = NULLIF('$fcamset', ''), fres = NULLIF('$fres', ''), fresfl = NULLIF('$fresfl', ''), faf = NULLIF('$faf', ''), frflash = NULLIF('$frflash', ''), fvidrec1 = NULLIF('$fvidrec1', ''), fvidrec2 = NULLIF('$fvidrec2', ''), cap = NULLIF('$cap', ''), typ = NULLIF('$typ', ''), remove = NULLIF('$remove', ''), talktime = NULLIF('$talktime', ''), wcharge = NULLIF('$wcharge', ''), qcharge = NULLIF('$qcharge', ''), userstore = '$userstore', usbotg = '$usbotg', usbc = '$usbc', intmem = NULLIF('$intmem', ''), expmem = '$expmem', storetype='$storetype', simslot = NULLIF('$simslot', ''), simsize = NULLIF('$simsize', ''), netsupp = NULLIF('$netsupp', ''), volt = NULLIF('$volt', ''), sim4g = NULLIF('$sim4g', ''), sim3g = NULLIF('$sim3g', ''), sim2g = NULLIF('$sim2g', ''), gprs = NULLIF('$gprs', ''), edge = NULLIF('$edge', ''), sim24g = NULLIF('$sim24g', ''), sim23g = NULLIF('$sim23g', ''), sim22g = NULLIF('$sim22g', ''), gprs2 = NULLIF('$gprs2', ''), edge2 = NULLIF('$edge2', ''), wifi = NULLIF('$wifi', ''), wififea = NULLIF('$wififea', ''), wificall = NULLIF('$wificall', ''), blue = NULLIF('$blue', ''), gps = NULLIF('$gps', ''), nfc = NULLIF('$nfc', ''), usbconn = NULLIF('$usbconn', ''), fmr = NULLIF('$fmr', ''), loud = NULLIF('$loud', ''), audjack = NULLIF('$audjack', ''), audfea = NULLIF('$audfea', ''), finger = NULLIF('$finger', ''), fingerPos = NULLIF('$fingerPos', ''), fingerType = NULLIF('$fingerType', ''), faceunlock = NULLIF('$faceunlock', ''), othersens = NULLIF('$othersens', ''), tperfks1 = NULLIF('$tperfks1', ''), tperfks2 = NULLIF('$tperfks2', ''), tperfks3 = NULLIF('$tperfks3', ''), tdispks1 = NULLIF('$tdispks1', ''), tdispks2 = NULLIF('$tdispks2', ''), tdispks3 = NULLIF('$tdispks3', ''), tcameks1 = NULLIF('$tcameks1', ''), tcameks2 = NULLIF('$tcameks2', ''), tcameks3 = NULLIF('$tcameks3', ''), tbatks1 = NULLIF('$tbatks1', ''), tbatks2 = NULLIF('$tbatks2', ''), tbatks3 = NULLIF('$tbatks3', ''), tldate = NULLIF('$tldate', ''), tcui = NULLIF('$tcui', ''), theight = NULLIF('$theight', ''), twidth = NULLIF('$twidth', ''), tthick = NULLIF('$tthick', ''), tweight = NULLIF('$tweight', ''), tbuildM = NULLIF('$tbuildM', ''), tcolor = NULLIF('$tcolor', ''), tscreenSize = NULLIF('$tscreenSize', ''), tactualscreen = NULLIF('$tactualscreen', ''), tscreenRes = NULLIF('$tscreenRes', ''), tpixDen = NULLIF('$tpixDen', ''), tdisType = NULLIF('$tdisType', ''), tscreenP = NULLIF('$tscreenP', ''), ttouchScreen = NULLIF('$ttouchScreen', ''), tscreenRatio = NULLIF('$tscreenRatio', ''), tchip = NULLIF('$tchip', ''), tchipName = NULLIF('$tchipName', ''), tPcore = NULLIF('$tPcore', ''), tprocess = NULLIF('$tprocess', ''), tarchi = NULLIF('$tarchi', ''), tgraph = NULLIF('$tgraph', ''), tram = NULLIF('$tram', ''), tintMem = NULLIF('$tintMem', ''), texpMem = NULLIF('$texpMem', ''), tuserStore = NULLIF('$tuserStore', ''), tusbotg = NULLIF('$tusbotg', ''), tmaincam = NULLIF('$tmaincam', ''), tres1 = NULLIF('$tres1', ''), tresfl1 = NULLIF('$tresfl1', ''), tres2 = NULLIF('$tres2', ''), tresfl2 = NULLIF('$tresfl2', ''), tres3 = NULLIF('$tres3', ''), tresfl3 = NULLIF('$tresfl3', ''), tres4 = NULLIF('$tres4', ''), tresfl4 = NULLIF('$tresfl4', ''), taf = NULLIF('$taf', ''), tflash = NULLIF('$tflash', ''), timgRes = NULLIF('$timgRes', ''), tsett = NULLIF('$tsett', ''), tshootmode1 = NULLIF('$tshootmode1', ''), tshootmode2 = NULLIF('$tshootmode2', ''), tshootmode3 = NULLIF('$tshootmode3', ''), tcamFea1 = NULLIF('$tcamFea1', ''), tcamFea2 = NULLIF('$tcamFea2', ''), tcamFea3 = NULLIF('$tcamFea3', ''), tcamFea4 = NULLIF('$tcamFea4', ''), tcamFea5 = NULLIF('$tcamFea5', ''), tvidRec1 = NULLIF('$tvidRec1', ''), tvidRec2 = NULLIF('$tvidRec2', ''), tvidRec3 = NULLIF('$tvidRec3', ''), tfcam = NULLIF('$tfcam', ''), tfres1 = NULLIF('$tfres1', ''), tfresfl1 = NULLIF('$tfresfl1', ''), tfres2 = NULLIF('$tfres2', ''), tfresfl2 = NULLIF('$tfresfl2', ''), tfflash = NULLIF('$tfflash', ''), tfvidrec1 = NULLIF('$tfvidrec1', ''),  tfvidrec2 = NULLIF('$tfvidrec2', ''), tcap = NULLIF('$tcap', ''), ttype = '$ttype', tuserR = '$tuserR', tquickC = '$tquickC', tusbC = '$tusbC', tsimsize = '$tsimsize', tnetsupp = NULLIF('$tnetsupp', ''), tvolt = NULLIF('$tvolt', ''), tsim4g = NULLIF('$tsim4g', ''), tsim3g = NULLIF('$tsim3g', ''), tsim2g = NULLIF('$tsim2g', ''), tgprs = NULLIF('$tgprs', ''), tedge = NULLIF('$tedge', ''), tvoiceCall = NULLIF('$tvoiceCall', ''), twifi = NULLIF('$twifi', ''), twifiFea = NULLIF('$twifiFea', ''), tblue = NULLIF('$tblue', ''), tnfc = NULLIF('$tnfc', ''), tusbConn = NULLIF('$tusbConn', ''), thdmi = NULLIF('$thdmi', ''), tfmr = NULLIF('$tfmr', ''), taudioJ = NULLIF('$taudioJ', ''), taudioF = NULLIF('$taudioF', ''), tfinger = NULLIF('$tfinger', ''), tfingerPos = NULLIF('$tfingerPos', ''), totherSens = NULLIF('$totherSens', ''), lperfks1 = NULLIF('$lperfks1', ''), lperfks2 = NULLIF('$lperfks2', ''), lperfks3 = NULLIF('$lperfks3', ''), desiks1 = NULLIF('$desiks1', ''), desiks2 = NULLIF('$desiks2', ''), desiks3 = NULLIF('$desiks3', ''), storks1 = NULLIF('$storks1', ''), storks2 = NULLIF('$storks2', ''), storks3 = NULLIF('$storks3', ''), lbatks1 = NULLIF('$lbatks1', ''), lbatks2 = NULLIF('$lbatks2', ''), lbatks3 = NULLIF('$lbatks3', ''), lmodel = NULLIF('$lmodel', ''), ldimen = NULLIF('$ldimen', ''), lweight = NULLIF('$lweight', ''), lcolor = NULLIF('$lcolor', ''), lostype = NULLIF('$lostype', ''), lultrabook = NULLIF('$lultrabook', ''), lconvertible = NULLIF('$lconvertible', ''), ldetachable = NULLIF('$ldetachable', ''), ldisSize = NULLIF('$ldisSize', ''), lactualdisSize = NULLIF('$lactualdisSize', ''), ldisRes = NULLIF('$ldisRes', ''), lpixden = NULLIF('$lpixden', ''), ldisType = NULLIF('$ldisType', ''), ldisFea = NULLIF('$ldisFea', ''), ldisTouch = NULLIF('$ldisTouch', ''), lprocess = NULLIF('$lprocess', ''), lprocessCSpeed = NULLIF('$lprocessCSpeed', ''), lgraphProcess = NULLIF('$lgraphProcess', ''), lgraphM = NULLIF('$lgraphM', ''), lgraphActMem = NULLIF('$lgraphActMem', ''), lprocessortype = NULLIF('$lprocessortype', ''), lprocessorGen = NULLIF('$lprocessorGen', ''), lcapacity = NULLIF('$lcapacity', ''), lramType = NULLIF('$lramType', ''), lmemSlot = NULLIF('$lmemSlot', ''), lmemLayout = NULLIF('$lmemLayout', ''), lmemoryexpand = NULLIF('$lmemoryexpand', ''), lstoreageC = NULLIF('$lstoreageC', ''), lstoragetype = NULLIF('$lstoragetype', ''), lbatType = NULLIF('$lbatType', ''), lpowS = NULLIF('$lpowS', ''), lbatLife = NULLIF('$lbatLife', ''), lwireLAN = NULLIF('$lwireLAN', ''), lblue = NULLIF('$lblue', ''), lblueV = NULLIF('$lblueV', ''), lusb3 = NULLIF('$lusb3', ''), lusb2 = NULLIF('$lusb2', ''), lHDMI = NULLIF('$lHDMI', ''), llockPort = NULLIF('$llockPort', ''), lusbtypeC = NULLIF('$lusbtypeC', ''), lsdCard = NULLIF('$lsdCard', ''), lheadJ = NULLIF('$lheadJ', ''), lmicroJ = NULLIF('$lmicroJ', ''), lwebC = NULLIF('$lwebC', ''), lvidRec = NULLIF('$lvidRec', ''), lsecondC = NULLIF('$lsecondC', ''), lspeaker = NULLIF('$lspeaker', ''), lsoundTech = NULLIF('$lsoundTech', ''), lmicro = NULLIF('$lmicro', ''), lmicroType = NULLIF('$lmicroType', ''), lotherControl = NULLIF('$lotherControl', ''), loptD = NULLIF('$loptD', ''), lpoiD = NULLIF('$lpoiD', ''), lkey = NULLIF('$lkey', ''), lbacklit = NULLIF('$lbacklit', ''), lfinger = NULLIF('$lfinger', ''), lfaceunlock = NULLIF('$lfaceunlock', ''), lwarranty = NULLIF('$lwarranty', ''), lsalesP = NULLIF('$lsalesP', ''), adesiks1 = NULLIF('$adesiks1', ''), adesiks2 = NULLIF('$adesiks2', ''), adesiks3 = NULLIF('$adesiks3', ''), afeaks1 = NULLIF('$afeaks1', ''), afeaks2 = NULLIF('$afeaks2', ''), afeaks3 = NULLIF('$afeaks3', ''), abatks1 = NULLIF('$abatks1', ''), abatks2 = NULLIF('$abatks2', ''), abatks3 = NULLIF('$abatks3', ''), aboxC = NULLIF('$aboxC', ''), atype = NULLIF('$atype', ''), adesign = NULLIF('$adesign', ''), aopenCloseB = NULLIF('$aopenCloseB', ''), afit = NULLIF('$afit', ''), adriver = NULLIF('$adriver', ''), aImpedance = NULLIF('$aImpedance', ''), aSensitivity = NULLIF('$aSensitivity', ''), afreqRange = NULLIF('$afreqRange', ''), aearbudDim = NULLIF('$aearbudDim', ''), aearbudWei = NULLIF('$aearbudWei', ''), acaseDim = NULLIF('$acaseDim', ''), acaseWei = NULLIF('$acaseWei', ''), adura = NULLIF('$adura', ''), acableLen = NULLIF('$acableLen', ''), acol = NULLIF('$acol', ''), anoise = NULLIF('$anoise', ''), acall = NULLIF('$acall', ''), amusic = NULLIF('$amusic', ''), aambient = NULLIF('$aambient', ''), aother = NULLIF('$aother', ''), aconn = NULLIF('$aconn', ''), ablueV = NULLIF('$ablueV', ''), ablueRange = NULLIF('$ablueRange', ''), amicroI = NULLIF('$amicroI', ''), amicroN = NULLIF('$amicroN', ''), aplay = NULLIF('$aplay', ''), abattcapE = NULLIF('$abattcapE', ''), abattcapC = NULLIF('$abattcapC', ''), acompatM = NULLIF('$acompatM', ''), wdesiks1 = NULLIF('$wdesiks1', ''), wdesiks2 = NULLIF('$wdesiks2', ''), wdesiks3 = NULLIF('$wdesiks3', ''), wdisks1 = NULLIF('$wdisks1', ''), wdisks2 = NULLIF('$wdisks2', ''), wdisks3 = NULLIF('$wdisks3', ''), wfeaks1 = NULLIF('$wfeaks1', ''), wfeaks2 = NULLIF('$wfeaks2', ''), wfeaks3 = NULLIF('$wfeaks3', ''), wbatks1 = NULLIF('$wbatks1', ''), wbatks2 = NULLIF('$wbatks2', ''), wbatks3 = NULLIF('$wbatks3', ''), wshapeS = NULLIF('$wshapeS', ''), wdim = NULLIF('$wdim', ''), wwei = NULLIF('$wwei', ''), wbodyM = NULLIF('$wbodyM', ''), wstrapM = NULLIF('$wstrapM', ''), wcol = NULLIF('$wcol', ''), wchangeStrap = NULLIF('$wchangeStrap', ''), wops = NULLIF('$wops', ''), wboxC = NULLIF('$wboxC', ''), wscreenSize = NULLIF('$wscreenSize', ''), wscreenRes = NULLIF('$wscreenRes', ''), wpixD = NULLIF('$wpixD', ''), wdisT = NULLIF('$wdisT', ''), wtouchScreen = NULLIF('$wtouchScreen', ''), wcompOS = NULLIF('$wcompOS', ''), wbattCap = NULLIF('$wbattCap', ''), wusageH = NULLIF('$wusageH', ''), wusagetype = NULLIF('$wusagetype', ''), wchargeM = NULLIF('$wchargeM', ''), wblueI = NULLIF('$wblueI', ''), wblue = NULLIF('$wblue', ''), wwirePI = NULLIF('$wwirePI', ''), wwireP = NULLIF('$wwireP', ''), wsimI = NULLIF('$wsimI', ''), wsim = NULLIF('$wsim', ''), wusbCI = NULLIF('$wusbCI', ''), wusbC = NULLIF('$wusbC', ''), wnfcI = NULLIF('$wnfcI', ''), wnavI = NULLIF('$wnavI', ''), wnav = NULLIF('$wnav', ''), wacc = NULLIF('$wacc', ''), wgyro = NULLIF('$wgyro', ''), wlight = NULLIF('$wlight', ''), wgpsI = NULLIF('$wgpsI', ''), wgps = NULLIF('$wgps', ''), wprocess = NULLIF('$wprocess', ''), wram = NULLIF('$wram', ''), wintMem = NULLIF('$wintMem', ''), wtextM = NULLIF('$wtextM', ''), wincomeCall = NULLIF('$wincomeCall', ''), walarm = NULLIF('$walarm', ''), wcalR = NULLIF('$wcalR', ''), wtime = NULLIF('$wtime', ''), wweather = NULLIF('$wweather', ''), wmakeCall = NULLIF('$wmakeCall', ''), wcameraS =NULLIF( '$wcameraS', ''), wcal = NULLIF('$wcal', ''), wstep = NULLIF('$wstep', ''), wsleep = NULLIF('$wsleep', ''), whours = NULLIF('$whours', ''), wwheart = NULLIF('$wwheart', ''), wdistance = NULLIF('$wdistance', ''), wspeak = NULLIF('$wspeak', ''), wwaterResI = NULLIF('$wwaterResI', ''), wwaterRes = NULLIF('$wwaterRes', ''), wvoiceCI = NULLIF('$wvoiceCI', ''), wvoiceC = NULLIF('$wvoiceC', ''), walarmC = NULLIF('$walarmC', ''), wremind = NULLIF('$wremind', ''), wstopW = NULLIF('$wstopW', ''), tvdisks1 = NULLIF('$tvdisks1', ''), tvdisks2 = NULLIF('$tvdisks2', ''), tvdisks3 = '$tvdisks3', tvfeaks1 = '$tvfeaks1', tvfeaks2 = '$tvfeaks2', tvfeaks3 = '$tvfeaks3', tvconks1 = NULLIF('$tvconks1', ''), tvconks2 = NULLIF('$tvconks2', ''), tvconks3 = NULLIF('$tvconks3', ''), tvsmfeaks1 = NULLIF('$tvsmfeaks1', ''), tvsmfeaks2 = NULLIF('$tvsmfeaks2', ''), tvsmfeaks3 = NULLIF('$tvsmfeaks3', ''), tvseries = NULLIF('$tvseries', ''), tvwarranty = NULLIF('$tvwarranty', ''), tvboxC = NULLIF('$tvboxC', ''), tvtype =NULLIF( '$tvtype', ''), tvdistype = NULLIF('$tvdistype', ''), tvsize = NULLIF('$tvsize', ''), tvreso = NULLIF('$tvreso', ''), tvresoFilter = NULLIF('$tvresoFilter', ''), tvRefRate = NULLIF('$tvRefRate', ''), tvaspRatio = NULLIF('$tvaspRatio', ''), tvhoriView = NULLIF('$tvhoriView', ''), tvvertView = NULLIF('$tvvertView', ''), tv3D = NULLIF('$tv3D', ''), tvcurved = NULLIF('$tvcurved', ''), tvultraSlim = NULLIF('$tvultraSlim', ''), tvotherDispFea = NULLIF('$tvotherDispFea', ''), tvcolor = NULLIF('$tvcolor', ''), tvweight = NULLIF('$tvweight', ''), tvweightStand = NULLIF('$tvweightStand', ''), tvdimStand = NULLIF('$tvdimStand', ''), tvdim = NULLIF('$tvdim', ''), tvstandType = NULLIF('$tvstandType', ''), tvstandColor = NULLIF('$tvstandColor', ''), tvstandFea = NULLIF('$tvstandFea', ''), tvwllMountDim = NULLIF('$tvwllMountDim', ''), tvdigitalRF = NULLIF('$tvdigitalRF', ''), tvvideoF = NULLIF('$tvvideoF', ''), tvimageF = NULLIF('$tvimageF', ''), tvupscale = NULLIF('$tvupscale', ''), tvsoundtype = NULLIF('$tvsoundtype', ''), tvsoundTech = NULLIF('$tvsoundTech', ''), tvaudioF = NULLIF('$tvaudioF', ''), tvtotalSO = NULLIF('$tvtotalSO', ''), tvspeakerF = NULLIF('$tvspeakerF', ''), tvotherSA = NULLIF('$tvotherSA', ''), tvusbP = NULLIF('$tvusbP', ''), tvusbS = NULLIF('$tvusbS', ''), tvhdmi = NULLIF('$tvhdmi', ''), tvdigitalOA = NULLIF('$tvdigitalOA', ''), tvrfI = NULLIF('$tvrfI', ''), tvethernetS = NULLIF('$tvethernetS', ''), tvsmartv = NULLIF('$tvsmartv', ''),  tvandroid = NULLIF('$tvandroid', ''), tvwifiP = NULLIF('$tvwifiP', ''), tvwifiD = NULLIF('$tvwifiD', ''), tvmiracast = NULLIF('$tvmiracast', ''), tvblue = NULLIF('$tvblue', ''), tvblueV = NULLIF('$tvblueV', ''), tvinbuiltI = NULLIF('$tvinbuiltI', ''), tvinbuiltA = NULLIF('$tvinbuiltA', ''), tvfacebook = NULLIF('$tvfacebook', ''), tvgame = NULLIF('$tvgame', ''), tvvoice = NULLIF('$tvvoice', ''), tvotherSF = NULLIF('$tvotherSF', ''), tvinternetA = NULLIF('$tvinternetA', ''), tvvolt = NULLIF('$tvvolt', ''), tvfreq = NULLIF('$tvfreq', ''), tvpowerCR = NULLIF('$tvpowerCR', ''), tvpowerCS = NULLIF('$tvpowerCS', ''), meta_keyword = '$meta_keyword', mrp = '$mrp', url = NULLIF('$url', ''), amazon_url = NULLIF('$amazon_url', ''), amazon_mrp = NULLIF('$amazon_mrp', ''), flipkart_url = NULLIF('$flipkart_url', ''), flipkart_mrp = NULLIF('$flipkart_mrp', ''), croma_url = NULLIF('$croma_url', ''), croma_mrp = NULLIF('$croma_mrp', ''), added_on = NULLIF('$added_on', ''), image = '$image' where id='$id'";
            } else {
                $update_sql = "update product set categories_id='$categories_id', brand_id='$brand_id', name='$name', osv='$osv', osicon='$osicon', perfks1 = NULLIF('$perfks1', ''), perfks2 = NULLIF('$perfks2', ''), perfks3 = NULLIF('$perfks3', ''), dispks1 = NULLIF('$dispks1', ''), dispks2 = NULLIF('$dispks2', ''), dispks3 = NULLIF('$dispks3', ''), cameks1 = NULLIF('$cameks1', ''), cameks2 = NULLIF('$cameks2', ''), cameks3 = NULLIF('$cameks3', ''), batks1 = NULLIF('$batks1', ''), batks2 = NULLIF('$batks2', ''), batks3 = NULLIF('$batks3', ''), ramemory = NULLIF('$ramemory', ''), mcamera = NULLIF('$mcamera', ''), process = '$process', rcam = '$rcam', fcam = NULLIF('$fcam', ''), disp = NULLIF('$disp', ''), ldate = NULLIF('$ldate', ''), cui = NULLIF('$cui', ''), chip = NULLIF('$chip', ''), mchip = NULLIF('$mchip', ''), cpunit = NULLIF('$cpunit', ''), mprocessspeed = NULLIF('$mprocessspeed', ''), mPCores = NULLIF('$mPCores', ''), archi = NULLIF('$archi', ''), fab = NULLIF('$fab', ''), graph = NULLIF('$graph', ''), ramtype = NULLIF('$ramtype', ''), distype =  NULLIF('$distype', ''), screensize = NULLIF('$screensize', ''), mscreensize = NULLIF('$mscreensize', ''), disres = NULLIF('$disres', ''), aspratio = NULLIF('$aspratio', ''), pixden = NULLIF('$pixden', ''), screenbody = NULLIF('$screenbody', ''), screenprot = NULLIF('$screenprot', ''), bezdisp = NULLIF('$bezdisp', ''), touchscreen = NULLIF('$touchscreen', ''), bright = NULLIF('$bright', ''), hd = NULLIF('$hd', ''), refrate = NULLIF('$refrate', ''), hei = NULLIF('$hei', ''), wid = NULLIF('$wid', ''), thick = NULLIF('$thick', ''), weig = NULLIF('$weig', ''), buildM = NULLIF('$buildM', ''), col = NULLIF('$col', ''), water = NULLIF('$water', ''), rugg = NULLIF('$rugg', ''), camset = NULLIF('$camset', ''), res1 = NULLIF('$res1', ''), resfl1 = NULLIF('$resfl1', ''), res2 = NULLIF('$res2', ''), resfl2 = NULLIF('$resfl2', ''), res3 = NULLIF('$res3', ''), resfl3 = NULLIF('$resfl3', ''), res4 = NULLIF('$res4', ''), resfl4 = NULLIF('$resfl4', ''), sens = NULLIF('$sens', ''), af = NULLIF('$af', ''), oi = NULLIF('$oi', ''), flas = NULLIF('$flas', ''), imgres = NULLIF('$imgres', ''), sett = NULLIF('$sett', ''), shootmode1 = NULLIF('$shootmode1', ''), shootmode2 = NULLIF('$shootmode2', ''), shootmode3 = NULLIF('$shootmode3', ''), camfea1 = NULLIF('$camfea1', ''), camfea2 = NULLIF('$camfea2', ''), camfea3 = NULLIF('$camfea3', ''), camfea4 = NULLIF('$camfea4', ''), camfea5 = NULLIF('$camfea5', ''), vidrec1 = NULLIF('$vidrec1', ''), vidrec2 = NULLIF('$vidrec2', ''), vidrec3 = NULLIF('$vidrec3', ''), vidrec4 = NULLIF('$vidrec4', ''), fcamset = NULLIF('$fcamset', ''), fres = NULLIF('$fres', ''), fresfl = NULLIF('$fresfl', ''), faf = NULLIF('$faf', ''), frflash = NULLIF('$frflash', ''), fvidrec1 = NULLIF('$fvidrec1', ''), fvidrec2 = NULLIF('$fvidrec2', ''), cap = NULLIF('$cap', ''), typ = NULLIF('$typ', ''), remove = NULLIF('$remove', ''), talktime = NULLIF('$talktime', ''), wcharge = NULLIF('$wcharge', ''), qcharge = NULLIF('$qcharge', ''), userstore = '$userstore', usbotg = '$usbotg', usbc = '$usbc', intmem = NULLIF('$intmem', ''), expmem = '$expmem', storetype='$storetype', simslot = NULLIF('$simslot', ''), simsize = NULLIF('$simsize', ''), netsupp = NULLIF('$netsupp', ''), volt = NULLIF('$volt', ''), sim4g = NULLIF('$sim4g', ''), sim3g = NULLIF('$sim3g', ''), sim2g = NULLIF('$sim2g', ''), gprs = NULLIF('$gprs', ''), edge = NULLIF('$edge', ''), sim24g = NULLIF('$sim24g', ''), sim23g = NULLIF('$sim23g', ''), sim22g = NULLIF('$sim22g', ''), gprs2 = NULLIF('$gprs2', ''), edge2 = NULLIF('$edge2', ''), wifi = NULLIF('$wifi', ''), wififea = NULLIF('$wififea', ''), wificall = NULLIF('$wificall', ''), blue = NULLIF('$blue', ''), gps = NULLIF('$gps', ''), nfc = NULLIF('$nfc', ''), usbconn = NULLIF('$usbconn', ''), fmr = NULLIF('$fmr', ''), loud = NULLIF('$loud', ''), audjack = NULLIF('$audjack', ''), audfea = NULLIF('$audfea', ''), finger = NULLIF('$finger', ''), fingerPos = NULLIF('$fingerPos', ''), fingerType = NULLIF('$fingerType', ''), faceunlock = NULLIF('$faceunlock', ''), othersens = NULLIF('$othersens', ''), tperfks1 = NULLIF('$tperfks1', ''), tperfks2 = NULLIF('$tperfks2', ''), tperfks3 = NULLIF('$tperfks3', ''), tdispks1 = NULLIF('$tdispks1', ''), tdispks2 = NULLIF('$tdispks2', ''), tdispks3 = NULLIF('$tdispks3', ''), tcameks1 = NULLIF('$tcameks1', ''), tcameks2 = NULLIF('$tcameks2', ''), tcameks3 = NULLIF('$tcameks3', ''), tbatks1 = NULLIF('$tbatks1', ''), tbatks2 = NULLIF('$tbatks2', ''), tbatks3 = NULLIF('$tbatks3', ''), tldate = NULLIF('$tldate', ''), tcui = NULLIF('$tcui', ''), theight = NULLIF('$theight', ''), twidth = NULLIF('$twidth', ''), tthick = NULLIF('$tthick', ''), tweight = NULLIF('$tweight', ''), tbuildM = NULLIF('$tbuildM', ''), tcolor = NULLIF('$tcolor', ''), tscreenSize = NULLIF('$tscreenSize', ''), tactualscreen = NULLIF('$tactualscreen', ''), tscreenRes = NULLIF('$tscreenRes', ''), tpixDen = NULLIF('$tpixDen', ''), tdisType = NULLIF('$tdisType', ''), tscreenP = NULLIF('$tscreenP', ''), ttouchScreen = NULLIF('$ttouchScreen', ''), tscreenRatio = NULLIF('$tscreenRatio', ''), tchip = NULLIF('$tchip', ''), tchipName = NULLIF('$tchipName', ''), tPcore = NULLIF('$tPcore', ''), tprocess = NULLIF('$tprocess', ''), tarchi = NULLIF('$tarchi', ''), tgraph = NULLIF('$tgraph', ''), tram = NULLIF('$tram', ''), tintMem = NULLIF('$tintMem', ''), texpMem = NULLIF('$texpMem', ''), tuserStore = NULLIF('$tuserStore', ''), tusbotg = NULLIF('$tusbotg', ''), tmaincam = NULLIF('$tmaincam', ''), tres1 = NULLIF('$tres1', ''), tresfl1 = NULLIF('$tresfl1', ''), tres2 = NULLIF('$tres2', ''), tresfl2 = NULLIF('$tresfl2', ''), tres3 = NULLIF('$tres3', ''), tresfl3 = NULLIF('$tresfl3', ''), tres4 = NULLIF('$tres4', ''), tresfl4 = NULLIF('$tresfl4', ''), taf = NULLIF('$taf', ''), tflash = NULLIF('$tflash', ''), timgRes = NULLIF('$timgRes', ''), tsett = NULLIF('$tsett', ''), tshootmode1 = NULLIF('$tshootmode1', ''), tshootmode2 = NULLIF('$tshootmode2', ''), tshootmode3 = NULLIF('$tshootmode3', ''), tcamFea1 = NULLIF('$tcamFea1', ''), tcamFea2 = NULLIF('$tcamFea2', ''), tcamFea3 = NULLIF('$tcamFea3', ''), tcamFea4 = NULLIF('$tcamFea4', ''), tcamFea5 = NULLIF('$tcamFea5', ''), tvidRec1 = NULLIF('$tvidRec1', ''), tvidRec2 = NULLIF('$tvidRec2', ''), tvidRec3 = NULLIF('$tvidRec3', ''), tfcam = NULLIF('$tfcam', ''), tfres1 = NULLIF('$tfres1', ''), tfresfl1 = NULLIF('$tfresfl1', ''), tfres2 = NULLIF('$tfres2', ''), tfresfl2 = NULLIF('$tfresfl2', ''), tfflash = NULLIF('$tfflash', ''), tfvidrec1 = NULLIF('$tfvidrec1', ''),  tfvidrec2 = NULLIF('$tfvidrec2', ''), tcap = NULLIF('$tcap', ''), ttype = '$ttype', tuserR = '$tuserR', tquickC = '$tquickC', tusbC = '$tusbC', tsimsize = '$tsimsize', tnetsupp = NULLIF('$tnetsupp', ''), tvolt = NULLIF('$tvolt', ''), tsim4g = NULLIF('$tsim4g', ''), tsim3g = NULLIF('$tsim3g', ''), tsim2g = NULLIF('$tsim2g', ''), tgprs = NULLIF('$tgprs', ''), tedge = NULLIF('$tedge', ''), tvoiceCall = NULLIF('$tvoiceCall', ''), twifi = NULLIF('$twifi', ''), twifiFea = NULLIF('$twifiFea', ''), tblue = NULLIF('$tblue', ''), tnfc = NULLIF('$tnfc', ''), tusbConn = NULLIF('$tusbConn', ''), thdmi = NULLIF('$thdmi', ''), tfmr = NULLIF('$tfmr', ''), taudioJ = NULLIF('$taudioJ', ''), taudioF = NULLIF('$taudioF', ''), tfinger = NULLIF('$tfinger', ''), tfingerPos = NULLIF('$tfingerPos', ''), totherSens = NULLIF('$totherSens', ''), lperfks1 = NULLIF('$lperfks1', ''), lperfks2 = NULLIF('$lperfks2', ''), lperfks3 = NULLIF('$lperfks3', ''), desiks1 = NULLIF('$desiks1', ''), desiks2 = NULLIF('$desiks2', ''), desiks3 = NULLIF('$desiks3', ''), storks1 = NULLIF('$storks1', ''), storks2 = NULLIF('$storks2', ''), storks3 = NULLIF('$storks3', ''), lbatks1 = NULLIF('$lbatks1', ''), lbatks2 = NULLIF('$lbatks2', ''), lbatks3 = NULLIF('$lbatks3', ''), lmodel = NULLIF('$lmodel', ''), ldimen = NULLIF('$ldimen', ''), lweight = NULLIF('$lweight', ''), lcolor = NULLIF('$lcolor', ''), lostype = NULLIF('$lostype', ''), lultrabook = NULLIF('$lultrabook', ''), lconvertible = NULLIF('$lconvertible', ''), ldetachable = NULLIF('$ldetachable', ''), ldisSize = NULLIF('$ldisSize', ''), lactualdisSize = NULLIF('$lactualdisSize', ''), ldisRes = NULLIF('$ldisRes', ''), lpixden = NULLIF('$lpixden', ''), ldisType = NULLIF('$ldisType', ''), ldisFea = NULLIF('$ldisFea', ''), ldisTouch = NULLIF('$ldisTouch', ''), lprocess = NULLIF('$lprocess', ''), lprocessCSpeed = NULLIF('$lprocessCSpeed', ''), lgraphProcess = NULLIF('$lgraphProcess', ''), lgraphM = NULLIF('$lgraphM', ''), lgraphActMem = NULLIF('$lgraphActMem', ''), lprocessortype = NULLIF('$lprocessortype', ''), lprocessorGen = NULLIF('$lprocessorGen', ''), lcapacity = NULLIF('$lcapacity', ''), lramType = NULLIF('$lramType', ''), lmemSlot = NULLIF('$lmemSlot', ''), lmemLayout = NULLIF('$lmemLayout', ''), lmemoryexpand = NULLIF('$lmemoryexpand', ''), lstoreageC = NULLIF('$lstoreageC', ''), lstoragetype = NULLIF('$lstoragetype', ''), lbatType = NULLIF('$lbatType', ''), lpowS = NULLIF('$lpowS', ''), lbatLife = NULLIF('$lbatLife', ''), lwireLAN = NULLIF('$lwireLAN', ''), lblue = NULLIF('$lblue', ''), lblueV = NULLIF('$lblueV', ''), lusb3 = NULLIF('$lusb3', ''), lusb2 = NULLIF('$lusb2', ''), lHDMI = NULLIF('$lHDMI', ''), llockPort = NULLIF('$llockPort', ''), lusbtypeC = NULLIF('$lusbtypeC', ''), lsdCard = NULLIF('$lsdCard', ''), lheadJ = NULLIF('$lheadJ', ''), lmicroJ = NULLIF('$lmicroJ', ''), lwebC = NULLIF('$lwebC', ''), lvidRec = NULLIF('$lvidRec', ''), lsecondC = NULLIF('$lsecondC', ''), lspeaker = NULLIF('$lspeaker', ''), lsoundTech = NULLIF('$lsoundTech', ''), lmicro = NULLIF('$lmicro', ''), lmicroType = NULLIF('$lmicroType', ''), lotherControl = NULLIF('$lotherControl', ''), loptD = NULLIF('$loptD', ''), lpoiD = NULLIF('$lpoiD', ''), lkey = NULLIF('$lkey', ''), lbacklit = NULLIF('$lbacklit', ''), lfinger = NULLIF('$lfinger', ''), lfaceunlock = NULLIF('$lfaceunlock', ''), lwarranty = NULLIF('$lwarranty', ''), lsalesP = NULLIF('$lsalesP', ''), adesiks1 = NULLIF('$adesiks1', ''), adesiks2 = NULLIF('$adesiks2', ''), adesiks3 = NULLIF('$adesiks3', ''), afeaks1 = NULLIF('$afeaks1', ''), afeaks2 = NULLIF('$afeaks2', ''), afeaks3 = NULLIF('$afeaks3', ''), abatks1 = NULLIF('$abatks1', ''), abatks2 = NULLIF('$abatks2', ''), abatks3 = NULLIF('$abatks3', ''), aboxC = NULLIF('$aboxC', ''), atype = NULLIF('$atype', ''), adesign = NULLIF('$adesign', ''), aopenCloseB = NULLIF('$aopenCloseB', ''), afit = NULLIF('$afit', ''), adriver = NULLIF('$adriver', ''), aImpedance = NULLIF('$aImpedance', ''), aSensitivity = NULLIF('$aSensitivity', ''), afreqRange = NULLIF('$afreqRange', ''), aearbudDim = NULLIF('$aearbudDim', ''), aearbudWei = NULLIF('$aearbudWei', ''), acaseDim = NULLIF('$acaseDim', ''), acaseWei = NULLIF('$acaseWei', ''), adura = NULLIF('$adura', ''), acableLen = NULLIF('$acableLen', ''), acol = NULLIF('$acol', ''), anoise = NULLIF('$anoise', ''), acall = NULLIF('$acall', ''), amusic = NULLIF('$amusic', ''), aambient = NULLIF('$aambient', ''), aother = NULLIF('$aother', ''), aconn = NULLIF('$aconn', ''), ablueV = NULLIF('$ablueV', ''), ablueRange = NULLIF('$ablueRange', ''), amicroI = NULLIF('$amicroI', ''), amicroN = NULLIF('$amicroN', ''), aplay = NULLIF('$aplay', ''), abattcapE = NULLIF('$abattcapE', ''), abattcapC = NULLIF('$abattcapC', ''), acompatM = NULLIF('$acompatM', ''), wdesiks1 = NULLIF('$wdesiks1', ''), wdesiks2 = NULLIF('$wdesiks2', ''), wdesiks3 = NULLIF('$wdesiks3', ''), wdisks1 = NULLIF('$wdisks1', ''), wdisks2 = NULLIF('$wdisks2', ''), wdisks3 = NULLIF('$wdisks3', ''), wfeaks1 = NULLIF('$wfeaks1', ''), wfeaks2 = NULLIF('$wfeaks2', ''), wfeaks3 = NULLIF('$wfeaks3', ''), wbatks1 = NULLIF('$wbatks1', ''), wbatks2 = NULLIF('$wbatks2', ''), wbatks3 = NULLIF('$wbatks3', ''), wshapeS = NULLIF('$wshapeS', ''), wdim = NULLIF('$wdim', ''), wwei = NULLIF('$wwei', ''), wbodyM = NULLIF('$wbodyM', ''), wstrapM = NULLIF('$wstrapM', ''), wcol = NULLIF('$wcol', ''), wchangeStrap = NULLIF('$wchangeStrap', ''), wops = NULLIF('$wops', ''), wboxC = NULLIF('$wboxC', ''), wscreenSize = NULLIF('$wscreenSize', ''), wscreenRes = NULLIF('$wscreenRes', ''), wpixD = NULLIF('$wpixD', ''), wdisT = NULLIF('$wdisT', ''), wtouchScreen = NULLIF('$wtouchScreen', ''), wcompOS = NULLIF('$wcompOS', ''), wbattCap = NULLIF('$wbattCap', ''), wusageH = NULLIF('$wusageH', ''), wusagetype = NULLIF('$wusagetype', ''), wchargeM = NULLIF('$wchargeM', ''), wblueI = NULLIF('$wblueI', ''), wblue = NULLIF('$wblue', ''), wwirePI = NULLIF('$wwirePI', ''), wwireP = NULLIF('$wwireP', ''), wsimI = NULLIF('$wsimI', ''), wsim = NULLIF('$wsim', ''), wusbCI = NULLIF('$wusbCI', ''), wusbC = NULLIF('$wusbC', ''), wnfcI = NULLIF('$wnfcI', ''), wnavI = NULLIF('$wnavI', ''), wnav = NULLIF('$wnav', ''), wacc = NULLIF('$wacc', ''), wgyro = NULLIF('$wgyro', ''), wlight = NULLIF('$wlight', ''), wgpsI = NULLIF('$wgpsI', ''), wgps = NULLIF('$wgps', ''), wprocess = NULLIF('$wprocess', ''), wram = NULLIF('$wram', ''), wintMem = NULLIF('$wintMem', ''), wtextM = NULLIF('$wtextM', ''), wincomeCall = NULLIF('$wincomeCall', ''), walarm = NULLIF('$walarm', ''), wcalR = NULLIF('$wcalR', ''), wtime = NULLIF('$wtime', ''), wweather = NULLIF('$wweather', ''), wmakeCall = NULLIF('$wmakeCall', ''), wcameraS =NULLIF( '$wcameraS', ''), wcal = NULLIF('$wcal', ''), wstep = NULLIF('$wstep', ''), wsleep = NULLIF('$wsleep', ''), whours = NULLIF('$whours', ''), wwheart = NULLIF('$wwheart', ''), wdistance = NULLIF('$wdistance', ''), wspeak = NULLIF('$wspeak', ''), wwaterResI = NULLIF('$wwaterResI', ''), wwaterRes = NULLIF('$wwaterRes', ''), wvoiceCI = NULLIF('$wvoiceCI', ''), wvoiceC = NULLIF('$wvoiceC', ''), walarmC = NULLIF('$walarmC', ''), wremind = NULLIF('$wremind', ''), wstopW = NULLIF('$wstopW', ''), tvdisks1 = NULLIF('$tvdisks1', ''), tvdisks2 = NULLIF('$tvdisks2', ''), tvdisks3 = '$tvdisks3', tvfeaks1 = '$tvfeaks1', tvfeaks2 = '$tvfeaks2', tvfeaks3 = '$tvfeaks3', tvconks1 = NULLIF('$tvconks1', ''), tvconks2 = NULLIF('$tvconks2', ''), tvconks3 = NULLIF('$tvconks3', ''), tvsmfeaks1 = NULLIF('$tvsmfeaks1', ''), tvsmfeaks2 = NULLIF('$tvsmfeaks2', ''), tvsmfeaks3 = NULLIF('$tvsmfeaks3', ''), tvseries = NULLIF('$tvseries', ''), tvwarranty = NULLIF('$tvwarranty', ''), tvboxC = NULLIF('$tvboxC', ''), tvtype =NULLIF( '$tvtype', ''), tvdistype = NULLIF('$tvdistype', ''), tvsize = NULLIF('$tvsize', ''), tvreso = NULLIF('$tvreso', ''), tvresoFilter = NULLIF('$tvresoFilter', ''), tvRefRate = NULLIF('$tvRefRate', ''), tvaspRatio = NULLIF('$tvaspRatio', ''), tvhoriView = NULLIF('$tvhoriView', ''), tvvertView = NULLIF('$tvvertView', ''), tv3D = NULLIF('$tv3D', ''), tvcurved = NULLIF('$tvcurved', ''), tvultraSlim = NULLIF('$tvultraSlim', ''), tvotherDispFea = NULLIF('$tvotherDispFea', ''), tvcolor = NULLIF('$tvcolor', ''), tvweight = NULLIF('$tvweight', ''), tvweightStand = NULLIF('$tvweightStand', ''), tvdimStand = NULLIF('$tvdimStand', ''), tvdim = NULLIF('$tvdim', ''), tvstandType = NULLIF('$tvstandType', ''), tvstandColor = NULLIF('$tvstandColor', ''), tvstandFea = NULLIF('$tvstandFea', ''), tvwllMountDim = NULLIF('$tvwllMountDim', ''), tvdigitalRF = NULLIF('$tvdigitalRF', ''), tvvideoF = NULLIF('$tvvideoF', ''), tvimageF = NULLIF('$tvimageF', ''), tvupscale = NULLIF('$tvupscale', ''), tvsoundtype = NULLIF('$tvsoundtype', ''), tvsoundTech = NULLIF('$tvsoundTech', ''), tvaudioF = NULLIF('$tvaudioF', ''), tvtotalSO = NULLIF('$tvtotalSO', ''), tvspeakerF = NULLIF('$tvspeakerF', ''), tvotherSA = NULLIF('$tvotherSA', ''), tvusbP = NULLIF('$tvusbP', ''), tvusbS = NULLIF('$tvusbS', ''), tvhdmi = NULLIF('$tvhdmi', ''), tvdigitalOA = NULLIF('$tvdigitalOA', ''), tvrfI = NULLIF('$tvrfI', ''), tvethernetS = NULLIF('$tvethernetS', ''), tvsmartv = NULLIF('$tvsmartv', ''), tvandroid = NULLIF('$tvandroid', ''), tvwifiP = NULLIF('$tvwifiP', ''), tvwifiD = NULLIF('$tvwifiD', ''), tvmiracast = NULLIF('$tvmiracast', ''), tvblue = NULLIF('$tvblue', ''), tvblueV = NULLIF('$tvblueV', ''), tvinbuiltI = NULLIF('$tvinbuiltI', ''), tvinbuiltA = NULLIF('$tvinbuiltA', ''), tvfacebook = NULLIF('$tvfacebook', ''), tvgame = NULLIF('$tvgame', ''), tvvoice = NULLIF('$tvvoice', ''), tvotherSF = NULLIF('$tvotherSF', ''), tvinternetA = NULLIF('$tvinternetA', ''), tvvolt = NULLIF('$tvvolt', ''), tvfreq = NULLIF('$tvfreq', ''), tvpowerCR = NULLIF('$tvpowerCR', ''), tvpowerCS = NULLIF('$tvpowerCS', ''), meta_keyword='$meta_keyword', mrp = '$mrp', url = NULLIF('$url', ''), amazon_url = NULLIF('$amazon_url', ''), amazon_mrp = NULLIF('$amazon_mrp', ''), flipkart_url = NULLIF('$flipkart_url', ''), flipkart_mrp = NULLIF('$flipkart_mrp', ''), croma_url = NULLIF('$croma_url', ''), croma_mrp = NULLIF('$croma_mrp', ''), added_on = NULLIF('$added_on', '') where id='$id'";
            }
            mysqli_query($con, $update_sql);
        } else {
            $image = date("d-m-Y") . "_" . time() . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
            mysqli_query($con, "insert into product(categories_id, brand_id, name, osv, osicon, perfks1, perfks2, perfks3, dispks1, dispks2, dispks3, cameks1, cameks2, cameks3, batks1, batks2, batks3, ramemory, mcamera, process, rcam, fcam, disp, ldate, cui, chip, mchip, cpunit, mprocessspeed, mPCores, archi, fab, graph, ramtype, distype, screensize, mscreensize, disres, aspratio, pixden, screenbody, screenprot, bezdisp, touchscreen, bright, hd, refrate, hei, wid, thick, weig, buildM, col, water, rugg, camset, res1, resfl1, res2, resfl2, res3, resfl3, res4, resfl4, sens, af, oi, flas, imgres, sett, shootmode1, shootmode2, shootmode3, camfea1, camfea2, camfea3, camfea4, camfea5, vidrec1, vidrec2, vidrec3, vidrec4, fcamset, fres, fresfl, faf, frflash, fvidrec1, fvidrec2, cap, typ, remove, talktime, wcharge, qcharge, userstore, usbotg, usbc, intmem, expmem, storetype, simslot, simsize, netsupp, volt, sim4g, sim3g, sim2g, gprs, edge, sim24g, sim23g, sim22g, gprs2, edge2, wifi, wififea, wificall, blue, gps, nfc, usbconn, fmr, loud, audjack, audfea, finger, fingerPos, fingerType, faceunlock, othersens, tperfks1, tperfks2, tperfks3, tdispks1, tdispks2, tdispks3, tcameks1, tcameks2, tcameks3, tbatks1, tbatks2, tbatks3, tldate, tcui, theight, twidth, tthick, tweight, tbuildM, tcolor, tscreenSize, tactualscreen, tscreenRes, tpixDen, tdisType, tscreenP, ttouchScreen, tscreenRatio, tchip, tchipName, tPcore, tprocess, tarchi, tgraph, tram, tintMem, texpMem, tuserStore, tusbotg, tmaincam, tres1, tresfl1, tres2, tresfl2, tres3, tresfl3, tres4, tresfl4, taf, tflash, timgRes, tsett, tshootmode1, tshootmode2, tshootmode3, tcamFea1, tcamFea2, tcamFea3, tcamFea4, tcamFea5, tvidRec1, tvidRec2, tvidRec3, tfcam, tfres1, tfresfl1, tfres2, tfresfl2, tfflash, tfvidrec1, tfvidrec2, tcap, ttype, tuserR, tquickC, tusbC, tsimsize, tnetsupp, tvolt, tsim4g, tsim3g, tsim2g, tgprs, tedge, tvoiceCall, twifi, twifiFea, tblue, tnfc, tusbConn, thdmi, tfmr, taudioJ, taudioF, tfinger, tfingerPos, totherSens, lperfks1, lperfks2, lperfks3, desiks1, desiks2, desiks3, storks1, storks2, storks3, lbatks1, lbatks2, lbatks3, lmodel, ldimen, lweight, lcolor, ldisSize, lactualdisSize, ldisRes, lpixden, ldisType, ldisFea, ldisTouch, lprocess, lprocessCSpeed, lgraphProcess, lgraphM, lgraphActMem, lprocessortype, lprocessorGen, lcapacity, lramType, lmemSlot, lmemLayout, lmemoryexpand, lstoreageC, lstoragetype, lbatType, lpowS, lbatLife, lwireLAN, lblue, lblueV, lusb3, lusb2, lHDMI, llockPort, lusbtypeC, lsdCard, lheadJ, lmicroJ, lwebC, lvidRec, lsecondC, lspeaker, lsoundTech, lmicro, lmicroType, lotherControl, loptD, lpoiD, lkey, lbacklit, lfinger, lfaceunlock, lwarranty, lsalesP, adesiks1, adesiks2, adesiks3, afeaks1, afeaks2, afeaks3, abatks1, abatks2, abatks3, aboxC, atype, adesign, aopenCloseB, afit, adriver, aImpedance, aSensitivity, afreqRange, aearbudDim, aearbudWei, acaseDim, acaseWei, adura, acableLen, acol, anoise, acall, amusic, aambient, aother, aconn, ablueV, ablueRange, amicroI, amicroN, aplay, abattcapE, abattcapC, acompatM, wdesiks1, wdesiks2, wdesiks3, wdisks1, wdisks2, wdisks3, wfeaks1, wfeaks2, wfeaks3, wbatks1, wbatks2, wbatks3, wops, wboxC, wshapeS, wdim, wwei, wbodyM, wstrapM, wcol, wchangeStrap, wscreenSize, wscreenRes, wpixD, wdisT, wtouchScreen, wcompOS, wbattCap, wusageH, wusagetype, wchargeM, wblueI, wblue, wwirePI, wwireP, wsimI, wsim, wusbCI, wusbC, wnfcI, wnavI, wnav, wacc, wgyro, wlight, wgpsI, wgps, wprocess, wram, wintMem, wtextM, wincomeCall, walarm, wcalR, wtime, wweather, wmakeCall, wcameraS, wcal, wstep, wsleep, whours, wwheart, wdistance, wspeak, wwaterRes, wwaterResI, wvoiceCI, wvoiceC, walarmC, wremind, wstopW, tvdisks1, tvdisks2, tvdisks3, tvfeaks1, tvfeaks2, tvfeaks3, tvconks1, tvconks2, tvconks3, tvsmfeaks1, tvsmfeaks2, tvsmfeaks3, tvseries, tvwarranty, tvboxC, tvtype, tvdistype, tvsize, tvreso, tvresoFilter, tvRefRate, tvaspRatio, tvhoriView, tvvertView, tv3D, tvcurved, tvultraSlim, tvotherDispFea, tvcolor, tvweight, tvweightStand, tvdimStand, tvdim, tvstandType, tvstandColor, tvstandFea, tvwllMountDim, tvdigitalRF, tvvideoF, tvimageF, tvupscale, tvsoundtype, tvsoundTech, tvaudioF, tvtotalSO, tvspeakerF, tvotherSA, tvusbP, tvusbS, tvhdmi, tvdigitalOA, tvrfI, tvethernetS, tvsmartv, tvandroid, tvwifiP, tvwifiD, tvmiracast, tvblue, tvblueV, tvinbuiltI, tvinbuiltA, tvfacebook, tvgame, tvvoice, tvotherSF, tvinternetA, tvvolt, tvfreq, tvpowerCR, tvpowerCS, meta_keyword, mrp, url, amazon_url, amazon_mrp, flipkart_url, flipkart_mrp, croma_url, croma_mrp, added_on, status,image) values('$categories_id', '$brand_id','$name', '$osv', '$osicon', NULLIF('$perfks1', ''), NULLIF('$perfks2', ''), NULLIF('$perfks3', ''), NULLIF('$dispks1', ''), NULLIF('$dispks2', ''), NULLIF('$dispks3', ''), NULLIF('$cameks1', ''), NULLIF('$cameks2', ''), NULLIF('$cameks3', ''), NULLIF('$batks1', ''), NULLIF('$batks2', ''), NULLIF('$batks3', ''), NULLIF('$ramemory', ''), NULLIF('$mcamera', ''), NULLIF('$process', ''), NULLIF('$rcam', ''), NULLIF('$fcam', ''), NULLIF('$disp', ''), NULLIF('$ldate', ''), NULLIF('$cui', ''), NULLIF('$chip', ''), NULLIF('$mchip', ''), NULLIF('$cpunit', ''), NULLIF('$mprocessspeed', ''), NULLIF('$mPCores', ''), NULLIF('$archi', ''), NULLIF('$fab', ''), NULLIF('$graph', ''), NULLIF('$ramtype', ''), NULLIF('$distype', ''), NULLIF('$screensize', ''), NULLIF('$mscreensize', ''), NULLIF('$disres', ''), NULLIF('$aspratio', ''), NULLIF('$pixden', ''), NULLIF('$screenbody', ''), NULLIF('$screenprot', ''), NULLIF('$bezdisp', ''), NULLIF('$touchscreen', ''), NULLIF('$bright', ''), NULLIF('$hd', ''), NULLIF('$refrate', ''), NULLIF('$hei', ''), NULLIF('$wid', ''), NULLIF('$thick', ''), NULLIF('$weig', ''), NULLIF('$buildM', ''), NULLIF('$col', ''), NULLIF('$water', ''), NULLIF('$rugg', ''), NULLIF('$camset', ''), NULLIF('$res1', ''), NULLIF('$resfl1', ''), NULLIF('$res2', ''), NULLIF('$resfl2', ''), NULLIF('$res3', ''), NULLIF('$resfl3', ''), NULLIF('$res4', ''), NULLIF('$resfl4', ''), NULLIF('$sens', ''), NULLIF('$af', ''), NULLIF('$oi', ''), NULLIF('$flas', ''), NULLIF('$imgres', ''), NULLIF('$sett', ''), NULLIF('$shootmode1', ''), NULLIF('$shootmode2', ''), NULLIF('$shootmode3', ''), NULLIF('$camfea1', ''), NULLIF('$camfea2', ''), NULLIF('$camfea3', ''), NULLIF('$camfea4', ''), NULLIF('$camfea5', ''), NULLIF('$vidrec1', ''), NULLIF('$vidrec2', ''), NULLIF('$vidrec3', ''), NULLIF('$vidrec4', ''), NULLIF('$fcamset', ''), NULLIF('$fres', ''), NULLIF('$fresfl', ''), NULLIF('$faf', ''), NULLIF('$frflash', ''), NULLIF('$fvidrec1', ''), NULLIF('$fvidrec2', ''), NULLIF('$cap', ''), NULLIF('$typ', ''), NULLIF('$remove', ''), NULLIF('$talktime', ''), NULLIF('$wcharge', ''), NULLIF('$qcharge', ''), NULLIF('$userstore', ''), NULLIF('$usbotg', ''), NULLIF('$usbc', ''), NULLIF('$intmem', ''), NULLIF('$expmem', ''), NULLIF('$storetype', ''), NULLIF('$simslot', ''), NULLIF('$simsize', ''), NULLIF('$netsupp', ''), NULLIF('$volt', ''), NULLIF('$sim4g', ''), NULLIF('$sim3g', ''), NULLIF('$sim2g', ''), NULLIF('$gprs', ''), NULLIF('$edge', ''), NULLIF('$sim24g', ''), NULLIF('$sim23g', ''), NULLIF('$sim22g', ''), NULLIF('$gprs2', ''), NULLIF('$edge2', ''), NULLIF('$wifi', ''), NULLIF('$wififea', ''), NULLIF('$wificall', ''), NULLIF('$blue', ''), NULLIF('$gps', ''), NULLIF('$nfc', ''), NULLIF('$usbconn', ''), NULLIF('$fmr', ''), NULLIF('$loud', ''), NULLIF('$audjack', ''), NULLIF('$audfea', ''), NULLIF('$finger', ''), NULLIF('$fingerPos', ''), NULLIF('$fingerType', ''), NULLIF('$faceunlock', ''), NULLIF('$othersens', ''), NULLIF('$tperfks1', ''), NULLIF('$tperfks2', ''), NULLIF('$tperfks3', ''), NULLIF('$tdispks1', ''), NULLIF('$tdispks2', ''), NULLIF('$tdispks3', ''), NULLIF('$tcameks1', ''), NULLIF('$tcameks2', ''), NULLIF('$tcameks3', ''), NULLIF('$tbatks1', ''), NULLIF('$tbatks2', ''), NULLIF('$tbatks3', ''), NULLIF('$tldate', ''), NULLIF('$tcui', ''), NULLIF('$theight', ''), NULLIF('$twidth', ''), NULLIF('$tthick', ''), NULLIF('$tweight', ''), NULLIF('$tbuildM', ''), NULLIF('$tcolor', ''), NULLIF('$tscreenSize', ''), NULLIF('$tactualscreen', ''), NULLIF('$tscreenRes', ''), NULLIF('$tpixDen', ''), NULLIF('$tdisType', ''), NULLIF('$tscreenP', ''), NULLIF('$ttouchScreen', ''), NULLIF('$tscreenRatio', ''), NULLIF('$tchip', ''), NULLIF('$tchipName', ''), NULLIF('$tPcore', ''), NULLIF('$tprocess', ''), NULLIF('$tarchi', ''), NULLIF('$tgraph', ''), NULLIF('$tram', ''), NULLIF('$tintMem', ''), NULLIF('$texpMem', ''), NULLIF('$tuserStore', ''), NULLIF('$tusbotg', ''), NULLIF('$tmaincam', ''), NULLIF('$tres1', ''), NULLIF('$tresfl1', ''), NULLIF('$tres2', ''), NULLIF('$tresfl2', ''), NULLIF('$tres3', ''), NULLIF('$tresfl3', ''), NULLIF('$tres4', ''), NULLIF('$tresfl4', ''), NULLIF('$taf', ''), NULLIF('$tflash', ''), NULLIF('$timgRes', ''), NULLIF('$tsett', ''), NULLIF('$tshootmode1', ''), NULLIF('$tshootmode2', ''), NULLIF('$tshootmode3', ''), NULLIF('$tcamFea1', ''), NULLIF('$tcamFea2', ''), NULLIF('$tcamFea3', ''), NULLIF('$tcamFea4', ''), NULLIF('$tcamFea5', ''), NULLIF('$tvidRec1', ''), NULLIF('$tvidRec2', ''), NULLIF('$tvidRec3', ''), NULLIF('$tfcam', ''), NULLIF('$tfres1', ''), NULLIF('$tfresfl1', ''), NULLIF('$tfres2', ''), NULLIF('$tfresfl2', ''), NULLIF('$tfflash', ''), NULLIF('$tfvidrec1', ''), NULLIF('$tfvidrec2', ''), NULLIF('$tcap', ''), NULLIF('$ttype', ''), NULLIF('$tuserR', ''), NULLIF('$tquickC', ''), NULLIF('$tusbC', ''), NULLIF('$tsimsize', ''), NULLIF('$tnetsupp', ''), NULLIF('$tvolt', ''), NULLIF('$tsim4g', ''), NULLIF('$tsim3g', ''), NULLIF('$tsim2g', ''), NULLIF('$tgprs', ''), NULLIF('$tedge', ''), NULLIF('$tvoiceCall', ''), NULLIF('$twifi', ''), NULLIF('$twifiFea', ''), NULLIF('$tblue', ''), NULLIF('$tnfc', ''), NULLIF('$tusbConn', ''), NULLIF('$thdmi', ''), NULLIF('$tfmr', ''), NULLIF('$taudioJ', ''), NULLIF('$taudioF', ''), NULLIF('$tfinger', ''), NULLIF('$tfingerPos', ''), NULLIF('$totherSens', ''), NULLIF('$lperfks1', ''), NULLIF('$lperfks2', ''), NULLIF('$lperfks3', ''), NULLIF('$desiks1', ''), NULLIF('$desiks2', ''), NULLIF('$desiks3', ''), NULLIF('$storks1', ''), NULLIF('$storks2', ''), NULLIF('$storks3', ''), NULLIF('$lbatks1', ''), NULLIF('$lbatks2', ''), NULLIF('$lbatks3', ''), NULLIF('$lmodel', ''), NULLIF('$ldimen', ''), NULLIF('$lweight', ''), NULLIF('$lcolor', ''), NULLIF('$ldisSize', ''), NULLIF('$lactualdisSize', ''), NULLIF('$ldisRes', ''), NULLIF('$lpixden', ''), NULLIF('$ldisType', ''), NULLIF('$ldisFea', ''), NULLIF('$ldisTouch', ''), NULLIF('$lprocess', ''), NULLIF('$lprocessCSpeed', ''), NULLIF('$lgraphProcess', ''), NULLIF('$lgraphM', ''), NULLIF('$lgraphActMem', ''), NULLIF('$lprocessortype', ''), NULLIF('$lprocessorGen', ''), NULLIF('$lcapacity', ''), NULLIF('$lramType', ''), NULLIF('$lmemSlot', ''), NULLIF('$lmemLayout', ''), NULLIF('$lmemoryexpand', ''), NULLIF('$lstoreageC', ''), NULLIF('$lstoragetype', ''), NULLIF('$lbatType', ''), NULLIF('$lpowS', ''), NULLIF('$lbatLife', ''), NULLIF('$lwireLAN', ''), NULLIF('$lblue', ''), NULLIF('$lblueV', ''), NULLIF('$lusb3', ''), NULLIF('$lusb2', ''), NULLIF('$lHDMI', ''), NULLIF('$llockPort', ''), NULLIF('$lusbtypeC', ''), NULLIF('$lsdCard', ''), NULLIF('$lheadJ', ''), NULLIF('$lmicroJ', ''), NULLIF('$lwebC', ''), NULLIF('$lvidRec', ''), NULLIF('$lsecondC', ''), NULLIF('$lspeaker', ''), NULLIF('$lsoundTech', ''), NULLIF('$lmicro', ''), NULLIF('$lmicroType', ''), NULLIF('$lotherControl', ''), NULLIF('$loptD', ''), NULLIF('$lpoiD', ''), NULLIF('$lkey', ''), NULLIF('$lbacklit', ''), NULLIF('$lfinger', ''), NULLIF('$lfaceunlock', ''), NULLIF('$lwarranty', ''), NULLIF('$lsalesP', ''), NULLIF('$adesiks1', ''), NULLIF('$adesiks2', ''), NULLIF('$adesiks3', ''), NULLIF('$afeaks1', ''), NULLIF('$afeaks2', ''), NULLIF('$afeaks3', ''), NULLIF('$abatks1', ''), NULLIF('$abatks2', ''), NULLIF('$abatks3', ''), NULLIF('$aboxC', ''), NULLIF('$atype', ''), NULLIF('$adesign', ''), NULLIF('$aopenCloseB', ''), NULLIF('$afit', ''), NULLIF('$adriver', ''), NULLIF('$aImpedance', ''), NULLIF('$aSensitivity', ''), NULLIF('$afreqRange', ''), NULLIF('$aearbudDim', ''), NULLIF('$aearbudWei', ''), NULLIF('$acaseDim', ''), NULLIF('$acaseWei', ''), NULLIF('$adura', ''), NULLIF('$acableLen', ''), NULLIF('$acol', ''), NULLIF('$anoise', ''), NULLIF('$acall', ''), NULLIF('$amusic', ''), NULLIF('$aambient', ''), NULLIF('$aother', ''), NULLIF('$aconn', ''), NULLIF('$ablueV', ''), NULLIF('$ablueRange', ''), NULLIF('$amicroI', ''), NULLIF('$amicroN', ''), NULLIF('$aplay', ''), NULLIF('$abattcapE', ''), NULLIF('$abattcapC', ''), NULLIF('$acompatM', ''), NULLIF('$wdesiks1', ''), NULLIF('$wdesiks2', ''), NULLIF('$wdesiks3', ''), NULLIF('$wdisks1', ''), NULLIF('$wdisks2', ''), NULLIF('$wdisks3', ''), NULLIF('$wfeaks1', ''), NULLIF('$wfeaks2', ''), NULLIF('$wfeaks3', ''), NULLIF('$wbatks1', ''), NULLIF('$wbatks2', ''), NULLIF('$wbatks3', ''), NULLIF('$wops', ''), NULLIF('$wboxC', ''), NULLIF('$wshapeS', ''), NULLIF('$wdim', ''), NULLIF('$wwei', ''), NULLIF('$wbodyM', ''), NULLIF('$wstrapM', ''), NULLIF('$wcol', ''), NULLIF('$wchangeStrap', ''), NULLIF('$wscreenSize', ''), NULLIF('$wscreenRes', ''), NULLIF('$wpixD', ''), NULLIF('$wdisT', ''), NULLIF('$wtouchScreen', ''), NULLIF('$wcompOS', ''), NULLIF('$wbattCap', ''), NULLIF('$wusageH', ''), NULLIF('$wusagetype', ''), NULLIF('$wchargeM', ''), NULLIF('$wblueI', ''), NULLIF('$wblue', ''), NULLIF('$wwirePI', ''), NULLIF('$wwireP', ''), NULLIF('$wsimI', ''), NULLIF('$wsim', ''), NULLIF('$wusbCI', ''), NULLIF('$wusbC', ''), NULLIF('$wnfcI', ''), NULLIF('$wnavI', ''), NULLIF('$wnav', ''), NULLIF('$wacc', ''), NULLIF('$wgyro', ''), NULLIF('$wlight', ''), NULLIF('$wgpsI', ''), NULLIF('$wgps', ''), NULLIF('$wprocess', ''), NULLIF('$wram', ''), NULLIF('$wintMem', ''), NULLIF('$wtextM', ''), NULLIF('$wincomeCall', ''), NULLIF('$walarm', ''), NULLIF('$wcalR', ''), NULLIF('$wtime', ''), NULLIF('$wweather', ''), NULLIF('$wmakeCall', ''), NULLIF('$wcameraS', ''), NULLIF('$wcal', ''), NULLIF('$wstep', ''), NULLIF('$wsleep', ''), NULLIF('$whours', ''), NULLIF('$wwheart', ''), NULLIF('$wdistance', ''), NULLIF('$wspeak', ''), NULLIF('$wwaterResI', ''), NULLIF('$wwaterRes', ''), NULLIF('$wvoiceCI', ''), NULLIF('$wvoiceC', ''), NULLIF('$walarmC', ''), NULLIF('$wremind', ''), NULLIF('$wstopW', ''), NULLIF('$tvdisks1', ''), NULLIF('$tvdisks2', ''), NULLIF('$tvdisks3', ''), NULLIF('$tvfeaks1', ''), NULLIF('$tvfeaks2', ''), NULLIF('$tvfeaks3', ''), NULLIF('$tvconks1', ''), NULLIF('$tvconks2', ''), NULLIF('$tvconks3', ''), NULLIF('$tvsmfeaks1', ''), NULLIF('$tvsmfeaks2', ''), NULLIF('$tvsmfeaks3', ''), NULLIF('$tvseries', ''), NULLIF('$tvwarranty', ''), NULLIF('$tvboxC', ''), NULLIF('$tvtype', ''), NULLIF('$tvdistype', ''), NULLIF('$tvsize', ''), NULLIF('$tvreso', ''), NULLIF('$tvresoFilter', ''), NULLIF('$tvRefRate', ''), NULLIF('$tvaspRatio', ''), NULLIF('$tvhoriView', ''), NULLIF('$tvvertView', ''), NULLIF('$tv3D', ''), NULLIF('$tvcurved', ''), NULLIF('$tvultraSlim', ''), NULLIF('$tvotherDispFea', ''), NULLIF('$tvcolor', ''), NULLIF('$tvweight', ''), NULLIF('$tvweightStand', ''), NULLIF('$tvdimStand', ''), NULLIF('$tvdim', ''), NULLIF('$tvstandType', ''), NULLIF('$tvstandColor', ''), NULLIF('$tvstandFea', ''), NULLIF('$tvwllMountDim', ''), NULLIF('$tvdigitalRF', ''), NULLIF('$tvvideoF', ''), NULLIF('$tvimageF', ''), NULLIF('$tvupscale', ''), NULLIF('$tvsoundtype', ''), NULLIF('$tvsoundTech', ''), NULLIF('$tvaudioF', ''), NULLIF('$tvtotalSO', ''), NULLIF('$tvspeakerF', ''), NULLIF('$tvotherSA', ''), NULLIF('$tvusbP', ''), NULLIF('$tvusbS', ''), NULLIF('$tvhdmi', ''), NULLIF('$tvdigitalOA', ''), NULLIF('$tvrfI', ''), NULLIF('$tvethernetS', ''), NULLIF('$tvsmartv', ''), NULLIF('$tvandroid', ''), NULLIF('$tvwifiP', ''), NULLIF('$tvwifiD', ''), NULLIF('$tvmiracast', ''), NULLIF('$tvblue', ''), NULLIF('$tvblueV', ''), NULLIF('$tvinbuiltI', ''), NULLIF('$tvinbuiltA', ''), NULLIF('$tvfacebook', ''), NULLIF('$tvgame', ''), NULLIF('$tvvoice', ''), NULLIF('$tvotherSF', ''), NULLIF('$tvinternetA', ''), NULLIF('$tvvolt', ''), NULLIF('$tvfreq', ''), NULLIF('$tvpowerCR', ''), NULLIF('$tvpowerCS', ''), '$meta_keyword', '$mrp', NULLIF('$url', ''), NULLIF('$amazon_url', ''), NULLIF('$amazon_mrp', ''), NULLIF('$flipkart_url', ''), NULLIF('$flipkart_mrp', ''), NULLIF('$croma_url', ''), NULLIF('$croma_mrp', ''), NULLIF('$added_on', ''), 1, '$image')");
            $id = mysqli_insert_id($con);
        }

        /*Product Multiple Images Start*/
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if (isset($_FILES['product_images']['name'])) {
                foreach ($_FILES['product_images']['name'] as $key => $val) {
                    if ($_FILES['product_images']['name'][$key] != '') {
                        if (isset($_POST['product_images_id'][$key])) {
                            $image = date("d-m-Y") . "_" . time() . '_' . $_FILES['product_images']['name'][$key];
                            move_uploaded_file($_FILES['product_images']['tmp_name'][$key], PRODUCT_MULTIPLE_IMAGE_SERVER_PATH . $image);
                            mysqli_query($con, "update product_images set product_images='$image' where id='" . $_POST['product_images_id'][$key] . "'");
                        } else {
                            $image = date("d-m-Y") . "_" . time() . '_' . $_FILES['product_images']['name'][$key];
                            move_uploaded_file($_FILES['product_images']['tmp_name'][$key], PRODUCT_MULTIPLE_IMAGE_SERVER_PATH . $image);
                            mysqli_query($con, "insert into product_images(product_id,product_images) values('$id','$image')");
                        }
                    }
                }
            }
        } else {
            if (isset($_FILES['product_images']['name'])) {
                foreach ($_FILES['product_images']['name'] as $key => $val) {
                    if ($_FILES['product_images']['name'][$key] != '') {
                        $image = date("d-m-Y") . "_" . time() . '_' . $_FILES['product_images']['name'][$key];
                        move_uploaded_file($_FILES['product_images']['tmp_name'][$key], PRODUCT_MULTIPLE_IMAGE_SERVER_PATH . $image);
                        mysqli_query($con, "insert into product_images(product_id,product_images) values('$id','$image')");
                    }
                }
            }
        }
        /*Product Multiple Images End*/

        /* Product Attributes Start */

        foreach ($_POST['variant_id'] as $key => $val) {
            $variant_id = get_safe_value($con, $_POST['variant_id'][$key]);
            $pid = get_safe_value($con, $_POST['pid'][$key]);
            $attr_id = get_safe_value($con, $_POST['attr_id'][$key]);

            if ($attr_id > 0) {
                if ($variant_id == 'Variant') {
                    mysqli_query($con, "update product_attributes set variant_id='0', pid=NULLIF('$pid', '') where id='$attr_id'");
                } else {
                    mysqli_query($con, "update product_attributes set variant_id='$variant_id', pid=NULLIF('$pid', '') where id='$attr_id'");
                }
            } else {
                if ($variant_id == 'Variant') {
                    mysqli_query($con, "insert into product_attributes(product_id, variant_id, pid) values('$id','0', NULLIF('$pid', ''))");
                } else {
                    mysqli_query($con, "insert into product_attributes(product_id, variant_id, pid) values('$id','$variant_id', NULLIF('$pid', ''))");
                }
            }
        }

        /* Product Attributes End */

        redirect('product.php');
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Device : <?php if (strlen($name) >= 1) {
                            echo $name;
                        } else {
                            echo 'Add Product';
                        } ?></title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/add-product.css">
    <link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">
</head>

<body>
    <div class="alert-box">
        <img src="images/error.png" class="alert-img">
        <p class="alert-msg"></p>
    </div>
    <img src="images/Logo.png" class="logo">
    <div class="form">
        <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="product-full">
                <select name="categories_id" id="categories_id" required onchange="get_brand(''); change_form('');">
                    <option>Select Category</option>
                    <?php
                    $res = mysqli_query($con, "select id,categories from categories order by id asc");
                    while ($row = mysqli_fetch_assoc($res)) {
                        if ($row['id'] == $categories_id) {
                            echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                        } else {
                            echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="product-full">
                <select name="brand_id" id="brand_id" required>
                    <option>Select Brand</option>
                </select>
            </div>

            <div class="product-3-column" id="name-full">
                <input type="text" id="product-name" placeholder="product name" name="name" value="<?php echo $name ?>">
                <input type="text" id="osv" placeholder="Operating System Version" name="osv" value="<?php echo $osv ?>">
                <div class="product-os-icon">
                    <input class="checkbox-tools" type="radio" name="osicon" id="apple" value="apple" <?php echo ($osicon == 'apple') ? 'checked' : '' ?>>
                    <label class="for-checkbox-tools" for="apple">
                        <ion-icon name="logo-apple"></ion-icon>
                    </label>
                    <input class="checkbox-tools" type="radio" name="osicon" id="android" value="android" <?php echo ($osicon == 'android') ? 'checked' : '' ?>>
                    <label class="for-checkbox-tools" for="android">
                        <ion-icon name="logo-android"></ion-icon>
                    </label>
                    <input class="checkbox-tools" type="radio" name="osicon" id="windows" value="windows" <?php echo ($osicon == 'windows') ? 'checked' : '' ?>>
                    <label class="for-checkbox-tools" for="windows">
                        <ion-icon name="logo-windows"></ion-icon>
                    </label>
                </div>
            </div>

            <!-- product image -->
            <div class="product-info">
                <div class="product-image">
                    <input type="file" id="first-file-upload-btn" name="image" hidden <?php echo  $image_required ?>>
                    <label for="first-file-upload-btn" class="upload-image-full" style="background-image: url(<?php if ($image != '') {
                                                                                                                    echo PRODUCT_IMAGE_SITE_PATH . $image;
                                                                                                                } ?>);"></label>
                </div>
                <div class="upload-image-sec">
                    <!-- upload inputs -->
                    <p class="text">upload image</p>
                    <div class="upload-catalouge" id="image_box">
                        <button class="btn upload-image" name="cancel" type="button" onclick="add_more_image()" style="font-size: 60px;">+</button>
                        <!-- <div style="width: 100%;">
                            <label for="image_upload" class="upload-image close-box">
                                <input type="file" name="product_images[]" id="image_upload" required>
                                <a class="remove_img"><ion-icon name="close"></ion-icon></a>
                            </label>
                        </div> -->
                        <?php
                        if (isset($multipleImageArr[0])) {
                            foreach ($multipleImageArr as $list) {
                                echo '<div style="width: 100%;" id="add_image_box_' . $list['id'] . '"><label for="image_upload" class="upload-image close-box" style="background-image: url(' . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $list['product_images'] . ')"><input type="file" name="product_images[]" id="image_upload"><a href="manage_product.php?id=' . $id . '&pi=' . $list['id'] . '" class="remove_img"><ion-icon name="close"></ion-icon></a></label>';
                                echo '<input type="hidden" name="product_images_id[]" value="' . $list['id'] . '"/></div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- --------------------------Mobile----------------------------Mobile---------------------------------------Mobile------------------------------------------------ -->
            <!-- Mobile start -->
            <div class="mobile" style="display: none;">
                <!-- Performance KS-->
                <div class="product-key-specs">
                    <label for="performance-ks">Performance Key Specs</label>
                    <input type="text" id="performance-ks-1" placeholder="Performance point 1" name="perfks1" value="<?php echo $perfks1 ?>">
                    <input type="text" id="performance-ks-2" placeholder="Performance point 2" name="perfks2" value="<?php echo $perfks2 ?>">
                    <input type="text" id="performance-ks-3" placeholder="Performance point 3" name="perfks3" value="<?php echo $perfks3 ?>">
                    <label for="display-ks">Display Key Specs</label>
                    <input type="text" id="display-ks-1" placeholder="display point 1" name="dispks1" value="<?php echo $dispks1 ?>">
                    <input type="text" id="display-ks-2" placeholder="display point 2" name="dispks2" value="<?php echo $dispks2 ?>">
                    <input type="text" id="display-ks-3" placeholder="display point 3" name="dispks3" value="<?php echo $dispks3 ?>">
                    <label for="camera-ks">Camera Key Specs</label>
                    <input type="text" id="camera-ks-1" placeholder="camera point 1" name="cameks1" value="<?php echo $cameks1 ?>">
                    <input type="text" id="camera-ks-2" placeholder="camera point 2" name="cameks2" value="<?php echo $cameks2 ?>">
                    <input type="text" id="camera-ks-3" placeholder="camera point 3" name="cameks3" value="<?php echo $cameks3 ?>">
                    <label for="performance-ks">Battery Key Specs</label>
                    <input type="text" id="battery-ks-1" placeholder="battery point 1" name="batks1" value="<?php echo $batks1 ?>">
                    <input type="text" id="battery-ks-2" placeholder="battery point 2" name="batks2" value="<?php echo $batks2 ?>">
                    <input type="text" id="battery-ks-3" placeholder="battery point 3" name="batks3" value="<?php echo $batks3 ?>">
                </div>

                <!-- Specifications -->
                <!-- Key Specs -->
                <label>Key Specs</label>
                <div class="product-3-column">
                    <div class="suffix_box">
                        <input type="text" id="ram" placeholder="ram" name="ramemory" value="<?php echo $ramemory ?>">
                        <span class="suffix">GB</span>
                    </div>
                    <input type="text" id="processor" placeholder="processor" name="process" value="<?php echo $process ?>">
                    <div class="suffix_box">
                        <input type="text" id="mcamera" placeholder="mcamera" name="mcamera" value="<?php echo $mcamera ?>">
                        <span class="suffix">MP</span>
                    </div>
                    <input type="text" id="rear-camera" placeholder="rear camera" name="rcam" value="<?php echo $rcam ?>">
                    <div class="suffix_box">
                        <input type="text" id="front-camera" placeholder="front camera" name="fcam" value="<?php echo $fcam ?>">
                        <span class="suffix">MP</span>
                    </div>
                    <input type="text" id="display" placeholder="display" name="disp" value="<?php echo $disp ?>">
                </div>

                <!-- General -->
                <label>General</label>
                <div class="product-2-column">
                    <input type="text" id="launch-date" placeholder="launch date" name="ldate" value="<?php echo $ldate ?>">
                    <input type="text" id="custom-ui" placeholder="custom UI" name="cui" value="<?php echo $cui ?>">
                </div>

                <!-- Performance -->
                <label>Performance</label>
                <div class="product-full">
                    <input type="text" id="cpu" placeholder="cpu" name="cpunit" value="<?php echo $cpunit ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" id="chipset" placeholder="chipset" name="chip" value="<?php echo $chip ?>">
                    <input type="text" id="chip" placeholder="chip" name="mchip" value="<?php echo $mchip ?>">
                    <div class="suffix_box">
                        <input type="text" id="mprocessspeed" placeholder="processor Speed" name="mprocessspeed" value="<?php echo $mprocessspeed ?>">
                        <span class="suffix">GHz</span>
                    </div>
                    <div class="suffix_box">
                        <input type="text" id="mPCores" placeholder="Processor Cores" name="mPCores" value="<?php echo $mPCores ?>">
                        <span class="suffix">Core</span>
                    </div>
                    <input type="text" id="architecture" placeholder="architecture" name="archi" value="<?php echo $archi ?>">
                    <input type="text" id="fabrication" placeholder="fabrication" name="fab" value="<?php echo $fab ?>">
                    <input type="text" id="graphics" placeholder="graphics" name="graph" value="<?php echo $graph ?>">
                    <input type="text" id="ramtype" placeholder="RAM type" name="ramtype" value="<?php echo $ramtype ?>">
                </div>

                <!-- Display -->
                <label>Display</label>
                <div class="product-3-column">
                    <input type="text" id="display-type" placeholder="display type" name="distype" value="<?php echo $distype ?>">
                    <input type="text" id="screen-size" placeholder="screen size" name="screensize" value="<?php echo $screensize ?>">
                    <div class="suffix_box">
                        <input type="text" id="screen-size" placeholder="actual screen size" name="mscreensize" value="<?php echo $mscreensize ?>">
                        <span class="suffix">inches</span>
                    </div>
                    <input type="text" id="resolution" placeholder="resolution" name="disres" value="<?php echo $disres ?>">
                    <input type="text" id="aspect-ratio" placeholder="aspect ratio" name="aspratio" value="<?php echo $aspratio ?>">
                    <div class="suffix_box">
                        <input type="text" id="pixel-density" placeholder="pixel density" name="pixden" value="<?php echo $pixden ?>">
                        <span class="suffix">ppi</span>
                    </div>
                    <input type="text" id="screen-to-body-ratio" placeholder="screen to body ratio" name="screenbody" value="<?php echo $screenbody ?>">
                    <input type="text" id="screen-protection" placeholder="screen protection" name="screenprot" value="<?php echo $screenprot ?>">
                    <input type="text" id="bezel-less-display" placeholder="bezel-less display" name="bezdisp" value="<?php echo $bezdisp ?>">
                    <input type="text" id="touch-screen" placeholder="touch screen" name="touchscreen" value="<?php echo $touchscreen ?>">
                    <input type="text" id="brightness" placeholder="Brightness" name="bright" value="<?php echo $bright ?>">
                    <input type="text" id="hdr" placeholder="HDR 10/HDR+ support" name="hd" value="<?php echo $hd ?>">
                    <div class="suffix_box">
                        <input type="text" id="refresh-rate" placeholder="refresh rate" name="refrate" value="<?php echo $refrate ?>">
                        <span class="suffix">Hz</span>
                    </div>
                </div>

                <!-- Design -->
                <label>Design</label>
                <div class="product-3-column">
                    <input type="text" id="height" placeholder="height" name="hei" value="<?php echo $hei ?>">
                    <input type="text" id="width" placeholder="width" name="wid" value="<?php echo $wid ?>">
                    <input type="text" id="thickness" placeholder="thickness" name="thick" value="<?php echo $thick ?>">
                    <input type="text" id="weight" placeholder="weight" name="weig" value="<?php echo $weig ?>">
                    <input type="text" id="build-material" placeholder="build material" name="buildM" value="<?php echo $buildM ?>">
                    <input type="text" id="ruggedness" placeholder="ruggedness" name="rugg" value="<?php echo $rugg ?>">
                </div>
                <div class="product-2-column">
                    <input type="text" id="colors" placeholder="colors" name="col" value="<?php echo $col ?>">
                    <input type="text" id="waterproof" placeholder="waterproof" name="water" value="<?php echo $water ?>">
                </div>

                <!-- Camera -->
                <label>Camera</label>
                <br>
                <label>Main Camera</label>
                <div class="product-2-column">
                    <input type="text" id="camera-setup" placeholder="camera setup" name="camset" value="<?php echo $camset ?>">
                    <input type="text" id="resolution-1" placeholder="resolution 1" name="res1" value="<?php echo $res1 ?>">
                    <input type="text" id="resolution-fl-1" placeholder="resolution focus length 1" name="resfl1" value="<?php echo $resfl1 ?>">
                    <input type="text" id="resolution-2" placeholder="resolution 2" name="res2" value="<?php echo $res2 ?>">
                    <input type="text" id="resolution-fl-2" placeholder="resolution focus length 2" name="resfl2" value="<?php echo $resfl2 ?>">
                    <input type="text" id="resolution-3" placeholder="resolution 3" name="res3" value="<?php echo $res3 ?>">
                    <input type="text" id="resolution-fl-3" placeholder="resolution focus length 3" name="resfl3" value="<?php echo $resfl3 ?>">
                    <input type="text" id="resolution-4" placeholder="resolution 4" name="res4" value="<?php echo $res4 ?>">
                    <input type="text" id="resolution-fl-4" placeholder="resolution focus length 4" name="resfl4" value="<?php echo $resfl4 ?>">
                    <input type="text" id="sensor" placeholder="sensor" name="sens" value="<?php echo $sens ?>">
                    <input type="text" id="autofocus" placeholder="autofocus" name="af" value="<?php echo $af ?>">
                    <input type="text" id="ois" placeholder="OIS" name="oi" value="<?php echo $oi ?>">
                    <input type="text" id="flash" placeholder="flash" name="flas" value="<?php echo $flas ?>">
                    <input type="text" id="image-resolution" placeholder="image resolution" name="imgres" value="<?php echo $imgres ?>">
                    <input type="text" id="settings" placeholder="settings" name="sett" value="<?php echo $sett ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" id="camera-features" placeholder="camera features 1" name="camfea1" value="<?php echo $camfea1 ?>">
                    <input type="text" id="camera-features" placeholder="camera features 2" name="camfea2" value="<?php echo $camfea2 ?>">
                    <input type="text" id="camera-features" placeholder="camera features 3" name="camfea3" value="<?php echo $camfea3 ?>">
                    <input type="text" id="camera-features" placeholder="camera features 4" name="camfea4" value="<?php echo $camfea4 ?>">
                    <input type="text" id="camera-features" placeholder="camera features 5" name="camfea5" value="<?php echo $camfea5 ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" id="shooting-modes" placeholder="shooting modes 1" name="shootmode1" value="<?php echo $shootmode1 ?>">
                    <input type="text" id="shooting-modes" placeholder="shooting modes 2" name="shootmode2" value="<?php echo $shootmode2 ?>">
                    <input type="text" id="shooting-modes" placeholder="shooting modes 3" name="shootmode3" value="<?php echo $shootmode3 ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" id="video-recording" placeholder="video recording 1" name="vidrec1" value="<?php echo $vidrec1 ?>">
                    <input type="text" id="video-recording" placeholder="video recording 2" name="vidrec2" value="<?php echo $vidrec2 ?>">
                    <input type="text" id="video-recording" placeholder="video recording 3" name="vidrec3" value="<?php echo $vidrec3 ?>">
                    <input type="text" id="video-recording" placeholder="video recording 4" name="vidrec4" value="<?php echo $vidrec4 ?>">
                </div>
                <label>Front Camera</label>
                <div class="product-2-column">
                    <input type="text" id="front-camera-setup" placeholder="front camera setup" name="fcamset" value="<?php echo $fcamset ?>">
                    <input type="text" id="front-resolution" placeholder="front resolution" name="fres" value="<?php echo $fres ?>">
                    <input type="text" id="front-resolution-fl" placeholder="front resolution focus length 1" name="fresfl" value="<?php echo $fresfl ?>">
                    <input type="text" id="front-flash" placeholder="front flash" name="frflash" value="<?php echo $frflash ?>">
                    <input type="text" id="front-autofocus" placeholder="front autofocus" name="faf" value="<?php echo $faf ?>">
                </div>
                <div class="product-2-column">
                    <input type="text" id="front-video-recording" placeholder="front video recording 1" name="fvidrec1" value="<?php echo $fvidrec1 ?>">
                    <input type="text" id="front-video-recording" placeholder="front video recording 2" name="fvidrec2" value="<?php echo $fvidrec2 ?>">
                </div>

                <!-- Battery -->
                <label>Battery</label>
                <div class="product-3-column">
                    <div class="suffix_box">
                        <input type="text" id="capacity" placeholder="capacity" name="cap" value="<?php echo $cap ?>">
                        <span class="suffix">mAh</span>
                    </div>
                    <input type="text" id="type" placeholder="type" name="typ" value="<?php echo $typ ?>">
                    <input type="text" id="removable" placeholder="removable" name="remove" value="<?php echo $remove ?>">
                    <input type="text" id="talktime" placeholder="talktime" name="talktime" value="<?php echo $talktime ?>">
                    <input type="text" id="wireless-charging" placeholder="wireless charging" name="wcharge" value="<?php echo $wcharge ?>">
                    <input type="text" id="quick-charging" placeholder="quick charging" name="qcharge" value="<?php echo $qcharge ?>">
                    <input type="text" id="usb-type-c" placeholder="USB type-c" name="usbc" value="<?php echo $usbc ?>">
                </div>

                <!-- Storage -->
                <label>Storage</label>
                <div class="product-3-column">
                    <div class="suffix_box">
                        <input type="text" id="internal-memory" placeholder="internal memory" name="intmem" value="<?php echo $intmem ?>">
                        <span class="suffix">GB</span>
                    </div>
                    <input type="text" id="expandable-memeory" placeholder="expandable memeory" name="expmem" value="<?php echo $expmem ?>">
                    <input type="text" id="user-storage" placeholder="user available storage" name="userstore" value="<?php echo $userstore ?>">
                    <input type="text" id="usb-otg" placeholder="USB OTG" name="usbotg" value="<?php echo $usbotg ?>">
                    <input type="text" id="storage-type" placeholder="storage type" name="storetype" value="<?php echo $storetype ?>">
                </div>

                <!-- Network & Connectivity -->
                <label>Network & Connectivity</label>
                <div class="product-2-column">
                    <input type="text" id="sim-slot" placeholder="sim slot(s)" name="simslot" value="<?php echo $simslot ?>">
                    <input type="text" id="sim-size" placeholder="sim size" name="simsize" value="<?php echo $simsize ?>">
                    <input type="text" id="network-support" placeholder="network support" name="netsupp" value="<?php echo $netsupp ?>">
                    <input type="text" id="volte" placeholder="VoLTE" name="volt" value="<?php echo $volt ?>">
                </div>
                <div class="product-full">
                    <input type="text" id="sim-1-4g" placeholder="sim 1 4G" name="sim4g" value="<?php echo $sim4g ?>">
                    <input type="text" id="sim-1-3g" placeholder="sim 1 3G" name="sim3g" value="<?php echo $sim3g ?>">
                    <input type="text" id="sim-1-2g" placeholder="sim 1 2G" name="sim2g" value="<?php echo $sim2g ?>">
                </div>
                <div class="product-2-column">
                    <input type="text" id="gprs-1" placeholder="GPRS sim 1" name="gprs" value="<?php echo $gprs ?>">
                    <input type="text" id="edge-1" placeholder="EDGE sim 1" name="edge" value="<?php echo $edge ?>">
                </div>
                <div class="product-full">
                    <input type="text" id="sim-2-4g" placeholder="sim 2 4G" name="sim24g" value="<?php echo $sim24g ?>">
                    <input type="text" id="sim-2-3g" placeholder="sim 2 3G" name="sim23g" value="<?php echo $sim23g ?>">
                    <input type="text" id="sim-2-2g" placeholder="sim 2 2G" name="sim22g" value="<?php echo $sim22g ?>">
                </div>
                <div class="product-2-column">
                    <input type="text" id="gprs-2" placeholder="GPRS sim 2" name="gprs2" value="<?php echo $gprs2 ?>">
                    <input type="text" id="edge-2" placeholder="EDGE sim 2" name="edge2" value="<?php echo $edge2 ?>">
                </div>
                <div class="product-full">
                    <input type="text" id="wi-fi" placeholder="wi-fi" name="wifi" value="<?php echo $wifi ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" id="wi-fi-features" placeholder="wi-fi features" name="wififea" value="<?php echo $wififea ?>">
                    <input type="text" id="wi-fi-calling" placeholder="wi-fi calling" name="wificall" value="<?php echo $wificall ?>">
                    <input type="text" id="bluetooth" placeholder="bluetooth" name="blue" value="<?php echo $blue ?>">
                    <input type="text" id="gps" placeholder="GPS" name="gps" value="<?php echo $gps ?>">
                    <input type="text" id="nfc" placeholder="NFC" name="nfc" value="<?php echo $nfc ?>">
                    <input type="text" id="usb-connectivity" placeholder="USB connectivity" name="usbconn" value="<?php echo $usbconn ?>">
                </div>

                <!-- Multimedia -->
                <label>Multimedia</label>
                <div class="product-2-column">
                    <input type="text" id="fm-radio" placeholder="fm radio" name="fmr" value="<?php echo $fmr ?>">
                    <input type="text" id="loudspeaker" placeholder="loudspeaker" name="loud" value="<?php echo $loud ?>">
                    <input type="text" id="audio-jack" placeholder="audio jack" name="audjack" value="<?php echo $audjack ?>">
                    <input type="text" id="audio-features" placeholder="audio features" name="audfea" value="<?php echo $audfea ?>">
                </div>

                <!-- Sensors -->
                <label>Sensors</label>
                <div class="product-4-column">
                    <input type="text" id="fingerprint-sensor" placeholder="fingerprint sensor" name="finger" value="<?php echo $finger ?>">
                    <input type="text" id="fingerprint-sensor-position" placeholder="fingerprint sensor position" name="fingerPos" value="<?php echo $fingerPos ?>">
                    <input type="text" id="fingerprint-sensor-type" placeholder="fingerprint sensor type" name="fingerType" value="<?php echo $fingerType ?>">
                    <input type="text" id="face-unlock" placeholder="face unlock" name="faceunlock" value="<?php echo $faceunlock ?>">
                </div>
                <div class="product-full">
                    <input type="text" id="other-sensors" placeholder="other sensors" name="othersens" value="<?php echo $othersens ?>">
                </div>
            </div>
            <!-- Mobile End -->
            <!-- --------------------------Tablet----------------------------Tablet---------------------------------------Tablet------------------------------------------------ -->
            <!-- Tablet start -->
            <div class="tablet" style="display: none;">
                <!-- Performance KS-->
                <div class="product-key-specs">
                    <label for="performance-ks">Performance Key Specs</label>
                    <input type="text" id="performance-ks-1" placeholder="Performance point 1" name="tperfks1" value="<?php echo $tperfks1 ?>">
                    <input type="text" id="performance-ks-2" placeholder="Performance point 2" name="tperfks2" value="<?php echo $tperfks2 ?>">
                    <input type="text" id="performance-ks-3" placeholder="Performance point 3" name="tperfks3" value="<?php echo $tperfks3 ?>">
                    <label for="display-ks">Display Key Specs</label>
                    <input type="text" id="display-ks-1" placeholder="display point 1" name="tdispks1" value="<?php echo $tdispks1 ?>">
                    <input type="text" id="display-ks-2" placeholder="display point 2" name="tdispks2" value="<?php echo $tdispks2 ?>">
                    <input type="text" id="display-ks-3" placeholder="display point 3" name="tdispks3" value="<?php echo $tdispks3 ?>">
                    <label for="camera-ks">Camera Key Specs</label>
                    <input type="text" id="camera-ks-1" placeholder="camera point 1" name="tcameks1" value="<?php echo $tcameks1 ?>">
                    <input type="text" id="camera-ks-2" placeholder="camera point 2" name="tcameks2" value="<?php echo $tcameks2 ?>">
                    <input type="text" id="camera-ks-3" placeholder="camera point 3" name="tcameks3" value="<?php echo $tcameks3 ?>">
                    <label for="performance-ks">Battery Key Specs</label>
                    <input type="text" id="battery-ks-1" placeholder="battery point 1" name="tbatks1" value="<?php echo $tbatks1 ?>">
                    <input type="text" id="battery-ks-2" placeholder="battery point 2" name="tbatks2" value="<?php echo $tbatks2 ?>">
                    <input type="text" id="battery-ks-3" placeholder="battery point 3" name="tbatks3" value="<?php echo $tbatks3 ?>">
                </div>

                <!-- General -->
                <label>General</label>
                <div class="product-2-column">
                    <input type="text" id="launch-date" placeholder="launch date" name="tldate" value="<?php echo $tldate ?>">
                    <input type="text" id="custom-ui" placeholder="custom UI" name="tcui" value="<?php echo $tcui ?>">
                </div>
                <!-- Design -->
                <label>Design</label>
                <div class="product-3-column">
                    <input type="text" id="height" placeholder="height" name="theight" value="<?php echo $theight ?>">
                    <input type="text" id="width" placeholder="width" name="twidth" value="<?php echo $twidth ?>">
                    <input type="text" id="thickness" placeholder="thickness" name="tthick" value="<?php echo $tthick ?>">
                    <input type="text" id="weight" placeholder="weight" name="tweight" value="<?php echo $tweight ?>">
                    <input type="text" id="build-material" placeholder="build material" name="tbuildM" value="<?php echo $tbuildM ?>">
                    <input type="text" id="colors" placeholder="colors" name="tcolor" value="<?php echo $tcolor ?>">
                </div>
                <!-- Display -->
                <label>Display</label>
                <div class="product-3-column">
                    <input type="text" id="screen-size" placeholder="screen size" name="tscreenSize" value="<?php echo $tscreenSize ?>">
                    <input type="text" placeholder="Actual screen size" name="tactualscreen" value="<?php echo $tactualscreen ?>">
                    <input type="text" id="screen-resolution" placeholder="screen resolution" name="tscreenRes" value="<?php echo $tscreenRes ?>">
                    <input type="text" id="pixel-density" placeholder="pixel density" name="tpixDen" value="<?php echo $tpixDen ?>">
                    <input type="text" id="display-type" placeholder="display type" name="tdisType" value="<?php echo $tdisType ?>">
                    <input type="text" id="screen-protection" placeholder="screen protection" name="tscreenP" value="<?php echo $tscreenP ?>">
                    <input type="text" id="touch-screen" placeholder="touch screen" name="ttouchScreen" value="<?php echo $ttouchScreen ?>">
                    <input type="text" id="screen-ratio" placeholder="screen ratio" name="tscreenRatio" value="<?php echo $tscreenRatio ?>">
                </div>
                <!-- Performance -->
                <label>Performance</label>
                <div class="product-3-column">
                    <input type="text" id="chipset" placeholder="chipset" name="tchip" value="<?php echo $tchip ?>">
                    <input type="text" placeholder="Chip Name" name="tchipName" value="<?php echo $tchipName ?>">
                    <input type="text" placeholder="Processor Core" name="tPcore" value="<?php echo $tPcore ?>">
                    <input type="text" id="processor" placeholder="processor" name="tprocess" value="<?php echo $tprocess ?>">
                    <input type="text" id="architecture" placeholder="architecture" name="tarchi" value="<?php echo $tarchi ?>">
                    <input type="text" id="graphics" placeholder="graphics" name="tgraph" value="<?php echo $tgraph ?>">
                    <input type="text" id="ram" placeholder="RAM" name="tram" value="<?php echo $tram ?>">
                </div>
                <!-- Storage -->
                <label>Storage</label>
                <div class="product-4-column">
                    <input type="text" id="internal-memory" placeholder="internal memory" name="tintMem" value="<?php echo $tintMem ?>">
                    <input type="text" id="expandable-memory" placeholder="expandable memory" name="texpMem" value="<?php echo $texpMem ?>">
                    <input type="text" id="user-storeage" placeholder="user storeage" name="tuserStore" value="<?php echo $tuserStore ?>">
                    <input type="text" placeholder="USB OTG" name="tusbotg" value="<?php echo $tusbotg ?>">
                </div>
                <!-- Camera -->
                <label>Camera</label>
                <br>
                <label>Main Camera</label>
                <div class="product-2-column">
                    <input type="text" placeholder="main camera" name="tmaincam" value="<?php echo $tmaincam ?>">
                    <input type="text" id="resolution-1" placeholder="resolution 1" name="tres1" value="<?php echo $tres1 ?>">
                    <input type="text" id="resolution-fl-1" placeholder="resolution focus length 1" name="tresfl1" value="<?php echo $tresfl1 ?>">
                    <input type="text" id="resolution-2" placeholder="resolution 2" name="tres2" value="<?php echo $tres2 ?>">
                    <input type="text" id="resolution-fl-2" placeholder="resolution focus length 2" name="tresfl2" value="<?php echo $tresfl2 ?>">
                    <input type="text" id="resolution-3" placeholder="resolution 3" name="tres3" value="<?php echo $tres3 ?>">
                    <input type="text" id="resolution-fl-3" placeholder="resolution focus length 3" name="tresfl3" value="<?php echo $tresfl3 ?>">
                    <input type="text" id="resolution-4" placeholder="resolution 4" name="tres4" value="<?php echo $tres4 ?>">
                    <input type="text" id="resolution-fl-4" placeholder="resolution focus length 4" name="tresfl4" value="<?php echo $tresfl4 ?>">
                    <input type="text" id="autofocus" placeholder="autofocus" name="taf" value="<?php echo $taf ?>">
                    <input type="text" id="flash" placeholder="flash" name="tflash" value="<?php echo $tflash ?>">
                    <input type="text" id="image-resolution" placeholder="image resolution" name="timgRes" value="<?php echo $timgRes ?>">
                    <input type="text" id="settings" placeholder="settings" name="tsett" value="<?php echo $tsett ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" id="shooting-modes" placeholder="shooting modes 1" name="tshootmode1" value="<?php echo $tshootmode1 ?>">
                    <input type="text" id="shooting-modes" placeholder="shooting modes 2" name="tshootmode2" value="<?php echo $tshootmode2 ?>">
                    <input type="text" id="shooting-modes" placeholder="shooting modes 3" name="tshootmode3" value="<?php echo $tshootmode3 ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" id="video-recording" placeholder="video recording 1" name="tvidRec1" value="<?php echo $tvidRec1 ?>">
                    <input type="text" id="video-recording" placeholder="video recording 2" name="tvidRec2" value="<?php echo $tvidRec2 ?>">
                    <input type="text" id="video-recording" placeholder="video recording 3" name="tvidRec3" value="<?php echo $tvidRec3 ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" id="camera-features" placeholder="camera features 1" name="tcamFea1" value="<?php echo $tcamFea1 ?>">
                    <input type="text" id="camera-features" placeholder="camera features 2" name="tcamFea2" value="<?php echo $tcamFea2 ?>">
                    <input type="text" id="camera-features" placeholder="camera features 3" name="tcamFea3" value="<?php echo $tcamFea3 ?>">
                    <input type="text" id="camera-features" placeholder="camera features 4" name="tcamFea4" value="<?php echo $tcamFea4 ?>">
                    <input type="text" id="camera-features" placeholder="camera features 5" name="tcamFea5" value="<?php echo $tcamFea5 ?>">
                </div>
                <label>Front Camera</label>
                <div class="product-3-column">
                    <input type="text" placeholder="front camera" name="tfcam" value="<?php echo $tfcam ?>">
                    <input type="text" placeholder="front resolution 1" name="tfres1" value="<?php echo $tfres1 ?>">
                    <input type="text" placeholder="front resolution focus length 1" name="tfresfl1" value="<?php echo $tfresfl1 ?>">
                    <input type="text" placeholder="front resolution 2" name="tfres2" value="<?php echo $tfres2 ?>">
                    <input type="text" placeholder="front resolution focus length 2" name="tfresfl2" value="<?php echo $tfresfl2 ?>">
                    <input type="text" placeholder="flash" name="tfflash" value="<?php echo $tfflash ?>">
                    <input type="text" placeholder="front video recording 1" name="tfvidrec1" value="<?php echo $tfvidrec1 ?>">
                    <input type="text" placeholder="front video recording 2" name="tfvidrec2" value="<?php echo $tfvidrec2 ?>">
                </div>
                <!-- Battery -->
                <label>Battery</label>
                <div class="product-3-column">
                    <input type="text" id="capacity" placeholder="capacity" name="tcap" value="<?php echo $tcap ?>">
                    <input type="text" id="type" placeholder="type" name="ttype" value="<?php echo $ttype ?>">
                    <input type="text" id="user-replaceable" placeholder="user replaceable" name="tuserR" value="<?php echo $tuserR ?>">
                    <input type="text" id="quick-charging" placeholder="quick charging" name="tquickC" value="<?php echo $tquickC ?>">
                    <input type="text" id="usb-type-C" placeholder="USB type-C" name="tusbC" value="<?php echo $tusbC ?>">
                </div>
                <!-- Network & Connectivity -->
                <label>Network & Connectivity</label>
                <div class="product-3-column">
                    <input type="text" placeholder="sim size" name="tsimsize" value="<?php echo $tsimsize ?>">
                    <input type="text" placeholder="network support" name="tnetsupp" value="<?php echo $tnetsupp ?>">
                    <input type="text" placeholder="VoLTE" name="tvolt" value="<?php echo $tvolt ?>">
                </div>
                <div class="product-full">
                    <input type="text" placeholder="sim 1 4G" name="tsim4g" value="<?php echo $tsim4g ?>">
                    <input type="text" placeholder="sim 1 3G" name="tsim3g" value="<?php echo $tsim3g ?>">
                    <input type="text" placeholder="sim 1 2G" name="tsim2g" value="<?php echo $tsim2g ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" placeholder="GPRS sim 1" name="tgprs" value="<?php echo $tgprs ?>">
                    <input type="text" placeholder="EDGE sim 1" name="tedge" value="<?php echo $tedge ?>">
                    <input type="text" id="voice-calling" placeholder="voice calling" name="tvoiceCall" value="<?php echo $tvoiceCall ?>">
                    <input type="text" id="wi-fi" placeholder="wi fi" name="twifi" value="<?php echo $twifi ?>">
                    <input type="text" id="wi-fi-features" placeholder="wi fi features" name="twifiFea" value="<?php echo $twifiFea ?>">
                    <input type="text" id="bluetooth" placeholder="bluetooth" name="tblue" value="<?php echo $tblue ?>">
                    <input type="text" id="nfc" placeholder="NFC" name="tnfc" value="<?php echo $tnfc ?>">
                    <input type="text" id="usbConnectivity" placeholder="USB connectivity" name="tusbConn" value="<?php echo $tusbConn ?>">
                    <input type="text" placeholder="HDMI" name="thdmi" value="<?php echo $thdmi ?>">
                </div>
                <!-- Multimedia -->
                <label>Multimedia</label>
                <div class="product-3-column">
                    <input type="text" id="fm" placeholder="FM" name="tfmr" value="<?php echo $tfmr ?>">
                    <input type="text" id="audio-jack" placeholder="audio jack" name="taudioJ" value="<?php echo $taudioJ ?>">
                    <input type="text" id="audio-features" placeholder="audio features" name="taudioF" value="<?php echo $taudioF ?>">
                </div>
                <!-- Special Features -->
                <label>Special Features</label>
                <div class="product-3-column">
                    <input type="text" id="fingerprint-sensor" placeholder="fingerprint sensor" name="tfinger" value="<?php echo $tfinger ?>">
                    <input type="text" id="fingerprint-position" placeholder="fingerprint pposition" name="tfingerPos" value="<?php echo $tfingerPos ?>">
                    <input type="text" id="other-sensor" placeholder="other sensor" name="totherSens" value="<?php echo $totherSens ?>">
                </div>
            </div>
            <!-- Tablet end -->
<!-- --------------------------Laptop----------------------------Laptop---------------------------------------Laptop------------------------------------------------ -->
            <!-- Laptop Start -->
            <div class="laptop" style="display: none;">
                <!-- Performance KS-->
                <div class="product-key-specs">
                    <label for="performance-ks">Performance Key Specs</label>
                    <input type="text" id="performance-ks-1" placeholder="Performance point 1" name="lperfks1" value="<?php echo $lperfks1 ?>">
                    <input type="text" id="performance-ks-2" placeholder="Performance point 2" name="lperfks2" value="<?php echo $lperfks2 ?>">
                    <input type="text" id="performance-ks-3" placeholder="Performance point 3" name="lperfks3" value="<?php echo $lperfks3 ?>">
                    <label>Design Key Specs</label>
                    <input type="text" id="design-ks-1" placeholder="design point 1" name="desiks1" value="<?php echo $desiks1 ?>">
                    <input type="text" id="design-ks-2" placeholder="design point 2" name="desiks2" value="<?php echo $desiks2 ?>">
                    <input type="text" id="design-ks-3" placeholder="design point 3" name="desiks3" value="<?php echo $desiks3 ?>">
                    <label>Storage Key Specs</label>
                    <input type="text" id="storage-ks-1" placeholder="storage point 1" name="storks1" value="<?php echo $storks1 ?>">
                    <input type="text" id="storage-ks-2" placeholder="storage point 2" name="storks2" value="<?php echo $storks2 ?>">
                    <input type="text" id="storage-ks-3" placeholder="storage point 3" name="storks3" value="<?php echo $storks3 ?>">
                    <label for="performance-ks">Battery Key Specs</label>
                    <input type="text" id="battery-ks-1" placeholder="battery point 1" name="lbatks1" value="<?php echo $lbatks1 ?>">
                    <input type="text" id="battery-ks-2" placeholder="battery point 2" name="lbatks2" value="<?php echo $lbatks2 ?>">
                    <input type="text" id="battery-ks-3" placeholder="battery point 3" name="lbatks3" value="<?php echo $lbatks3 ?>">
                </div>

                <!-- General Information -->
                <label>General Information</label>
                <div class="product-3-column">
                    <input type="text" id="model" placeholder="model" name="lmodel" value="<?php echo $lmodel ?>">
                    <input type="text" id="dimensions" placeholder="dimensions (WxHxD)" name="ldimen" value="<?php echo $ldimen ?>">
                    <input type="text" id="Weight" placeholder="Weight" name="lweight" value="<?php echo $lweight ?>">
                    <input type="text" id="colors" placeholder="colors" name="lcolor" value="<?php echo $lcolor ?>">
                    <input type="text" id="operating-system-type" placeholder="operating system type" name="lostype" value="<?php echo $lostype ?>">
                </div>
                <div class="product-3-column">
                    <div style="display: flex; align-items: center; justify-content: space-evenly;">
                        <p class="heading-lebel" style="margin: 0;">Ultrabook</p>
                        <label for="noise-cancel-yes" class="label-radio">
                            <input type="radio" name="lultrabook" id="noise-cancel-yes" value="checkmark" <?php echo ($lultrabook == 'checkmark') ? 'checked' : '' ?> class="input-radio radio noise">
                            <p class="label-r">Yes</p>
                        </label>
                        <label for="noise-cancel-no" class="label-radio">
                            <input type="radio" name="lultrabook" id="noise-cancel-no" value="close" <?php echo ($lultrabook == 'close') ? 'checked' : '' ?> class="input-radio radio close noise">
                            <p class="label-r">No</p>
                        </label>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-evenly;">
                        <p class="heading-lebel" style="margin: 0;">2-in-1 (Convertible)</p>
                        <label for="noise-cancel-yes" class="label-radio">
                            <input type="radio" name="lconvertible" id="noise-cancel-yes" value="checkmark" <?php echo ($lconvertible == 'checkmark') ? 'checked' : '' ?> class="input-radio radio noise">
                            <p class="label-r">Yes</p>
                        </label>
                        <label for="noise-cancel-no" class="label-radio">
                            <input type="radio" name="lconvertible" id="noise-cancel-no" value="close" <?php echo ($lconvertible == 'close') ? 'checked' : '' ?> class="input-radio radio close noise">
                            <p class="label-r">No</p>
                        </label>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-evenly;">
                        <p class="heading-lebel" style="margin: 0;">2-in-1 (Detachable)</p>
                        <label for="noise-cancel-yes" class="label-radio">
                            <input type="radio" name="ldetachable" id="noise-cancel-yes" value="checkmark" <?php echo ($ldetachable == 'checkmark') ? 'checked' : '' ?> class="input-radio radio noise">
                            <p class="label-r">Yes</p>
                        </label>
                        <label for="noise-cancel-no" class="label-radio">
                            <input type="radio" name="ldetachable" id="noise-cancel-no" value="close" <?php echo ($ldetachable == 'close') ? 'checked' : '' ?> class="input-radio radio close noise">
                            <p class="label-r">No</p>
                        </label>
                    </div>
                </div>
                <!-- Display Details -->
                <label>Display Details</label>
                <div class="product-4-column">
                    <input type="text" id="display-size" placeholder="display size" name="ldisSize" value="<?php echo $ldisSize ?>">
                    <input type="text" placeholder="actual display size" name="lactualdisSize" value="<?php echo $lactualdisSize ?>">
                    <input type="text" id="display-resolution" placeholder="display resolution" name="ldisRes" value="<?php echo $ldisRes ?>">
                    <input type="text" id="pixel-density" placeholder="pixel density" name="lpixden" value="<?php echo $lpixden ?>">
                </div>
                <div class="product-3-column">
                    <input type="text" id="display-type" placeholder="display type" name="ldisType" value="<?php echo $ldisType ?>">
                    <input type="text" id="display-features" placeholder="display features" name="ldisFea" value="<?php echo $ldisFea ?>">
                    <input type="text" id="display-touchscreen" placeholder="display-touchscreen" name="ldisTouch" value="<?php echo $ldisTouch ?>">
                </div>
                <!-- Performance -->
                <label>Performance</label>
                <div class="product-2-column">
                    <input type="text" id="processor" placeholder="processor" name="lprocess" value="<?php echo $lprocess ?>">
                    <input type="text" id="processor-speed" placeholder="processor speed" name="lprocessCSpeed" value="<?php echo $lprocessCSpeed ?>">
                </div>
                <div class="product-full">
                    <input type="text" id="graphic-processor" placeholder="graphic processor" name="lgraphProcess" value="<?php echo $lgraphProcess ?>">
                </div>
                <div class="product-2-column">
                    <input type="text" id="graphics-memory" placeholder="graphics memory" name="lgraphM" value="<?php echo $lgraphM ?>">
                    <input type="text" placeholder="graphics actual memory" name="lgraphActMem" value="<?php echo $lgraphActMem ?>">
                </div>
                <div class="product-full">
                    <div class="laptop-processor">
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="applem1" value="Apple M1" <?php echo ($lprocessortype == 'Apple M1') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="applem1">Apple M1</label>
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="inteli9" value="Intel i9" <?php echo ($lprocessortype == 'Intel i9') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="inteli9">Intel i9</label>
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="inteli7" value="Intel i7" <?php echo ($lprocessortype == 'Intel i7') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="inteli7">Intel i7</label>
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="inteli5" value="Intel i5" <?php echo ($lprocessortype == 'Intel i5') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="inteli5">Intel i5</label>
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="inteli3" value="Intel i3" <?php echo ($lprocessortype == 'Intel i3') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="inteli3">Intel i3</label>
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="intelatom" value="Intel Atom" <?php echo ($lprocessortype == 'Intel Atom') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="intelatom">Intel Atom</label>
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="intelceleronDC" value="Intel Celeron Dual Core" <?php echo ($lprocessortype == 'Intel Celeron Dual Core') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="intelceleronDC">Intel Celeron Dual Core</label>
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="intelpentiumDC" value="Intel Pentium Dual Core" <?php echo ($lprocessortype == 'Intel Pentium Dual Core') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="intelpentiumDC">Intel Pentium Dual Core</label>
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="AMDQC" value="AMD Quad Core" <?php echo ($lprocessortype == 'AMD Quad Core') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="AMDQC">AMD Quad Core</label>
                        <input class="checkbox-tools" type="radio" name="lprocessortype" id="AMDDC" value="AMD Dual Core" <?php echo ($lprocessortype == 'AMD Dual Core') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="AMDDC">AMD Dual Core</label>
                    </div>
                </div>
                <div class="product-full">
                    <div class="laptop-processor">
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="12gen" value="12gen" <?php echo ($lprocessorGen == '12gen') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="12gen">12th Gen</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="11gen" value="11gen" <?php echo ($lprocessorGen == '11gen') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="11gen">11th Gen</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="10gen" value="10gen" <?php echo ($lprocessorGen == '10gen') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="10gen">10th Gen</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="8gen" value="8gen" <?php echo ($lprocessorGen == '8gen') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="8gen">8th Gen</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="7gen" value="7gen" <?php echo ($lprocessorGen == '7gen') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="7gen">7th Gen</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="6gen" value="6gen" <?php echo ($lprocessorGen == '6gen') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="6gen">6th Gen</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="5gen" value="5gen" <?php echo ($lprocessorGen == '5gen') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="5gen">5th Gen</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="AMDA10" value="AMDA10" <?php echo ($lprocessorGen == 'AMDA10') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="AMDA10">AMD A10</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="AMDA12" value="AMDA12" <?php echo ($lprocessorGen == 'AMDA12') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="AMDA12">AMD A12</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="AMDE1" value="AMDE1" <?php echo ($lprocessorGen == 'AMDE1') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="AMDE1">AMD E1 APU</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="AMDR3" value="AMDR3" <?php echo ($lprocessorGen == 'AMDR3') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="AMDR3">AMD Ryzen 3</label>
                        <input class="checkbox-tools" type="radio" name="lprocessorGen" id="AMDR5" value="AMDR5" <?php echo ($lprocessorGen == 'AMDR5') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools" for="AMDR5">AMD Ryzen 5</label>
                    </div>
                </div>
                <!-- Memory -->
                <label>Memory</label>
                <div class="product-3-column">
                    <input type="text" placeholder="capacity" name="lcapacity" value="<?php echo $lcapacity ?>">
                    <input type="text" placeholder="ram type" name="lramType" value="<?php echo $lramType ?>">
                    <input type="text" placeholder="memory slots" name="lmemSlot" value="<?php echo $lmemSlot ?>">
                </div>
                <div class="product-2-column">
                    <input type="text" placeholder="memory layout" name="lmemLayout" value="<?php echo $lmemLayout ?>">
                    <input type="text" placeholder="memory expandable up to" name="lmemoryexpand" value="<?php echo $lmemoryexpand ?>">
                </div>
                <!-- Storage -->
                <label>Storage</label>
                <div class="product-2-column">
                    <input type="text" id="storage-capacity" placeholder="storeage capacity" name="lstoreageC" value="<?php echo $lstoreageC ?>">
                    <div class="product-os-icon">
                        <input class="checkbox-tools" type="radio" name="lstoragetype" id="SSD" value="SSD" <?php echo ($lstoragetype == 'SSD') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools stortypsize" for="SSD">SSD</label>
                        <input class="checkbox-tools" type="radio" name="lstoragetype" id="HDD" value="HDD" <?php echo ($lstoragetype == 'HDD') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools stortypsize" for="HDD">HDD</label>
                    </div>
                </div>
                <!-- Battery -->
                <label>Battery</label>
                <div class="product-3-column">
                    <input type="text" id="battery-type" placeholder="battery type" name="lbatType" value="<?php echo $lbatType ?>">
                    <input type="text" id="power-supply" placeholder="power supply" name="lpowS" value="<?php echo $lpowS ?>">
                    <input type="text" id="battery-life" placeholder="battery life" name="lbatLife" value="<?php echo $lbatLife ?>">
                </div>
                <!-- Networking -->
                <label>Networking</label>
                <div class="product-3-column">
                    <input type="text" id="wireless-LAN" placeholder="wireless-LAN" name="lwireLAN" value="<?php echo $lwireLAN ?>">
                    <input type="text" id="bluetooth" placeholder="bluetooth" name="lblue" value="<?php echo $lblue ?>">
                    <input type="text" id="bluetooth-version" placeholder="bluetooth-version" name="lblueV" value="<?php echo $lblueV ?>">
                </div>
                <!-- Ports -->
                <label>Ports</label>
                <div class="product-4-column">
                    <input type="text" id="USB-3-slots" placeholder="USB 3.0 slots" name="lusb3" value="<?php echo $lusb3 ?>">
                    <input type="text" id="USB-2-slots" placeholder="USB 2.0 slots" name="lusb2" value="<?php echo $lusb2 ?>">
                    <input type="text" placeholder="HDMI" name="lHDMI" value="<?php echo $lHDMI ?>">
                    <input type="text" placeholder="lock port" name="llockPort" value="<?php echo $llockPort ?>">
                    <input type="text" placeholder="USB Type C" name="lusbtypeC" value="<?php echo $lusbtypeC ?>">
                    <input type="text" id="SD-card-reader" placeholder="SD card reader" name="lsdCard" value="<?php echo $lsdCard ?>">
                    <input type="text" id="headphone-jack" placeholder="headphone jack" name="lheadJ" value="<?php echo $lheadJ ?>">
                    <input type="text" id="microphone-jack" placeholder="microphone jack" name="lmicroJ" value="<?php echo $lmicroJ ?>">
                </div>
                <!-- Multimedia -->
                <label>Multimedia</label>
                <div class="product-3-column">
                    <input type="text" id="web-cam" placeholder="web cam" name="lwebC" value="<?php echo $lwebC ?>">
                    <input type="text" id="video-recording" placeholder="video recording" name="lvidRec" value="<?php echo $lvidRec ?>">
                    <input type="text" id="secondary-cam" placeholder="secondary cam" name="lsecondC" value="<?php echo $lsecondC ?>">
                    <input type="text" id="speakers" placeholder="speakers" name="lspeaker" value="<?php echo $lspeaker ?>">
                    <input type="text" id="sound-technologies" placeholder="sound technologies" name="lsoundTech" value="<?php echo $lsoundTech ?>">
                    <input type="text" id="microphone" placeholder="microphone" name="lmicro" value="<?php echo $lmicro ?>">
                </div>
                <div class="product-2-column">
                    <input type="text" placeholder="microphone type" name="lmicroType" value="<?php echo $lmicroType ?>">
                    <input type="text" placeholder="other control" name="lotherControl" value="<?php echo $lotherControl ?>">
                </div>
                <!-- Peripherals -->
                <label>Peripherals</label>
                <div class="product-3-column">
                    <input type="text" id="optical-drive" placeholder="optical drive" name="loptD" value="<?php echo $loptD ?>">
                    <input type="text" id="pointing-device" placeholder="pointing device" name="lpoiD" value="<?php echo $lpoiD ?>">
                    <input type="text" id="keyboard" placeholder="keyboard type" name="lkey" value="<?php echo $lkey ?>">
                    <input type="text" id="backlit-keyboard" placeholder="backlit keyboard" name="lbacklit" value="<?php echo $lbacklit ?>">
                    <input type="text" id="fingerprint-sensor" placeholder="fingerprint sensor" name="lfinger" value="<?php echo $lfinger ?>">
                    <input type="text" placeholder="face unlock" name="lfaceunlock" value="<?php echo $lfaceunlock ?>">
                </div>
                <!-- Others -->
                <label>Others</label>
                <div class="product-2-column">
                    <input type="text" id="warranty" placeholder="warranty" name="lwarranty" value="<?php echo $lwarranty ?>">
                    <input type="text" id="sales-package" placeholder="sales package" name="lsalesP" value="<?php echo $lsalesP ?>">
                </div>
            </div>
            <!-- Laptop End -->
<!-- --------------------------Audios----------------------------Audios---------------------------------------Audios------------------------------------------------ -->
            <!-- Audios Start -->
            <div class="audios" style="display: none;">
                <!-- Design -->
                <div class="product-key-specs-3">
                    <label>Design Key Specs</label>
                    <input type="text" id="adesign-ks-1" placeholder="design point 1" name="adesiks1" value="<?php echo $adesiks1 ?>">
                    <input type="text" id="adesign-ks-2" placeholder="design point 2" name="adesiks2" value="<?php echo $adesiks2 ?>">
                    <input type="text" id="adesign-ks-3" placeholder="design point 3" name="adesiks3" value="<?php echo $adesiks3 ?>">
                    <label>Features Key Specs</label>
                    <input type="text" id="afeatures-ks-1" placeholder="features point 1" name="afeaks1" value="<?php echo $afeaks1 ?>">
                    <input type="text" id="afeatures-ks-2" placeholder="features point 2" name="afeaks2" value="<?php echo $afeaks2 ?>">
                    <input type="text" id="afeatures-ks-3" placeholder="features point 3" name="afeaks3" value="<?php echo $afeaks3 ?>">
                    <label>Battery Key Specs</label>
                    <input type="text" id="abattery-ks-1" placeholder="battery point 1" name="abatks1" value="<?php echo $abatks1 ?>">
                    <input type="text" id="abattery-ks-2" placeholder="battery point 2" name="abatks2" value="<?php echo $abatks2 ?>">
                    <input type="text" id="abattery-ks-3" placeholder="battery point 3" name="abatks3" value="<?php echo $abatks3 ?>">
                </div>


                <!-- Specifications -->
                <!-- General -->
                <label>General</label>
                <div class="product-full">
                    <input type="text" id="abox-content" placeholder="box content" name="aboxC" value="<?php echo $aboxC ?>">
                </div>
                <!-- Design -->
                <label>Design</label>
                <div class="product-4-column">
                    <input type="text" id="atype" placeholder="type" name="atype" value="<?php echo $atype ?>">
                    <input type="text" id="adesign" placeholder="design" name="adesign" value="<?php echo $adesign ?>">
                    <input type="text" id="aopen-close-back" placeholder="open close back" name="aopenCloseB" value="<?php echo $aopenCloseB ?>">
                    <input type="text" id="afit" placeholder="fit" name="afit" value="<?php echo $afit ?>">
                </div>
                <!-- Performance -->
                <label>Performance</label>
                <div class="product-4-column">
                    <input type="text" placeholder="driver" name="adriver" value="<?php echo $adriver ?>">
                    <input type="text" placeholder="impedance" name="aImpedance" value="<?php echo $aImpedance ?>">
                    <input type="text" placeholder="sensitivity" name="aSensitivity" value="<?php echo $aSensitivity ?>">
                    <input type="text" placeholder="frequency range" name="afreqRange" value="<?php echo $afreqRange ?>">
                </div>
                <!-- Physical Design -->
                <label>Physical Design</label>
                <div class="product-3-column">
                    <input type="text" placeholder="earbud dimensions" name="aearbudDim" value="<?php echo $aearbudDim ?>">
                    <input type="text" placeholder="earbud weight" name="aearbudWei" value="<?php echo $aearbudWei ?>">
                    <input type="text" placeholder="case dimension" name="acaseDim" value="<?php echo $acaseDim ?>">
                    <input type="text" placeholder="case weight" name="acaseWei" value="<?php echo $acaseWei ?>">
                    <input type="text" placeholder="durability" name="adura" value="<?php echo $adura ?>">
                    <input type="text" placeholder="cable length" name="acableLen" value="<?php echo $acableLen ?>">
                    <input type="text" placeholder="colors" name="acol" value="<?php echo $acol ?>">
                </div>
                <!-- Features -->
                <label>Features</label>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Noise Cancellation</p>
                    <label for="noise-cancel-yes" class="label-radio">
                        <input type="radio" name="anoise" id="noise-cancel-yes" value="checkmark" <?php echo ($anoise == 'checkmark') ? 'checked' : '' ?> class="input-radio radio noise">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="noise-cancel-no" class="label-radio">
                        <input type="radio" name="anoise" id="noise-cancel-no" value="close" <?php echo ($anoise == 'close') ? 'checked' : '' ?> class="input-radio radio close noise">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Call Control</p>
                    <label for="call-control-yes" class="label-radio">
                        <input type="radio" name="acall" id="call-control-yes" value="checkmark" <?php echo ($acall == 'checkmark') ? 'checked' : '' ?> class="input-radio radio call">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="call-control-no" class="label-radio">
                        <input type="radio" name="acall" id="call-control-no" value="close" <?php echo ($acall == 'close') ? 'checked' : '' ?> class="input-radio radio close call">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Music Control</p>
                    <label for="music-control-yes" class="label-radio">
                        <input type="radio" name="amusic" id="music-control-yes" value="checkmark" <?php echo ($amusic == 'checkmark') ? 'checked' : '' ?> class="input-radio radio music">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="music-control-no" class="label-radio">
                        <input type="radio" name="amusic" id="music-control-no" value="close" <?php echo ($amusic == 'close') ? 'checked' : '' ?> class="input-radio radio close music">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Ambient Sound</p>
                    <label for="ambient-sound-yes" class="label-radio">
                        <input type="radio" name="aambient" id="ambient-sound-yes" value="checkmark" <?php echo ($aambient == 'checkmark') ? 'checked' : '' ?> class="input-radio radio ambient">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="ambient-sound-no" class="label-radio">
                        <input type="radio" name="aambient" id="ambient-sound-no" value="close" <?php echo ($aambient == 'close') ? 'checked' : '' ?> class="input-radio radio close ambient">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Other Control</p>
                    <label for="other-control-yes" class="label-radio">
                        <input type="radio" name="aother" id="other-control-yes" value="checkmark" <?php echo ($aother == 'checkmark') ? 'checked' : '' ?> class="input-radio radio other">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="other-control-no" class="label-radio">
                        <input type="radio" name="aother" id="other-control-no" value="close" <?php echo ($aother == 'close') ? 'checked' : '' ?> class="input-radio radio close other">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <!-- Connectivity -->
                <label>Connectivity</label>
                <div class="product-3-column">
                    <input type="text" id="connectivity" placeholder="connectivity" name="aconn" value="<?php echo $aconn ?>">
                    <input type="text" placeholder="bluetooth version" name="ablueV" value="<?php echo $ablueV ?>">
                    <input type="text" placeholder="bluetooth range" name="ablueRange" value="<?php echo $ablueRange ?>">
                </div>
                <!-- Microphone -->
                <label>Microphone</label>
                <div class="product-3-column">
                    <p class="heading-lebel">Microphone</p>
                    <label for="microphone-yes" class="label-radio">
                        <input type="radio" name="amicroI" id="microphone-yes" value="checkmark" <?php echo ($amicroI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio microphone">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="microphone-no" class="label-radio">
                        <input type="radio" name="amicroI" id="microphone-no" value="close" <?php echo ($amicroI == 'close') ? 'checked' : '' ?> class="input-radio radio close microphone">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-full">
                    <input type="text" id="num-microphone" placeholder="number of microphones" name="amicroN" value="<?php echo $amicroN ?>">
                </div>
                <!-- Battery -->
                <label>Battery</label>
                <div class="product-3-column">
                    <input type="text" id="playback-time" placeholder="playback time" name="aplay" value="<?php echo $aplay ?>">
                    <input type="text" id="battery-capacity-earbud" placeholder="battery capacity earbud" name="abattcapE" value="<?php echo $abattcapE ?>">
                    <input type="text" id="battery-capacity-case" placeholder="battery capacity case" name="abattcapC" value="<?php echo $abattcapC ?>">
                </div>
                <!-- Compatibility -->
                <label>Compatibility</label>
                <div class="product-full">
                    <input type="text" id="compatible-models" placeholder="compatible models" name="acompatM" value="<?php echo $acompatM ?>">
                </div>
            </div>
            <!-- Audios end -->
<!-- --------------------------watch----------------------------Watch---------------------------------------watch--------------------------------------------------- -->
            <!-- Watch start -->
            <div class="watch" style="display: none;">
                <!-- Design -->
                <div class="product-key-specs">
                    <label>Design Key Specs</label>
                    <input type="text" id="design-ks-1" placeholder="design point 1" name="wdesiks1" value="<?php echo $wdesiks1 ?>">
                    <input type="text" id="design-ks-2" placeholder="design point 2" name="wdesiks2" value="<?php echo $wdesiks2 ?>">
                    <input type="text" id="design-ks-3" placeholder="design point 3" name="wdesiks3" value="<?php echo $wdesiks3 ?>">
                    <label>Display Key Specs</label>
                    <input type="text" id="display-ks-1" placeholder="display point 1" name="wdisks1" value="<?php echo $wdisks1 ?>">
                    <input type="text" id="display-ks-2" placeholder="display point 2" name="wdisks2" value="<?php echo $wdisks2 ?>">
                    <input type="text" id="display-ks-3" placeholder="display point 3" name="wdisks3" value="<?php echo $wdisks3 ?>">
                    <label>Features Key Specs</label>
                    <input type="text" id="features-ks-1" placeholder="features point 1" name="wfeaks1" value="<?php echo $wfeaks1 ?>">
                    <input type="text" id="features-ks-2" placeholder="features point 2" name="wfeaks2" value="<?php echo $wfeaks2 ?>">
                    <input type="text" id="features-ks-3" placeholder="features point 3" name="wfeaks3" value="<?php echo $wfeaks3 ?>">
                    <label>Battery Key Specs</label>
                    <input type="text" id="battery-ks-1" placeholder="battery point 1" name="wbatks1" value="<?php echo $wbatks1 ?>">
                    <input type="text" id="battery-ks-2" placeholder="battery point 2" name="wbatks2" value="<?php echo $wbatks2 ?>">
                    <input type="text" id="battery-ks-3" placeholder="battery point 3" name="wbatks3" value="<?php echo $wbatks3 ?>">
                </div>


                <!-- Specifications -->
                <!-- General -->
                <label>General</label>
                <div class="product-2-column">
                    <input type="text" id="operating-system" placeholder="operating system" name="wops" value="<?php echo $wops ?>">
                    <input type="text" id="box-content" placeholder="box content" name="wboxC" value="<?php echo $wboxC ?>">
                </div>
                <!-- Design -->
                <label>Design</label>
                <div class="product-3-column">
                    <input type="text" id="shape-surface" placeholder="shape & surface" name="wshapeS" value="<?php echo $wshapeS ?>">
                    <input type="text" id="dimensions" placeholder="dimensions" name="wdim" value="<?php echo $wdim ?>">
                    <input type="text" id="weight" placeholder="weight" name="wwei" value="<?php echo $wwei ?>">
                    <input type="text" id="body-material" placeholder="body material" name="wbodyM" value="<?php echo $wbodyM ?>">
                    <input type="text" id="strap-material" placeholder="strap material" name="wstrapM" value="<?php echo $wstrapM ?>">
                    <input type="text" id="colors" placeholder="colors" name="wcol" value="<?php echo $wcol ?>">
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Changable Strap</p>
                    <label for="change-strap-yes" class="label-radio">
                        <input type="radio" name="wchangeStrap" id="change-strap-yes" value="checkmark" <?php echo ($wchangeStrap == 'checkmark') ? 'checked' : '' ?> class="input-radio radio change-strap">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="change-strap-no" class="label-radio">
                        <input type="radio" name="wchangeStrap" id="change-strap-no" value="close" <?php echo ($wchangeStrap == 'close') ? 'checked' : '' ?> class="input-radio radio close change-strap">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <!-- Display -->
                <label>Display</label>
                <div class="product-3-column">
                    <input type="text" id="screen-size" placeholder="screen size" name="wscreenSize" value="<?php echo $wscreenSize ?>">
                    <input type="text" id="screen-resolution" placeholder="screen resolution" name="wscreenRes" value="<?php echo $wscreenRes ?>">
                    <input type="text" id="pixel-density" placeholder="pixel density" name="wpixD" value="<?php echo $wpixD ?>">
                    <input type="text" id="display-technology" placeholder="display technology" name="wdisT" value="<?php echo $wdisT ?>">
                    <input type="text" id="touch-screen" placeholder="touch screen" name="wtouchScreen" value="<?php echo $wtouchScreen ?>">
                </div>
                <!-- Compatibility -->
                <label>Compatibility</label>
                <div class="product-full">
                    <input type="text" id="compatible-OS" placeholder="compatible OS" name="wcompOS" value="<?php echo $wcompOS ?>">
                </div>
                <!-- Battery -->
                <label>Battery</label>
                <div class="product-4-column">
                    <input type="text" id="battery-capacity" placeholder="battery capacity" name="wbattCap" value="<?php echo $wbattCap ?>">
                    <input type="text" id="typical-usage-time" placeholder="typical usage time" name="wusageH" value="<?php echo $wusageH ?>">
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <input class="checkbox-tools" type="radio" name="wusagetype" id="Hours" value="Hours" <?php echo ($wusagetype == 'Hours') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools stortypsize" for="Hours">Hours</label>
                        <input class="checkbox-tools" type="radio" name="wusagetype" id="Days" value="Days" <?php echo ($wusagetype == 'Days') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools stortypsize" for="Days">Days</label>
                    </div>
                    <input type="text" id="charging-mode" placeholder="charging mode" name="wchargeM" value="<?php echo $wchargeM ?>">
                </div>
                <!-- Connectivity -->
                <label>Connectivity</label>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Bluetooth</p>
                    <label for="bluetooth-yes" class="label-radio">
                        <input type="radio" name="wblueI" id="bluetooth-yes" value="checkmark" <?php echo ($wblueI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio bluetooth">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="bluetooth-no" class="label-radio">
                        <input type="radio" name="wblueI" id="bluetooth-no" value="close" <?php echo ($wblueI == 'close') ? 'checked' : '' ?> class="input-radio radio close bluetooth">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Wireless Protocol</p>
                    <label for="wireless-protocol-yes" class="label-radio">
                        <input type="radio" name="wwirePI" id="wireless-protocol-yes" value="checkmark" <?php echo ($wwirePI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio wireless-protocol">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="wireless-protocol-no" class="label-radio">
                        <input type="radio" name="wwirePI" id="wireless-protocol-no" value="close" <?php echo ($wwirePI == 'close') ? 'checked' : '' ?> class="input-radio radio close wireless-protocol">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">SIM</p>
                    <label for="sim-yes" class="label-radio">
                        <input type="radio" name="wsimI" id="sim-yes" value="checkmark" <?php echo ($wsimI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio sim">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="sim-no" class="label-radio">
                        <input type="radio" name="wsimI" id="sim-no" value="close" <?php echo ($wsimI == 'close') ? 'checked' : '' ?> class="input-radio radio close sim">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">USB Connectivity</p>
                    <label for="usb-connectivity-yes" class="label-radio">
                        <input type="radio" name="wusbCI" id="usb-connectivity-yes" value="checkmark" <?php echo ($wusbCI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio usb-connectivity">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="usb-connectivity-no" class="label-radio">
                        <input type="radio" name="wusbCI" id="usb-connectivity-no" value="close" <?php echo ($wusbCI == 'close') ? 'checked' : '' ?> class="input-radio radio close usb-connectivity">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">NFC</p>
                    <label for="nfc-yes" class="label-radio">
                        <input type="radio" name="wnfcI" id="wnfc-yes" value="checkmark" <?php echo ($wnfcI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio nfc">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="nfc-no" class="label-radio">
                        <input type="radio" name="wnfcI" id="wnfc-no" value="close" <?php echo ($wnfcI == 'close') ? 'checked' : '' ?> class="input-radio radio close nfc">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Navigation</p>
                    <label for="navigation-yes" class="label-radio">
                        <input type="radio" name="wnavI" id="navigation-yes" value="checkmark" <?php echo ($wnavI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio navigation">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="navigation-no" class="label-radio">
                        <input type="radio" name="wnavI" id="navigation-no" value="close" <?php echo ($wnavI == 'close') ? 'checked' : '' ?> class="input-radio radio close navigation">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <input type="text" id="bluetooth" placeholder="bluetooth" name="wblue" value="<?php echo $wblue ?>">
                    <input type="text" id="wireless-protocol" placeholder="wireless protocol" name="wwireP" value="<?php echo $wwireP ?>">
                    <input type="text" placeholder="SIM" name="wsim" value="<?php echo $wsim ?>">
                    <input type="text" id="usb-connectivity" placeholder="USB connectivity" name="wusbC" value="<?php echo $wusbC ?>">
                    <input type="text" id="navigation" placeholder="navigation" name="wnav" value="<?php echo $wnav ?>">
                </div>
                <!-- Sensors -->
                <label>Sensors</label>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Accelerometer</p>
                    <label for="accelerometer-yes" class="label-radio">
                        <input type="radio" name="wacc" id="accelerometer-yes" value="checkmark" <?php echo ($wacc == 'checkmark') ? 'checked' : '' ?> class="input-radio radio accelerometer">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="accelerometer-no" class="label-radio">
                        <input type="radio" name="wacc" id="accelerometer-no" value="close" <?php echo ($wacc == 'close') ? 'checked' : '' ?> class="input-radio radio close accelerometer">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Gyro</p>
                    <label for="gyro-yes" class="label-radio">
                        <input type="radio" name="wgyro" id="gyro-yes" value="checkmark" <?php echo ($wgyro == 'checkmark') ? 'checked' : '' ?> class="input-radio radio gyro">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="gyro-no" class="label-radio">
                        <input type="radio" name="wgyro" id="gyro-no" value="close" <?php echo ($wgyro == 'close') ? 'checked' : '' ?> class="input-radio radio close gyro">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Light</p>
                    <label for="light-yes" class="label-radio">
                        <input type="radio" name="wlight" id="light-yes" value="checkmark" <?php echo ($wlight == 'checkmark') ? 'checked' : '' ?> class="input-radio radio light">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="light-no" class="label-radio">
                        <input type="radio" name="wlight" id="light-no" value="close" <?php echo ($wlight == 'close') ? 'checked' : '' ?> class="input-radio radio close light">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">GPS</p>
                    <label for="gps-icon-yes" class="label-radio">
                        <input type="radio" name="wgpsI" id="gps-icon-yes" value="checkmark" <?php echo ($wgpsI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio gps-icon">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="gps-icon-no" class="label-radio">
                        <input type="radio" name="wgpsI" id="gps-icon-no" value="close" <?php echo ($wgpsI == 'close') ? 'checked' : '' ?> class="input-radio radio close gps-icon">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-full">
                    <input type="text" id="gps" placeholder="GPS" name="wgps" value="<?php echo $wgps ?>">
                </div>
                <!-- Hardware -->
                <label>Hardware</label>
                <div class="product-3-column">
                    <input type="text" id="processor" placeholder="processor" name="wprocess" value="<?php echo $wprocess ?>">
                    <input type="text" id="ram" placeholder="ram" name="wram" value="<?php echo $wram ?>">
                    <input type="text" id="internal-memory" placeholder="internal memory" name="wintMem" value="<?php echo $wintMem ?>">
                </div>
                <!-- Notifications -->
                <label>Notifications</label>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Text Message</p>
                    <label for="text-message-yes" class="label-radio">
                        <input type="radio" name="wtextM" id="text-message-yes" value="checkmark" <?php echo ($wtextM == 'checkmark') ? 'checked' : '' ?> class="input-radio radio text-message">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="text-message-no" class="label-radio">
                        <input type="radio" name="wtextM" id="text-message-no" value="close" <?php echo ($wtextM == 'close') ? 'checked' : '' ?> class="input-radio radio close text-message">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Incoming Call</p>
                    <label for="incoming-call-yes" class="label-radio">
                        <input type="radio" name="wincomeCall" id="incoming-call-yes" value="checkmark" <?php echo ($wincomeCall == 'checkmark') ? 'checked' : '' ?> class="input-radio radio incoming-call">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="incoming-call-no" class="label-radio">
                        <input type="radio" name="wincomeCall" id="incoming-call-no" value="close" <?php echo ($wincomeCall == 'close') ? 'checked' : '' ?> class="input-radio radio close incoming-call">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Alarm</p>
                    <label for="alarm-yes" class="label-radio">
                        <input type="radio" name="walarm" id="alarm-yes" value="checkmark" <?php echo ($walarm == 'checkmark') ? 'checked' : '' ?> class="input-radio radio alarm">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="alarm-no" class="label-radio">
                        <input type="radio" name="walarm" id="alarm-no" value="close" <?php echo ($walarm == 'close') ? 'checked' : '' ?> class="input-radio radio close alarm">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Calender Reminder</p>
                    <label for="calender-reminder-yes" class="label-radio">
                        <input type="radio" name="wcalR" id="calender-reminder-yes" value="checkmark" <?php echo ($wcalR == 'checkmark') ? 'checked' : '' ?> class="input-radio radio calender-reminder">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="calender-reminder-no" class="label-radio">
                        <input type="radio" name="wcalR" id="calender-reminder-no" value="close" <?php echo ($wcalR == 'close') ? 'checked' : '' ?> class="input-radio radio close calender-reminder">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column radio-margin">
                    <p class="heading-lebel">Timer</p>
                    <label for="timer-yes" class="label-radio">
                        <input type="radio" name="wtime" id="timer-yes" value="checkmark" <?php echo ($wtime == 'checkmark') ? 'checked' : '' ?> class="input-radio radio timer">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="timer-no" class="label-radio">
                        <input type="radio" name="wtime" id="timer-no" value="close" <?php echo ($wtime == 'close') ? 'checked' : '' ?> class="input-radio radio close timer">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Weather</p>
                    <label for="weather-yes" class="label-radio">
                        <input type="radio" name="wweather" id="weather-yes" value="checkmark" <?php echo ($wweather == 'checkmark') ? 'checked' : '' ?> class="input-radio radio weather">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="weather-no" class="label-radio">
                        <input type="radio" name="wweather" id="weather-no" value="close" <?php echo ($wweather == 'close') ? 'checked' : '' ?> class="input-radio radio close weather">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <!-- Smartphone Remote Features -->
                <label>Smartphone Remote Features</label>
                <div class="product-3-column">
                    <p class="heading-lebel">Make Call</p>
                    <label for="make-call-yes" class="label-radio">
                        <input type="radio" name="wmakeCall" id="make-call-yes" value="checkmark" <?php echo ($wmakeCall == 'checkmark') ? 'checked' : '' ?> class="input-radio radio make-call">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="make-call-no" class="label-radio">
                        <input type="radio" name="wmakeCall" id="make-call-no" value="close" <?php echo ($wmakeCall == 'close') ? 'checked' : '' ?> class="input-radio radio close make-call">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Camera Shutter Control</p>
                    <label for="camera-shutter-control-yes" class="label-radio">
                        <input type="radio" name="wcameraS" id="camera-shutter-control-yes" value="checkmark" <?php echo ($wcameraS == 'checkmark') ? 'checked' : '' ?> class="input-radio radio camera-shutter-control">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="camera-shutter-control-no" class="label-radio">
                        <input type="radio" name="wcameraS" id="camera-shutter-control-no" value="close" <?php echo ($wcameraS == 'close') ? 'checked' : '' ?> class="input-radio radio close camera-shutter-control">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <!-- Activity Tracker -->
                <label>Activity Tracker</label>
                <div class="product-3-column">
                    <p class="heading-lebel">Calories</p>
                    <label for="calories-yes" class="label-radio">
                        <input type="radio" name="wcal" id="calories-yes" value="checkmark" <?php echo ($wcal == 'checkmark') ? 'checked' : '' ?> class="input-radio radio calories">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="calories-no" class="label-radio">
                        <input type="radio" name="wcal" id="calories-no" value="close" <?php echo ($wcal == 'close') ? 'checked' : '' ?> class="input-radio radio close calories">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Steps</p>
                    <label for="steps-yes" class="label-radio">
                        <input type="radio" name="wstep" id="steps-yes" value="checkmark" <?php echo ($wstep == 'checkmark') ? 'checked' : '' ?> class="input-radio radio steps">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="steps-no" class="label-radio">
                        <input type="radio" name="wstep" id="steps-no" value="close" <?php echo ($wstep == 'close') ? 'checked' : '' ?> class="input-radio radio close steps">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Sleep Quality</p>
                    <label for="sleep-quality-yes" class="label-radio">
                        <input type="radio" name="wsleep" id="sleep-quality-yes" value="checkmark" <?php echo ($wsleep == 'checkmark') ? 'checked' : '' ?> class="input-radio radio sleep-quality">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="sleep-quality-no" class="label-radio">
                        <input type="radio" name="wsleep" id="sleep-quality-no" value="close" <?php echo ($wsleep == 'close') ? 'checked' : '' ?> class="input-radio radio close sleep-quality">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Hours Slept</p>
                    <label for="hours-slept-yes" class="label-radio">
                        <input type="radio" name="whours" id="hours-slept-yes" value="checkmark" <?php echo ($whours == 'checkmark') ? 'checked' : '' ?> class="input-radio radio hours-slept">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="hours-slept-no" class="label-radio">
                        <input type="radio" name="whours" id="hours-slept-no" value="close" <?php echo ($whours == 'close') ? 'checked' : '' ?> class="input-radio radio close hours-slept">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Heart Rate</p>
                    <label for="heart-rate-yes" class="label-radio">
                        <input type="radio" name="wwheart" id="heart-rate-yes" value="checkmark" <?php echo ($wwheart == 'checkmark') ? 'checked' : '' ?> class="input-radio radio heart-rate">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="heart-rate-no" class="label-radio">
                        <input type="radio" name="wwheart" id="heart-rate-no" value="close" <?php echo ($wwheart == 'close') ? 'checked' : '' ?> class="input-radio radio close heart-rate">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Distance</p>
                    <label for="distance-yes" class="label-radio">
                        <input type="radio" name="wdistance" id="distance-yes" value="checkmark" <?php echo ($wdistance == 'checkmark') ? 'checked' : '' ?> class="input-radio radio distance">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="distance-no" class="label-radio">
                        <input type="radio" name="wdistance" id="distance-no" value="close" <?php echo ($wdistance == 'close') ? 'checked' : '' ?> class="input-radio radio close distance">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <!-- Multimedia -->
                <label>Multimedia</label>
                <div class="product-3-column">
                    <p class="heading-lebel">Speaker</p>
                    <label for="speaker-yes" class="label-radio">
                        <input type="radio" name="wspeak" id="speaker-yes" value="checkmark" <?php echo ($wspeak == 'checkmark') ? 'checked' : '' ?> class="input-radio radio speaker">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="speaker-no" class="label-radio">
                        <input type="radio" name="wspeak" id="speaker-no" value="close" <?php echo ($wspeak == 'close') ? 'checked' : '' ?> class="input-radio radio close speaker">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <!-- Features -->
                <label>Features</label>
                <div class="product-3-column">
                    <p class="heading-lebel">Water Resistant</p>
                    <label for="Water_resistant-yes" class="label-radio">
                        <input type="radio" name="wwaterResI" id="Water_resistant-yes" value="checkmark" <?php echo ($wwaterResI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio Water_resistant">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="Water_resistant-no" class="label-radio">
                        <input type="radio" name="wwaterResI" id="Water_resistant-no" value="close" <?php echo ($wwaterResI == 'close') ? 'checked' : '' ?> class="input-radio radio close Water_resistant">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Voice Control</p>
                    <label for="voice-control-yes" class="label-radio">
                        <input type="radio" name="wvoiceCI" id="voice-control-yes" value="checkmark" <?php echo ($wvoiceCI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio voice-control">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="voice-control-no" class="label-radio">
                        <input type="radio" name="wvoiceCI" id="voice-control-no" value="close" <?php echo ($wvoiceCI == 'close') ? 'checked' : '' ?> class="input-radio radio close voice-control">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-2-column">
                    <input type="text" name="wwaterRes" placeholder="Water Resistant" value="<?php echo $wwaterRes ?>">
                    <input type="text" name="wvoiceC" placeholder="Voice Control" value="<?php echo $wvoiceC ?>">
                </div>
                <!-- Additional Features -->
                <label>Additional Features</label>
                <div class="product-3-column">
                    <p class="heading-lebel">Alarm Clock</p>
                    <label for="alarm-clock-yes" class="label-radio">
                        <input type="radio" name="walarmC" id="alarm-clock-yes" value="checkmark" <?php echo ($walarmC == 'checkmark') ? 'checked' : '' ?> class="input-radio radio alarm-clock">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="alarm-clock-no" class="label-radio">
                        <input type="radio" name="walarmC" id="alarm-clock-no" value="close" <?php echo ($walarmC == 'close') ? 'checked' : '' ?> class="input-radio radio close alarm-clock">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Reminders</p>
                    <label for="reminders-yes" class="label-radio">
                        <input type="radio" name="wremind" id="reminders-yes" value="checkmark" <?php echo ($wremind == 'checkmark') ? 'checked' : '' ?> class="input-radio radio reminders">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="reminders-no" class="label-radio">
                        <input type="radio" name="wremind" id="reminders-no" value="close" <?php echo ($wremind == 'close') ? 'checked' : '' ?> class="input-radio radio close reminders">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Stopwatch</p>
                    <label for="stopwatch-yes" class="label-radio">
                        <input type="radio" name="wstopW" id="stopwatch-yes" value="checkmark" <?php echo ($wstopW == 'checkmark') ? 'checked' : '' ?> class="input-radio radio stopwatch">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="stopwatch-no" class="label-radio">
                        <input type="radio" name="wstopW" id="stopwatch-no" value="close" <?php echo ($wstopW == 'close') ? 'checked' : '' ?> class="input-radio radio close stopwatch">
                        <p class="label-r">No</p>
                    </label>
                </div>
            </div>
            <!-- Watch end -->
<!-- --------------------------Television-----------------------Television----------------------------------Television---------------------------------------------- -->
            <!-- Television Start -->
            <div class="tv" style="display: none;">
                <!-- Display -->
                <div class="product-key-specs">
                    <label>Display Key Specs</label>
                    <input type="text" id="display-ks-1" placeholder="display point 1" name="tvdisks1" value="<?php echo $tvdisks1 ?>">
                    <input type="text" id="display-ks-2" placeholder="display point 2" name="tvdisks2" value="<?php echo $tvdisks2 ?>">
                    <input type="text" id="display-ks-3" placeholder="display point 3" name="tvdisks3" value="<?php echo $tvdisks3 ?>">
                    <label>Features Key Specs</label>
                    <input type="text" id="features-ks-1" placeholder="features point 1" name="tvfeaks1" value="<?php echo $tvfeaks1 ?>">
                    <input type="text" id="features-ks-2" placeholder="features point 2" name="tvfeaks2" value="<?php echo $tvfeaks2 ?>">
                    <input type="text" id="features-ks-3" placeholder="features point 3" name="tvfeaks3" value="<?php echo $tvfeaks3 ?>">
                    <label>Connectivity Key Specs</label>
                    <input type="text" id="connectivity-ks-1" placeholder="connectivity point 1" name="tvconks1" value="<?php echo $tvconks1 ?>">
                    <input type="text" id="connectivity-ks-2" placeholder="connectivity point 2" name="tvconks2" value="<?php echo $tvconks2 ?>">
                    <input type="text" id="connectivity-ks-3" placeholder="connectivity point 3" name="tvconks3" value="<?php echo $tvconks3 ?>">
                    <label>Smart Features Key Specs</label>
                    <input type="text" id="smart-features-ks-1" placeholder="smart features point 1" name="tvsmfeaks1" value="<?php echo $tvsmfeaks1 ?>">
                    <input type="text" id="smart-features-ks-2" placeholder="smart features point 2" name="tvsmfeaks2" value="<?php echo $tvsmfeaks2 ?>">
                    <input type="text" id="smart-features-ks-3" placeholder="smart features point 3" name="tvsmfeaks3" value="<?php echo $tvsmfeaks3 ?>">
                </div>


                <!-- Specifications -->
                <!-- General -->
                <label>General</label>
                <div class="product-3-column">
                    <input type="text" id="series" placeholder="series" name="tvseries" value="<?php echo $tvseries ?>">
                    <input type="text" id="warranty" placeholder="warranty" name="tvwarranty" value="<?php echo $tvwarranty ?>">
                    <input type="text" id="box-content" placeholder="box content" name="tvboxC" value="<?php echo $tvboxC ?>">
                </div>
                <!-- Display -->
                <label>Display</label>
                <div class="product-2-column">
                    <input type="text" id="type" placeholder="type" name="tvtype" value="<?php echo $tvtype ?>">
                    <div class="laptop-processor">
                        <input class="checkbox-tools" type="radio" name="tvdistype" id="LED" value="LED" <?php echo ($tvdistype == 'LED') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools tvdispolaytyp" for="LED">LED</label>
                        <input class="checkbox-tools" type="radio" name="tvdistype" id="LCD" value="LCD" <?php echo ($tvdistype == 'LCD') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools tvdispolaytyp" for="LCD">LCD</label>
                        <input class="checkbox-tools" type="radio" name="tvdistype" id="OLED" value="OLED" <?php echo ($tvdistype == 'OLED') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools tvdispolaytyp" for="OLED">OLED</label>
                        <input class="checkbox-tools" type="radio" name="tvdistype" id="QLED" value="QLED" <?php echo ($tvdistype == 'QLED') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools tvdispolaytyp" for="QLED">QLED</label>
                        <input class="checkbox-tools" type="radio" name="tvdistype" id="SLED" value="SLED" <?php echo ($tvdistype == 'SLED') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools tvdispolaytyp" for="SLED">SLED</label>
                    </div>
                    <input type="text" id="size" placeholder="size" name="tvsize" value="<?php echo $tvsize ?>">
                    <input type="text" id="resolution" placeholder="resolution" name="tvreso" value="<?php echo $tvreso ?>">
                </div>
                <div class="product-full">
                    <div class="laptop-processor">
                        <input class="checkbox-tools" type="radio" name="tvresoFilter" id="HD" value="HD" <?php echo ($tvresoFilter == 'HD') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools tvdispolaytyp" for="HD">HD</label>
                        <input class="checkbox-tools" type="radio" name="tvresoFilter" id="Full HD" value="Full HD" <?php echo ($tvresoFilter == 'Full HD') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools tvdispolaytyp" for="Full HD">Full HD</label>
                        <input class="checkbox-tools" type="radio" name="tvresoFilter" id="4K" value="4K UHD" <?php echo ($tvresoFilter == '4K UHD') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools tvdispolaytyp" for="4K">4K UHD</label>
                        <input class="checkbox-tools" type="radio" name="tvresoFilter" id="8K" value="8K UHD" <?php echo ($tvresoFilter == '8K UHD') ? 'checked' : '' ?>>
                        <label class="for-checkbox-tools tvdispolaytyp" for="8K">8K UHD</label>
                    </div>
                </div>
                <div class="product-2-column">
                    <input type="text" placeholder="refresh rate" name="tvRefRate" value="<?php echo $tvRefRate ?>">
                    <input type="text" id="aspect-ratio" placeholder="aspect ratio" name="tvaspRatio" value="<?php echo $tvaspRatio ?>">
                    <input type="text" id="horizontal-view" placeholder="horizontal view angles" name="tvhoriView" value="<?php echo $tvhoriView ?>">
                    <input type="text" id="vertical-view" placeholder="vertical viewing angles" name="tvvertView" value="<?php echo $tvvertView ?>">
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">3D TV</p>
                    <label for="tv-3d-yes" class="label-radio">
                        <input type="radio" name="tv3D" id="tv-3d-yes" value="checkmark" <?php echo ($tv3D == 'checkmark') ? 'checked' : '' ?> class="input-radio radio tv-3d">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="tv-3d-no" class="label-radio">
                        <input type="radio" name="tv3D" id="tv-3d-no" value="close" <?php echo ($tv3D == 'close') ? 'checked' : '' ?> class="input-radio radio close tv-3d">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Curved TV</p>
                    <label for="curved-yes" class="label-radio">
                        <input type="radio" name="tvcurved" id="curved-yes" value="checkmark" <?php echo ($tvcurved == 'checkmark') ? 'checked' : '' ?> class="input-radio radio curved">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="curved-no" class="label-radio">
                        <input type="radio" name="tvcurved" id="curved-no" value="close" <?php echo ($tvcurved == 'close') ? 'checked' : '' ?> class="input-radio radio close curved">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Ultra Slim TV</p>
                    <label for="ultra-slim-TV-yes" class="label-radio">
                        <input type="radio" name="tvultraSlim" id="ultra-slim-TV-yes" value="checkmark" <?php echo ($tvultraSlim == 'checkmark') ? 'checked' : '' ?> class="input-radio radio ultra-slim-TV">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="ultra-slim-TV-no" class="label-radio">
                        <input type="radio" name="tvultraSlim" id="ultra-slim-TV-no" value="close" <?php echo ($tvultraSlim == 'close') ? 'checked' : '' ?> class="input-radio radio close ultra-slim-TV">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-full">
                    <input type="text" id="other-display-features" placeholder="other display features" name="tvotherDispFea" value="<?php echo $tvotherDispFea ?>">
                </div>
                <!-- Physical Design -->
                <label>Physical Design</label>
                <div class="product-4-column">
                    <input type="text" id="color" placeholder="color" name="tvcolor" value="<?php echo $tvcolor ?>">
                    <input type="text" id="weight" placeholder="weight without stand" name="tvweight" value="<?php echo $tvweight ?>">
                    <input type="text" id="weight-stand" placeholder="weight with stand" name="tvweightStand" value="<?php echo $tvweightStand ?>">
                    <input type="text" id="dimensions-stand" placeholder="dimensions with stand" name="tvdimStand" value="<?php echo $tvdimStand ?>">
                    <input type="text" id="dimensions" placeholder="dimensions without stand" name="tvdim" value="<?php echo $tvdim ?>">
                    <input type="text" id="stand-type" placeholder="stand type" name="tvstandType" value="<?php echo $tvstandType ?>">
                    <input type="text" id="stand-color" placeholder="stand color" name="tvstandColor" value="<?php echo $tvstandColor ?>">
                    <input type="text" id="stand-features" placeholder="stand features" name="tvstandFea" value="<?php echo $tvstandFea ?>">
                    <input type="text" id="wall-mount-dimensions" placeholder="wall mount dimensions" name="tvwllMountDim" value="<?php echo $tvwllMountDim ?>">
                </div>
                <!-- Video -->
                <label>Video</label>
                <div class="product-4-column">
                    <input type="text" id="digital-reception-formats" placeholder="digital TV reception formats" name="tvdigitalRF" value="<?php echo $tvdigitalRF ?>">
                    <input type="text" id="video-formtas" placeholder="video formtas supported" name="tvvideoF" value="<?php echo $tvvideoF ?>">
                    <input type="text" id="image-formats" placeholder="image formats supported" name="tvimageF" value="<?php echo $tvimageF ?>">
                    <input type="text" id="upscaling" placeholder="upscaling" name="tvupscale" value="<?php echo $tvupscale ?>">
                </div>
                <!-- Audio -->
                <label>Audio</label>
                <div class="product-3-column">
                    <input type="text" id="sound-type" placeholder="sound type" name="tvsoundtype" value="<?php echo $tvsoundtype ?>">
                    <input type="text" id="sound-technology" placeholder="sound technology" name="tvsoundTech" value="<?php echo $tvsoundTech ?>">
                    <input type="text" id="audio-formats" placeholder="audio formats" name="tvaudioF" value="<?php echo $tvaudioF ?>">
                    <input type="text" id="total-speaker-output" placeholder="total speaker output" name="tvtotalSO" value="<?php echo $tvtotalSO ?>">
                    <input type="text" id="speaker-frequency" placeholder="speaker frequency range" name="tvspeakerF" value="<?php echo $tvspeakerF ?>">
                    <input type="text" id="other-smart-audio" placeholder="other smart audio features" name="tvotherSA" value="<?php echo $tvotherSA ?>">
                </div>
                <!-- Connectivity/Ports -->
                <label>Connectivity/Ports</label>
                <div class="product-3-column">
                    <input type="text" id="usb-ports" placeholder="USB ports" name="tvusbP" value="<?php echo $tvusbP ?>">
                    <input type="text" id="usb-supports" placeholder="USB supports" name="tvusbS" value="<?php echo $tvusbS ?>">
                    <input type="text" id="hdmi-ports" placeholder="HDMI ports" name="tvhdmi" value="<?php echo $tvhdmi ?>">
                    <input type="text" id="digital-optical-audio" placeholder="digital/optical audio output ports" name="tvdigitalOA" value="<?php echo $tvdigitalOA ?>">
                    <input type="text" id="rf-input" placeholder="RF input ports" name="tvrfI" value="<?php echo $tvrfI ?>">
                    <input type="text" id="ethernet-sockets" placeholder="ethernet sockets" name="tvethernetS" value="<?php echo $tvethernetS ?>">
                </div>
                <!-- Smart TV Features -->
                <label>Smart TV Features</label>
                <div class="product-3-column">
                    <p class="heading-lebel">Smart TV</p>
                    <label for="smart-tv-yes" class="label-radio">
                        <input type="radio" name="tvsmartv" id="smart-tv-yes" value="checkmark" <?php echo ($tvsmartv == 'checkmark') ? 'checked' : '' ?> class="input-radio radio smart-tv">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="smart-tv-no" class="label-radio">
                        <input type="radio" name="tvsmartv" id="smart-tv-no" value="close" <?php echo ($tvsmartv == 'close') ? 'checked' : '' ?> class="input-radio radio close smart-tv">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Android TV</p>
                    <label for="android-tv-yes" class="label-radio">
                        <input type="radio" name="tvandroid" id="android-tv-yes" value="checkmark" <?php echo ($tvandroid == 'checkmark') ? 'checked' : '' ?> class="input-radio radio android-tv">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="android-tv-no" class="label-radio">
                        <input type="radio" name="tvandroid" id="android-tv-no" value="close" <?php echo ($tvandroid == 'close') ? 'checked' : '' ?> class="input-radio radio close android-tv">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Wifi Present</p>
                    <label for="wifi-present-yes" class="label-radio">
                        <input type="radio" name="tvwifiP" id="wifi-present-yes" value="checkmark" <?php echo ($tvwifiP == 'checkmark') ? 'checked' : '' ?> class="input-radio radio wifi-present">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="wifi-present-no" class="label-radio">
                        <input type="radio" name="tvwifiP" id="wifi-present-no" value="close" <?php echo ($tvwifiP == 'close') ? 'checked' : '' ?> class="input-radio radio close wifi-present">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Wifi Direct</p>
                    <label for="wifi-direct-yes" class="label-radio">
                        <input type="radio" name="tvwifiD" id="wifi-direct-yes" value="checkmark" <?php echo ($tvwifiD == 'checkmark') ? 'checked' : '' ?> class="input-radio radio wifi-direct">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="wifi-direct-no" class="label-radio">
                        <input type="radio" name="tvwifiD" id="wifi-direct-no" value="close" <?php echo ($tvwifiD == 'close') ? 'checked' : '' ?> class="input-radio radio close wifi-direct">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Miracast</p>
                    <label for="miracast-yes" class="label-radio">
                        <input type="radio" name="tvmiracast" id="miracast-yes" value="checkmark" <?php echo ($tvmiracast == 'checkmark') ? 'checked' : '' ?> class="input-radio radio miracast">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="miracast-no" class="label-radio">
                        <input type="radio" name="tvmiracast" id="miracast-no" value="close" <?php echo ($tvmiracast == 'close') ? 'checked' : '' ?> class="input-radio radio close miracast">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Bluetooth</p>
                    <label for="bluetooth-yes" class="label-radio">
                        <input type="radio" name="tvblue" id="bluetooth-yes" value="checkmark" <?php echo ($tvblue == 'checkmark') ? 'checked' : '' ?> class="input-radio radio bluetooth">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="bluetooth-no" class="label-radio">
                        <input type="radio" name="tvblue" id="bluetooth-no" value="close" <?php echo ($tvblue == 'close') ? 'checked' : '' ?> class="input-radio radio close bluetooth">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-full">
                    <input type="text" id="bluetooth-version" placeholder="bluetooth version" name="tvblueV" value="<?php echo $tvblueV ?>">
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Inbuilt Apps</p>
                    <label for="inbuilt-apps-icon-yes" class="label-radio">
                        <input type="radio" name="tvinbuiltI" id="inbuilt-apps-icon-yes" value="checkmark" <?php echo ($tvinbuiltI == 'checkmark') ? 'checked' : '' ?> class="input-radio radio inbuilt-apps-icon">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="inbuilt-apps-icon-no" class="label-radio">
                        <input type="radio" name="tvinbuiltI" id="inbuilt-apps-icon-no" value="close" <?php echo ($tvinbuiltI == 'close') ? 'checked' : '' ?> class="input-radio radio close inbuilt-apps-icon">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-full">
                    <input type="text" id="inbuilt-apps" placeholder="inbuilt apps" name="tvinbuiltA" value="<?php echo $tvinbuiltA ?>">
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Facebook</p>
                    <label for="facebook-yes" class="label-radio">
                        <input type="radio" name="tvfacebook" id="facebook-yes" value="checkmark" <?php echo ($tvfacebook == 'checkmark') ? 'checked' : '' ?> class="input-radio radio facebook">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="facebook-no" class="label-radio">
                        <input type="radio" name="tvfacebook" id="facebook-no" value="close" <?php echo ($tvfacebook == 'close') ? 'checked' : '' ?> class="input-radio radio close facebook">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Games</p>
                    <label for="games-yes" class="label-radio">
                        <input type="radio" name="tvgame" id="games-yes" value="checkmark" <?php echo ($tvgame == 'checkmark') ? 'checked' : '' ?> class="input-radio radio games">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="games-no" class="label-radio">
                        <input type="radio" name="tvgame" id="games-no" value="close" <?php echo ($tvgame == 'close') ? 'checked' : '' ?> class="input-radio radio close games">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-3-column">
                    <p class="heading-lebel">Voice Recognition</p>
                    <label for="voice-recognition-yes" class="label-radio">
                        <input type="radio" name="tvvoice" id="voice-recognition-yes" value="checkmark" <?php echo ($tvvoice == 'checkmark') ? 'checked' : '' ?> class="input-radio radio voice-recognition">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="voice-recognition-no" class="label-radio">
                        <input type="radio" name="tvvoice" id="voice-recognition-no" value="close" <?php echo ($tvvoice == 'close') ? 'checked' : '' ?> class="input-radio radio close voice-recognition">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <div class="product-full">
                    <input type="text" id="other-smart-features" placeholder="other smart features" name="tvotherSF" value="<?php echo $tvotherSF ?>">
                </div>
                <!-- Remote -->
                <label>Remote</label>
                <div class="product-3-column">
                    <p class="heading-lebel">Internet Access</p>
                    <label for="internet-access-yes" class="label-radio">
                        <input type="radio" name="tvinternetA" id="internet-access-yes" value="checkmark" <?php echo ($tvinternetA == 'checkmark') ? 'checked' : '' ?> class="input-radio radio internet-access">
                        <p class="label-r">Yes</p>
                    </label>
                    <label for="internet-access-no" class="label-radio">
                        <input type="radio" name="tvinternetA" id="internet-access-no" value="close" <?php echo ($tvinternetA == 'close') ? 'checked' : '' ?> class="input-radio radio close internet-access">
                        <p class="label-r">No</p>
                    </label>
                </div>
                <!-- Power Supply -->
                <label>Power Supply</label>
                <div class="product-4-column">
                    <input type="text" id="voltage" placeholder="voltage" name="tvvolt" value="<?php echo $tvvolt ?>">
                    <input type="text" id="frequency" placeholder="frequency" name="tvfreq" value="<?php echo $tvfreq ?>">
                    <input type="text" id="power-consumption-running" placeholder="power consumption running" name="tvpowerCR" value="<?php echo $tvpowerCR ?>">
                    <input type="text" id="power-consumption-Standby" placeholder="power consumption Standby" name="tvpowerCS" value="<?php echo $tvpowerCS ?>">
                </div>
            </div>
            <!-- Television End -->

            <label for="mrp">MRP</label>
            <div class="product-2-column">
                <input id="mrp" type="text" name="mrp" placeholder="MRP" value="<?php echo $mrp ?>">
                <input id="url" type="url" name="url" autocomplete="off" placeholder="website URL" value="<?php echo $url ?>">
                <input type="url" name="amazon_url" autocomplete="off" placeholder="Amazon URL" value="<?php echo $amazon_url ?>">
                <input type="text" name="amazon_mrp" placeholder="amazon MRP" value="<?php echo $amazon_mrp ?>">
                <input type="url" name="flipkart_url" autocomplete="off" placeholder="Flipkart URL" value="<?php echo $flipkart_url ?>">
                <input type="text" name="flipkart_mrp" placeholder="Flipkart MRP" value="<?php echo $flipkart_mrp ?>">
                <input type="url" name="croma_url" autocomplete="off" placeholder="Croma URL" value="<?php echo $croma_url ?>">
                <input type="text" name="croma_mrp" placeholder="Croma MRP" value="<?php echo $croma_mrp ?>">
            </div>

            <div id="product_attr_box">
                <?php
                $attrProductLoop = 1;
                foreach ($attrProduct as $list) { ?>
                    <div class="product-3-column" id="attr_<?php echo $attrProductLoop ?>">
                        <div>
                            <label for="variant_id">Variant</label>
                            <select name="variant_id[]" id="variant_id">
                                <option>Variant</option>
                                <?php
                                $res = mysqli_query($con, "select id,variant from variant_master order by id desc");
                                while ($row = mysqli_fetch_assoc($res)) {
                                    if ($list['variant_id'] == $row['id']) {
                                        echo "<option value=" . $row['id'] . " selected>" . $row['variant'] . "</option>";
                                    } else {
                                        echo "<option value=" . $row['id'] . " >" . $row['variant'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label for="pid">Product Id</label>
                            <input id="pid" type="number" name="pid[]" placeholder="Product Id" value="<?php echo $list['pid'] ?>" style="width: 85%;">
                        </div>

                        <div>
                            <?php
                            if ($attrProductLoop == 1) {
                            ?>
                                <button type="button" class="btn add-btn" onclick="add_more_attr()">Add More</button>
                            <?php
                            } else {
                            ?>
                                <button id="remove-img" type="button" class="btn add-btn" onclick="remove_attr('<?php echo $attrProductLoop ?>','<?php echo $list['id'] ?>')">Remove</button>
                            <?php
                            }

                            ?>
                            <input type="hidden" name="attr_id[]" value='<?php echo $list['id'] ?>' />
                        </div>
                    </div>
                <?php
                    $attrProductLoop++;
                } ?>
            </div>

            <div class="product-full">
                <input name="meta_keyword" data-role="tagsinput" id="tags" placeholder="meta keyword" value="<?php echo $meta_keyword ?>">
            </div>

            <div class="buttons">
                <button class="btn" name="submit" type="submit">add product</button>
                <button class="btn" id="cancel-button" name="cancel" type="button" onclick="location.href='product.php'">Cancel</button>
            </div>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-tagsinput.js"></script>
    <script src="assets/js/custom.js" type="text/javascript"></script>
    <script>
        function change_form(categories_id) {
            var cat_id = jQuery('#categories_id').val();
            jQuery.ajax({
                url: 'get_cat.php',
                type: 'post',
                data: 'categories_id=' + cat_id,
                success: function(result) {
                    if (result == '1') {
                        jQuery('.mobile').css('display', 'initial');
                        jQuery('#name-full').attr('class', 'product-3-column');
                    } else if (result == '2') {
                        jQuery('.tablet').css('display', 'initial');
                        jQuery('#name-full').attr('class', 'product-3-column');
                    } else if (result == '3') {
                        jQuery('.laptop').css('display', 'initial');
                        jQuery('#name-full').attr('class', 'product-3-column');
                    } else if (result == '4') {
                        jQuery('.audios').css('display', 'initial');
                        jQuery('.product-os-icon').remove();
                        jQuery('#osv').remove();
                        jQuery('#name-full').attr('class', 'product-full');
                    } else if (result == '5') {
                        jQuery('.watch').css('display', 'initial');
                        jQuery('.product-os-icon').remove();
                        jQuery('#osv').remove();
                        jQuery('#name-full').attr('class', 'product-full');
                    } else if (result == '6') {
                        jQuery('.tv').css('display', 'initial');
                        jQuery('.product-os-icon').remove();
                        jQuery('#osv').remove();
                        jQuery('#name-full').attr('class', 'product-full');
                    } else {
                        jQuery('.mobile').css('display', 'none');
                        jQuery('.tablet').css('display', 'none');
                        jQuery('.laptop').css('display', 'none');
                        jQuery('.audios').css('display', 'none');
                        jQuery('.watch').css('display', 'none');
                        jQuery('.tv').css('display', 'none');
                    }
                }
            });
        }

        function get_brand(brand_id) {
            var categories_id = jQuery('#categories_id').val();
            jQuery.ajax({
                url: 'get_brand.php',
                type: 'post',
                data: 'categories_id=' + categories_id + '&brand_id=' + brand_id,
                success: function(result) {
                    jQuery('#brand_id').html(result);
                }
            });
        }

        var attr_count = 1;

        function add_more_attr() {
            attr_count++;

            var variant_html = jQuery('#attr_1 #variant_id').html();
            variant_html = variant_html.replace('selected', '');

            var html = '<div class="product-3-column" id="attr_' + attr_count + '"><div><label for="variant_id">variant</label><select name="variant_id[]" id="variant_id">' + variant_html + '</select></div><div><label for="pid">Product Id</label><input id="pid" type="number" name="pid[]" placeholder="Product Id" value="" style="width: 85%;"></div><div><label for="categories"></label>&nbsp;<button id="remove-img" type="button" class="btn add-btn" onclick=remove_attr("' + attr_count + '")>Remove</button></div><input type="hidden" name="attr_id[]" value=""></div>';
            jQuery('#product_attr_box').append(html);
        }

        function remove_attr(attr_count, id) {
            jQuery.ajax({
                url: 'remove_product_attr.php',
                data: 'id=' + id,
                type: 'post',
                success: function(result) {
                    jQuery('#attr_' + attr_count).remove();
                }
            });
            jQuery('#attr_' + attr_count).remove();

        }
        var total_image;

        <?php
        if (isset($multipleImageArr[0])) {
            end($multipleImageArr);
            $lastKey = key($multipleImageArr);
            echo "total_image = " . $multipleImageArr[$lastKey]['id'] . "";
        } else {
            echo "total_image = 1";
        } ?>


        function add_more_image() {
            total_image++;
            var html = '<div style="width: 100%;" id="add_image_box_' + total_image + '"><label for="image_upload" class="upload-image close-box"><input type="file" name="product_images[]" id="image_upload" required><a class="remove_img" onclick=remove_img("' + total_image + '")><ion-icon name="close"></ion-icon></a></label></div>';
            jQuery('#image_box').append(html);
        }

        function remove_img(id) {
            jQuery('#add_image_box_' + id).remove();
        }
    </script>
    <script>
        <?php
        if (isset($_GET['id'])) {
        ?>
            get_brand('<?php echo $brand_id ?>');
            change_form('<?php echo $categories_id ?>');
        <?php } ?>
        const mrp = document.querySelector('#mrp');
        const validateForm = () => {
            if (!mrp.value.length) {
                return showAlert('enter MRP');
            }
            return true;
        }
    </script>
</body>

</html>