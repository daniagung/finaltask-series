#include "tubes.h"
#include <iostream>
#include <conio.h>
#include <windows.h>
using namespace std;

//----------------- Fungsi dan Prosedur Default ----------------//

void createListRM(rumahMakan &R) {
    first(R)= NULL;
    last(R)= NULL;
}

void createRM(infotypeRM &RM) {
    cout<<"== Input Rumah Makan Baru =="<<endl;
    cout<<"Input ID RM        : "; getline(cin, RM.idRM);
    cout<<"Nama Rumah Makan   : "; getline(cin, RM.namaRM);
    cout<<"Alamat Rumah Makan : "; getline(cin, RM.alamat);
    cout<<"Tanggal Input      : "; getline(cin, RM.tanggal);
    cout<<"Pajak              : "; cin>>RM.pajak; cin.ignore();
    cout<<endl;
}

void createMenu(infotypeMenu &menuRM) {
    cout<<"== Input Menu Baru =="<<endl;
    cout<<"Input ID Menu : "; getline(cin, menuRM.idMenu);
    cout<<"Nama Menu     : "; getline(cin, menuRM.namaMenu);
    cout<<"Harga (NUM)   : "; cin>>menuRM.hargaMenu; cin.ignore();
    cout<<endl;
}

addressRM alokasiRM(infotypeRM RM) {
    addressRM P;
    P = new elmRM;
    info(P) = RM;
    next(P) = NULL;
    prev(P) = NULL;
    P->daftarMenu = NULL;
    return P;
}

addressMenu alokasiMenu(infotypeMenu menuRM) {
    addressMenu Q = new elmMenu;
    Q->info = menuRM;
    Q->next = NULL;
    Q->daftarAnggota = NULL;
    return Q;
}


// ----------------- OUR TEAM - NO 3 ---------------//

//----------------- Fikri Firdaus ----------------//

//----------------- Dede Kiswanto ----------------//

//------------------- WidyaIcha ------------------//

//-------------- M Yuslan Abu Bakar --------------//

//--------- Fungsi dan Prosedur Program -----------//

addressRM findElmRM(rumahMakan R, string idRM) { //WidyaIcha
    addressRM P;
    if(first(R) == NULL)
    {
        return NULL;
    }
    else
    {
        bool ketemu = false;
        P = first(R);
        while ((info(P).idRM != idRM) && (ketemu == false))
        {
            if (next(P) == NULL) {
                ketemu = true;
            }
            else {
                P = next(P);
            }
        }
        if (ketemu)
            return NULL;
        else
            return P;
    }
}

addressMenu findElmMenu(addressRM PRM, string idMenu){ //Yuslan
    addressMenu M;
    M = PRM->daftarMenu;
    if(M == NULL)
        return NULL;
    else {
        while(M != NULL) {
            if(M->info.idMenu == idMenu){
                return M;
            }
            M = M->next;
        }
        return M;
    }
}

void printInfoRM(rumahMakan RM){ //Fikri
    addressRM P;
    P = RM.first;
    if(RM.first == NULL)
        cout<<"Tidak Ada Rumah Makan Terdaftar"<<endl;
    else {
        cout<<"=========== List Available RM ==========="<<endl;
        int i = 1;
        while(P != NULL){
            cout<<"Data Rumah Makan ke-"<<i<<endl; i++;
            cout<<"ID RM            : "<<P->info.idRM<<endl;
            cout<<"Nama RM          : "<<P->info.namaRM<<endl;
            cout<<"Alamat RM        : "<<P->info.alamat<<endl;
            cout<<"Tgl Pendataan RM : "<<P->info.tanggal<<endl;
            cout<<"Pajak RM         : "<<P->info.pajak<<endl;
            cout<<endl;
            P = P->next;
        }
    }
}

void printInfoMenu(rumahMakan RM) { //Dede
    addressRM P;
    addressMenu Q;
    P = RM.first;
    if(RM.first == NULL)
        cout<<"Tidak Ada Rumah Makan Terdaftar"<<endl;
    else {
        cout<<"==== Data Rumah Makan beserta Menunya ===="<<endl;
        cout<<endl;
        int i = 1;
        while(P != NULL){
            cout<<"--- Data Rumah Makan ke-"<<i<< " ---"<<endl; i++;
            cout<<"ID Rumah Makan    : "<<P->info.idRM<<endl;
            cout<<"Nama Rumah Makan  : "<<P->info.namaRM<<endl;
            Q = P->daftarMenu;
            if(Q==NULL){
                cout<<"====== Menu Kosong ======"<<endl;
            }else{
                cout<<"====== List Menu ======"<<endl;
            }
            while(Q != NULL){
                cout<<"ID Menu    : "<<Q->info.idMenu<<endl;
                cout<<"Nama Menu  : "<<Q->info.namaMenu<<endl;
                cout<<"Harga Menu : "<<Q->info.hargaMenu<<endl;
                cout<<endl;
                Q = Q->next;
            }
//            cout<<Q<<endl;
            cout<<endl;
            P = P->next;
        }
    }
}

