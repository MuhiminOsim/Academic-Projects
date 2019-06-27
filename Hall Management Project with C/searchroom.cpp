#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include "hall.h"

void searchroom(int b, int c){
    system("cls");
    printf("\n\n\t\t\t\t ~~~~STUDENT DATA SEARCHING BY ROOM NO.~~~~\n");
    printf("\t\t\t\t____________________________________________\n");
    int *sroom;
    sroom=(int *)malloc(sizeof(int));
    int y;
    printf("\n\n\t\t\t\t\tSearch By Room No.: ");
    scanf("%d",&sroom);
    if((int)sroom<101 && (int)sroom>325){
        while((int)sroom<101 && (int)sroom>325){
            printf("\n\t\t\t\tPlease Enter A 3 Digits Valid Room No.: ");
            scanf("%d",sroom);
        }
    }
    int room,roll,border,year,term,lastd,lastm,lasty,halldue,temp,roll2;
    char name[30],dept[10],meal[3];
    printf("\n\t\t\t\t\tStudent Data for Room No.:%d\n",sroom);
    temp=0,roll2=0;
    FILE *srch;
    srch=fopen("student data.txt","r");
    while(!feof(srch)){
        fgets(name,30,srch);
        fscanf(srch,"%d %d %s %d %d %d %s %d %d %d %d",&roll,&room,dept,&year,&term,&border,meal,&lastd,&lastm,&lasty,&halldue);
        int count=1;
        if(room==(int)sroom) count=0;
        if(count==0 && roll2!=roll){
            roll2=roll;
            y=strlen(name);
            name[y-1]='\0';
            printf("\n\t\t\t\t\t%d",++temp);
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
        }
    }
    if(temp==0){
        printf("\n\t\t\t\tSTUDENT DATA NOT FOUND OR INVALID ROOM NO.!\n\n");
    }
    fclose(srch);
    printf("\t\t\t\t\tChoose: 1.Search Again\n\t\t\t\t\t\t2.Exit\n\t\t\t\t\t\t3.Menu\n\t\t\t\t\t\t");
    scanf("%d",&y);
    if(y<1 || y>3){
        while(y<1 || y>3){
            printf("\n\t\t\t\t\tPlease Enter A Valid Digit: ");
            scanf("%d",&y);
        }
    }
    if(y==1) searchroom(b,c);
    else if(y==2) exit(0);
    else menu();
}
