#include <bits/stdc++.h>
#include "head.h"

void switching(ll b, ll c, ll x){
    switch(x){
        case 1: getAcar(b,c,0);
                menu();
        break;
        case 2: admin(b,c);
                menu();
        break;
        case 3: getAcar(b,c,1);
                menu();
        break;
        case 4: exit(0);
    }
    menu();
}



