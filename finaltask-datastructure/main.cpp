#include "tubes.h"
#include <iostream>
#include <windows.h>
#include <conio.h>
using namespace std;

int main() {
    rumahMakan mainRM; createListRM(mainRM);
    addressRM addRM; infotypeRM dataRM;
    addressMenu addMenu; infotypeMenu dataMenu;

{   //---- Test Case Data ----//
    // TEST CASE INSERT RM //
    dataRM.idRM = "ID1";
    dataRM.namaRM = "RM Yuslan";
    dataRM.alamat = "Jalan Medan Utama";
    dataRM.tanggal = "02 September 2011";
    dataRM.pajak = 10;
    addRM = alokasiRM(dataRM);
    insertLastRM(mainRM, addRM);

    dataRM.idRM = "ID2";
    dataRM.namaRM = "RM Cinta Nusantara";
    dataRM.alamat = "Jalan Cinta Utama Dunia";
    dataRM.tanggal = "14 February 2014";
    dataRM.pajak = 10;
    addRM = alokasiRM(dataRM);
    insertLastRM(mainRM, addRM);

    dataRM.idRM = "ID3";
    dataRM.namaRM = "RM Gak Laku";
    dataRM.alamat = "Jalan Gak Jelas";
    dataRM.tanggal = "02 September 2099";
    dataRM.pajak = 10;
    addRM = alokasiRM(dataRM);
    insertLastRM(mainRM, addRM);


//     TEST CASE INSERT MENU //
    dataMenu.idMenu = "M1";
    dataMenu.namaMenu = "Nasi Goreng";
    dataMenu.hargaMenu = 5000;
    addRM = findElmRM(mainRM,"ID1");
    insertMenuFirst(addRM,dataMenu);

    dataMenu.idMenu = "M2";
    dataMenu.namaMenu = "Ramen Ichiraku";
    dataMenu.hargaMenu = 3000;
    addRM = findElmRM(mainRM,"ID2");
    insertMenuFirst(addRM,dataMenu);

    dataMenu.idMenu = "M3";
    dataMenu.namaMenu = "Indomie Rebus";
    dataMenu.hargaMenu = 3500;
    addRM = findElmRM(mainRM,"ID1");
    insertMenuFirst(addRM,dataMenu);

    dataMenu.idMenu = "M4";
    dataMenu.namaMenu = "Cheese Omelet Rice";
    dataMenu.hargaMenu = 10000;
    addRM = findElmRM(mainRM,"ID2");
    insertMenuFirst(addRM,dataMenu);

    dataMenu.idMenu = "M5";
    dataMenu.namaMenu = "Nasi Goreng ala Munzul";
    dataMenu.hargaMenu = 5000;
    addRM = findElmRM(mainRM,"ID1");
    insertMenuLast(addRM,dataMenu);
}

//     Menu Utama - Tugas Besar Patungan
    MenuLabel:
    system("cls");
    cout << "#### TUGAS BESAR ALGORITMA STRUKTUR DATA ####"<<endl
         << "       #### PATUNGAN - KELOMPOK 3 ####"<<endl
         <<endl
         << "MENU :   1. Insert Rumah Makan"<<endl
         << "         2. Insert Menu RM"<<endl
         << "         3. Edit Info Rumah Makan"<<endl // Berdasarkan ID
         << "         4. Edit Info Menu RM"<<endl // Berdasarkan ID MENU
         << "         5. Delete Rumah Makan"<<endl // Berdasarkan ID
         << "         6. Delete Menu RM"<<endl // Berdasarkan ID MENU
         << "         7. Print Info Rumah Makan"<<endl
         << "         8. Print RM & Menunya"<<endl
         << "         9. Search Rumah Makan"<<endl //Berdasarkan ID RM
         << "         10. Search Menu RM"<<endl //Berdasarkan Rumah Makan
         << "         11. Sort Rumah Makan by ID"<<endl
         << "         12. Sort Menu RM by ID"<<endl
         << "         13. Hitung Total RM / Menu"<<endl
         << "         666. EXIT"<<endl;
    cout << endl;
    cout << "Input Your Menu (NUM) : "; int menu;
    cin>>menu; cin.ignore();
    switch (menu) {
      case 1  :  system("cls"); addRumahMakan(mainRM);     getch(); goto MenuLabel;
      case 2  :  system("cls"); addMenuRM(mainRM);         getch(); goto MenuLabel;
      case 3  :  system("cls"); editInfoRM(mainRM);        getch(); goto MenuLabel;
      case 4  :  system("cls"); editHargaMenu(mainRM);     getch(); goto MenuLabel;
      case 5  :  system("cls"); deleteRMOption(mainRM);    getch(); goto MenuLabel;
      case 6  :  system("cls"); deleteMenuOption(mainRM);  getch(); goto MenuLabel;
      case 7  :  system("cls"); printInfoRM(mainRM);       getch(); goto MenuLabel;
      case 8  :  system("cls"); printInfoMenu(mainRM);     getch(); goto MenuLabel;
      case 9  :  system("cls"); searchRM(mainRM);          getch(); goto MenuLabel;
      case 10  :  system("cls"); searchMenu(mainRM);        getch(); goto MenuLabel;
      case 11  :  system("cls"); sortRumahMakan(mainRM);    getch(); goto MenuLabel;
      case 12  :  system("cls"); sortMenu(mainRM);          getch(); goto MenuLabel;
      case 13  :  system("cls"); countMenu(mainRM);          getch(); goto MenuLabel;
      case 666  :  goto ExitLabel; // Case Exit
      default : cin.ignore();  goto MenuLabel; // Case Handling Inputan Lain
    }
    ExitLabel: ;

    return 0;
}
