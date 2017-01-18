/**
 * Hail, Caesar! by Elizabeth G. Niebauer
 * CS50x
 * This program encrypts messages using Caesar’s cipher.
 */
 
 #include <stdio.h>
 #include <cs50.h>
 #include <string.h>
 #include <stdlib.h>
 #include <ctype.h>
 
 int main(int argc, string argv[])
 {
      string p;                     //plaintext
      int k;                        //key, remainder
      int i, n;                     //index string variables
      int pa, ca;                   //ascii values
      char c;                       //ciphertext

      if (argc == 2)                        //check for two command-line arguments
      {
          k = atoi(argv[1]);                //convert key to int

          if (k >= 0)
          {
              p = GetString();              //plaintext

              for (i = 0, n = strlen(p); i < n; i++)
              {
                  pa = p[i];                //cast plaintext to int

                  if (isupper(pa))          //shift upper alphabet
                  {
                      ca = (((pa+k) - 65)%26) + 65;
                  }
                  else if (islower(pa))     //shift lower alphabet
                  {
                      ca = (((pa+k) - 97)%26) + 97;
                  }
                  else
                  {
                      ca = pa;
                  }
                  
                  c = ca;                   //cast ascii value ciphertext
                  
                  printf("%c", c);
              }
              printf("\n");
          }
          else
          {
              printf("Oops! Run \"./caesar\" with a non-negative integer. Please, try again.\n");
              return 1;
          }
      return 0;
      }
      else
      {
          printf("Oops! Run \"./caesar\" with two command-line arguments. Please, try again.\n");
          return 1;
      }
 }