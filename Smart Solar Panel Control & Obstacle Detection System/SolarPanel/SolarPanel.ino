#include <Servo.h>
int top_right;
int top_left;
int down_left;
int down_right;
int echo=9;
int trig=8;
int buzzer=7;
int upper_servo=6;
int lower_servo=5;
int servo1=57;
int servo2=143;
int duration;         
int distance;
Servo s1;
Servo s2;

void setup() {
  pinMode (echo,INPUT);
  pinMode (trig,OUTPUT);
  pinMode (buzzer,OUTPUT);
  pinMode (upper_servo,OUTPUT);
  pinMode (lower_servo,OUTPUT);
  s1.attach(lower_servo);
  s2.attach(upper_servo); 
  Serial.begin(9600);
}
void loop() {
  delay(1);
  top_left = analogRead(A0);
  top_right = analogRead(A1);
  down_left = analogRead(A2);
  down_right = analogRead(A3);
 
  Serial.print("topleft: ");
  Serial.println(top_left);
  Serial.print("topright: ");
  Serial.println(top_right);
  Serial.print("downleft: ");
  Serial.println(down_left);
  Serial.print("downright: ");
  Serial.println(down_right);
  Serial.print("servo1: ");
  Serial.println(servo1);
  Serial.print("servo2: ");
  Serial.println(servo2);
  if(top_left+100<top_right){
    servo1++;
    if(servo1>145) servo1=145;
    s1.write(servo1);
  }
  if(down_left+100<down_right){
    servo1++;
    if(servo1>145) servo1=145;
    s1.write(servo1);
  }
  if(top_left>100+top_right){
    servo1--;
    if(servo1<-30) servo1=-30;
    s1.write(servo1);
  }
  if(down_left>100+down_right){
    servo1--;
    if(servo1<-30) servo1=-30;
    s1.write(servo1);
  }
  if(top_left+100<down_left){
    servo2++;
    if(servo2>230) servo2=230;
    s2.write(servo2);
  }
  if(top_right+100<down_right){
    servo2++;
    if(servo2>230) servo2=230;
    s2.write(servo2);
  }
  if(top_left>100+down_left){
    servo2--;
    if(servo2<55) servo2=55;
    s2.write(servo2);
  }
  if(top_right>100+down_right){
    servo2--;
    if(servo2<55) servo2=55;
    s2.write(servo2);
  }
  digitalWrite(buzzer,LOW);
  digitalWrite(trig, LOW);
  delayMicroseconds(2);
  digitalWrite(trig, HIGH);
  delayMicroseconds(10);
  digitalWrite(trig, LOW);
  duration= pulseIn(echo, HIGH);
  distance= duration*0.034/2;
  if(distance<10){
    digitalWrite(buzzer,HIGH);
    delayMicroseconds(10);
  }
  delay(100000);
  Serial.print("Distance: ");
  Serial.println(distance);
}