void editInfoRM(rumahMakan &RM){ //Fikri
    if(RM.first != NULL){ //Cek Rumah Makan Apakah Kosong atau Tidak
        printInfoRM(RM);
        string strSearchRM;
        cout << "Masukkan ID Rumah Makan yang mau di Edit : ";cin>>strSearchRM; cin.ignore();
        addressRM PRM = findElmRM(RM, strSearchRM); //Mencari Elemen Rumah Makan
        if(PRM == NULL){
            cout<<"ID RumahMakan Tidak Ditemukan"<<endl;
            cout<<endl;
        } else {
            cout<<"ID RM Ditemukan"<<endl;
            cout<<"Edit Nama RM : "; getline(cin, PRM->info.namaRM);
            cout<<"Edit Alamat RM : "; getline(cin, PRM->info.alamat);
            cout<<"Edit Successfull"<<endl;
            cout<<endl;
        }
    } else {
        cout<<"Tidak ada Rumah Makan yang bisa di edit (Kosong) "<<endl;
    }
}

void editHargaMenu(rumahMakan &RM) { //Dede
    if(RM.first == NULL)
        cout<<"Tidak ada Rumah Makan yang Terdata (Kosong)"<<endl;
    else {
        printInfoRM(RM);
        string strSearchID;
        string strSearchIDMenu;
        cout << "Masukkan ID Rumah Makan Yang Akan Diubah Harga Menunya : ";getline(cin, strSearchID);
        addressRM PRM = findElmRM(RM, strSearchID);
        if (PRM == NULL) {
            cout << "Tidak Ditemukan Rumah Makan";
        }
        else {
            addressMenu M = PRM->daftarMenu;
            cout << "List Menu RM - "<<PRM->info.namaRM<<endl;
            while (M != NULL){ // Looping Untuk Menampilkan Menu Rumah Makan
                cout<<"ID Menu    : "<<M->info.idMenu<<endl;
                cout<<"Nama Menu  : "<<M->info.namaMenu<<endl;
                cout<<"Harga Menu : "<<M->info.hargaMenu<<endl;
                cout<<endl;
                M = M->next;
            }
            cout << endl;
            cout << "Masukkan ID Menu Yang Harganya Akan Diubah : ";getline(cin, strSearchIDMenu);
            M = PRM->daftarMenu;
            while (M != NULL) {
                if (M->info.idMenu == strSearchIDMenu) {
                    break;
                }
                else {
                    M = M->next;
                }
            }
            if (M == NULL) {
                cout << "Tidak Ada Menu Yang Sesuai"<<endl;
            }
            else {
                cout << "Menu Ditemukan"<<endl;
                cout << "Nama Menu : "<<M->info.namaMenu<<endl;
                cout << "Masukkan Harga Baru : ";cin>>M->info.hargaMenu;
                cout << endl;
                cout << "Harga Berhasil Diubah"<<endl;
            }
        }
    }
}

void searchRM(rumahMakan RM) { //Fikri
    if(RM.first == NULL)
        cout<<"Tidak ada Data Rumah Makan"<<endl;
    else{
        string strSearch;
        cout<<"Masukan ID / Nama RM yang akan dicari : "; getline(cin, strSearch);
        addressRM P = RM.first;
        while(P!=NULL){
            if((P->info.idRM == strSearch) || (P->info.namaRM == strSearch))
                break;
            else
                P = P->next;
        }
        if(P==NULL){
            cout<<"Tidak ada Data yang Sesuai"<<endl;
            cout<<endl;
        }else{
            cout<<"Data Ditemukan"<<endl;
            cout<<"ID Rumah Makan      : "<<P->info.idRM<<endl;
            cout<<"Nama Rumah Makan    : "<<P->info.namaRM<<endl;
            cout<<"Alamat Rumah Makan  : "<<P->info.alamat<<endl;
            cout<<"Tanggal Rumah Makan : "<<P->info.tanggal<<endl;
            cout<<endl;
        }
    }
}

void searchMenu(rumahMakan RM){ //WidyaIcha
    if(RM.first == NULL)
        cout<<"Tidak ada Data Rumah Makan"<<endl;
    else{
        string strSearch;
        cout<<"Masukan ID / Nama Menu yang akan dicari : "; getline(cin, strSearch);
        addressRM P = RM.first;
        addressMenu Q;
        bool checkFound = false;
        while(P!=NULL){
            Q = P->daftarMenu;
            while(Q != NULL){
                if((Q->info.idMenu == strSearch) || (Q->info.namaMenu == strSearch)){
                    checkFound = true;
                    break;
                }
                Q = Q->next;
            }
            if(checkFound)
                break;
            P = P->next;
        }

        if(Q==NULL){
            cout<<"Tidak ada Data yang Sesuai"<<endl;
            cout<<endl;
        }else{
            cout<<"Data Ditemukan"<<endl;
            cout<<"ID Menu      : "<<Q->info.idMenu<<endl;
            cout<<"Nama Menu    : "<<Q->info.namaMenu<<endl;
            cout<<"Harga Menu   : "<<Q->info.hargaMenu<<endl;
            cout<<"Terdapat di Rumah Makan : "<<P->info.namaRM<<endl;
            cout<<endl;
        }
    }
}


