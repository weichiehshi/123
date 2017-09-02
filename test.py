#!/usr/bin/python
# -*- coding: UTF-8 -*-

import MySQLdb
import time
import random
while True:
  Temp=random.randint(0, 100)
  RH=random.randint(0, 100)
  CDS=random.randint(0, 100)
  Voltage=random.randint(0, 100)
  Current=random.randint(0, 100)
  Power=random.randint(0, 2)
  db = MySQLdb.connect("localhost","root","raspberry","microchipDB",charset='utf8')
  cursor = db.cursor()
  ti= time.strftime("%Y%m%d%H%M%S", time.localtime())
#  sql ="INSERT INTO data(datetime,Temp,RH,CDS,Voltage,Current,Power)VALUES ('"
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
#  print sql
  try:
    cursor.execute(sql)
    db.commit()
  except:
    db.rollback()
    db.close()
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
#  print sql
  try:
    cursor.execute(sql)
    db.commit()
  except:
    db.rollback()
    db.close()
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
#  print sql
  try:
    cursor.execute(sql)
    db.commit()
  except:
    db.rollback()
    db.close()

  time.sleep(1)
