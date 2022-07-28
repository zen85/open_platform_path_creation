
import cv2
import svgwrite
import py-svg2gcode

img = cv2.imread("result_potrace.svg", cv2.IMREAD_UNCHANGED)
ret, mask = cv2.threshold(img[:, :,3], 0, 255, cv2.THRESH_BINARY)

def add_pixel_fillers(img, cnt):
    n_points = len(cnt)
    for idx in range(n_points):
        prev_pt = cnt[(idx+n_points+1) % n_points]
        next_pt = cnt[(idx+1) % n_points]
        if abs(cnt[idx][0]-next_pt[0])==1 and abs(cnt[idx][1]-next_pt[1])==1:
            temp_x, temp_y = max(cnt[idx][0], next_pt[0]), min(cnt[idx][1], next_pt[1])
            if img[temp_y, temp_x] == 255:
                cnt[idx][0] = temp_x
                cnt[idx][1] = temp_y
            else:
                temp_x, temp_y = min(cnt[idx][0], next_pt[0]), max(cnt[idx][1], next_pt[1])
                if img[temp_y, temp_x] == 255:
                    cnt[idx][0] = temp_x
                    cnt[idx][1] = temp_y
    return cnt

contours, hierarchy = cv2.findContours(mask, cv2.RETR_LIST, cv2.CHAIN_APPROX_SIMPLE)

h, w = width=img.shape[0], img.shape[1]
dwg = svgwrite.Drawing("test2.svg", height=h, width=w, viewBox=(f"-10 -10 {h} {w}"))

#dwg = svgwrite.Drawing(self.name + '.svg', profile='tiny', size=canvas_size, viewBox=('0 0 %d %d' % view_box_size))

for cnt in contours:
    cnt = add_pixel_fillers(mask, cnt.squeeze().tolist())
    dwg.add(dwg.polygon(
        points=cnt,
        stroke_linecap='round',
        stroke='black',
        fill='none',
        stroke_linejoin='miter'
        ))
dwg.save()