// --------- INSERT MENU (CHILD) - KISWANTO D ----------- //

void insertMenuFirst(addressRM PRM, infotypeMenu addMenu) {
    if (PRM == NULL) {
        cout << "Tidak Ditemukan Rumah Makan";
    }
    else {
        addressMenu M = alokasiMenu(addMenu);
        if (PRM->daftarMenu == NULL) {
            PRM->daftarMenu = M;
        }
        else {
            M->next = PRM->daftarMenu;
            PRM->daftarMenu = M;
        }
    }
}

void insertMenuLast(addressRM PRM, infotypeMenu addMenu) {
    if (PRM == NULL) {
        cout << "Tidak Ditemukan Rumah Makan";
    }
    else {
        addressMenu P;
        P = PRM->daftarMenu;
        addressMenu M = alokasiMenu(addMenu);
        if(P == NULL){
            insertMenuFirst(PRM,addMenu);
        } else {
            while(P->next != NULL){
                P = P->next;
            }
            P->next = M;
        }
    }
}

void insertMenuAfter(addressRM PRM, infotypeMenu addMenu) {
    string strSearchIDMenu;
    addressMenu M = PRM->daftarMenu;
    if (M == NULL)
    {
        cout << "Karena tidak ada menu yang tersedia, maka langsung dimasukkan ke awal list"<<endl;
        insertMenuFirst(PRM,addMenu);
    }
    else
    {
        cout << "List Menu RM - "<<PRM->info.namaRM<<endl;
        while (M != NULL){ // Looping Untuk Menampilkan Menu Rumah Makan
            cout<<"ID Menu    : "<<M->info.idMenu<<endl;
            cout<<"Nama Menu  : "<<M->info.namaMenu<<endl;
            cout<<"Harga Menu : "<<M->info.hargaMenu<<endl;
            cout<<endl;
            M = M->next;
        }
        cout << endl;

        cout << "Masukan ID Menu yang ingin di Insert Sesudah-nya: ";getline(cin, strSearchIDMenu);
        M = findElmMenu(PRM, strSearchIDMenu);
        if(M == NULL){
            cout<<"Element Yang akan diInsert Sesudah-nya tidak tersedia"<<endl;
        } else {
            addressMenu adrMenuSisip;
            adrMenuSisip = alokasiMenu(addMenu);
            if(M->next == NULL){ //Jika elemen diujung
                insertMenuLast(PRM,addMenu);
            } else {
                adrMenuSisip->next = M->next;
                M->next = adrMenuSisip;
            }
        }
    }

}

void addMenuRM(rumahMakan &RM){
    if (RM.first == NULL)
    {
        cout << "Tidak ada rumah makan yang terdaftar"<<endl;
    }
    else
    {
        string strSearchRM;
        printInfoRM(RM);
        cout << "Masukkan ID Rumah Makan yang akan diTambah Menu-nya: ";
        cin>>strSearchRM; cin.ignore();
        addressRM PRM = findElmRM(RM, strSearchRM);
        if (PRM == NULL) {
            cout << "Tidak Ditemukan Rumah Makan";
        }
        else {
            infotypeMenu addMenu;
            createMenu(addMenu);
            char opt;
            cout<<endl;
            cout<<"Pilih Jenis Insert : "<<endl
                <<"1. Insert First"<<endl
                <<"2. Insert Last"<<endl
                <<"3. Insert After"<<endl;
            MenuLabel:
            cout<<"Option : "; cin>>opt; cin.ignore();
            switch (opt) {
              case '1' :  insertMenuFirst(PRM,addMenu); break;
              case '2' :  insertMenuLast(PRM,addMenu); break;
              case '3' :  insertMenuAfter(PRM,addMenu); break;
              default : cin.ignore(); goto MenuLabel;
            }
            cout << "Data Berhasil di Insert"<<endl;
        }
    }

}


//--------- Delete RM (Parent) - dari WidyaIcha --------//

addressRM deleteFirstRM(rumahMakan &RM) {
    addressRM P;
    if(first(RM) == NULL)
    {
        return NULL;
    }
    else
    {
        P = first(RM);
        if ((first(RM) != NULL)&&(next(first(RM))==NULL))
        {
            first(RM) = NULL;
            last(RM) = NULL;
            return P;
        }
        else
        {
            prev(next(P)) = NULL;
            first(RM) = next(P);
            next(P) = NULL;
            return P;
        }
    }
}

void deleteLastRM(rumahMakan &RM) {
    addressRM P;
    if(first(RM) == NULL)
    {
        cout<<"Data Rumah Makan Tidak Tersedia"<<endl;
    }
    else
    {
        P = last(RM);
        if(prev(P) == NULL)
        {
            first(RM) = NULL;
            last(RM) = NULL;
            delete P;
        }
        else
        {
            next(prev(P)) = NULL;
            last(RM) = prev(P);
            prev(P) = NULL;

        }
    }
}

