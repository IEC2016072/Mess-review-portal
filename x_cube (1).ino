int lf=5;   //left-front
int lfx=6;
int lb=7;
int lbx=8;
int rf=9;
int rfx=10;
int rb=11;  //right-back
int rbx=12;

char x=0;


void setup()
{
  Serial.begin(9600); 
  
  pinMode(lf,OUTPUT);
  pinMode(lfx,OUTPUT);
  pinMode(lb,OUTPUT);
  pinMode(lbx,OUTPUT);
  pinMode(rf,OUTPUT);
  pinMode(rfx,OUTPUT);
  pinMode(rb,OUTPUT);
  pinMode(rbx,OUTPUT);
}

void loop()
{

  //x='S';
  Serial.print(x);
  Serial.print(" ");
  if(Serial.available()>0)
  {
    x = Serial.read();
  }
  
  //if(x=='W')                //stop
  {
    digitalWrite(lf,LOW);   
    digitalWrite(lfx,LOW);  
    digitalWrite(lb,LOW);   
    digitalWrite(lbx,LOW);  
    digitalWrite(rf,LOW);   
    digitalWrite(rfx,LOW);
    digitalWrite(rb,LOW);   
    digitalWrite(rbx,LOW);  
  }
  
  if(x=='F')                //forward
  {
    digitalWrite(lf,HIGH);   
    digitalWrite(lfx,LOW);  
    digitalWrite(lb,HIGH);   
    digitalWrite(lbx,LOW);  
    digitalWrite(rf,HIGH);   
    digitalWrite(rfx,LOW);
    digitalWrite(rb,HIGH);   
    digitalWrite(rbx,LOW);  
  }
  
  if(x=='B')                //backward
  {
    digitalWrite(lf,LOW);   
    digitalWrite(lfx,HIGH);  
    digitalWrite(lb,LOW);   
    digitalWrite(lbx,HIGH);  
    digitalWrite(rf,LOW);   
    digitalWrite(rfx,HIGH);
    digitalWrite(rb,LOW);   
    digitalWrite(rbx,HIGH);  
  }

  
  if(x=='L')          //left
  {
    digitalWrite(lf,LOW);   
    digitalWrite(lfx,HIGH);  
    digitalWrite(lb,LOW);   
    digitalWrite(lbx,HIGH);  
    digitalWrite(rf,HIGH);   
    digitalWrite(rfx,LOW);
    digitalWrite(rb,HIGH);   
    digitalWrite(rbx,LOW); 
  }

  if(x=='R')          //right
  {
    digitalWrite(lf,HIGH);   
    digitalWrite(lfx,LOW);  
    digitalWrite(lb,HIGH);   
    digitalWrite(lbx,LOW);  
    digitalWrite(rf,LOW);   
    digitalWrite(rfx,HIGH);
    digitalWrite(rb,LOW);   
    digitalWrite(rbx,HIGH); 
  }
  
  if(x=='G')          //forward-left
  {
    digitalWrite(lf,LOW);   
    digitalWrite(lfx,HIGH);  
    digitalWrite(lb,HIGH);   
    digitalWrite(lbx,LOW);  
    digitalWrite(rf,HIGH);   
    digitalWrite(rfx,LOW);
    digitalWrite(rb,HIGH);   
    digitalWrite(rbx,LOW); 
  }
  
  if(x=='I')          //forward-right
  {
    digitalWrite(lf,HIGH);   
    digitalWrite(lfx,LOW);  
    digitalWrite(lb,HIGH);   
    digitalWrite(lbx,LOW);  
    digitalWrite(rf,LOW);   
    digitalWrite(rfx,HIGH);
    digitalWrite(rb,HIGH);   
    digitalWrite(rbx,LOW);
  }

  if(x=='H')          //back-left
  {
    digitalWrite(lf,LOW);   
    digitalWrite(lfx,HIGH);  
    digitalWrite(lb,HIGH);   
    digitalWrite(lbx,LOW);  
    digitalWrite(rf,LOW);   
    digitalWrite(rfx,HIGH);
    digitalWrite(rb,LOW);   
    digitalWrite(rbx,HIGH); 
  }
  
  if(x=='J')          //back-right
  {
    digitalWrite(lf,HIGH);   
    digitalWrite(lfx,LOW);  
    digitalWrite(lb,LOW);   
    digitalWrite(lbx,HIGH);  
    digitalWrite(rf,LOW);   
    digitalWrite(rfx,HIGH);
    digitalWrite(rb,LOW);   
    digitalWrite(rbx,HIGH); 
  }


  
}
  
