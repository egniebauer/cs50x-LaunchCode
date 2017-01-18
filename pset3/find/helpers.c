/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */

#include <stdio.h>
#include <cs50.h>
#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    // Binary Search
    int min = 0;        // minimum index value
    int max = (n - 1);  // maximum index value
    
    // while the array is at least one element long
    while (min <= max)
    {
        int mid = min + ((max - min) / 2);  // midpoint index
        
        if (values[mid] == value) {
            return true;
        }
        // search lower half of array   (<-)|->
        else if (values[mid] > value) {
            max = mid - 1;
        }
        // search upper half of array   <-|(->)
        else if (values[mid] < value) {
            min = mid + 1;
        }
    }
    // value not in the array
    return false;
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    // TODO: implement an O(n^2) sorting algorithm
    // Insertion Sort
    // iterate through all but the first slot
    for(int i = 1; i < n; i++)
    {
        // keep track of current position
        int element = values[i];  // the element being moved
        int j = i;                // to index into the unsorted portion
        
        // iterate through the sorted portion R->L
        // stop when less than number you're trying to sort
        while(j > 0 && (values[j - 1] > element))
        {
            values[j] = values[j -1];  // shifting elements
            j = j - 1;                 // updating counter to move left through sorted portion
        }
        
        // insert the element into the sorted position of the list
        values[j] = element;
    }
}