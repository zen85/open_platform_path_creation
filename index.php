
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>Open Platform: Path Creation</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>


<style>


</style>


<body>

<div class="container">
<div class="row" style="padding-top: 30px">

<div class="col-md-10">

<h1>OPEN PLATFORM: Path Creation</h1>
</div>

<div class="col-md-2">
Finanziert durch:<br>
<img src="stadt_wien_kultur.png" alt="Stadt Wien Kultur" width="100%">
</div>

</div>

<div class="row">

<div class="col-md-6">
<br>
<h6>
Die "Open Platform: Path Creation" erlaubt es Künstler:Innen für Tiefdruckverfahren GCode-kompatiblen Code zu generieren welcher, im Gegensatz zu bekannten Konturen und Rasterungsverfahren, Graustufen korrekt abbildet. 
<br><br>
Klassische Verfahren sind hierfür nicht geeignet um beim Endprodukt zwischen hell/dunkel zu unterscheiden und gleichzeitig künstlerische Tiefe zu gewährleisten und einen organischen Look zu erzeugen. Die Open Platform löst dieses Problem durch einen speziellen Algorithmus welcher vielseitig angepasst werden kann und stellt mit dem Tracebot eine dokumentierte Radier-Maschine vor die gerne nachgebaut werden darf und soll. Die Parametereinstellungen erlauben es Künstler:Innen ihre Vision umzusetzen und anzupassen.
<br><br>
Finden sie <a href="beispiele.html">hier Beispielparameter</a> mit Vorschaubildern um gute Parameter für Ihr Motiv zu finden.
</h6>


</div>

<div class="col-md-6" style="padding: 15px">

<div class="ratio ratio-16x9">
  <iframe
    src="https://www.youtube.com/embed/iEWmcKhVQEA"
    title="YouTube video"
    allowfullscreen
  ></iframe>
</div>


</div>


<div class="col-md-12">
<ul class="list-group list-group-horizontal-md">


  <li class="list-group-item">
  
		<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modal_start">
		  OPEN PLATFORM: PATH CREATION <br>
		  <h1>START</h1>
		</button>
  </li>



  <li class="list-group-item">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_tracebot">
		  Tracebot
		</button>
  
  </li>
  
  
    <li class="list-group-item">
  
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_gallery">
		  Gallery
		</button>
  </li>
  

  <li class="list-group-item">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_konturanleitung">
		  OpenSource Anleitung für Konturen
		</button>  
  
  </li>
  
  
  <li class="list-group-item">
	<a href="https://github.com/zen85/open_platform_path_creation" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="false">Dieses Projekt auf Github</a>

  
  </li>
  <li class="list-group-item">		
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_about">
		  About/Dokumentation
		</button>  </li>
</ul>
</div>


</div>

<!-- Modal -->
<div class="modal fade" id="modal_result" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Its working...</h5>
        
      </div>
      <div class="modal-body" id="resultbody">
        ...und es ist eine komplexe Angelegenheit. Geben Sie uns ein bisschen Zeit. Sobald wir hier fertig sind werden Sie automatisch weitergeleitet.
		<br>
		<div class="spinner-border" role="status">
  <span class="sr-only"></span>
