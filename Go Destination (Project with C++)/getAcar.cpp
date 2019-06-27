#include <bits/stdc++.h>
#define speed 30 /// km/h
#define charge 20 /// tk/km
using namespace std;
#include "head.h"

class Time{
protected:
    int *sh, *sm, *dh, *dm;
public:
    Time(){
        sh=new int, sm=new int, dh=new int, dm=new int;
        *sh=0,*sm=0,*dh=0,*dm=0;
    }
    Time(int ssh, int ssm, int ddh, int ddm){
        sh=new int, sm=new int, dh=new int, dm=new int;
        *sh=ssh,*sm=ssm,*dh=ddh,*dm=ddm;
    }
    ~Time(){}
    virtual bool isAvailable(ll x, ll y, string str){
        if(*sh==x && *sm<=y) return 0;
        else if(*dh==x && *dm>=y) return 0;
        else if(x>*sh && x<*dh) return 0;
        else return 1;
    }
};
template <typename T>
class Location{
public:
    string *name;
    T *x,*y;
    Location(){
        name = new string, x = new T, y = new T;
        *name=".", *x=0, *y=0;
    }
    Location(string str, T xx, T yy){
        name = new string, x = new T, y = new T;
        *name=str, *x=xx, *y=yy;
    }
    ~Location(){
        delete name, delete x, delete y;
    }
    void setMember(string str, T xx, T yy){
        *name=str, *x=xx, *y=yy;
    }
    double operator-(const Location<T>& a){
        double ret; ret = sqrt((*x-*a.x)*(*x-*a.x)+(*y-*a.y)*(*y-*a.y));
        return ret;
    }
    friend ostream &operator<<(ostream &out, const Location<double> &l);
};
ostream &operator<<(ostream &out, const Location<double> &l){
    out<<*l.name;
    return out;
}
class Car: private Time{
    string *owner, *dest, *loca;
    int *cnt;
    double *rating;
    bool *cur;
public:
    Car(){
        owner= new string, dest= new string, loca= new string, rating= new double, cur= new bool, cnt= new int;
        *owner=".", *dest=".", *loca=".", *rating=0.0, *cur=0, *cnt=0;
    }
    Car(string str, string str2, string str3, int tmp, double rat, bool curr, int ssh, int ssm, int ddh, int ddm): Time(ssh, ssm, ddh, ddm){
        owner= new string, dest= new string, loca= new string, rating= new double, cur= new bool, cnt= new int;
        *owner=str,*dest=str2, *loca=str3, *rating=rat, *cur=curr, *cnt=tmp;
    }
    ~Car(){}
    bool isAvailable(ll x, ll y, string str){
        if(*cur==0 && *loca==str) return 1;
        else if(*dest==str){
            if(*sh==x && *sm<=y) return 0;
            else if(*dh==x && *dm>=y) return 0;
            else if(x>*sh && x<*dh) return 0;
            else{
                *cur=0;
                return 1;
            }
        }
        else return 0;
    }
    void reset(ll a, ll b, ll c, ll d, string str){
        *sh=a,*sm=b,*dh=c,*dm=d, *dest=str, *loca=str, *cur=1;
    }
    string getName(){
        return *owner;
    }
    double getRating(){
        return *rating;
    }
    void resetRating(double rt){
        *rating= ((*rating*(*cnt))+rt)/(++*cnt);
    }
    void getData(){
        cout<<*owner<<" "<<*dest<<" "<<*loca<<" "<<*cnt<<" "<<*rating<<" "<<*cur<<" "<<*sh<<" "<<*sm<<" "<<*dh<<" "<<*dm<<endl;
    }
    void setFile(ofstream &output){
        output<<setprecision(4);
        output<<*owner<<" "<<*dest<<" "<<*loca<<" "<<*cnt<<" "<<*rating<<" "<<*cur<<" "<<*sh<<" "<<*sm<<" "<<*dh<<" "<<*dm<<endl;
    }
};
namespace starting{
    int h,m;
}
namespace reaching{
    int h,m;
}

