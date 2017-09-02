#!/usr/bin/python3

import json
import serial
import time
port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
while True:
  time.sleep(1)
####################################################################
  with open('data.json', 'r') as f:
      data = json.load(f)
  data1=json.dumps(data)
  data1=json.loads(data1)

  pyflag=int(data1['flag'],10)
  pymode=int(data1['mode'],10)
  pydate=int(data1['date'],10)

  if pyflag==1:
    data1['flag']="0"
    data1=json.dumps(data1)
    print data1
#  with open('data.json', 'w') as f:
    file = open('data.json', 'w')
    file.write(data1)
    file.close()

    a=[0x03,0x01,0x57,0xff,0xff,0xff,0xff]
    a[3]=pymode
    a[5]=pydate
    a[6]=(a[0]+a[1]+a[2]+a[3]+a[4]+a[5])%256
    for x in range(7):
      print a[x]
      port.write(chr(a[x]))

########################################################333
  with open('data2.json', 'r') as f:
      data = json.load(f)
  data1=json.dumps(data)
  data1=json.loads(data1)

  pyflag=int(data1['flag'],10)
  pymode=int(data1['mode'],10)
  pydate=int(data1['date'],10)

  if pyflag==1:
    data1['flag']="0"
    data1=json.dumps(data1)
    print data1
#  with open('data.json', 'w') as f:
    file = open('data2.json', 'w')
    file.write(data1)
    file.close()

    a=[0x03,0x02,0x57,0xff,0xff,0xff,0xff]
    a[3]=pymode
    a[5]=pydate
    a[6]=(a[0]+a[1]+a[2]+a[3]+a[4]+a[5])%256
    for x in range(7):
      print a[x]
      port.write(chr(a[x]))


########################################################333
  with open('data3.json', 'r') as f:
      data = json.load(f)
  data1=json.dumps(data)
  data1=json.loads(data1)

  pyflag=int(data1['flag'],10)
  pymode=int(data1['mode'],10)
  pydate=int(data1['date'],10)

  if pyflag==1:
    data1['flag']="0"
    data1=json.dumps(data1)
    print data1
#  with open('data.json', 'w') as f:
    file = open('data3.json', 'w')
    file.write(data1)
    file.close()

    a=[0x03,0x03,0x57,0xff,0xff,0xff,0xff]
    a[3]=pymode
    a[5]=pydate
    a[6]=(a[0]+a[1]+a[2]+a[3]+a[4]+a[5])%256
    for x in range(7):
      print a[x]
      port.write(chr(a[x]))

