#!/usr/bin/python3
import cgi
import cgitb; cgitb.enable()
import os


from PIL import Image, ImageDraw
from math import sqrt
import random
import time
import svgwrite
import math
import convert
print('Content-Type:text/html;charset=utf-8\r\n')

print('<h2>Open Platform: Path Creation</h2>')
print("<h3>DOWNLOAD GCODE: <button><a href='../MyFile2.gcode'>GCODE</a></button></h3><br>")


form = cgi.FieldStorage()

fileItem = form["imagefile"]	
stepcount = form.getvalue("stepcount")
linelength = form.getvalue("linelength")	
jumpfactor = form.getvalue("jumpfactor")	
white_threshold = form.getvalue("white_threshold")
sharpenfactor = int(form.getvalue("sharpenfactor"))
randomseed = form.getvalue("randomseed")	
drawingwidth_in_mm_form = form.getvalue("drawingwidth_in_mm")	
drawingheight_in_mm_form = form.getvalue("drawingheight_in_mm")
offset_scratchhead_x = form.getvalue("offset_scratchhead_x")	
offset_scratchhead_y = form.getvalue("offset_scratchhead_y")
speed = form.getvalue("speeed")
speed2 = form.getvalue("speeed2")


def truncate(number, digits) -> float:
    stepper = 10.0 ** digits
    return math.trunc(stepper * number) / stepper

#params



#image_name = "asterisk.jpg"
image_name = fileItem.filename
result_image_name = "../result.bmp"
result_svg_name = "../result.svg"
step_count = int(stepcount)
line_length = int(linelength)
line_color = (0,0,0)
bg_color = (255,255,255)
#line_color = (255,255,255)
#bg_color = (0,0,0)
line_width = 1
jump_factor = 0.1 * int(jumpfactor)
random_seed = int(randomseed)
drawingwidth_in_mm = int(drawingwidth_in_mm_form)
drawingheight_in_mm = int(drawingheight_in_mm_form)
speed = int(speed)
speed2 = int(speed2)

#gcodecommands
gcode_up = '''
G4 P0 
G1 Z12.5 F''' + str(speed) + ''' ; S0
G1 F''' + str(speed2) + '''
'''

gcode_down = '''
G4 P0 
G1 Z7.5 F''' + str(speed) + ''' ; S0
G4 P0
G1 F''' + str(speed2) + '''
'''

starting_gcode = '''
G1 Z12.5 F''' + str(speed) + ''' ; S0

G0 Z13.5 
G28
G90
G0 Z9.53
M0
G0 Z12.5 
G4 P1000
M117 Drawing..
G21
G1 F2400
'''



#functions
def get_px_brightness(x_y):
	#Get RGB
	pixelRGB = image.getpixel(x_y)
	R,G,B = pixelRGB 
	brightness = sum([R,G,B])/3 ##0 is dark (black) and 255 is bright (white)
	return brightness
	
#def jump(distance,angle): 

def add_line(from_point, to_point):
	result_image_draw.line([from_point,to_point],fill=line_color,width=line_width)
	svg.add(svg.line(from_point, to_point, stroke=svgwrite.rgb(line_color[0],line_color[1],line_color[2], '%')))


def render():
	#save bmp
	result_image.save(result_image_name)
	#save svg
	svg.save()
	
	print("Previewimage is rendered.<br>")
	

#init

if fileItem.filename:
	fn = os.path.basename(fileItem.filename.replace("\\", "/" ))
	#fn = os.path.basename("tobeworked.jpg")
	open(fn,'wb').write(fileItem.file.read())
	
	print ("Pictureupload complete.<br>")
	
else:
	print ("Pictureupload broken.<br>")




print("Starting to work our Algorythm...<br>")
random.seed(random_seed)
image = Image.open(image_name)
svg = svgwrite.Drawing(result_svg_name, profile='tiny')

#Convert the image te RGB if it is a .gif for example
image = image.convert ('RGB')
#Create result image same size as input image
result_image = Image.new('RGB', size = image.size, color = bg_color)
result_image_draw = ImageDraw.Draw(result_image)

x_pixel_mm_faktor = drawingwidth_in_mm/image.size[0]
y_pixel_mm_faktor = drawingheight_in_mm/image.size[1]
# and "MyFile2.txt" in D:\Text in file2 

file2 = open(r"../MyFile2.gcode","w") 
file2.write("")
file2.close()

file2 = open(r"../MyFile2.gcode","a") 



file2.write(starting_gcode)

file2.write ('\n G1 X'+str(int(offset_scratchhead_x))+' Y'+str(int(offset_scratchhead_y))+'')
file2.write ('\n G1 X'+str(truncate(drawingwidth_in_mm,4)+int(offset_scratchhead_x))+' Y'+str(int(offset_scratchhead_y))+'')
file2.write ('\n G1 X'+str(truncate(drawingwidth_in_mm,4)+int(offset_scratchhead_x))+' Y'+str(truncate(drawingheight_in_mm,4)+int(offset_scratchhead_y))+'')
file2.write ('\n G1 X'+str(int(offset_scratchhead_x))+' Y'+str(truncate(drawingheight_in_mm,4)+int(offset_scratchhead_y))+'')
file2.write ('\n G1 X'+str(int(offset_scratchhead_x))+' Y'+str(int(offset_scratchhead_y))+'')
file2.write ('\n M0')


print("GCode Initialization completed.<br>");



#process
step = 0
line_pos = 0
starttime = time.time()
#determine start point randomly
point = random.randrange(0,image.size[0]),random.randrange(0,image.size[1])


# liste_to_compare = []




