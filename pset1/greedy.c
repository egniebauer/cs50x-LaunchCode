#include <cs50.h>
#include <stdio.h>
#include <math.h>

int main(void)
{
    //** get change amount **//

    float chg; //variable: change due
    
    do //request positive floating decimal from user
    {
    printf("How much change are you owed?\n");
    chg = GetFloat();
    }
    while(chg<=0);
    
    //** calculate coins **//
    int chg100 = round(chg*100); //change due without decimals
    int r = chg100; //change remainder

    int q=25; //quarters
    int d=10; //dimes
    int n=5; //nickels
    int p=1; //pennies
    
    int qt=0; //total quarters
    int dt=0; //total dimes
    int nt=0; //total nickels
    int pt=0; //total pennies
    
    while(r>=q)
    {
        r=r-q;
        qt++;
    }
    while(r>=d)
    {
        r=r-d;
        dt++;
    }
    while(r>=n)
    {
        r=r-n;
        nt++;
    }
    while(r>=p)
    {
        r=r-p;
        pt++;
    }
    
    int s=qt+dt+nt+pt; //sum total coins
    printf("%d\n", s);
}