void getAcar(ll a, ll b, bool c){
    system("cls");
    map <string,ll> mp;
    map <string, vector<ll> > mp1;
    string start,dest,str,s,s1,s2,s3;
    int x,cnt=0,cnt1=0,tmp;
    bool curr;
    double dist,xx,yy,rat;
    Location<double> loc[100];
    Car cars[500];
    ifstream fin("location.txt");
    getline(fin,str);
    while(str!=""){
        stringstream sin(str);
        sin>>s>>xx>>yy;
        loc[++cnt].setMember(s,xx,yy);
        mp[s]=cnt;
        getline(fin,str);
    }
    fin.close();
    if(c==1){
        cout<<"\n\n\n\n\n\n";
        cout<<"\t\t\t\t\tOur Current Service Area:\n";
        for(int i=1;i<=cnt;i++){
            cout<<"\t\t\t\t\t"<<i<<". ";
            cout<<loc[i]<<endl;
        }
        cout<<"\t\t\t\t\tpress any key to continue...";
        getchar();
        getchar();
        menu();
    }
    ifstream ffin("car.txt");
    getline(ffin,str);
    while(str!=""){
        stringstream sin(str);
        sin>>s1>>s2>>s3>>tmp>>rat>>curr>>starting::h>>starting::m>>reaching::h>>reaching::m;
        cars[++cnt1]= Car(s1,s2,s3,tmp,rat,curr,starting::h,starting::m,reaching::h,reaching::m);
        mp1[s3].push_back(cnt1),mp1[s2].push_back(cnt1);
        getline(ffin,str);
    }
    ffin.close();
    cout<<"\n\n\n\n\n\n";
    cout<<"\t\t\t\t\tWhere do you want to ride: ";
    cin>>start;
    while(!mp[start]){
        cout<<"\t\t\t\t\tThis location doesn't have our services!\n\t\t\t\t\t1. Try another location"<<endl<<"\t\t\t\t\t2. Menu"<<endl<<"\t\t\t\t\t3. Exit\n\t\t\t\t\t";
        cin>>x;
        if(x==1) cout<<"\t\t\t\t\tWhere do you want to ride: ", cin>>start;
        else if(x==2) menu();
        else exit(0);
    }
    cout<<"\t\t\t\t\tWhere is your destination: ";
    cin>>dest;
    while(!mp[dest]){
        cout<<"\t\t\t\t\tThis location doesn't have our services!\n\t\t\t\t\t1. Try another location"<<endl<<"\t\t\t\t\t2. Menu"<<endl<<"\t\t\t\t\t3. Exit\n\t\t\t\t\t";
        cin>>x;
        if(x==1) cout<<"\t\t\t\t\tWhere is your destination: ", cin>>dest;
        else if(x==2) menu();
        else exit(0);
    }
    if(mp1[start].size()>0){
        ll id=0;
        for(int i=0;i<mp1[start].size();i++){
            if(cars[mp1[start][i]].isAvailable(a,b,start) && i!=1){
                dist=loc[mp[start]]-loc[mp[dest]];
                ll h=(ll)dist/(ll)speed;
                ll m = ((dist/speed)-h)*60;
                cout<<setprecision(8);
                cout<<"\t\t\t\t\tCar Owner's Name: "<<cars[mp1[start][i]].getName()<<endl;
                cout<<"\t\t\t\t\tCar Owner's Rating: "<<cars[mp1[start][i]].getRating()<<" (out of 5.00)"<<endl;
                cout<<"\t\t\t\t\tDistance: "<<dist<<" km"<<endl;
                cout<<"\t\t\t\t\tApproximate Time Needed: "<<h<<" hours "<<((dist/speed)-h)*60<<" minutes"<<endl;
                cout<<"\t\t\t\t\tCharges: "<<dist*charge<<" BDT"<<endl;
                cout<<"\t\t\t\t\tAre you confirm to proceed?\n\t\t\t\t\t1. Yes\n\t\t\t\t\t2. No\n\t\t\t\t\t";
                cin>>x;
                if(x==1){
                    id=mp1[start][i];
                    mp1[dest].push_back(id);
                    cars[id].reset(a,b,(a+h+((b+m)/60))%24,(b+m)%60,dest);
                    mp1[start].erase(mp1[start].begin()+i);
                    break;
                }
            }
        }
        if(!id) cout<<"\t\t\t\t\tThere's no other vehicles available"<<endl;
        else{
            double rt;
            cout<<"\t\t\t\t\tRate this car out of 5: ";
            cin>>rt;
            cars[id].resetRating(rt);
        }
    }
    else cout<<"\t\t\t\t\tThere's no car in your area now!"<<endl;
    ofstream fout("temp.txt");
    for(int i=1;i<=cnt1;i++){
        cars[i].setFile(fout);
    }
    fout.close();
    remove("car.txt");
    rename("temp.txt","car.txt");
    cout<<"\t\t\t\t\tpress any key to continue...";
    getchar();
    getchar();
}
