#include <stdio.h>
#include <cs50.h>
#include <string.h>

// prototype
char* doublecopy (char* str);


int main (void)
{
    // get string from user
    printf("Whaddaya say, kid?\n");
    char* string = GetString();
    
    // make a double copy of the string
    char* copy = doublecopy(string);
    printf("%s\n", copy);
    
    // free space
    free(copy);
}


char* doublecopy (char* str)
{
    // know string lengths
    int string_len = strlen(str);
    int copy_len = (string_len * 2) + 1;

    // allocate spce for copy
    char* copy = malloc(copy_len * sizeof(char));
    
    if (copy == NULL)
    {
        return NULL;
    }
    
    // copy the string twice
    int j = 0;
    for (int i = 0; i < copy_len - 1; i++)
    {
        
        if (*(str + j) != '\0')
        {
            *(copy + i) = *(str + j);
            j++;
        }
        else if (*(str + j) == '\0')
        {
            j = 0;
            *(copy + i) = *(str + j);
            j++;
        }
    }
    
    return copy;
}