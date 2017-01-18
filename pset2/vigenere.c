/**
 * Parlez-vous français? by Elizabeth G. Niebauer
 * CS50x
 * This program encrypts messages using Vigenère’s cipher (a sequence of keys).
 */
 
 #include <stdio.h>
 #include <cs50.h>
 #include <string.h>
 #include <stdlib.h>
 #include <ctype.h>

int main(int argc, string argv[])
{
// variables
 string key;
 string plaintext;
 char ciphertext;
 int keylen, j;
 int plainlen, i;
 int plainAscii, keyAscii, cipherAscii;
 int keyshift, c;


// if there aren't two command-line arguments, exit program 
 if (argc != 2) {
  printf("Oops! Run \"./vigenere\" with two command-line arguments. Please, try again.\n");
  return 1;
 }


// otherwise, verify key is alpha; iterate through each character of the key
 else {
  key = argv[1];
  keylen = strlen(key);

   for (j=0; j < keylen ;j++) {
    if (isalpha(key[j])) {
   }
    else {
     printf("Uh-oh! Run \"./vigenere\" with letters. Please, try again.\n");
     return 1;
 }}}


// get plaintext from user to encrypt
    plaintext = GetString();
    plainlen = strlen(plaintext);
    c = 0;
    
    
// iterate through each character of the plaintext  
  for (i=0; i < plainlen; i++) {

   if (isalpha(plaintext[i])) {
    j = c % (keylen);
    keyAscii = key[j];    // cast key to ASCII
    c++;
    
    if (isupper(key[j])) {
     keyshift = (keyAscii - 65);
    }
    else if (islower(key[j])) {
     keyshift = (keyAscii - 97);
    }
    else {
     keyshift = 0;
   }}
   else {
    keyshift = 0;
   }
   
   
// get plaintext
   plainAscii = plaintext[i];    // cast plaintext to ASCII
    
// encrypt text using keyshit
    if (isupper(plainAscii)) {    //shift upper alphabet
     cipherAscii = (((plainAscii+keyshift) - 65) % 26) + 65;
    }
    else if (islower(plainAscii)) {    //shift lower alphabet
     cipherAscii = (((plainAscii+keyshift) - 97) % 26) + 97;
    }
    else {
     cipherAscii = plainAscii;
    }
    
    // debugging
    //printf("i: %d, plaintext[i]: %c, plnAscii: %d\t\tc:%d, j:%d key[j]: %c, keyshift: %d\n", i, plaintext[i], plainAscii, c, j, key[j], keyshift);
    // debugging
    
//print encrypted text     
    ciphertext = cipherAscii;    //cast ascii value ciphertext
    printf("%c", ciphertext);
  }
 printf("\n");
 return 0;
 }