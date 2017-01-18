/**
  * A program that just stretches the grid vertically:
  * 
  * $ ./stretchvertical goat crab bear
  * Your word grid currently looks like this:
  * goat
  * crab
  * bear
  * Now I will stretch it out vertically. How much should I stretch by?
  * 3
  * After stretching by 3, you now have this!
  * goat
  * goat
  * goat
  * crab
  * crab
  * crab
  * bear
  * bear
  * bear
  *
  */
 
#include <stdio.h>
#include <cs50.h>

// prototype
void stretch(char* s1, char* s2, char* s3, int n);
 
 
int main(int argc, string argv[])
{
    // variables
    char* str1, *str2, *str3;
    int vert;
    
    // verify correct usage 
    if (argc != 4)
    {
        printf("Usage: ./stretchvertical word word word\n");
        return 1;
    }
    
    // words for word grid
    str1 = argv[1];
    str2 = argv[2];
    str3 = argv[3];
    
    printf("Your word grid currently looks like this:\n%s\n%s\n%s\n", str1, str2, str3);
    printf("Now I will stretch it out vertically. How much should I stretch by?\n");
    vert = GetInt();
    
    printf("After stretching by %d, you now have this!\n", vert);
    stretch(str1, str2, str3, vert);
}

void stretch(char* s1, char* s2, char* s3, int n)
{
    for (int i = 0; i < n; i++)
    {
        printf("%s\n", s1);
    }
    for (int i = 0; i < n; i++)
    {
        printf("%s\n", s2);
    }
    for (int i = 0; i < n; i++)
    {
        printf("%s\n", s3);
    }
}