void deleteAfterRM(rumahMakan &RM) {
    addressRM P;
    if (first(RM)==NULL)
    {
        cout<<"Data Rumah Makan Tidak Tersedia"<<endl;
    }
    else
    {
        string delA;
        cout<<endl;
        printInfoRM(RM);
        cout<<endl;
        cout<<"Masukkan ID Rumah Makan sebelum Rumah yang akan dihapus : ";
        getline(cin, delA);
        addressRM R = findElmRM(RM,delA);
        if (R->next == NULL)
        {
            cout<< "Ini adalah elemen terakhir"<<endl;
        }
        else
        {
            addressRM P = R->next;
            if (P->next == NULL) //elemen yang dihapus, berada diujung
            {
                R->next = NULL;
                P->prev = NULL;
                delete P;
            }
            else //elemen yang dihapus ditengah-tengah
            {
                R->next = P->next;
                P->next->prev = R;
                P->next = NULL;
                P->prev = NULL;
                delete P;
            }
            cout<<"Delete Data RM Berhasil"<<endl;
        }
    }
}

void deleteRMbyID(rumahMakan &RM){ //
    string strSearchRM;
    printInfoRM(RM);
    cout << "Masukkan ID Rumah Makan yang mau di Delete : ";getline(cin,strSearchRM);
    addressRM PRM = findElmRM(RM, strSearchRM);
    if(PRM == NULL){ // Kasus Element Tidak Ditemukan
        cout<<"ID RM Tidak Ditemukan"<<endl;
    }else{
        if(RM.first->next == NULL) {// Element Satu
            RM.first = NULL;
            RM.last = NULL;
            delete PRM;
        } else if((PRM == RM.first) && (PRM->next != NULL)){
            // Kasus Element yang akan didelete posisi pertama
            // dan banyak element lebih dari 1
            deleteFirstRM(RM);
        } else if((PRM == RM.last) && (PRM->prev != NULL)){
            // Kasus Element yang akan didelete posisi Akhir
            // dan banyak element lebih dari 1
            deleteLastRM(RM);
        } else if((PRM != RM.first) && (PRM != RM.last) && (PRM->next != NULL)){ //Kasus Element Ditengah
            addressRM P = PRM->prev;
            P->next = PRM->next;
            PRM->next->prev = P;
            PRM->next = NULL;
            PRM->prev = NULL;
            delete PRM;
        } else
            cout<<"Nothing to delete"<<endl;
    }
}

void deleteRMOption(rumahMakan &RM) {
    if(RM.first == NULL)
        cout<<"Tidak ada data Rumah Makan (Kosong)"<<endl;
    else {
        char pilihan;
        MenuAwal:
        cout << "Jenis Metode Delete Yang Akan Dilakukan"<<endl
             << "1. Delete First"<<endl
             << "2. Delete Last"<<endl
             << "3. Delete After"<<endl
             << "4. Delete By ID"<<endl
             << "5. Exit"<<endl;

        cout << "Masukkan Pilihan : ";
        cin>>pilihan; cin.ignore();
        switch (pilihan)
        {
            case '1' : deleteFirstRM(RM); cout<<"Delete Data RM Berhasil"<<endl; break;
            case '2' : deleteLastRM(RM); cout<<"Delete Data RM Berhasil"<<endl; break;
            case '3' : deleteAfterRM(RM);  break;
            case '4' : deleteRMbyID(RM);cout<<"Prosedur Delete Data RM Selesai"<<endl; break;
            case '5' : goto MenuAkhir;
            default : cin.ignore(); goto MenuAwal;
        }
        MenuAkhir:
        ;
    }
}

//----- Delete Menu (Child) - DARI YUSLAN ----//

void deleteMenuFirst(rumahMakan &RM) {
    cout<<endl;
    printInfoRM(RM);
    cout<<endl;
    string strSearchID;
    cout << "Masukkan ID Rumah Makan yang akan dihapus menunya: ";getline(cin, strSearchID);
    addressRM PRM = findElmRM(RM, strSearchID);
    if (PRM == NULL) {
        cout << "Tidak Ditemukan Rumah Makan";
    }
    else {
        addressMenu M = PRM->daftarMenu;
        if (M == NULL) {
            cout << "Tidak Terdapat Menu"<<endl;
        }
        else
        {
            if (M->next == NULL) {
                //cout<<M->info.idMenu<<endl;
                PRM->daftarMenu = NULL;
                M = NULL;
                delete M;
            }
            else {
                PRM->daftarMenu = M->next;
                M->next = NULL;
                delete M;
            }
            cout << "Menu Berhasil Dihapus"<<endl;
        }

    }
}

