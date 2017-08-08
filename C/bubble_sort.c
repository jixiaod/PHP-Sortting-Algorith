#include <stdio.h>

void bubble_sort (int arr[], int n)
{
    int i, j , t;

    for (i = 0; i < n-1; i++) {
        for (j = 0; j < n-i-1; j++) {
            if (arr[j+1] < arr[j]) {
                t = arr[j+1];
                arr[j+1] = arr[j];
                arr[j] = t;
            }
        }
    }

}

void print (int arr[], int n)
{
    int i = 0;

    for (;i < n; i++) {
        printf("%d ", arr[i]);
    }

    printf("\n");
}

int main(void)
{
    int arr[] = {5, 9, 7, 6, 8, 13, 4, 10};
    print(arr, 8);
    
    bubble_sort(arr, 8);
    
    print(arr, 8);
    return 0;
}

