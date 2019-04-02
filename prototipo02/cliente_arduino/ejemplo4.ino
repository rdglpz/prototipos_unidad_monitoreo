/**** Incluir librerías necesarias ****/
#include <ESP8266WiFi.h>
#include <DHT.h>

//int sensorPin = A0;
float rawRange = 1024;
float logRange = 5.0;

const char* ssid = "Iram";
const char* password = "123456789yo";

const char* host = "192.168.43.20"; //localhost IP de tu PC

/*** Definiendo el modelo de sensor y el pin al que estará conectado ***/
#define DHTTYPE DHT11
#define DHTPIN  2 // GPIO2
DHT dht(DHTPIN, DHTTYPE, 11);

/*** Variables para Humedad y Temperatura ****/
float temperatura;
float humedad;
float lumn;

void setup()
{
  Serial.begin(115200);
  Serial.println();

  //analogReference(EXTERNAL);
  dht.begin();

  Serial.printf("Connecting to %s ", ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println(" connected");
}

void loop()
{
  WiFiClient client;

  Serial.printf("\n[Connecting to %s ... ", host);
  if (client.connect(host, 80))
  {
    Serial.println("connected]");

    temperatura = dht.readTemperature();
    humedad = dht.readHumidity();
    //int rawValue = analogRead(sensorPin);   
    //lumn = RawToLux(rawValue);

    Serial.println("[Sending a request]");
    client.print(String("GET /insertPara.php?Temperatura=") + temperatura + "&Humedad=" + humedad + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n" +
                 "\r\n"
                );
    //client.print(String("GET /insertLumn.php?Luminancia=") + lumn + " HTTP/1.1\r\n" +
      //           "Host: " + host + "\r\n" +
        //         "Connection: close\r\n" +
          //       "\r\n");

    Serial.println("[Response:]");
    while (client.connected())
    {
      if (client.available())
      {
        String line = client.readStringUntil('\n');
        Serial.println(line);
      }
    }
    client.stop();
    Serial.println("\n[Disconnected]");
  }
  else
  {
    Serial.println("connection failed!]");
    client.stop();
  }
  delay(5000);
}

float RawToLux(int raw)
{
  float logLux = raw * logRange / rawRange;
  return pow(10, logLux);
}
