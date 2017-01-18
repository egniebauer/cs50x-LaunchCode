#include <stdio.h>
#include <cs50.h>
#include <string.h>

// prototpes
bool customstrcmp (char* s1, char* s2);

int main(void)
{
    printf("\nString 1?: ");
    char* string1 = GetString();
    
    printf("\nString 2?: ");
    char* string2 = GetString();

    bool areEqual = customstrcmp(string1, string2);

    if (areEqual)
    {
        printf("\nBingo! The strings are equal!\n");
    }
    else
    {
        printf("\nThe strings are not equal!\n");
    }
}

/**
 * customstrcmp
 * iterates through two strings, character by character
 * returns true if they are exactly the same, otherwise returns false
 */
// TODO: implement customstrcmp here
bool customstrcmp (char* s1, char* s2)
{
    int s1_length = strlen(s1);
    int s2_length = strlen(s2);
    
    // check string lengths are equal
    if (s1_length != s2_length)
    {
        return false;
    }
    
    // not match flag
    int flag = 0;
    
    // compare characters of the strings
    for (int i = 0; i < s1_length; i++)
    {
        if (*(s1 + i) != *(s2 + i))
        {
            flag = 1;
            break;
        }
    }
    
    // verify no error flags
    if (flag == 0)
    {
        return true;
    }
    
    return false;
}