/**
  * $ ./stretchhorizontal goat crab bear
  * Your word grid currently looks like this:
  * goat
  * crab
  * bear
  * Now I will stretch it out horizontally. How much should I stretch by?
  * 3
  * After stretching by 3, you now have this!
  * gggoooaaattt
  * cccrrraaabbb
  * bbbeeeaaarrr
  * Only after writing these little badboys should you start to think about how to combine both steps into one big badderboy.
  * 
  */
 
#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <stdlib.h>
#include <ctype.h>
 
// prototype
void stretch(char* str, int n);
 
 
int main(int argc, string argv[])
{
    // variables
    char* str1, *str2, *str3;
    int hort;
    
    // verify correct usage 
    if (argc != 4)
    {
        printf("Usage: ./stretchhorizontal word word word\n");
        return 1;
    }
    
    // words for word grid
    str1 = argv[1];
    str2 = argv[2];
    str3 = argv[3];
    
    printf("Your word grid currently looks like this:\n%s\n%s\n%s\n", str1, str2, str3);
    printf("Now I will stretch it out horizontally. How much should I stretch by?\n");
    hort = GetInt();
    
    printf("After stretching by %d, you now have this!\n", hort);
    stretch(str1, hort);
    stretch(str2, hort);
    stretch(str3, hort);
}

void stretch(char* str, int n)
{
    int string_length = strlen(str);
    
    for (int i = 0; i < string_length; i++)
    {
        for (int j = 0; j < n; j++)
        {
            printf("%c", *(str + i));
        }
    }
    
    printf("\n");
}