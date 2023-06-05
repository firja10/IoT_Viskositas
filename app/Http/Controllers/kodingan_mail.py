import RPi.GPIO as GPIO
from time import sleep
import time, sys

from ina219 import INA219
import drivers
import threading

import http.client

ina = INA219(shunt_ohms=0.01,
             max_expected_amps=5,
             address=0x40)

#ina2 = INA219(shunt_ohms=0.01,             max_expected_amps=5,
#             address=0x41)

ina.configure(voltage_range=ina.RANGE_16V,
              gain=ina.GAIN_AUTO,
              bus_adc=ina.ADC_128SAMP,
              shunt_adc=ina.ADC_128SAMP)

#ina2.configure(voltage_range=ina2.RANGE_16V,
 #             gain=ina2.GAIN_AUTO,
 #             bus_adc=ina2.ADC_128SAMP,
  #            shunt_adc=ina2.ADC_128SAMP)



mylcd = drivers.Lcd()

# Direction pin from controller
DIR = 10
# Step pin from controller
STEP = 8
# 0/1 used to signify clockwise or counterclockwise.
CW = 1
CCW = 0

# FC-03 Sensor
SENSOR_PIN = 31
encoder_ticks = 0
rpm = 0
last_interrupt_time = 0

ir_sensor = 36

# Setup pin layout on PI
GPIO.setmode(GPIO.BOARD)

#Acuan untuk Waktu
GPIO_last = 0

GPIO_cur = 0

# Establish Pins in software
GPIO.setup(DIR, GPIO.OUT)
GPIO.setup(STEP, GPIO.OUT)
GPIO.setup(SENSOR_PIN, GPIO.IN, pull_up_down=GPIO.PUD_UP)

# Set the first direction you want it to spin
GPIO.output(DIR, CW)





def read_sensor():
    
    global start_time, count
    

    while True:
        count += 1
    
        # Calculate time difference between consecutive object detections
        end_time = time.time()
        duration = end_time - start_time
        
        
        #ir sensor

        if duration >= 1:
            # Calculate RPM using the count and duration
            rpm = (count / duration) * 60
    
            # Reset count and start time for the next measurement
            #count = 0
            #start_time = time.time()
    
            # Print the calculated RPM
            print("RPM:", rpm)
                    # Ngirim Data Kuat Arus dan Tegangan
            conn_w = http.client.HTTPSConnection('maulinakartika.xyz')
            
            headers_w = {'Content-Type': 'application/x-www-form-urlencoded'}
            
            body_w = 'w=' + str(rpm) + '&w_ref=2.5&ref_error_w=0.5'
            
            conn_w.request('POST', '/store_data_kecepatan_motor', body_w, headers_w)
            response = conn_w.getresponse()
            
            conn_w.close()
        
        
        
                # Set up GPIO mode and event detection

                    
        #ina219
        v = ina.voltage()
        i = ina.current()
        p = ina.power()
        
        mylcd.lcd_display_string(str(v) + ' Volt      ', 1)
        #mylcd.lcd_display_string(str(i) + ' mA', 2)
        #mylcd.lcd_display_string('{:.3f} mA'.format(i), 2)
        
        if i < 0:
            #mylcd.lcd_display_string('0.000 mA', 2)
            mylcd.lcd_display_string('{:.3f} mA   '.format(i), 2)
        else:
            mylcd.lcd_display_string('{:.3f}  mA   '.format(i), 2)

        
        time.sleep(2)
        
        # Ngirim Data Kuat Arus 
        conn = http.client.HTTPSConnection('maulinakartika.xyz')
        
        headers_i = {'Content-Type': 'application/x-www-form-urlencoded'}
        
        body_i = 'i=' + str(i) + '&i_ref=2.5&ref_error_i=0.5'
        
        conn.request('POST', '/store_data_kuat_arus', body_i, headers_i)
        response = conn.getresponse()
        
        conn.close()
        
        # Ngirim Data Tegangan
        conn_v = http.client.HTTPSConnection('maulinakartika.xyz')
        
        headers_v = {'Content-Type': 'application/x-www-form-urlencoded'}
        
        body_v = 'v=' + str(v) + '&v_ref=2.5&ref_error_v=0.5'
        
        conn_v.request('POST', '/store_data_tegangan', body_v, headers_v)
        response = conn_v.getresponse()
        
        conn_v.close()



        # Ngirim Data Viskositas
        conn_vis = http.client.HTTPSConnection('maulinakartika.xyz')
        
        headers_vis = {'Content-Type': 'application/x-www-form-urlencoded'}
        
        body_vis = 'v=' + str(v) + '&v_ref=2.5&ref_error_v=0.5'
        
        conn_vis.request('POST', '/store_data_viskositas', body_vis, headers_vis)
        response = conn_vis.getresponse()
        
        conn_vis.close()
        
        
#GPIO.setmode(GPIO.BCM)
GPIO.setup(SENSOR_PIN, GPIO.IN)
GPIO.add_event_detect(SENSOR_PIN, GPIO.RISING, callback=read_sensor)
        
        # Global variables for count and start time
count = 0
start_time = time.time()

def control_motor():
    while True:
        
        
        GPIO.output(DIR, CW)

        # Run for 200 steps. This will change based on how you set your
        

        # controller
        for x in range(200):
            GPIO.output(STEP, GPIO.HIGH)
            sleep(0.0005)
            GPIO.output(STEP, GPIO.LOW)
            sleep(0.005)
        
            #encoder_thread.start()
        print(rpm)
        

def main():
    sensor_thread = threading.Thread(target=read_sensor)
    motor_thread = threading.Thread(target=control_motor)

    sensor_thread.start()
    motor_thread.start()


if __name__ == "__main__":
    main()
