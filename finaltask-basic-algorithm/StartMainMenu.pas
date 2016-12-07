program menu;
uses InputPeminjaman, PaketManagement, MemberManagement, SoundSystemManagement, crt,
	 SearchPeminjaman, DeletePeminjaman, ViewPeminjaman;

var
	PilihMenu : Char;
	exit : boolean;
label PromptMainMenu;
begin
	repeat
	clrscr;
	PromptMainMenu:
	writeln('---------- ## APLIKASI RENTAL SMS PROGRAM ## ----------');
	writeln('=======================================================');
	writeln('Pilih Menu :');

	writeln('	1. Lihat Data Peminjaman & Sorting'); //ViewPeminjaman.pas, SortPeminjaman.pas
	
	writeln('	2. Input Peminjaman'); //InputPeminjaman.pas & HistoryPenjualan.pas
	// - Cek Member Nama & ID Member biar Lebih Secure;

	writeln('	3. Pengembalian Peminjaman (Delete) '); //DeletePeminjaman.pas	
	
	writeln('	4. Cari Penyewa'); //SearchPeminjaman.pas
	
	//writeln('	5. Perpanjang Penyewaan'); //EditPeminjaman.pas
 	
	writeln('	6. SoundSystem Management'); // SoundSystemManagement.pas
		// Update Harga dan Delete SoundSystem
		// View Table
	
	writeln('	7. Paket Management '); //PaketManagement.pas
	
	writeln('	8. Member Management'); //MemberAdvantage.pas & MemberManagement.pas
		// - Delete and Upgrade Member
		// View Table
	
//	writeln('	9. History Peminjaman'); //HistoryPenjualan.pas
		//Input & Perpanjang Only
	
	writeln('Press ''X'' to Exit this Program');
	write('Pilih Menu : ');
	exit := False;
	PilihMenu := Readkey;
	case PilihMenu of
	'1' : ViewPeminjam();
	'2' : InputDataPinjam();
	'3' : DeletePeminjam();
	'4' : SearchPinjam();
	// '5' :
	'6' : MenuSoundManage();
	'7' : MenuPaket();
	'8' : MenuMember();
	// '9' :
	'X', 'x' : exit := True;
	end;
	until (exit=true)
end.