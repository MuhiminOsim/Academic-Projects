#include <stdio.h>
#include <stdlib.h>
#include "hall.h"
#include "structure.h"
struct stdata data[1000];
void insert(int b,int c)
{
    system("cls");
    printf("\n\n\t\t\t\t\t~~~~\"STUDENT DATA INSERTION\"~~~~\n");
    printf("\t\t\t\t\t________________________________\n");
    static int i=0;
    int cost;
    FILE *fp;
    fp=fopen("student data.txt","a+");
    char d;
    while(true){
        printf("\n\t\t\t\t\tEnter the name of the student:\n\t\t\t\t\t");
        getchar();
        gets(data[i].name);
        printf("\n\t\t\t\t\tEnter the Roll of the student:\n\t\t\t\t\t");
        scanf("%d",&data[i].roll);
        printf("\n\t\t\t\t\tEnter the room number of the student:\n\t\t\t\t\t");
        scanf("%d",&data[i].room);
        printf("\n\t\t\t\t\tEnter the department of the student:\n\t\t\t\t\t");
        getchar();
        gets(data[i].dept);
        printf("\n\t\t\t\t\tEnter the current year of the student:\n\t\t\t\t\t");
        scanf("%d",&data[i].year);
        printf("\n\t\t\t\t\tEnter the current term of the student:\n\t\t\t\t\t");
        scanf("%d",&data[i].term);
        printf("\n\t\t\t\t\tEnter the border no of the student:\n\t\t\t\t\t");
        scanf("%d",&data[i].border);
        printf("\n\t\t\t\t\tEnter the state of the meal:\n\t\t\t\t\t");
        getchar();
        gets(data[i].meal);
        printf("\n\t\t\t\t\tEnter the last hall due date(ex-14/06/2017):\n\t\t\t\t\t");
        scanf("%d/%d/%d",&data[i].lastd,&data[i].lastm,&data[i].lasty);
        cost=((c-data[i].lasty)*12*1300)+(b-data[i].lastm)*1300;
        data[i].halldue=cost;
        fprintf(fp,"%s\n%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",data[i].name,data[i].roll,data[i].room,data[i].dept,data[i].year,data[i].term,data[i].border,data[i].meal,data[i].lastd,data[i].lastm,data[i].lasty,data[i].halldue);
        printf("\n\t\t\t\t\tInsertion completed!");
        printf("\n\t\t\t\t\tInserted Data!");
        printf("\n\t\t\t\t\t%s's Profile\n",data[i].name);
        printf("\t\t\t\t\tRoll: %d\n",data[i].roll);
        printf("\t\t\t\t\tRoom No.: %d\n",data[i].room);
        printf("\t\t\t\t\tDepartment: %s\n",data[i].dept);
        printf("\t\t\t\t\tYear: %d\n",data[i].year);
        printf("\t\t\t\t\tTerm: %d\n",data[i].term);
        printf("\t\t\t\t\tBorder: %d\n",data[i].border);
        printf("\t\t\t\t\tMeal status: %s\n",data[i].meal);
        printf("\t\t\t\t\tLast hall due date: %d/%d/%d\n",data[i].lastd,data[i].lastm,data[i].lasty);
        printf("\t\t\t\t\tHall Due: %d\n",data[i].halldue);
        i++;
        printf("\n\t\t\t\tDo you want to insert another data?(Y/N): ");
        getchar();
        scanf("%c",&d);
        if(d=='N' || d=='n'){
            fclose(fp);
            menu();
        }
        else insert(b,c);
    }
}

