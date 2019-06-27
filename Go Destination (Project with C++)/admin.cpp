#include <bits/stdc++.h>
using namespace std;
#include "head.h"

void admin(ll a, ll b){
    string str1,str2;
    ll x;
    ifstream fin("password.txt");
    getline(fin, str1);
    fin.close();
    system("cls");
    cout<<"\n\n\n\n\t\t\t\t\t    Admin Panel\n\n";
    cout<<"\t\t\t\t\tpassword: ";
    cin>>str2;
    while(str2!=str1){
        system("cls");
        cout<<"\n\n\n\n\t\t\t\t\t    Admin Panel\n\n";
        cout<<"\t\t\t\t\tinvalid password!\n\t\t\t\t\t1.Try Again 2.Back to Menu\n\t\t\t\t\t";
        cin>>x;
        if(x==1){
            cout<<"\t\t\t\t\tpassword: ";
            cin.ignore(numeric_limits<streamsize>::max(),'\n');
            getline(cin,str2);
        }
        else menu();
    }
    cout<<"\t\t\t\t\tChoose what do you want?\n\t\t\t\t\t1.Reset Password\n\t\t\t\t\t2.Add Vehicle\n\t\t\t\t\t3.Add Location\n\t\t\t\t\t4.Menu\n\t\t\t\t\t5.Exit\n\t\t\t\t\t";
    cin>>x;
    if(x==1){
        system("cls");
        cout<<"\n\n\n\n\t\t\t\t\t    Admin Panel\n\n";
        cout<<"\t\t\t\t\tNew Password: ";
        cin>>str2;
        ofstream fout("temp.txt");
        fout<<str2;
        fout.close();
        remove("password.txt");
        rename("temp.txt","password.txt");
        cout<<"\t\t\t\t\tPassword Reset Successfully! Press Any key to Exit";
        getchar();
        getchar();
        menu();
    }
    else if(x==2){
        system("cls");
        cout<<"\n\n\n\n\t\t\t\t\t    Admin Panel\n\n";
        string owner, location,s1,s2,s3,str;
        ll tmp,sh,sm,dh,dm;
        double rat;
        bool curr;
        ofstream fout("temp.txt");
        ifstream fin("car.txt");
        getline(fin,str);
        while(str!=""){
            stringstream sin(str);
            sin>>s1>>s2>>s3>>tmp>>rat>>curr>>sh>>sm>>dh>>dm;
            fout<<s1<<" "<<s2<<" "<<s3<<" "<<tmp<<" "<<rat<<" "<<curr<<" "<<sh<<" "<<sm<<" "<<dh<<" "<<dm<<endl;
            getline(fin,str);
        }
        fin.close();
        cout<<"\t\t\t\t\tOwner's Name: ";
        cin>>owner;
        cout<<"\t\t\t\t\tCar's Current Location: ";
        cin>>location;
        fout<<owner<<" "<<"."<<" "<<location<<" "<<0<<" "<<0.0<<" "<<0<<" "<<0<<" "<<0<<" "<<0<<" "<<0<<endl;
        fout.close();
        remove("car.txt");
        rename("temp.txt","car.txt");
        cout<<"\t\t\t\t\tCar Added Successfully! Press Any key to Exit";
        getchar();
        getchar();
        menu();
    }
    else if(x==3){
        system("cls");
        cout<<"\n\n\n\n\t\t\t\t\t    Admin Panel\n\n";
        ofstream fout("temp.txt");
        string loc,s,str;
        double x,y,xx,yy;
        ifstream fin("location.txt");
        getline(fin,str);
        while(str!=""){
            stringstream sin(str);
            sin>>s>>xx>>yy;
            fout<<s<<" "<<xx<<" "<<yy<<endl;
            getline(fin,str);
        }
        fin.close();
        cout<<"\t\t\t\t\tName of Location: ";
        cin>>loc;
        cout<<"\t\t\t\t\tCo-ordinate of the Location: ";
        cin>>x>>y;
        fout<<loc<<" "<<x<<" "<<y<<endl;
        fout.close();
        remove("location.txt");
        rename("temp.txt","location.txt");
        cout<<"\t\t\t\t\tLocation Added Successfully! Press Any key to Exit";
        getchar();
        getchar();
        menu();
    }
    else if(x==4) menu();
    else menu();
}


