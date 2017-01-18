#include <cs50.h>
#include <stdio.h>

// TODO: declare the signature for the swapCycle function.
void swapCycle(int* a, int* b, int* c);


int main(void)
{
    int x = 1;
    int y = 2;
    int z = 3;

    printf("Before swap:\n");
    printf("x is %i \ny is %i \nz is %i\n", x, y, z);

    printf("Swapping...\n");

    // TODO: call the swapCycle function
    swapCycle(&x, &y, &z);

    printf("After swap:\n");
    printf("x is %i \ny is %i \nz is %i\n", x, y, z);
}

// TODO: implement the swapCycle function
void swapCycle(int* a, int* b, int* c)
{
    int t = *a;
    *a = *b;
    *b = *c;
    *c = t;
}
