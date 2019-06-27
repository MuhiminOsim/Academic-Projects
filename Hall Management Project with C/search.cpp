#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include "hall.h"

void searching(int b, int c){
    system("cls");
    printf("\n\n\t\t\t\t\t~~~~STUDENT DATA SEARCHING~~~~\n");
    printf("\t\t\t\t\t______________________________\n");
    int x,y;
    printf("\n\n\t\t\t\t\tSearch Roll Numbers: ");
    scanf("%d",&x);
    if(x<1000000 || x>9999999){
        while(x<1000000 || x>9999999){
            printf("\n\t\t\t\tPlease Enter A 6 Digits Valid Roll: ");
            scanf("%d",&x);
        }
    }
    int room,roll,border,year,term,lastd,lastm,lasty,temp,halldue;
    char *name, *dept, *meal;
    name=(char *)malloc(30*sizeof(char));
    dept=(char *)malloc(10*sizeof(char));
    meal=(char *)malloc(3*sizeof(char));
    FILE *srch;
    srch=fopen("student data.txt","r");
    temp=0;
    while(!feof(srch)){
        fgets(name,30,srch);
        fscanf(srch,"%d %d %s %d %d %d %s %d %d %d %d",&roll,&room,dept,&year,&term,&border,meal,&lastd,&lastm,&lasty,&halldue);
        if(roll==x){
            y=strlen(name);
            name[y-1]='\0';
            printf("\n\t\t\t\t\t%s's Profile\n",name);
            printf("\t\t\t\t\tRoll: %d\n",roll);
            printf("\t\t\t\t\tRoom No.: %d\n",room);
            printf("\t\t\t\t\tDepartment: %s\n",dept);
            printf("\t\t\t\t\tYear: %d\n",year);
            printf("\t\t\t\t\tTerm: %d\n",term);
            printf("\t\t\t\t\tBorder: %d\n",border);
            printf("\t\t\t\t\tMeal status: %s\n",meal);
            printf("\t\t\t\t\tLast hall due date: %d/%d/%d\n",lastd,lastm,lasty);
            printf("\t\t\t\t\tHall Due: %d\n",halldue);
            temp=1;
            break;
        }
    }
    if(temp==0){
        printf("\n\t\t\t\t\tNOT FOUND!\n");
    }
    fclose(srch);
    printf("\t\t\t\t\tChoose: 1.Search Again\n\t\t\t\t\t\t2.Update Data\n\t\t\t\t\t\t3.Exit\n\t\t\t\t\t\t4.Menu\n\t\t\t\t\t\t");
    scanf("%d",&y);
    if(y<1 || y>4){
        while(y<1 || y>4){
            printf("\n\t\t\t\t\tPlease Enter A Valid Digit: ");
            scanf("%d",&y);
        }
    }
    if(y==1) searching(b,c);
    else if(y==2) update(b,c);
    else if(y==3) exit(0);
    else menu();
}
