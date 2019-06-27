#include <bits/stdc++.h>
using namespace std;
#include "head.h"
#include <time.h>
ll cday, cmonth, cyear, task, chour, cminute;
void menu(){
    system("cls");
    time_t t = time(0);
    struct tm * now = localtime(&t);
    cyear= now->tm_year + 1900;
    cmonth=now->tm_mon + 1;
    cday=now->tm_mday;
    chour=now->tm_hour;
    cminute=now->tm_min;
    cout<<"\n\n";
    cout<<setw(53)<<"Today's Time: "<<cday<<"/"<<cmonth<<"/"<<cyear<<" "<<chour<<":"<<cminute<<endl<<endl;
    printf("\t\t\t\t\t  :::::::::::::::::::::");
    printf("\n\t\t\t\t\t  :     MAIN MENU     :\n");
    printf("\t\t\t\t\t  :::::::::::::::::::::\n");
    printf("\n\t\t\t\t\t  1.Go to a destination?\n");
    printf("\n\t\t\t\t\t  2.Admin Panel\n");
    printf("\n\t\t\t\t\t  3.See our service areas\n");
    printf("\n\t\t\t\t\t  4.Exit\n");
    printf("\n\t\t\t\t\tChoose what you want to do: ");
    scanf("%lld",&task);
    if(task<1 || task>4){
        while(task<1 || task>4){
            printf("\n\t\t\tPlease Enter A Valid Digit: ");
            scanf("%lld",&task);
        }
    }
    switching(chour, cminute, task);
}
