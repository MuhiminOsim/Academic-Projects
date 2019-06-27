#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include "hall.h"

void screenheader(){
    system("COLOR 3F");
    char x;
    printf("\n\n\n");
    printf("\t\t                    KHULNA UNIVERSITY OF ENGINEERING & TECHNOLOGY\n");
    printf("\n\t\t                       :::::::::::::::::::::::::::::::::::::::");
    printf("\n\t\t                       ::                                   ::");
    printf("\n\t\t                       ::      @@@@@@@@@@@@@@@@@@@@@@@      ::");
    printf("\n\t\t                       ::      @                     @      ::");
    printf("\n\t\t                       ::      @      WELCOME TO     @      ::");
    printf("\n\t\t                       ::      @                     @      ::");
    printf("\n\t\t                       ::      @   LALON SHAH HALL!  @      ::");
    printf("\n\t\t                       ::      @                     @      ::");
    printf("\n\t\t                       ::      @@@@@@@@@@@@@@@@@@@@@@@      ::");
    printf("\n\t\t                       ::                                   ::");
    printf("\n\t\t                       ::     \"STUDENT HALL MANAGEMENT\"     ::");
    printf("\n\t\t                       ::                                   ::");
    printf("\n\t\t                       :::::::::::::::::::::::::::::::::::::::\n\n");
    printf("\t\t\t\t\tpress Enter to continue...");
    scanf("%c",&x);
    //printf("%c",x);
    menu();
}
