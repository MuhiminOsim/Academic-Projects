#include <bits/stdc++.h>
#include "head.h"

template <typename V, typename W>
double getDistance(V x1, V y1, W x2, W y2)
{
   double ret=sqrt((x1-x2)*(x1-x2)+(y1-y2)*(y1-y2));
   return ret;
}