void deleteMenuAfter(rumahMakan &RM) {
    cout<<endl;
    printInfoRM(RM);
    cout<<endl;
    string strSearchID;
    string strSearchIDMenu;
    cout << "Masukkan ID Rumah Makan yang akan dihapus menunya: ";getline(cin, strSearchID);
    addressRM PRM = findElmRM(RM, strSearchID);
    if (PRM == NULL) {
        cout << "Tidak Ditemukan Rumah Makan";
    }
    else {
        addressMenu M = PRM->daftarMenu;
        if (M == NULL) {
            cout << "Tidak Terdapat Menu"<<endl;
        }
        else
        {
            cout << "List Menu RM - "<<PRM->info.namaRM<<endl;
            while (M != NULL){ // Looping Untuk Menampilkan Menu Rumah Makan
                cout<<"ID Menu    : "<<M->info.idMenu<<endl;
                cout<<"Nama Menu  : "<<M->info.namaMenu<<endl;
                cout<<"Harga Menu : "<<M->info.hargaMenu<<endl;
                cout<<endl;
                M = M->next;
            }
            cout << endl;
            cout << "Masukkan ID Menu Sebelum ID yang akan dihapus : ";
            cin >> strSearchIDMenu; cin.ignore();
            M = findElmMenu(PRM,strSearchIDMenu);
            if ((M != PRM->daftarMenu) && (M->next == NULL)) //element diujung
            {
                cout << "Tidak ada menu setelah menu ini"<<endl;
            }
            else if ((M == PRM->daftarMenu) && (M->next == NULL)) //menu tunggal
            {
                cout << "Ini adalah satu-satunya menu di rumah makan ini"<<endl;
            }
            else
            {
                addressMenu N = M->next;
                if (N->next == NULL)
                {
                    M->next = NULL;
                    delete N;
                }
                else
                {
                    M->next = N->next;
                    N->next = NULL;
                    delete N;
                }
                cout << "Menu Berhasil Dihapus"<<endl;
            }
        }
    }
}

void deleteMenuLast(rumahMakan &RM) {
    cout<<endl;
    printInfoRM(RM);
    cout<<endl;
    string strSearchID;
    cout << "Masukkan ID Rumah Makan yang akan dihapus menunya: ";getline(cin, strSearchID);
    addressRM PRM = findElmRM(RM, strSearchID);
    if (PRM == NULL) {
        cout << "Tidak Ditemukan Rumah Makan"<<endl;
    }
    else
    {
        addressMenu M = PRM->daftarMenu;
        if (M == NULL) {
            cout << "Menu Kosong Pada RM Tersebut"<<endl;
        }
        else
        {
            if (PRM->daftarMenu == M && M->next == NULL) // Kalo datanya tinggal satu
            {
                deleteMenuFirst(RM);
            }
            else
            {
                while (M->next != NULL)
                {
                    M = M->next;
                }
                addressMenu N = PRM->daftarMenu;
                while (N->next->info.idMenu != M->info.idMenu)
                {
                    N = N->next;
                }
                N->next = NULL;
                delete M;
                cout << "Menu Berhasil Dihapus"<<endl;
            }
        }
    }
}

void deleteMenuByID(rumahMakan &RM) {
    string strSearchID;
    string strSearchIDMenu;
    printInfoRM(RM);
    cout << "Masukkan ID Rumah Makan yang akan dihapus menunya: ";getline(cin, strSearchID);
    addressRM PRM = findElmRM(RM, strSearchID);
    if (PRM == NULL) {
        cout << "Tidak Ditemukan Rumah Makan";
    }
    else {
        addressMenu M = PRM->daftarMenu;
        if (M == NULL)
        {
            cout << "Tidak terdapat menu dalam rumah makan tersebut"<<endl;
        }
        else
        {
            cout << "List Menu RM - "<<PRM->info.namaRM<<endl;
            while (M != NULL){ // Looping Untuk Menampilkan Menu Rumah Makan
                cout<<"ID Menu    : "<<M->info.idMenu<<endl;
                cout<<"Nama Menu  : "<<M->info.namaMenu<<endl;
                cout<<"Harga Menu : "<<M->info.hargaMenu<<endl;
                cout<<endl;
                M = M->next;
            }
            cout << endl;
            cout << "Masukkan ID Menu Yang Ingin Dihapus : ";getline(cin, strSearchIDMenu);
            M = PRM->daftarMenu;
            while (M != NULL) { // Looping Posisi Element yang akan dihapus
                if (M->info.idMenu == strSearchIDMenu) {
                    break;
                }
                else {
                    M = M->next;
                }
            }
            if (M == NULL) {
                cout << "Tidak Ada Menu Yang Sesuai"<<endl;
            }
            else {
                if (PRM->daftarMenu->next == NULL) { //Hanya Terdapat Satu Menu
                    PRM->daftarMenu = NULL;
                    delete M;
                    cout << "Menu Berhasil Dihapus"<<endl;
                }
                else {                              //Terdapat Banyak Menu
                    if (M == PRM->daftarMenu) {     //Menu berada di awal
                        PRM->daftarMenu = M->next;
                        M->next = NULL;
                        delete M;
                        cout << "Menu Berhasil Dihapus"<<endl;
                    }
                    else if (M->next == NULL) {     //Menu berada di akhir
                        addressMenu Q = PRM->daftarMenu;
                        while (Q->next != M) {
                            Q = Q->next;
                        }
                        Q->next = NULL;
                        delete M;
                        cout << "Menu Berhasil Dihapus"<<endl;
                    }
                    else {                          //Menu berada di tengah
                        addressMenu Q = PRM->daftarMenu;
                        while (Q->next != M) {
                            Q = Q->next;
                        }
                        Q->next = M->next;
                        M->next = NULL;
                        delete M;
                        cout << "Menu Berhasil Dihapus"<<endl;
                    }
                }
            }
        }

    }
}

