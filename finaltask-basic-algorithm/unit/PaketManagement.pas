unit PaketManagement;

interface
procedure ViewPaket();
procedure InputPaket();
procedure MenuPaket();
procedure DeletePaket();

implementation
uses sysutils, crt;
type PaketSound = Record
	kode : string;
	paket : String;
	harga : int64;
	end;

var
	//------------------------- DEFAULT VARIABLE -------------------------//
	// Database Jenis Jenis Paket SoundSystem.
	VarPaketSound : PaketSound; //dbPaket.dat
	file_paket : file of PaketSound;
	temp_paket : PaketSound;
	//----------------------------------------------------------------------//
	fdel_paket : file of PaketSound;

	n,i : integer;
	opt : char;
	ulang :char;
	cek : boolean;


procedure ViewPaket();
begin
	assign(file_paket,'dbfile/dbPaket.dat');
	reset(file_paket);
	writeln();
	writeln('========================== DATA PAKET YANG TERSEDIA ====================');
	writeln('      KODE PAKET      ||        NAMA PAKET        ||      HARGA PAKET   '); 
	repeat
		read(file_paket,VarPaketSound);
		write('	', VarPaketSound.kode,'    		');
		write('		', '		' , VarPaketSound.paket, '		');
		writeln('					RP.',VarPaketSound.harga);
		cek := EOF(file_paket);
	until (cek=true);
	close(file_paket);
	readln();
end;

procedure InputPaket();
var
	opt : char;
label Prompt2, Prompt1;
begin;
	assign(file_paket, 'dbfile/dbPaket.dat');
	//rewrite(file_paket); Disable this After Creating File
	reset(file_paket);
	writeln();
	writeln('---------INPUT PAKET-------');
	// Biar Gak Ketimpah
	while not (EOF(file_paket)) do
	begin
		read(file_paket, temp_paket);
	end;

	// Input Data
	Prompt1:
	write('Masukkan Kode Paket : '); readln(VarPaketSound.kode);
	write('Masukkan Nama Paket : '); readln(VarPaketSound.paket);
	write('Harga (Number) : '); readln(VarPaketSound.harga);
	
	write(file_paket, VarPaketSound);					
	
	// Syntax Konfirmasi
	writeln('Apakah Anda ingin memasukkan paket baru ? (Y/N) : ');
	Prompt2: opt := readkey;
	case opt of
		'Y', 'y' : begin writeln(); Goto Prompt1; end;
		'N', 'n' : begin end; //Skip this Case
	else
		Goto Prompt2;
	end;
	close(file_paket);
	writeln();
end;

procedure DeletePaket();
var
	str_del : string;
begin
	ViewPaket();
	assign(file_paket, 'dbfile/dbPaket.dat');
	assign(fdel_paket, 'dbfile/Del_dbPaket.dat');
	reset(file_paket);
	rewrite(fdel_paket);
	write('Kode Paket yang Akan Di Delete : '); readln(str_del);
	while not EOF(file_paket) do
	begin
		read(file_paket, VarPaketSound);
		writeln(str_del);
		if (VarPaketSound.kode <> str_del) then
			write(fdel_paket, VarPaketSound);
	end;
	DeleteFile('dbfile/dbPaket.dat');
	RenameFile('dbfile/Del_dbPaket.dat','dbfile/dbPaket.dat');
	writeln('Data Berhasil di Hapus');
	writeln();
end;

procedure UpdatePaket();
var
	str_del,str_update : string;
	opt : char;
	new_harga : int64;
label Prompt;
begin
	ViewPaket();
	assign(file_paket, 'dbfile/dbPaket.dat');
	assign(fdel_paket, 'dbfile/Del_dbPaket.dat');
	reset(file_paket);
	rewrite(fdel_paket);
	writeln('----- Update Paket -----');
	writeln('    1. Kode Paket');
	writeln('    2. Nama Paket');
	writeln('    3. Harga Paket');
	writeln('Input pilihan : '); 
	Prompt: opt := readkey;
	case opt of
		'1' : begin
			write('Kode Paket yang Akan Di Update : '); readln(str_del);
			while not EOF(file_paket) do
			begin
				read(file_paket, VarPaketSound);
				if (VarPaketSound.kode = str_del) then
					begin
						write('Kode Baru : '); readln(str_update);
						VarPaketSound.kode := str_update;
						write(fdel_paket, VarPaketSound);
					end
				else
					write(fdel_paket, VarPaketSound);
			end;
			DeleteFile('dbfile/dbPaket.dat');
			RenameFile('dbfile/Del_dbPaket.dat','dbfile/dbPaket.dat');
			writeln('Data Updated');
			end;

		'2' : begin
			write('Masukan Kode Paket yang Akan Di Update Namanya: '); readln(str_del);
			while not EOF(file_paket) do
			begin
				read(file_paket, VarPaketSound);
				if (VarPaketSound.paket = str_del) then
					begin
						write('Nama Paket Baru : '); readln(str_update);
						VarPaketSound.paket := str_update;
						write(fdel_paket, VarPaketSound);
					end
				else
					write(fdel_paket, VarPaketSound);
			end;
			DeleteFile('dbfile/dbPaket.dat');
			RenameFile('dbfile/Del_dbPaket.dat','dbfile/dbPaket.dat');
			writeln('Data Updated');
			end;

		'3' : begin
			write('Masukan Kode Paket yang Akan Di Update Harganya: '); readln(str_del);
			while not EOF(file_paket) do
			begin
				read(file_paket, VarPaketSound);
				if (VarPaketSound.kode = str_del) then
					begin
						write('Harga Baru : '); readln(new_harga);
						VarPaketSound.harga := new_harga;
						write(fdel_paket, VarPaketSound);
					end
				else
					write(fdel_paket, VarPaketSound);
			end;
			DeleteFile('dbfile/dbPaket.dat');
			RenameFile ('dbfile/Del_dbPaket.dat','dbfile/dbPaket.dat');
			writeln('Data Updated');
			end;
	else
		Goto Prompt;
	end;
	writeln();
end;

procedure MenuPaket();
var
	exit : boolean;
begin
	repeat
	clrscr;
	writeln('--------- # 7. PAKET MANAGEMENT - Main Menu # ---------');
	writeln('=======================================================');
	writeln('	1. View Paket yang kami sediakan');
	writeln('	2. Input Paket Baru');
	writeln('	3. Delete Paket');
	writeln('	4. Update Harga Paket');
	writeln('Press X to EXIT ');
	exit := false;
	writeln('Input pilihan : '); opt := readkey;
	case opt of
		'1' : ViewPaket();
		'2' : InputPaket();
		'3' : DeletePaket();
		'4' : UpdatePaket();
		'X' : exit := True;
	else
		writeln('Wrong Choice!!!');
		end;
	until (exit=true);
end;


end.
