#include <stdio.h>
#include <stdlib.h>
#include "hall.h"

void switching(int b,int c,int x){
    int y;
    switch(x){
        case 1: insert(b,c);
        break;
        case 2: searching(b,c);
        break;
        case 3: update(b,c);
        break;
        case 4: fdelete(b,c);
        break;
        case 5: searchdept(b,c);
        break;
        case 6: searchbatch(b,c);
        break;
        case 7: searchroom(b,c);
        break;
        case 8: searchname(b,c);
        break;
        case 9: exit(0);
    }
}