void deleteMenuOption(rumahMakan &RM) {
    if (RM.first == NULL)
    {
        cout << "Tidak terdapat rumah makan"<<endl;
    }
    else
    {
        char pilihan;
        MenuAwal:
        cout << "Jenis Metode Delete Yang Akan Dilakukan"<<endl
             << "1. Delete First"<<endl
             << "2. Delete After"<<endl
             << "3. Delete Last"<<endl
             << "4. Delete By ID"<<endl
             << "5. Exit"<<endl;

        cout << "Masukkan Pilihan : ";
        cin>>pilihan; cin.ignore();
        switch (pilihan)
        {
            case '1' : deleteMenuFirst(RM); break; goto MenuAwal;
            case '2' : deleteMenuAfter(RM); break; goto MenuAwal;
            case '3' : deleteMenuLast(RM); break; goto MenuAwal;
            case '4' : deleteMenuByID(RM); break; goto MenuAwal;
            case '5' : goto MenuAkhir;
            default : cin.ignore(); goto MenuAwal;
        }

        MenuAkhir:
        ;
    }

}


//------------- Fikri Firdaus Insert RM (Parent) ---------------//

void insertFirstRM(rumahMakan &R, addressRM P) { //
    if(first(R) == NULL){ //Kondisi Ketika List Kosong
        first(R) = P;
        last(R) = P;
    } else {
        P->next = R.first;
        R.first->prev = P;
        R.first = P;
    }
}

void insertLastRM(rumahMakan &R, addressRM P) { //
    if(first(R) == NULL){ //Kondisi Ketika List Kosong
        first(R) = P;
        last(R) = P;
    } else {
        prev(P) = last(R);
        next(prev(P)) = P;
        last(R) = P;
    }
}

void insertAfterRM(rumahMakan &R, addressRM P) { //
    if (R.first == NULL)
    {
        cout << "Karena Elemen Kosong, Maka Elemen Langsung Diinsert Di Awal List"<<endl;
        insertFirstRM(R,P);
    }
    else
    {
        string strSearchID;
        printInfoRM(R);
        cout << endl;
        cout << "Masukan ID RM yang ingin di Insert Sesudah-nya: ";getline(cin, strSearchID);
        addressRM PRM;
        PRM = findElmRM(R, strSearchID);
        if(PRM == NULL){
            cout<<"Element Yang akan diInsert Sesudah-nya tidak tersedia"<<endl;
        } else {
            if(PRM->next == NULL){ // Element yang mau diInsert sesudahnya berada di Ujung
                insertLastRM(R,P);

            } else {
                P->next = PRM->next;
                P->prev = PRM;
                PRM->next->prev = P;
                PRM->next = P;
            }
        }
    }

}

void addRumahMakan(rumahMakan &R){
    infotypeRM addRM;
    createRM(addRM);
    addressRM PRM;
    PRM = alokasiRM(addRM);
    char opt;
    cout<<endl;
    cout<<"Pilih Jenis Insert : "<<endl
        <<"1. Insert First"<<endl
        <<"2. Insert Last"<<endl
        <<"3. Insert After"<<endl;
    MenuLabel:
    cout<<"Option : "; cin>>opt; cin.ignore();
    switch (opt) {
      case '1' :  insertFirstRM(R,PRM); break;
      case '2' :  insertLastRM(R,PRM); break;
      case '3' :  insertAfterRM(R,PRM); break;
      default : cin.ignore(); goto MenuLabel;
    }
    cout << "Data Berhasil di Insert"<<endl;
}


//------------- Hitung Element Yuslan & WidyaIcha ---------------//

void countTotalRM(rumahMakan RM){
    addressRM PRM;
    PRM = RM.first;
    if(PRM == NULL){
        cout<<"Total Rumah Makan yang terdata Kosong Pemirsa!!"<<endl;
    } else {
        int countNum = 0;
        while(PRM!= NULL){
            countNum++;
            PRM = PRM->next;
        }
        cout<<"Total RM yang tersedia adalah : "<<countNum<<" Rumah Makan"<<endl;
    }
}

