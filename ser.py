#!/usr/bin/env python
import serial
import time
import MySQLdb


#=============================================

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)
Temp=0.0
RH=0.0
CDS=0
Voltage=0.0
Current=0.0
Power=0
data=[]
val=0
txt=""

db = MySQLdb.connect("localhost","root","raspberry","microchipDB",charset='utf8')

while True:
  port.write(chr(0x03))
  port.write(chr(0x01))
  port.write(chr(0x52))
  port.write(chr(0x56))
  time.sleep(0.7)
  if(port.inWaiting()>14):
    for x in range(15):
      data.append(ord(port.read(1)))
    if data[0]== 0x03:
      for y in range(14):
        val=val+data[y]
      print(val%0x100)
      if val% 0x100 == data[14]:
        Temp=data[2]+float(data[3])/100
        RH=data[4]+float(data[5])/100
        CDS=data[6]*0x100+data[7]
        Voltage=data[8]+float(data[9])/100
        Current=data[10]+float(data[11])/100
        Power=data[12]*0x100+data[13]
        for y in range(3):
          f = open('Box.json','w')
          f.write ("[{"+'"' + "voltage1" + '"' + " : [" + '"' + str(Voltage) + '"' + "]," +'"' + "current1" + '"' + " : [" + '"' + str(Current) + '"' + "],"+'"' + "power1" + '"' + " : [" + '"' + str(Power)+ '"' + "],"+'"' + "temp" + '"' + " : [" + '"' + str(Temp)+ '"' + "],"+'"' + "humidity" + '"' + " : [" + '"' + str(RH)+ '"' + "],"+'"' + "illumination" + '"' + " : [" + '"' + str(CDS)+ '"' + "]}]")
        print("1Temp     ="+ str(Temp))
        print("RH       ="+ str(RH))
        print("CDS      ="+ str(CDS))
        print("Voltage  ="+ str(Voltage))
        print("Current  ="+ str(Current))
        print("Power    ="+ str(Power))
        print
