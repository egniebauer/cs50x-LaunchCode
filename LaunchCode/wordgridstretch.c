 /**
  * Filename: wordgridstretch.c
  * Save in Folder: ~/workspace/module4/studios/wordgridstretch
  *
  * The word grid is back with a vengence!
  *
  * Just like last week, this studio involves taking some strings from the user, and then printing them back out in a transformed way.
  *
  * Today, your program will apply a "stretch" factor to the grid of letters, making it larger.
  * 
  * It is easiest to explain via example. The finished program should behave like this:
  * 
  * $ ./wordgridstretch goat crab bear
  * Your word grid currently looks like this:
  * goat
  * crab
  * bear
  * Now I will stretch it out. How much should I stretch by?
  * 3
  * After stretching by 3, you now have this!
  * gggoooaaattt
  * gggoooaaattt
  * gggoooaaattt
  * cccrrraaabbb
  * cccrrraaabbb
  * cccrrraaabbb
  * bbbeeeaaarrr
  * bbbeeeaaarrr
  * bbbeeeaaarrr
  * That's what we mean by "making the grid larger".
  * 
  * Validation
  * 
  * Don't forget to validate the user's input. Specifically, you'll want to ensure:
  * 
  *   1. that the user gave you exactly 3 words as command-line arguments
  *   2. that those words are all the same length
  *   3. that the user provides a non-negative stretch factor
  *  
  * Submitting
  * 
  * You don't have to submit stretchvertical.c and stretchhorizontal.c. You only have to submit wordgridstretch.c.
  */


#include <stdio.h>
#include <cs50.h>
#include <string.h>

 
// prototypes
int verify_usage(int n);
int verify_words(char* s1, char* s2, char* s3);
int verify_factor(int n);
char* horizontal(char* str, int n);
void vertical(char* s1, char* s2, char* s3, int n);


int main(int argc, string argv[])
{
    // variables
    int count = argc;
    int factor;

    // verify usage
    verify_usage(count);
    
    // words for word grid
    char* str1 = argv[1];
    char* str2 = argv[2];
    char* str3 = argv[3];
    
    // verify word lengths
    verify_words(str1, str2, str3);
    
    
    // current word grid
    printf("Your word grid currently looks like this:\n%s\n%s\n%s\n", str1, str2, str3);
    
    // get and verify stretch factor
    printf("Now I will stretch it out horizontally. How much should I stretch by?\n");
    factor = GetInt();
    verify_factor(factor);
    
    // stretch word grid
    printf("After stretching by %d, you now have this!\n", factor);
    char* str1hort = horizontal(str1, factor);
    char* str2hort = horizontal(str2, factor);
    char* str3hort = horizontal(str3, factor);
    vertical(str1hort, str2hort, str3hort, factor);

    return 0;
}


int verify_usage(int argc)
{
    if (argc != 4)
    {
        printf("Usage: ./wordgridstretch word word word\n");
        exit(1);
    }
    else
    {
        return 0;
    }
}


int verify_words(char* s1, char* s2, char* s3)
{
    int s1len = strlen(s1);
    int s2len = strlen(s2);
    int s3len = strlen(s3);
    
    if (s1len == s2len && s1len == s3len)
    {
        return 0;
    }
    else
    {
        printf("'word' 'word' and 'word' need to be the same length.\n");
        exit(2);
    }
}


int verify_factor(int n)
{
    if(n >= 0)
    {
        return 0;
    }
    else
    {
        printf("Requires a positive integer.\n");
        exit(3);
    }
}


char* horizontal(char* str, int n)
{
    int string_length = strlen(str);
    int stretch_length = string_length * n + 1;
    char* stretch_string = malloc(stretch_length * sizeof(char));
    int e = 0;
    
    for (int i = 0; i < string_length; i++)
    {
        for (int j = 0; j < n; j++)
        {
            *(stretch_string + e) = *(str + i);
            e++;
        }
    }
    
    return stretch_string;
    free(stretch_string);
}


void vertical(char* s1, char* s2, char* s3, int n)
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