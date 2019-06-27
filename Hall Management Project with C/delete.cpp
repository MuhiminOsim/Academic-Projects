#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include "hall.h"

void fdelete(int b, int c){
    system("cls");
    printf("\n\n\t\t\t\t\t~~~~\"STUDENT DATA DELETING\"~~~~\n");
    printf("\t\t\t\t\t_______________________________\n");
    FILE *fp;
    FILE *temp;
    int x,y;
    int room,roll,border,year,term,lastd,lastm,lasty,halldue;
    char name[30],dept[10],meal[3],H[30];
    char ch;
    printf("\n\t\t\tEnter the roll number whose data will be removed: ");
    scanf("%d",&x);
    fp=fopen("student data.txt","r");
    temp=fopen("temp.txt","a");
    int temp1=0;
    while(!feof(fp)){
        fgets(name,200,fp);
        fscanf(fp,"%d",&roll);
        fscanf(fp,"%d",&room);
        fscanf(fp,"%s", dept);
        fscanf(fp,"%d", &year);
        fscanf(fp,"%d", &term);
        fscanf(fp,"%d", &border);
        fscanf(fp,"%s", meal);
        fscanf(fp,"%d", &lastd);
        fscanf(fp,"%d", &lastm);
        fscanf(fp,"%d", &lasty);
        fscanf(fp,"%d", &halldue);
        fgets(H,200,fp);
        if(roll==x && temp1==0){
            temp1=1;
            printf("\n\t\t\t\tAre you sure to delete?(Y/N): ");
            getchar();
            scanf("%c",&ch);
            if(ch=='y' || ch=='Y'){
                printf("\n\t\t\t\tData was removed!\n");
                printf("\t\t\t\t\tDeleted Profile\n");
                printf("\t\t\t\t\tName: %s\n",name);
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
            else printf("\t\t\t\t\tData Remains Unchanged!");
        }
        else if(roll!=x){
            fprintf(temp,"%s%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
        }
    }
    fclose(fp);
    fclose(temp);
    remove("student data.txt");
    rename("temp.txt","student data.txt");
    printf("\n\t\t\t\t\tChoose: 1.menu\n\t\t\t\t\t2.search\n\t\t\t\t\t3.insert\n\t\t\t\t\t4.update\n\t\t\t\t\t");
    scanf("%d",&x);
    if(x<1 || x>4){
        while(x<1 || x>4){
            printf("\n\t\t\t\t\tPlease Enter A Valid Digit: ");
            scanf("%d",&x);
        }
    }
    if(x==1) menu();
    else if(x==2) searching(b,c);
    else if(x==3) insert(b,c);
    else update(b,c);
}
