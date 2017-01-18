/**
 * Display Menu by Elizabeth G. Niebauer
 * CS50x || LaunchCode
 * 
 * This program program displays menu to the user from file.
 * 
 */

#include <stdio.h>
#include <cs50.h>

int main(int argc, char* argv[])
{
    // Output the restaurant's welcome message:
    printf("Welcome to Better Burger, way better than Good Burger!\n");
    printf("MENU:\n");

    // PUT YOUR CODE HERE: Open the file, based on the file name supplied in the command line
    FILE* menu = fopen(argv[1], "r");

    // PUT YOUR CODE HERE:
    // loop through each line in the input file
    // For each item, output its item number and value
    char line [256];
    
    for (int i = 1; fgets(line, sizeof(line), menu) != NULL; i++)
    {
      printf("%02d. %s", i, line);
    }
    
    printf("\n");
    // PUT YOUR CODE HERE: Close the file
    fclose(menu);

}