#########################################################33
        db = MySQLdb.connect("localhost","root","raspberry","microchipDB",charset='utf8')
        cursor = db.cursor()
        sql ="INSERT INTO data(Temp,RH,CDS,Voltage,Current,Power,Year,Month,Day,Hour,Minute,Second)VALUES ("
        sql=sql+str(Temp)
        sql=sql+","
        sql=sql+str(RH)
        sql=sql+","
        sql=sql+str(CDS)
        sql=sql+","
        sql=sql+str(Voltage)
        sql=sql+","
        sql=sql+str(Current)
        sql=sql+","
        sql=sql+str(Power)
        sql=sql+","
        sql=sql+time.strftime("%Y", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%m", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%d", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%H", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%M", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%S", time.localtime())
        sql=sql+")"
        print sql
        try:
          cursor.execute(sql)
          db.commit()
        except:
          db.rollback()
          db.close()
    port.flushInput()
    data=[]
    val=0
    Temp=0.0
    RH=0.0
    CDS=0
    Voltage=0.0
    Current=0.0
    Power=0
  else:
    port.flushInput()
############################################################################################################
  port.write(chr(0x03))
  port.write(chr(0x02))
  port.write(chr(0x52))
  port.write(chr(0x57))
  time.sleep(0.7)
  if(port.inWaiting()>14):
    for x in range(15):
      data.append(ord(port.read(1)))
    if data[0]== 0x03:
      for y in range(14):
        val=val+data[y]
      print(val%0x100)
      if val% 0x100 == data[14]:
        Temp=data[2]+float(data[3])/100
        RH=data[4]+float(data[5])/100
        CDS=data[6]*0x100+data[7]
        Voltage=data[8]+float(data[9])/100
        Current=data[10]+float(data[11])/100
        Power=data[12]*0x100+data[13]
        for y in range(3):
          f = open('Box2.json','w')
          f.write ("[{"+'"' + "voltage1" + '"' + " : [" + '"' + str(Voltage) + '"' + "]," +'"' + "current1" + '"' + " : [" + '"' + str(Current) + '"' + "],"+'"' + "power1" + '"' + " : [" + '"' + str(Power)+ '"' + "],"+'"' + "temp" + '"' + " : [" + '"' + str(Temp)+ '"' + "],"+'"' + "humidity" + '"' + " : [" + '"' + str(RH)+ '"' + "],"+'"' + "illumination" + '"' + " :  [" + '"' + str(CDS)+ '"' + "]}]")
        print("2Temp     ="+ str(Temp))
        print("RH       ="+ str(RH))
        print("CDS      ="+ str(CDS))
        print("Voltage  ="+ str(Voltage))
        print("Current  ="+ str(Current))
        print("Power    ="+ str(Power))
        print
        db = MySQLdb.connect("localhost","root","raspberry","microchipDB",charset='utf8')
        cursor = db.cursor()
        sql ="INSERT INTO data2(Temp,RH,CDS,Voltage,Current,Power,Year,Month,Day,Hour,Minute,Second)VALUES ("
        sql=sql+str(Temp)
        sql=sql+","
        sql=sql+str(RH)
        sql=sql+","
        sql=sql+str(CDS)
        sql=sql+","
        sql=sql+str(Voltage)
        sql=sql+","
        sql=sql+str(Current)
        sql=sql+","
        sql=sql+str(Power)
        sql=sql+","
        sql=sql+time.strftime("%Y", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%m", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%d", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%H", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%M", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%S", time.localtime())
        sql=sql+")"
        print sql
        try:
          cursor.execute(sql)
          db.commit()
        except:
          db.rollback()
          db.close()
    port.flushInput()
    data=[]
    val=0
    Temp=0.0
    RH=0.0
    CDS=0
    Voltage=0.0
    Current=0.0
    Power=0
  else:
    port.flushInput()
############################################################################################################

  port.write(chr(0x03))
  port.write(chr(0x03))
  port.write(chr(0x52))
  port.write(chr(0x58))
  time.sleep(0.7)
  if(port.inWaiting()>14):
    for x in range(15):
      data.append(ord(port.read(1)))
    if data[0]== 0x03:
      for y in range(14):
        val=val+data[y]
      print(val%0x100)
      if val% 0x100 == data[14]:
        Temp=data[2]+float(data[3])/100
        RH=data[4]+float(data[5])/100
        CDS=data[6]*0x100+data[7]
        Voltage=data[8]+float(data[9])/100
        Current=data[10]+float(data[11])/100
        Power=data[12]*0x100+data[13]
        for y in range(3):
          f = open('Box3.json','w')
          f.write ("[{"+'"' + "voltage1" + '"' + " : [" + '"' + str(Voltage) + '"' + "]," +'"' + "current1" + '"' + " : [" + '"' + str(Current) + '"' + "],"+'"' + "power1" + '"' + " : [" + '"' + str(Power)+ '"' + "],"+'"' + "temp" + '"' + " : [" + '"' + str(Temp)+ '"' + "],"+'"' + "humidity" + '"' + " : [" + '"' + str(RH)+ '"' + "],"+'"' + "illumination" + '"' + " :  [" + '"' + str(CDS)+ '"' + "]}]")
        print("3Temp     ="+ str(Temp))
        print("RH       ="+ str(RH))
        print("CDS      ="+ str(CDS))
        print("Voltage  ="+ str(Voltage))
        print("Current  ="+ str(Current))
        print("Power    ="+ str(Power))
        print
        db = MySQLdb.connect("localhost","root","raspberry","microchipDB",charset='utf8')
        cursor = db.cursor()
        sql ="INSERT INTO data3(Temp,RH,CDS,Voltage,Current,Power,Year,Month,Day,Hour,Minute,Second)VALUES ("
        sql=sql+str(Temp)
        sql=sql+","
        sql=sql+str(RH)
        sql=sql+","
        sql=sql+str(CDS)
        sql=sql+","
        sql=sql+str(Voltage)
        sql=sql+","
        sql=sql+str(Current)
        sql=sql+","
        sql=sql+str(Power)
        sql=sql+","
        sql=sql+time.strftime("%Y", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%m", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%d", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%H", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%M", time.localtime())
        sql=sql+","
        sql=sql+time.strftime("%S", time.localtime())
        sql=sql+")"
        print sql
        try:
          cursor.execute(sql)
          db.commit()
        except:
          db.rollback()
          db.close()
    port.flushInput()
    data=[]
    val=0
    Temp=0.0
    RH=0.0
    CDS=0
    Voltage=0.0
    Current=0.0
    Power=0
  else:
    port.flushInput()
############################################################################################################
