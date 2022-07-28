#!/usr/bin/python3
import cgi


print('Content-Type:text/html;charset=utf-8\r\n')
print('\r\n')
print('Hello')

form = cgi.FieldStorage()
#username = form.getvalue("username")
	 
	
#print(username+"From python")

#import Image
from PIL import Image, ImageDraw
from math import sqrt
import random
import time
import svgwrite
import math
#import potrace


def truncate(number, digits) -> float:
    stepper = 10.0 ** digits
    return math.trunc(stepper * number) / stepper

#params



#image_name = "asterisk.jpg"
image_name = "shadow.jpg"
result_image_name = "result.bmp"
result_svg_name = "result.svg"
step_count = 10000
line_length = 50
line_color = (0,0,0)
bg_color = (255,255,255)
#line_color = (255,255,255)
#bg_color = (0,0,0)
line_width = 1
jump_factor = 0.1
random_seed = 333333
drawingwidth_in_mm = 150;
drawingheight_in_mm = 200;

#gcodecommands
gcode_up = '''
G4 P0 
G1 Z5.5 F1200 ; S0
G1 F6000
'''

gcode_down = '''
G4 P0 
G1 Z0.5 F1200 ; S0
G4 P0
G1 F6000.000000
'''

starting_gcode = '''
G1 Z5.5 F1200 ; S0

G0 Z8.5 
G28
G90
G0 Z2.53
M117 Deploy Pen NOW! 10
G4 P10000
M117 Deploy Pen NOW! 9
G4 P1000
M117 Deploy Pen NOW! 8
G4 P1000
M117 Deploy Pen NOW! 7
G4 P1000
M117 Deploy Pen NOW! 6
G4 P1000
M117 Deploy Pen NOW! 5
G4 P1000
M117 Deploy Pen NOW! 4
G4 P1000
M117 Deploy Pen NOW! 3
G4 P1000
M117 Deploy Pen NOW! 2
G4 P1000
M117 Deploy Pen NOW! 1
G0 Z5.5 
G4 P1000
M117 Drawing..
G21
G1 F6000
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
	
	print("Image is rendered!")
	

#init
print("Start")
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
file2 = open(r"MyFile2.gcode","w") 
file2.write("")
file2.close()

file2 = open(r"MyFile2.gcode","a") 



file2.write(starting_gcode)



print("init complete");

#process
step = 0
line_pos = 0
starttime = time.time()
#determine start point randomly
point = random.randrange(0,image.size[0]),random.randrange(0,image.size[1])

while step < step_count:
	line_pos = line_pos + 1
	
	#wenn linie aus ist mach neuen startpunkt
	if(line_pos >= line_length): 
		point = random.randrange(0,image.size[0]),random.randrange(0,image.size[1])
		#file2.write ('\n neuer startpunkt')
		file2.write(gcode_up)
		file2.write ('\n G1 X'+str(truncate(point[0]*x_pixel_mm_faktor,4))+' Y'+str(truncate(point[1]*y_pixel_mm_faktor,4))+ '')

		
		
		file2.write(gcode_down)
		line_pos = 0
	else:
		file2.write ('\n G1 X'+str(truncate(point[0]*x_pixel_mm_faktor,4))+' Y'+str(truncate(point[1]*y_pixel_mm_faktor,4))+ '')
		
	point_brightness = get_px_brightness(point)
	jump_length = int((255-point_brightness)*jump_factor) + 1
	print(step, ":", point, " Brightness: ", point_brightness, " jump: ", jump_length)
	
	#file2.writelines(str(point[0]))
	#erweitere um funktionsmadsfglichkeit nur gewisse winkel zuzulassen
	
	
 
	
	
	next_point_x = random.randrange(point[0]-int(jump_length),point[0]+int(jump_length)+1)
	next_point_y = random.randrange(point[1]-int(jump_length),point[1]+int(jump_length)+1)
	
	if not (0 <= next_point_x < image.size[0]) or not (0 <= next_point_y < image.size[1]): 
		print("next point out of range, line end")
		file2.write ('\n next point out of range')
		point = random.randrange(0,image.size[0]),random.randrange(0,image.size[1])
	else:
		next_point = next_point_x, next_point_y
		add_line(point, next_point)
		point = next_point
	
		#print(point, " -> ", next_point)

		
	#print(step)
	
	step = step + 1
render()
file2.close()
print("Rendertime: ",int(time.time() - starttime), "seconds")
print("pixelfrom source: ",image.size, "pixels")
print("in mm output: ",drawingwidth_in_mm/image.size[0], "output")



		
		