void countTotalMenu(rumahMakan RM){
    if(RM.first == NULL)
        cout<<"Tidak ada Data Rumah Makan"<<endl;
    else {
        string strSearchID;
        string strSearchIDMenu;
        printInfoRM(RM);
        cout << endl;
        cout << "Masukkan ID Rumah Makan yang akan dihitung menunya: ";getline(cin, strSearchID);
        addressRM PRM = findElmRM(RM, strSearchID);
        if(PRM != NULL){
            int countNum = 0; //Counter Hitung
            addressMenu M = PRM->daftarMenu;
            while(M != NULL){ //Looping Hitung Element
                countNum++;
                M = M->next;
            }
            cout << endl;
            cout<<"Rumah Makan : "<<PRM->info.namaRM<<" - Mempunyai "<<countNum<<" Menu"<<endl;
        } else {
            cout << endl;
            cout<<"Tidak Terdapat ID Rumah Makan"<<endl;
        }
    }
}

void countMenu(rumahMakan RM) {
    char opt;
    cout<<"===== Pilih Element List yang mau dihitung ====="<<endl
        <<"1. Rumah Makan"<<endl
        <<"2. Menu suatu Rumah Makan"<<endl
        <<"3. Back to Main Menu"<<endl;
    MenuLabel:
    cout<<"Option : "; cin>>opt; cin.ignore();
    switch (opt) {
      case '1' :  countTotalRM(RM); break;
      case '2' :  countTotalMenu(RM); break;
      case '3' :  break;
      default : goto MenuLabel;
    }
}



//------------- Merge Sort RM Oke Tested - M Yuslan ---------------//

int countLengthRM(rumahMakan RM){
	int countNum = 0;
	if(RM.first == NULL){
		return 0;
	} else {
		addressRM PRM;
		PRM = RM.first;
		while(PRM != NULL){
			countNum++;
			PRM = PRM->next;
		}
		return countNum;
	}
}

rumahMakan mergeInRM(rumahMakan left, rumahMakan right){
    //cout<<"ASASD"<<endl;
    //cout<<left.first.info->idRM<<endl;
    //cout<<right.first<<endl;

    rumahMakan resultList;
    createListRM(resultList); //List Baru untuk Penampung Element Terurut
    addressRM PRM; //Address Buat Menampung data Pop untuk diinsert

    while((left.first != NULL) && (right.first != NULL)){ //Selama Salah Satu List Belum Habis
        if(left.first->info.idRM <= right.first->info.idRM){
            PRM = deleteFirstRM(left);
        } else {
            PRM = deleteFirstRM(right);
        }
        insertLastRM(resultList,PRM); //Memasukan Element yang di Pop dari Salah Satu List, (Right/Left)
    }

    // Jika terdapat sisa Element dari List dari Kiri / Kanan (Sisanya pasti terurut karena proses rekursif awal)
    while(left.first != NULL){
        PRM = deleteFirstRM(left);
        insertLastRM(resultList,PRM);
    }
    while(right.first != NULL){
        PRM = deleteFirstRM(right);
        insertLastRM(resultList,PRM);
    }
    return resultList;
}

rumahMakan mergeSortRM(rumahMakan RM){
    int lengthList = countLengthRM(RM);
    //cout<<lengthList<<endl;
    rumahMakan tmpList; // Ini nantinya akan jadi representatif list Kiri
    createListRM(tmpList);
    addressRM PRM;

    // Jika List Elemenya Satu Return List Tersebut
    if(lengthList <=1){
        return RM;
    }
    //
	int i = 0;
	while(i < lengthList/2){
		PRM = deleteFirstRM(RM);
		insertFirstRM(tmpList,PRM);
		i++;
	}

	// Recursively sort both sublists
	tmpList = mergeSortRM(tmpList);
	RM = mergeSortRM(RM);

	// Then merge the now-sorted sublists.
	return mergeInRM(tmpList,RM);
}

void sortRumahMakan(rumahMakan &RM){ //Has been edited
    if(RM.first == NULL){
        cout<<"Tidak ada Data Rumah Makan"<<endl;
    } else {
        RM = mergeSortRM(RM);
        cout<<"========== SORT BERHASIL =========="<<endl;
        cout << endl;
        cout << "HASIL :"<<endl;
        cout << endl;
        printInfoRM(RM);
    }
}


// ------------ Merge Sort Menu (Child) Tested - Kiswanto-D ------ //

int countLengthMenu(addressMenu PRM){
 int countNum = 0;
 if(PRM == NULL){
  return 0;
 } else {
  addressMenu M;
  M = PRM;
  while(M != NULL){
   countNum++;
   M = M->next;
  }
  return countNum;
 }
}

addressMenu deleteMenuFirstMergeSort(addressMenu &M){
    //cout<<M->info.namaMenu<<endl;
    addressMenu S, Q;
    S = new elmMenu;
    S->info = M->info;
    S->next = NULL;
    Q = M;

    if (M == NULL) {
        cout << "Tidak Terdapat Menu"<<endl;
    }
    else {
        //cout<<M->next<<endl;
        if (M->next == NULL)
        {
            M = NULL;
            return S;
        }
        else
        {
            //cout<<Q->next->info.namaMenu<<endl;
            M = Q->next;
            Q->next = NULL;
            return Q;
        }
    }
}