</div>
		
      </div>
      <div class="modal-footer">
     
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modal_gallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unsorted Gallery: Development and User-Submissions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
		<?php 
            $dir ="gallery/"; // image folder name
      if (is_dir($dir)){
         if ($dh = opendir($dir)){
                 while (($file = readdir($dh)) !== false){
                    if($file=="." OR $file==".."){} else { 
              ?>   <!---- its a loop [change the folder name on img path]----->                
                         <img  style="width: 100%;" src="gallery/<?php echo $file; ?>"> 
             <?php
              }
             }
         closedir($dh);
         }
      } 
		
		?>
 </div>
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_tracebot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tracebot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  
	  <img src="gallery/275916205_373030068006525_5081913460187810600_n.png" alt="Girl in a jacket" width="100%">
	  <img src="gallery/7a1101f8-420c-4384-a170-9a8b3875c931.jfif" alt="Girl in a jacket" width="100%">
	  
	  
	  <img src="gallery/275706894_658645722070038_2530831029151084712_n.jpg" alt="Girl in a jacket" width="100%">
        Beim sogenannten Tracebot 2.0 ging es darum eine Maschine zu bauen die möglichst günstig und auch möglichst grossformatig Kupferplatten mit einer Radiernadel zu bearbeiten und den Algorithmus von der "Open Platform: Path Creation" optimal nutzen zu können. Sie finden hier Links und sämtliche Komponenten die nötig sind um den Tracebot 2.0 zu reproduzieren. Bei Fragen/Issues bitten wir Sie diese im Forum auf Github zu stellen um die Dokumentation möglichst vielen Menschen zugänglich zu machen.

		<br><br>
		
		Wir empfehlen ausserdem eine Webcam und einen Account auf https://obico.io/ um die Arbeit der Maschine auch via Remote kontrollieren zu können.
		<br><br>
		
		Wir übernehmen keinerlei Haftung für Fehlfunktionen und seien Sie sich bewusst, dass der Betrieb einer solchen Maschine Gefahren bergen kann. Nutzung auf eigene Gefahr. Haben Sie immer einen Feuerlöscher griffbereit. Wir sprechen aus Erfahrung!
		

     
		<br><br>
		<h3>Hardware</h3>
		- "Creality Ender 5 Plus" Basis 3d Drucker<br>
		- "Ender 5 Extension" from enderextender.com<br>
		- 10mm Gewindestange<br>
		- 3-5 M10 Muttern<br>
		- 14mm Rohr mit 10mm Innendurchmesser.<br>
		- 2x PG14 Kabelverschraubung<br>
		- 3D Modell Nadeldruckkopf:<br>
		- - <a href="tracebot_stl_v17.stl">STL</a><br>
		- - <a href="tracebot_v17.f3d">F3D</a><br>
		- Rasberry Pi 4B
		
		
		<h3>Software</h3>
		- <a href="firmware_marlin2.0-bugfix-ender5-pro-bltouch-octoprint.hex">Custom Firmware for Ender 5</a><br>
		- Octopi for RPI<br>

	 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_konturanleitung" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Open Source Anleitung für Konturen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 
<h1>Anleitung Konturen</h1>