while step < step_count:
	line_pos = line_pos + 1
	
	#wenn linie aus ist mach neuen startpunkt
	if(line_pos >= line_length): 
		point = random.randrange(0,image.size[0]),random.randrange(0,image.size[1])
		

			
		brightnesssteps=1
		l = [0]*1	
		
		while brightnesssteps < sharpenfactor:
				point_compare = random.randrange(0,image.size[0]),random.randrange(0,image.size[1])

				#print("next point in range")		
				checkbrightnesspoint_compare1 = point_compare
				brightnessvalue_compare1 = get_px_brightness(checkbrightnesspoint_compare1)	
				l.append(int(brightnessvalue_compare1)) 
				highestvalueinlist = max(l)
					
					

				if (brightnessvalue_compare1 <= highestvalueinlist):
					#print(highestvalueinlist)
					point = point_compare
						
						
				brightnesssteps = brightnesssteps + 1

				
				# #####################
		if(get_px_brightness(point) >= int(white_threshold)):
			continue
		#file2.write ('\n neuer startpunkt')
		file2.write(gcode_up)
		file2.write ('\n G1 X'+str(truncate(point[0]*x_pixel_mm_faktor,4)+int(offset_scratchhead_x))+' Y'+str(truncate(point[1]*y_pixel_mm_faktor,4)+int(offset_scratchhead_y))+ '')

		
		
		file2.write(gcode_down)
		line_pos = 0
	else:
		file2.write ('\n G1 X'+str(truncate(point[0]*x_pixel_mm_faktor,4)+int(offset_scratchhead_x))+' Y'+str(truncate(point[1]*y_pixel_mm_faktor,4)+int(offset_scratchhead_y))+ '')
		
	point_brightness = get_px_brightness(point)
	jump_length = int((255-point_brightness)*jump_factor) + 1
	#print(step, ":", point, " Brightness: ", point_brightness, " jump: ", jump_length)
	
	#file2.writelines(str(point[0]))
	#erweitere um funktionsmadsfglichkeit nur gewisse winkel zuzulassen
	
	next_point_x = random.randrange(point[0]-int(jump_length),point[0]+int(jump_length)+1)
	next_point_y = random.randrange(point[1]-int(jump_length),point[1]+int(jump_length)+1)
	l = [0]*1
    #liste_to_compare = []
	brightnesssteps=1
	
	while brightnesssteps < sharpenfactor:
		next_point_x_compare = random.randrange(point[0]-int(jump_length),point[0]+int(jump_length)+1)
		next_point_y_compare = random.randrange(point[1]-int(jump_length),point[1]+int(jump_length)+1)
		if not (0 <= next_point_x_compare < image.size[0]) or not (0 <= next_point_y_compare < image.size[1]): 
			continue

			
		else:
			#print("next point in range")		
			checkbrightnesspoint_compare1 = next_point_x_compare, next_point_y_compare
			brightnessvalue_compare1 = get_px_brightness(checkbrightnesspoint_compare1)	
			l.append(int(brightnessvalue_compare1)) 
			highestvalueinlist = max(l)
			
			

			if (brightnessvalue_compare1 >= highestvalueinlist):
			#	print(highestvalueinlist)
				next_point_x = next_point_x_compare
				next_point_y = next_point_y_compare
				
		brightnesssteps = brightnesssteps + 1
		

		
	
	if not (0 <= next_point_x < image.size[0]) or not (0 <= next_point_y < image.size[1]): 
		#print("next point out of range, line end")
		file2.write ('\n next point out of range')
		point = random.randrange(0,image.size[0]),random.randrange(0,image.size[1])
	else:
		
		next_point = next_point_x, next_point_y
		if(get_px_brightness(next_point) >= int(white_threshold)):
			continue		
		add_line(point, next_point)
		point = next_point
	
		#print(point, " -> ", next_point)

		
	#print(step)
	
	step = step + 1
render()
file2.close()


os.system("potrace "+fileItem.filename+" --svg -o ../result_potrace-t50-01.svg -t 50 -O 1")
os.system("potrace "+fileItem.filename+" --svg -o ../result_potrace-t200-01.svg -t 200 -O 1")
os.system("potrace "+fileItem.filename+" --svg -o ../result_potrace-t1000-01.svg -t 1000 -O 1 -u 100 -a 10 -n")
#os.system("python3 convert.py ../result.svg destination7.gcode")
#s2g ../result.svg target.gcode

print("Rendertime: ",int(time.time() - starttime), "seconds<br>")
print("pixelfrom source: ",image.size, "pixels<br>")




print("<div class='row' style='display: flex;'>")

print("<div class='column' style='flex: 50%'>")

print("<img  style='border: 5px solid #00f' width='90%' src='../result.bmp' alt='pathcreation_preview'><br>")
#print("<img src='../my3.svg' alt='Mountain'>")
print("</div>")
print("<div class='column' style='flex: 50%'>")

print("<br><h3>***********Artistic Settings*********</h3><br>");
print("Image: ",fileItem.filename, "<br>")
print("Stepcount: ",stepcount, "<br>")
print("linelength: ",linelength, "<br>")
print("jumpfactor: ",jumpfactor, "<br>")
print("white_threshold: ",white_threshold, "<br>")
print("sharpenfactor: ",sharpenfactor, "<br>")
print("randomseed: ",randomseed, "<br>")
print("<br><h3>***********Tracebot Settings*********</h3><br>");
print("drawingwidth_in_mm_form: ",drawingwidth_in_mm_form, "<br>")
print("drawingheight_in_mm_form: ",drawingheight_in_mm_form, "<br>")
print("offset_scratchhead_x: ",offset_scratchhead_x, "<br>")
print("offset_scratchhead_y: ",offset_scratchhead_y, "<br>")
print("speed radieren: ",speed, "<br>")
print("speed travel: ",speed2, "<br>")
print("</div>")
print("</div>")