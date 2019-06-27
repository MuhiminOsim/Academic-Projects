#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include "hall.h"

void update(int b,int c){
    system("cls");
    printf("\n\n\t\t\t\t\t~~~~\"STUDENT DATA UPDATING\"~~~~\n");
    printf("\t\t\t\t\t_______________________________\n");
    FILE *fp,*temp;
    int x,y;
    int room,roll,border,year,term,lastd,lastm,lasty,halldue;
    char name[200],dept[10],meal[3], H[200];
    printf("\n\t\t\t\tEnter the roll number whose data will be modified:\n\t\t\t\t\t");
    scanf("%d",&x);
    printf("\n\t\t\t\t\tPress 1 to Edit Name\n");
    printf("\n\t\t\t\t\tPress 2 to Edit Roll\n");
    printf("\n\t\t\t\t\tPress 3 to Edit Room\n");
    printf("\n\t\t\t\t\tPress 4 to Edit Department\n");
    printf("\n\t\t\t\t\tPress 5 to Edit Meal\n");
    printf("\n\t\t\t\t\tPress 6 to Edit Year\n");
    printf("\n\t\t\t\t\tPress 7 to Edit Term\n\t\t\t\t\t");
    scanf("%d",&y);
    switch(y)
    {
        case 1:
        {
            fp=fopen("student data.txt","r");
            temp=fopen("temp.txt","a+");
            char uname[30];
            int temp1=0;
            while(!feof(fp))
            {
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
                if(roll==x && temp1==0)
                {
                    temp1=1;
                    printf("\n\t\t\t\t\tOld Name: ");
                    puts(name);
                    printf("\n\t\t\t\t\tEnter the corrected name:\n\t\t\t\t\t");
                    getchar();
                    gets(uname);
                    uname[strlen(uname)]='\0';
                    fprintf(temp,"%s\n%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",uname,roll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                    printf("\n\t\t\t\t\tData corrected succesfully!\n");
                    printf("\t\t\t\t\tUpdated Profile\n");
                    printf("\t\t\t\t\tName: %s\n",uname);
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
                else if(roll!=x)
                {
                    fprintf(temp,"%s%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                }
            }
            fclose(fp);
            fclose(temp);
            remove("student data.txt");
            rename("temp.txt","student data.txt");
            break;
        }
        case 2:
        {
            fp=fopen("student data.txt","r");
            temp=fopen("temp.txt","a+");
            int uroll;
            int temp1=0;
            while(!feof(fp))
            {
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
                if(roll==x && temp1==0)
                {
                    temp1=1;
                    printf("\n\t\t\t\t\tOld Roll: %d",roll);
                    printf("\n\t\t\t\t\tEnter the corrected roll:\n\t\t\t\t\t");
                    scanf("%d",&uroll);
                    fprintf(temp,"%s\n%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,uroll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                    printf("\n\t\t\t\t\tData corrected succesfully!\n");
                    printf("\t\t\t\t\tUpdated Profile\n");
                    printf("\t\t\t\t\tName: %s\n",name);
                    printf("\t\t\t\t\tRoll: %d\n",uroll);
                    printf("\t\t\t\t\tRoom No.: %d\n",room);
                    printf("\t\t\t\t\tDepartment: %s\n",dept);
                    printf("\t\t\t\t\tYear: %d\n",year);
                    printf("\t\t\t\t\tTerm: %d\n",term);
                    printf("\t\t\t\t\tBorder: %d\n",border);
                    printf("\t\t\t\t\tMeal status: %s\n",meal);
                    printf("\t\t\t\t\tLast hall due date: %d/%d/%d\n",lastd,lastm,lasty);
                    printf("\t\t\t\t\tHall Due: %d\n",halldue);
                }
                if(roll!=x)
                {
                    fprintf(temp,"%s%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                }
            }
            fclose(fp);
            fclose(temp);
            remove("student data.txt");
            rename("temp.txt","student data.txt");
            break;
        }
        case 3:
        {
            fp=fopen("student data.txt","r");
            temp=fopen("temp.txt","a+");
            int uroom;
            int temp1=0;
            while(!feof(fp))
            {
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
                if(roll==x && temp1==0)
                {
                    temp1=1;
                    printf("\n\t\t\t\t\tOld Room No.: %d",room);
                    printf("\n\t\t\t\t\tEnter the corrected room no.:\n\t\t\t\t\t");
                    scanf("%d",&uroom);
                    fprintf(temp,"%s\n%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,uroom,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                    printf("\n\t\t\t\t\tData corrected succesfully!\n");
                    printf("\t\t\t\t\tUpdated Profile\n");
                    printf("\t\t\t\t\tName: %s\n",name);
                    printf("\t\t\t\t\tRoll: %d\n",roll);
                    printf("\t\t\t\t\tRoom No.: %d\n",uroom);
                    printf("\t\t\t\t\tDepartment: %s\n",dept);
                    printf("\t\t\t\t\tYear: %d\n",year);
                    printf("\t\t\t\t\tTerm: %d\n",term);
                    printf("\t\t\t\t\tBorder: %d\n",border);
                    printf("\t\t\t\t\tMeal status: %s\n",meal);
                    printf("\t\t\t\t\tLast hall due date: %d/%d/%d\n",lastd,lastm,lasty);
                    printf("\t\t\t\t\tHall Due: %d\n",halldue);
                }
                if(roll!=x)
                {
                    fprintf(temp,"%s%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                }
            }
            fclose(fp);
            fclose(temp);
            remove("student data.txt");
            rename("temp.txt","student data.txt");
            break;
        }
        case 4:
        {
            fp=fopen("student data.txt","r");
            temp=fopen("temp.txt","a+");
            char udept[10];
            int temp1=0;
            while(!feof(fp))
            {
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
                if(roll==x && temp1==0)
                {
                    temp1=1;
                    printf("\n\t\t\t\t\tOld Department: ");
                    puts(dept);
                    printf("\n\t\t\t\t\tEnter the corrected department:\n\t\t\t\t\t");
                    getchar();
                    gets(udept);
                    udept[strlen(udept)]='\0';
                    fprintf(temp,"%s\n%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,udept,year,term,border,meal,lastd,lastm,lasty,halldue);
                    printf("\n\t\t\t\t\tData corrected succesfully!\n");
                    printf("\t\t\t\t\tUpdated Profile\n");
                    printf("\t\t\t\t\tName: %s\n",name);
                    printf("\t\t\t\t\tRoll: %d\n",roll);
                    printf("\t\t\t\t\tRoom No.: %d\n",room);
                    printf("\t\t\t\t\tDepartment: %s\n",udept);
                    printf("\t\t\t\t\tYear: %d\n",year);
                    printf("\t\t\t\t\tTerm: %d\n",term);
                    printf("\t\t\t\t\tBorder: %d\n",border);
                    printf("\t\t\t\t\tMeal status: %s\n",meal);
                    printf("\t\t\t\t\tLast hall due date: %d/%d/%d\n",lastd,lastm,lasty);
                    printf("\t\t\t\t\tHall Due: %d\n",halldue);
                }
                if(roll!=x)
                {
                    fprintf(temp,"%s%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                }
            }
            fclose(fp);
            fclose(temp);
            remove("student data.txt");
            rename("temp.txt","student data.txt");
            break;
        }
        case 5:
        {
            fp=fopen("student data.txt","r");
            temp=fopen("temp.txt","a+");
            char umeal[3];
            int temp1=0;
            while(!feof(fp))
            {
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
                if(roll==x && temp1==0)
                {
                    temp1=1;
                    printf("\n\t\t\t\t\tCurrent Meal Status: ");
                    puts(meal);
                    printf("\n\t\t\t\t\tEnter the new meal status:\n\t\t\t\t\t");
                    getchar();
                    gets(umeal);
                    meal[strlen(meal)]='\0';
                    fprintf(temp,"%s\n%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,term,border,umeal,lastd,lastm,lasty,halldue);
                    printf("\n\t\t\t\t\tData corrected succesfully!\n");
                    printf("\t\t\t\t\tUpdated Profile\n");
                    printf("\t\t\t\t\tName: %s\n",name);
                    printf("\t\t\t\t\tRoll: %d\n",roll);
                    printf("\t\t\t\t\tRoom No.: %d\n",room);
                    printf("\t\t\t\t\tDepartment: %s\n",dept);
                    printf("\t\t\t\t\tYear: %d\n",year);
                    printf("\t\t\t\t\tTerm: %d\n",term);
                    printf("\t\t\t\t\tBorder: %d\n",border);
                    printf("\t\t\t\t\tMeal status: %s\n",umeal);
                    printf("\t\t\t\t\tLast hall due date: %d/%d/%d\n",lastd,lastm,lasty);
                    printf("\t\t\t\t\tHall Due: %d\n",halldue);
                }
                if(roll!=x)
                {
                    fprintf(temp,"%s%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                }
            }
            fclose(fp);
            fclose(temp);
            remove("student data.txt");
            rename("temp.txt","student data.txt");
            break;
        }
        case 6:
        {
            fp=fopen("student data.txt","r");
            temp=fopen("temp.txt","a+");
            int uyear;
            int temp1=0;
            while(!feof(fp))
            {
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
                if(roll==x && temp1==0)
                {
                    temp1=1;
                    printf("\n\t\t\t\t\tOld Year: %d",year);
                    printf("\n\t\t\t\t\tEnter the updated year:\n\t\t\t\t\t");
                    scanf("%d",&uyear);
                    fprintf(temp,"%s\n%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,uyear,term,border,meal,lastd,lastm,lasty,halldue);
                    printf("\n\t\t\t\t\tData corrected succesfully!\n");
                    printf("\t\t\t\t\tUpdated Profile\n");
                    printf("\t\t\t\t\tName: %s\n",name);
                    printf("\t\t\t\t\tRoll: %d\n",roll);
                    printf("\t\t\t\t\tRoom No.: %d\n",room);
                    printf("\t\t\t\t\tDepartment: %s\n",dept);
                    printf("\t\t\t\t\tYear: %d\n",uyear);
                    printf("\t\t\t\t\tTerm: %d\n",term);
                    printf("\t\t\t\t\tBorder: %d\n",border);
                    printf("\t\t\t\t\tMeal status: %s\n",meal);
                    printf("\t\t\t\t\tLast hall due date: %d/%d/%d\n",lastd,lastm,lasty);
                    printf("\t\t\t\t\tHall Due: %d\n",halldue);
                }
                if(roll!=x)
                {
                    fprintf(temp,"%s%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                }
            }
            fclose(fp);
            fclose(temp);
            remove("student data.txt");
            rename("temp.txt","student data.txt");
            break;
        }
        case 7:
        {
            fp=fopen("student data.txt","r");
            temp=fopen("temp.txt","a+");
            int uterm;
            int temp1=0;
            while(!feof(fp))
            {
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
                if(roll==x && temp1==0)
                {
                    temp1=1;
                    printf("\n\t\t\t\t\tOld Term: %d",term);
                    printf("\n\t\t\t\t\tEnter the updated term:\n\t\t\t\t\t");
                    scanf("%d",&uterm);
                    fprintf(temp,"%s\n%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,uterm,border,meal,lastd,lastm,lasty,halldue);
                    printf("\n\t\t\t\t\tData corrected succesfully!\n");
                    printf("\t\t\t\t\tUpdated Profile\n");
                    printf("\t\t\t\t\tName: %s\n",name);
                    printf("\t\t\t\t\tRoll: %d\n",roll);
                    printf("\t\t\t\t\tRoom No.: %d\n",room);
                    printf("\t\t\t\t\tDepartment: %s\n",dept);
                    printf("\t\t\t\t\tYear: %d\n",year);
                    printf("\t\t\t\t\tTerm: %d\n",uterm);
                    printf("\t\t\t\t\tBorder: %d\n",border);
                    printf("\t\t\t\t\tMeal status: %s\n",meal);
                    printf("\t\t\t\t\tLast hall due date: %d/%d/%d\n",lastd,lastm,lasty);
                    printf("\t\t\t\t\tHall Due: %d\n",halldue);
                }
                if(roll!=x)
                {
                    fprintf(temp,"%s%d\n%d\n%s\n%d\n%d\n%d\n%s\n%d\n%d\n%d\n%d\n",name,roll,room,dept,year,term,border,meal,lastd,lastm,lasty,halldue);
                }
            }
            fclose(fp);
            fclose(temp);
            remove("student data.txt");
            rename("temp.txt","student data.txt");
            break;
        }
    }
    printf("\n\t\t\t\t\tChoose: 1.menu\n\t\t\t\t\t2.search\n\t\t\t\t\t3.insert\n\t\t\t\t\t4.delete\n\t\t\t\t\t");
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
    else fdelete(b,c);
}
