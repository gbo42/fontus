#include <Ethernet.h>
#include <SPI.h>

String data, cod, fluxo, nivel;
byte mac[] = { 0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x01 };
byte statusLed = 13, sensorInterrupt = 0, sensorPin = 2;
int valor = 0, trigPin = 7, echoPin = 6, flowMilliLitres;;
float Calc, fluxo_val, fluxo_prev, flowRate, calibrationFactor = 4.5;
long duration, distance, nivel_val, nivel_prev, totalMilliLitres, oldTime;
volatile byte pulseCount;

EthernetClient client;

void setup() {
  Serial.begin(9600);
  Ethernet.begin(mac);
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  pinMode(statusLed, OUTPUT);
  digitalWrite(statusLed, HIGH);
  pinMode(sensorPin, INPUT);
  
  pulseCount = 0;
  flowRate  = 0.0;
  flowMilliLitres = 0;
  totalMilliLitres = 0;
  oldTime = 0;
  
  attachInterrupt(sensorInterrupt, pulseCounter, FALLING);
}

void pulseCounter(){
  pulseCount++;
}

float fNivel() {
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  duration = pulseIn(echoPin, HIGH);
  distance = (duration/2) / 29.1;
  distance = 100 - ((distance-3)/23.0 * 100);
  
  return distance;
}

int fFluxo(){ 
   if((millis() - oldTime) > 1000){ 
    detachInterrupt(sensorInterrupt);
    flowRate = ((1000.0 / (millis() - oldTime)) * pulseCount) / calibrationFactor;
    oldTime = millis();
    flowMilliLitres = (flowRate / 60) * 1000;
    totalMilliLitres += flowMilliLitres;
    unsigned int frac;
    frac = (flowRate - int(flowRate)) * 10;
    pulseCount = 0;
    attachInterrupt(sensorInterrupt, pulseCounter, FALLING);
  }
  return flowRate;
}

void loop(){
  cod = "cod=2";
  fluxo = "&fluxo=";
  nivel = "&nivel=";
  fluxo_val = fFluxo();
  nivel_val = fNivel();
  data = cod + fluxo + fluxo_val + nivel + nivel_val;
  client.stop();
  
  if (fluxo_val != fluxo_prev || (nivel_val+1 < nivel_prev || nivel_val-1 > nivel_prev)){
    if (client.connect("www.fontus.pe.hu", 80)) {
      client.println("POST /registrar.php HTTP/1.1");
      client.println("Host: fontus.pe.hu");
      client.println("Content-Type: application/x-www-form-urlencoded");
      client.print("Content-Length: ");
      client.println(data.length());
      client.println();
      client.print(data);
    }
    if (client.connected()) {
      client.stop();
    }
    fluxo_prev = fluxo_val;
    nivel_prev = nivel_val;
  }
}
