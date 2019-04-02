import time
import datetime
import Adafruit_DHT
import MySQLdb

sensor = Adafruit_DHT.DHT11

def write_mysql(Temperatura, Humedad):
	db = MySQLdb.connect(host=localhost,user=root,passwd= ,db=contaminates)
	cursor = db.cursor()
	sql = "INSERT INTO datos (Fecha, Hora, Temperatura, Humedad) values (now(),'" + str(temperatura) + "','" + str(humedad) + "');"
	try:
		cursor.execute(sql)
		db.commit()
	except:
		conn.rollback()
	cursor.close
	db.close


def write_log(text):
	log = open(log_path + datetime.datetime.now().strftime("%Y-%m-%d") + "_dht.log","a")
	line = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S") + " " + text + "\n"
	log.write(line)
	log.close()


try:
	pin = 16
	while True:
		
		humedad, temperatura = Adafruit_DHT.read_retry(sensor, pin)
		if humedad is not None and temperatura is not None:
			write_log("DHT Sensor - Temperatura: %s" % str(temperatura))
			write_log("DHT Sensor - Humedad:  %s" % str(humedad))
			write_mysql(temperatura,humedad)
		else:
			write_log('Error al obtener la lectura del sensor')
		time.sleep(1)

except Exception,e: write_log(str(e))
