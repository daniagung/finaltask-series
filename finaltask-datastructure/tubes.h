#ifndef tubes_H
#define tubes_H
#include <iostream>

// Define Pointer
#define info(P) P->info
#define next(P) P->next
#define prev(P) P->prev
#define first(R) (R).first
#define last(R) (R).last

using namespace std;

// ---- Deklarasi Pointer addressRM --- //
typedef int *addressAnggota;
typedef struct elmRM *addressRM;
typedef struct elmMenu *addressMenu;

// ----- Deklarasi Tipe Bentukan Infotype ----- //
struct infotypeRM
{
    string idRM;
    string namaRM;
    string alamat;
    string tanggal; //Fix String
    float pajak;
};

struct infotypeMenu {
    string idMenu;
    string namaMenu;
    float hargaMenu;
    addressAnggota anggota;
};

// ------ Tipe Bentukan Element List ------ //
struct elmRM
{
    infotypeRM info;
    addressMenu daftarMenu;
    addressRM next;
    addressRM prev;
};

struct elmMenu {
    infotypeMenu info;
    addressMenu next;
    addressAnggota daftarAnggota;
};

// ------ Tipe Bentukan List ----- //
struct rumahMakan
{
    addressRM first;
    addressRM last;
};

struct Menu {
    addressMenu first;
};

//----------------- Fungsi dan Prosedur Default ----------------//
void createListRM(rumahMakan &R);
void createRM(infotypeRM &RM);
void createMenu(infotypeMenu &menuRM);
addressRM alokasiRM(infotypeRM RM);
addressMenu alokasiMenu(infotypeMenu menuRM);

addressRM findElmRM(rumahMakan R, string idRM);
addressMenu findElmMenu(addressRM PRM, string idMenu);
void printInfoRM(rumahMakan RM);
void printInfoMenu(rumahMakan RM);
void editInfoRM(rumahMakan &RM);
void editHargaMenu(rumahMakan &RM);
void searchRM(rumahMakan RM);
void searchMenu(rumahMakan RM);

void insertMenuFirst(addressRM PRM, infotypeMenu addMenu);
void insertMenuLast(addressRM PRM, infotypeMenu addMenu);
void insertMenuAfter(addressRM PRM, infotypeMenu addMenu);
void addMenuRM(rumahMakan &RM);

addressRM deleteFirstRM(rumahMakan &RM);
void deleteLastRM(rumahMakan &RM);
void deleteAfterRM(rumahMakan &RM);
void deleteRMbyID(rumahMakan &RM);
void deleteRMOption(rumahMakan &RM);

void deleteMenuFirst(rumahMakan &RM);
void deleteMenuAfter(rumahMakan &RM);
void deleteMenuLast(rumahMakan &RM);
void deleteMenuByID(rumahMakan &RM);
void deleteMenuOption(rumahMakan &RM);

void insertFirstRM(rumahMakan &R, addressRM P);
void insertLastRM(rumahMakan &R, addressRM P);
void insertAfterRM(rumahMakan &R, addressRM P);
void addRumahMakan(rumahMakan &R);

void countTotalRM(rumahMakan RM);
void countTotalMenu(rumahMakan RM);
void countMenu(rumahMakan RM);

int countLengthRM(rumahMakan RM);
rumahMakan mergeInRM(rumahMakan left, rumahMakan right);
rumahMakan mergeSortRM(rumahMakan RM);
void sortRumahMakan(rumahMakan &RM);

int countLengthMenu(addressMenu PRM);
addressMenu deleteMenuFirstMergeSort(addressMenu &M);
void insertMenuFirstMergeSort(addressMenu &PRM, addressMenu M);
void insertMenuLastMergeSort(addressMenu &PRM, addressMenu P);
addressMenu mergeInMenu(addressMenu left, addressMenu right);
addressMenu mergeSortMenu(addressMenu PRM);
void sortMenu(rumahMakan &RM);

#endif // tubes_H
