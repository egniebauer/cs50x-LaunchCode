/**
 * Initializing by Elizabeth G. Niebauer
 * CS50x
 * This program promts users for their names and provides them back their initials.
 */

#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <ctype.h>

int main (void)
{
    //declare variables
    string name;                //user's name
    int l, nl;                  //letter, name length,
    char c;                     //character

    
    //promt user for their name
    //printf("What is your name?\n");
    name = GetString();                     //gets user's name (including spaces)
 

    //print initials
    printf("%c", toupper(name[0]));         //prints first initial
    
    if (name != NULL)                       //prints remaining initials
    {
        for (l=0, nl=strlen(name); l<nl; l++)
        {
            c = name[l];
            while (c == ' ')
            {
                printf("%c", toupper(name[l + 1]));
                break;
            }
        }
    }
    printf("\n");                           //prints new line
}