#include <cs50.h>
#include <string.h>
#include <stdio.h>

typedef struct {
    int* hashLocations;
    int length;
} csvLine;

csvLine extractNumbers(char* line);

int main(void)
{
    //You need to do the following:

    //Prompt the user for an input file
    printf("What is the name of the file I should read from?\n");
    char* input = GetString();
    
    //Prompt the user for an output file
    printf("What is the name of the file I should write to?\n");
    char* output = GetString();
    
    //Open the file to read from
    FILE* orig_file = fopen(input, "r");

    //Open the file you're writing to
    FILE* copy_file = fopen(output, "w");
    
    //For each line being read in from the input file:
    char line [256];
    for(int i = 0; fgets(line, sizeof(line), orig_file) != NULL; i++)
    {
        //Pass the line into the given extractNumbers function
        csvLine orig_line = extractNumbers(line);

        //For each value in the int array returned by extractNumbers:
        int counter = 0;
        for(int j = 0; j <= orig_line.length; j++)
        {
            while (counter != orig_line.hashLocations[j] && counter < 120)
            {
                //put spaces in the file until the value is reached
                fputc(' ', copy_file);
                printf(" ");
                counter++;
            } 
            
            if (counter == orig_line.hashLocations[j])
            {
                //put a hash in the file
                fputc('#', copy_file);
                printf("#");
                counter++;
            }
        }
        
        fputc('\n', copy_file);
        printf("\n");
        counter = 0;

    }

    //Close both files
    fclose(orig_file);
    fclose(copy_file);

    //Insert the name of the output file in the print statement below
    printf("Done! If you open up <%s> you should now see a cool image!\n", output);
}

csvLine extractNumbers(char* line)
{
    int count = 0;
    for(int i = 0; i < strlen(line); i++)
    {
        if(line[i] == ',')
        {
            count++;
        }
    }

    char* token;
    int* hV = malloc(sizeof(int) * (count+1));
    int i = 0;
    token = strtok(line, ",");
    hV[i] = atoi(token);
    i++;
    while ((token = strtok(NULL, ",")) != NULL)
    {
        hV[i] = atoi(token);
        i++;
    }
    csvLine result;
    result.hashLocations = hV;
    result.length = count + 1;
    return result;
}