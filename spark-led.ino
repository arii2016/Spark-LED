// This routine runs only once upon reset
void setup()
{
   //Register our Spark function here
   Spark.function("led", ledControl);

   // Configure the pins to be outputs
   pinMode(D0, OUTPUT);

   // Initialize both the LEDs to be OFF
   digitalWrite(D0, LOW);
}


// This routine loops forever
void loop()
{
   // Nothing to do here
}

int ledControl(String command)
{
   int state = 0;

   // find out the state of the led
   if(command.substring(0,2) == "ON") state = 1;
   else if(command.substring(0,3) == "OFF") state = 0;
   else return -1;

   // write to the appropriate pin
   digitalWrite(D0, state);
   return 1;
}
