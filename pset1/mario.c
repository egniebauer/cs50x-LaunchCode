#include <stdio.h>
#include <cs50.h>

int main(void)
{
    int height;

    do
    {
    printf("height: ");
    height = GetInt();
    }
    while (height < 0 || height > 23);

    for (int r = 0; r < height; r++)
    {
        int sp = height - (r + 1);
        
        while(sp > 0)
        {
        printf(" ");
        sp--;
        }

        int hash = 0;
        
        while(hash < r)
        {
        printf("#");
        hash++;
        }

        printf("##\n");
    }
}