void insertMenuFirstMergeSort(addressMenu &PRM, addressMenu M) {
        if (PRM == NULL) {
            PRM = M;
        }
        else {
            M->next = PRM;
            PRM = M;
        }
}

void insertMenuLastMergeSort(addressMenu &PRM, addressMenu P) {
        addressMenu Q = PRM;
        if(Q == NULL){
            insertMenuFirstMergeSort(PRM,P);
        } else {
            while(Q->next != NULL){
                Q = Q->next;
            }
            Q->next = P;
        }
}

addressMenu mergeInMenu(addressMenu left, addressMenu right){
    //cout<<"ASASD"<<endl;
    //cout<<left.first.info->idRM<<endl;
    //cout<<right.first<<endl;

    addressMenu resultList;
    resultList = NULL; //List Baru untuk Penampung Element Terurut
    addressMenu M; //Address Buat Menampung data Pop untuk diinsert

    while((left != NULL) && (right != NULL)){ //Selama Salah Satu List Belum Habis
        if(left->info.idMenu <= right->info.idMenu){
            M = deleteMenuFirstMergeSort(left);
        } else {
            M = deleteMenuFirstMergeSort(right);
        }
        insertMenuLastMergeSort(resultList,M); //Memasukan Element yang di Pop dari Salah Satu List, (Right/Left)
        //cout<<"Z"<<endl;
    }

    // Jika terdapat sisa Element dari List dari Kiri / Kanan (Sisanya pasti terurut karena proses rekursif awal)
    while(left != NULL){
        M = deleteMenuFirstMergeSort(left);
        insertMenuLastMergeSort(resultList,M);
        //cout<<"y"<<endl;
    }
    while(right != NULL){
        M = deleteMenuFirstMergeSort(right);
        insertMenuLastMergeSort(resultList,M);
        //cout<<"x"<<endl;
    }
    return resultList;
}

addressMenu mergeSortMenu(addressMenu PRM){
    int lengthList = countLengthMenu(PRM);
    //cout<<lengthList<<endl;
    addressMenu tmpList; // Ini nantinya akan jadi representatif list Kiri
    tmpList = NULL;
    addressMenu M;

    // Jika List Elemenya Satu Return List Tersebut
    if(lengthList <=1){
        return PRM;
    }
    //
 int i = 0;


 while(i < lengthList/2){
  M = deleteMenuFirstMergeSort(PRM);
  //cout<<tmpList<<endl;
  insertMenuFirstMergeSort(tmpList,M);
  i++;
  //cout<<PRM->daftarMenu->info.namaMenu<<endl;
  //cout<<tmpList->daftarMenu->info.namaMenu<<endl;
  //cout<<tmpList->daftarMenu->info.namaMenu<<endl;
 }

    //cout<<tmpList->info.idRM<<endl;
 // Recursively sort both sublists
 tmpList = mergeSortMenu(tmpList);
 //cout<<"X"<<endl;
 PRM = mergeSortMenu(PRM);
 //cout<<"Y"<<endl;
 // Then merge the now-sorted sublists.
 return mergeInMenu(tmpList,PRM);
}

void sortMenu(rumahMakan &RM){
    if (RM.first == NULL)
    {
        cout << "Tidak Ada Rumah Makan"<<endl;
    }
    else
    {
        string strSearchID;
        printInfoRM(RM);
        cout << endl;
        cout << "Masukkan ID Rumah Makan yang akan diSorting Menunya: ";getline(cin, strSearchID);
        addressRM PRM = findElmRM(RM, strSearchID);
        //cout<<PRM->daftarMenu->info.namaMenu<<endl;
        if (PRM == NULL)
        {
            cout << "Tidak Ada ID Rumah Makan Yang Sesuai"<<endl;
        }
        else
        {
            if (PRM->daftarMenu == NULL)
            {
                cout << "Tidak Terdapat Menu"<<endl;
            }
            else
            {
                //cout<<"X"<<endl;
                //addressMenu X;
                //X = deleteMenuFirstMergeSort(PRM->daftarMenu);
                //cout<<X->info.namaMenu<<endl;
                PRM->daftarMenu = mergeSortMenu(PRM->daftarMenu);
                //cout<<"y"<<endl;
                cout<<"========== Sorting pada "<<PRM->info.namaRM<<" Telah Berhasil Dilakukan =========="<<endl;
                cout << endl;
                cout << "HASIL :"<<endl;
                cout << endl;
                addressMenu M = PRM->daftarMenu;
                while (M != NULL)
                {
                    cout <<"ID Menu    : "<<M->info.idMenu<<endl;
                    cout <<"Nama Menu  : "<<M->info.namaMenu<<endl;
                    cout <<"Harga Menu : "<<M->info.hargaMenu<<endl;
                    cout << endl;
                    M = M->next;
                }
            }
        }
    }
}
