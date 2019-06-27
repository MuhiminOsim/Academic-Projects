#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <time.h>
#include "hall.h"
int cday;
int cmonth;
int cyear;
int task;
void menu(){
    system("cls");
    time_t t = time(0); // get time now
    struct tm * now = localtime( & t );
    cyear= now->tm_year + 1900;
    cmonth=now->tm_mon + 1;
    cday=now->tm_mday;
    printf("\n\n\t\t\t\t\t  Today's Date: %d/%d/%d\n",cday,cmonth,cyear);
    printf("\t\t\t\t\t  :::::::::::::::::::::");
    printf("\n\t\t\t\t\t  :     MAIN MENU     :\n");
    printf("\t\t\t\t\t  :::::::::::::::::::::\n");
    printf("\n\t\t\t\t\t  1.INSERT Student Data\n");
    printf("\n\t\t\t\t\t  2.SEARCH Student Data\n");
    printf("\n\t\t\t\t\t  3.UPDATE Student Data\n");
    printf("\n\t\t\t\t\t  4.DELETE Student Data\n");
    printf("\n\t\t\t\t\t  5.SORTING Student Data BY DEPT.\n");
    printf("\n\t\t\t\t\t  6.SORTING Student Data BY BATCH\n");
    printf("\n\t\t\t\t\t  7.SORTING Student Data BY ROOM NO.\n");
    printf("\n\t\t\t\t\t  8.SORTING Student Data BY NAME\n");
    printf("\n\t\t\t\t\t  9.Exit\n");
    printf("\n\t\t\t\t\tChoose what you want to do: ");
    scanf("%d",&task);
    if(task<1 || task>9){
        while(task<1 || task>9){
            printf("\n\t\t\tPlease Enter A Valid Digit: ");
            scanf("%d",&task);
        }
    }
    switching(cmonth,cyear,task);
}
