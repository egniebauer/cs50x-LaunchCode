/**
 * Good Burger by Elizabeth G. Niebauer
 * CS50x || LaunchCode
 * 
 * This program program to show the user a menu from a fast food restaurant
 * (named "Good Burger"), then take down their order, and write it into a file.
 */

#include <stdio.h>
#include <cs50.h>

// using fwrite
int main(void)
{
  string menuItems[] = {"Water", "Soda", "Cheeseburger", "Fries"};

  // Display menu:
  printf("Welcome to Good Burger! Can I take your order?\n");
  printf("MENU:\n");
  for (int i = 0; i < 4; i++)
  {
    printf("Item %i: %s\n", i, menuItems[i]);
  }
  printf("\nHow many items?\n");

  int numItems = GetInt();

  // PUT YOUR CODE HERE: open a file to write
  FILE* orderf = fopen("orders.txt", "w");

  // PUT YOUR CODE HERE: before continuing, make sure the file pointer is not NULL
  // if it is NULL, then quit the program (return 1) instead of continuing
  if (orderf == NULL)
  {
    exit(1);
  }

  for (int i = 0; i < numItems; i++)
  {
    printf("Which menu item would you like (0, 1, 2, or 3)?\n");
    int orderNum = GetInt();
    
    if (orderNum < 0 || orderNum > 3)
    {
      printf("Invalid selection.\n");
      fputs("Invalid selection.\n", orderf);
    }

    fwrite(menuItems[orderNum], orderf);
    fputs("\n", orderf);
  }

  // PUT YOUR CODE HERE: close the file
  fclose(orderf);
  return 0;
}

// using fputs
// int main(void)
// {
//   string menuItems[] = {"Water", "Soda", "Cheeseburger", "Fries"};

//   // Display menu:
//   printf("Welcome to Good Burger! Can I take your order?\n");
//   printf("MENU:\n");
//   for (int i = 0; i < 4; i++)
//   {
//     printf("Item %i: %s\n", i, menuItems[i]);
//   }
//   printf("\nHow many items?\n");

//   int numItems = GetInt();

//   // PUT YOUR CODE HERE: open a file to write
//   FILE* orderf = fopen("orders.txt", "w");

//   // PUT YOUR CODE HERE: before continuing, make sure the file pointer is not NULL
//   // if it is NULL, then quit the program (return 1) instead of continuing
//   if (orderf == NULL)
//   {
//     exit(1);
//   }

//   for (int i = 0; i < numItems; i++)
//   {
//     printf("Which menu item would you like (0, 1, 2, or 3)?\n");
//     int orderNum = GetInt();
    
//     if (orderNum < 0 || orderNum > 3)
//     {
//       printf("Invalid selection.\n");
//       fputs("Invalid selection.\n", orderf);
//     }

//     fputs(menuItems[orderNum], orderf);
//     fputs("\n", orderf);
//   }

//   // PUT YOUR CODE HERE: close the file
//   fclose(orderf);
//   return 0;
// }