<h2> Vorraussetzungen </h2>
<h3>Install Inkscape </h3>
(https://inkscape.org/release/inkscape-1.1.2/)
<h3>Install J-Tech photonic Laser Tool for Inkscape:</h3>
(http://34039.hostserv.eu/kratzmaschine/jtp.zip)
<br>
Die Files von dem Tool müssen in das Inkscape-Extension Verzeichnis kopiert werden.
In meinem Fall war das: C:\Program Files\Inkscape\share\inkscape\extensions

<h2> Best Practice </h2>
<h3> File in Photoshop öffnen</h3>
Selektiver Weichzeichner zum “entrauschen” anwenden. <br>

<h3> Datei in Inkscape öffnen </h3>

<h5>Zuerst oben in die Menüleiste Die Werte für Grösse und XY Offsets anpassen<h5>
<img width="100%" src="tut_step1.PNG" alt="Girl in a jacket">

<h5>Öffnen der "Datei > Dokumenteneinstellungen" <h5>
Allgemein: Anzeigeinheiten "mm"




<h5>Im Inkscape "Pfad > Bitmap nachzeichnen" <br>- Kantenerkennung/Tonwert 3 verschiedene werte hoch mittel klein und übereinanderlegen. <br>
- Bei den Optionen "Flecken entfernen" einen Wert um die 200<br>- "Ecken glätten" empfiehlt sich "1"<br>- Bei "Pfade optimieren" hat sich "2" als guter Wert erwiesen.
</h5>

<h5>In Inkscape "Pfad > Kontur nachzeichnen"
</h5>

<h5>Im Inkscape "Erweiterungen > Generate Laser G-Code > J Tech Photonics Lasertool"
</h5>

Hier jetzt folgendes Eintragen:<br>
<img src="tut_step2.png" alt="Girl in a jacket">
<br>


Jetzt heisst es warten. Es kann dauern und sieht währenddessen so aus als ob das Programm abgestürzt wäre. Lassen Sie das Programm einfach arbeiten. Am Schluss kann auch eine Fehlermeldung aufpoppen die Sie ignorieren können. Ihr GCode liegt nun trotzdem in dem Verzeichnis welches Sie in den J-Tech Optionen eingefügt haben.

<h5>

<h2> Abschliessende Codeanpassung für Sicherheitsroutinen</h2>
Tragen sie zuerst im Startformular bei den Parametern die richtige Breite und Höhe ein und die richtigen Offsets!<br>
bitte hier jetzt noch das aus dem vorigen Schritt resultierende File im Texteditor öffnen und den Code in folgendes Feld einfügen und danach "Code anpassen" drücken - wieder zurückkopieren und speichern.
<b>
<br>

<textarea id="gcode_from_inkscape" name="w3review" rows="8" cols="40">

</textarea>


<button onclick="codeanpassung()">Code anpassen</button>
<br>


Diesen Gcode jetzt einfach wie gewohnt hochladen und den Tracebot kratzen lassen. Wir wünschen Ihnen viel Spass.
</b>

</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_about" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">About/Projektdokumentation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Beteiligte Personen:</h3>
		Josef Peter Wagner, Jeremias Altmann, Nikodemus Wagner, Lukas Wagner, Juliane Neuhuber
		
		<h3>besonderer Dank an: </h3>
		MA7, BMKÖS, Valentin Eder, The Impressive Company, Simon Goritschnigg, Mag.a Sylvia Faßl-Vogler
		
		
		<h3>Projektbericht</h3>
		Download PDF
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_start" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Parameter ändern</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<div class="row">


<form id="gcodecreation" action="cgibin/python.py" method="POST" enctype="multipart/form-data">


  <label for="imagefile"><h5>Bild:</h5></label><br>
  <input type="file" id="imagefile" name="imagefile"><br>
  
  <hr>
  <label for="stepcount"><h5>Schrittanzahl (stepcount):</h5></label><br>
  Aus wievielen Strichen soll die Zeichnung bestehen? Vom Effekt her könnte dieser Wert auch mit "Auflösung" umschrieben werden.<br>
  <input type="text" value="200000" id="stepcount" name="stepcount"><br>
  <hr>
  <label for="linelength"><h5>Linienlänge (linelength):</h5></label><br>
  Wieviele Biegungen hat dieser Strich?<br>
  <input type="text" value="4" id="linelength" name="linelength"><br>
  <hr>  
  <label for="jumpfactor"><h5>Biegungsabstand (jumpfactor):</h5></label><br>
  Wieviel Platz ist zwischen den einzelnen Biegungen?<br>
  <input type="text" value="1" id="jumpfactor" name="jumpfactor"><br>
  <hr>
  <label for="white_threshold"><h5>Weisswertschwelle (white_threshold):</h5></label><br>
  Weisswertschwelle (Maximum = 255):<br>
  <input type="text" value="210" id="white_threshold" name="white_threshold"><br> 
  <hr>
  <label for="sharpenfactor"><h5>Schärfungsgrad (sharpenfactor):</h5></label><br>
  Dieser Wert erlaubt eine "Verschmelzung" von Kontur und Graustufen. (Maximum = 10)<br>
  <input type="text" value="3" id="sharpenfactor" name="sharpenfactor"><br>
  <hr>
  <label for="randomseed"><h5>Zufallswert (randomseed):</h5></label><br>
  Wert für Zufallsberechnung. Verändern Sie diesen um exakte Duplikate bei gleichbleibenden Parametern zu vermeiden. (Maximum = 10)<br>
  <input type="text" value="123456" id="randomseed" name="randomseed"><br>
  <hr>
  <label for="drawingwidth_in_mm"><h5>Bildbreite (drawingwidth_in_mm):</h5></label><br>
  Wie breit wird das Endbild sein. (Wert in mm)<br>
  <input type="text" value="419" id="drawingwidth_in_mm" name="drawingwidth_in_mm"><br>
  <hr>
  <label for="drawingheight_in_mm"><h5>Bildhöhe (drawingheight_in_mm):</h5></label><br>
  Wie hoch wird das Endbild sein. (Wert in mm)<br>
  <input type="text" value="308" id="drawingheight_in_mm" name="drawingheight_in_mm"><br>
   <hr>
   <label for="offset_scratchhead_x"><h5>Versatz Radiernadel X (offset_scratchhead_x):</h5></label><br>
  Wie weit ist die Radiernadel vom Sensor entfernt in der X-Dimension? (mm)<br>
  <input type="text" value="7" id="offset_scratchhead_x" name="offset_scratchhead_x"><br>
  <hr>
  <label for="offset_scratchhead_y"><h5>Versatz Radiernadel Y (offset_scratchhead_y):</h5></label><br>
  Wie weit ist die Radiernadel vom Sensor entfernt in der Y-Dimension? (mm)<br>
  <input type="text" value="38" id="offset_scratchhead_y" name="offset_scratchhead_y"><br>
   <hr>
  <label for="offset_scratchhead_y"><h5>Radiergeschwindigkeit (speed):</h5></label><br>
  Geschwindigkeit des Radierers während der Radierung an sich.<br>
  
  
  <input type="text" value="1200" id="speeed" name="speeed"><br>
   <hr>
   <label for="offset_scratchhead_y"><h5>Reisegeschwindigkeit (speed2):</h5></label><br>
   Geschwindigkeit des Radierers während der einer Positionsänderung ohne Radierung<br>
  <input type="text" value="2400" id="speeed2" name="speeed2"><br>
       
  



</div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		
		  <input class="btn btn-primary" type="submit" name="submit"  value="Algorithmus starten">
        
      </div>
	  
	  </form>
    </div>
  </div>
</div>


</div>










	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>

<script>



$(document).ready(function () {


// Intialize gallery


  $("#gcodecreation").submit(function (event) {
  
     var form = $('#gcodecreation')[0];
     var formular_data = new FormData(form);
     formular_data.append('imagefile', 'stepcount', );
  
  
	
	console.log(formular_data);
	$('#modal_start').modal('hide');
	$('#modal_result').modal('show');
	/*
    var formData = {
      imagefile: $("#imagefile").val(),
      stepcount: $("#stepcount").val(),
      linelength: $("#linelength").val(),
      jumpfactor: $("#jumpfactor").val(),
      white_threshold: $("#white_threshold").val(),
      sharpenfactor: $("#sharpenfactor").val(),
      randomseed: $("#randomseed").val(),
      drawingwidth_in_mm: $("#drawingwidth_in_mm").val(),
      drawingheight_in_mm: $("#drawingheight_in_mm").val(),
      offset_scratchhead_x: $("#offset_scratchhead_x").val(),
      offset_scratchhead_y: $("#offset_scratchhead_y").val(),
      speeed: $("#speeed").val(),	  
	  speeed2: $("#speeed2").val(),	  	  

	 
	  
	  
    };
	 */
	console.log(formular_data);
	

    $.ajax({
      type: "POST",
      url: "cgibin/python.py",
	  async: true,
      data: formular_data,
    }).done(function (data) {
	  alert("wuhu");
	  
	  //document.getElementById("resultbody").innerHTML = data;
      
    });

    event.preventDefault();
  });
});



function codeanpassung() {
  
 
  var gcode_from_inkscape = document.getElementById("gcode_from_inkscape").value;


var offset_scratchhead_x = parseInt(document.getElementById("offset_scratchhead_x").value);
var offset_scratchhead_y = parseInt(document.getElementById("offset_scratchhead_y").value);
var drawingwidth_in_mm = parseInt(document.getElementById("drawingwidth_in_mm").value);
var drawingheight_in_mm = parseInt(document.getElementById("drawingheight_in_mm").value);

var links = offset_scratchhead_x;
var unten = offset_scratchhead_y;
var rechtsunten = drawingwidth_in_mm + offset_scratchhead_x;
var rechtsoben = drawingheight_in_mm + offset_scratchhead_y;


var prefix = "G1 Z12.5 F" + document.getElementById("speeed").value + " ; S0\n" +
"G0 Z13.5 \n"+
"G28\n"+
"G90\n"+
"G0 Z9.53\n"+
"M0\n"+
"G0 Z12.5\n"+
"G4 P1000\n"+
"M117 Drawing..\n"+
"G21\n"+
"G1 F2400\n"+
"G1 X"+ links + ' Y'+ unten +"\n"+
"G1 X" + rechtsunten + " Y" + unten + "\n"+
"G1 X" + rechtsunten + " Y" + rechtsoben + "\n"+
"G1 X" + links + " Y" + rechtsoben + "\n"+
"G1 X"+ links + ' Y'+ unten +"\n"+
"M0 \n";
/*





file2.write ('\n G1 X'+str(int(offset_scratchhead_x))+' Y'+str(truncate(drawingheight_in_mm,4)+int(offset_scratchhead_y))+'')
file2.write ('\n G1 X'+str(int(offset_scratchhead_x))+' Y'+str(int(offset_scratchhead_y))+'')
file2.write ('\n M0')
*/




var endfix = "G1 Z20\n";

gcode_from_inkscape = prefix.concat(gcode_from_inkscape);

gcode_from_inkscape = gcode_from_inkscape.replace("G1 X0 Y0", "G1 Z20");

  console.log(gcode_from_inkscape);

document.getElementById("gcode_from_inkscape").value = gcode_from_inkscape;  
  
  
}






</script>

</html>