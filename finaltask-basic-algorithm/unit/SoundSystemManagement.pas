unit SoundSystemManagement;
interface
procedure MenuSoundManage();
procedure ViewSound(DirecFile : string);

implementation
uses sysutils, crt;

type SoundSystem = Record
	kode : string;
	merk_tipe : String;
	harga : int64;
end;

var
// Database Jenis Jenis Paket SoundSystem.
VarSound : SoundSystem; //dbPaket.dat
FileSound : file of SoundSystem;
fdel_sound : file of SoundSystem;
TempSound : SoundSystem;
DirFile : string;

procedure InsertSound(DirecFile : string);
var
	opt : char;
label Prompt1, Prompt2;
begin
	assign(FileSound, DirecFile);
	//rewrite(FileSound); //Disable After CREATING FILE!!!
	reset(FileSound);
	while not EOF(FileSound) do
		begin
			read(FileSound, VarSound);
		end;
	Prompt1:
	writeln('');
	writeln('Input Sound System');
	write('Kode Barang : '); readln(VarSound.kode);
	write('Masukan Merk : '); readln(VarSound.merk_tipe);
	write('Harga Sewa PerHari (Number) : '); readln(VarSound.harga);
	write('Sound Berhasil diinput, ');
	write(FileSound, VarSound);
	writeln('Input Lagi ?? (Y/N)');
	Prompt2: opt := readkey;
	case opt of
	'Y','y' : Goto Prompt1;
	'N','n'	: begin end;
	else
		Goto Prompt2;
	end;
	close(FileSound);
end;

procedure ViewSound(DirecFile : string);
begin
	assign(FileSound, DirecFile);
	reset(FileSound);
	while not EOF(FileSound) do
		begin
			read(FileSound, VarSound);
			writeln();
			writeln('Kode Sound System : ', VarSound.kode);
			writeln('Merk / Tipe Sound System : ', VarSound.merk_tipe);
			writeln('Harga Sewa : ', VarSound.harga);
		end;				
	close(FileSound);
end;

procedure UpdateSound(DirecFile:string);
var
	str_update,str_del:string;
	new_harga:int64;
	{Update_kode:string;
	Update_merk_tipe:string;
	Update_harga:int64;}
	opt:char;
label
	prompt;
begin
	ViewSound(DirecFile);
	Assign(FileSound,DirecFile);
	Assign(fdel_sound,'dbfile/dbTempSound.dat');
	reset(FileSound);
	rewrite(fdel_sound);
	writeln('-----Update Sound-----');				
	write('Masukkan Kode Sound System yang akan di update Harga sewanya : ');readln(str_update);
	while (not EOF(FileSound)) do
	begin
		read(FileSound,VarSound);
		if (VarSound.kode = str_update) then
		begin
			write('Harga sewa Baru : '); readln(new_harga);
			VarSound.harga := new_harga;
			write(fdel_sound, VarSound);
		end
		else
			write(fdel_sound, VarSound);
	end;
	DeleteFile(DirecFile);
	RenameFile('dbfile/dbTempSound.dat',DirecFile);
	writeln('Data Updated');
	 writeln;
end;
			
procedure DeleteSound(DirecFile:string);
Var
	str_del:string;
begin
	ViewSound(DirecFile);
	assign(FileSound, DirecFile);
	assign(fdel_sound, 'dbfile/dbTempSoundDel.dat');
	reset(FileSound);
	rewrite(fdel_sound);
	write('Kode Sound System yang akan Di Delete : '); readln(str_del);
	while not EOF(FileSound) do
	begin
		read(FileSound, VarSound);
		if (VarSound.kode <> str_del) then
			write(fdel_sound, VarSound);
	end;
	DeleteFile(DirecFile);
	RenameFile ('dbfile/dbTempSoundDel.dat',DirecFile);
	writeln('Data Berhasil di Hapus');
	writeln();
end;

procedure MenuSoundManage();
var
	opt : char;
	exit : boolean;
	name_sound : string;
label
	Prompt1, Prompt2, ExitLabel;
begin
	exit := False;
	repeat
	clrscr;
	writeln('--------------- # 6. SOUND SYSTEM MANAGEMENT - MENU # ---------------');
	writeln('Pilih Tipe SoundSystem');
	writeln('	1. Sound Small');
	writeln('	2. Sound Medium');
	writeln('	3. Sound Large');
	writeln('Press ''X'' to Back to the Main Menu'); 
	writeln('Pilihan : ');
	Prompt1: opt := readkey;
	writeln();
	case opt of
	'1' : begin DirFile := 'dbfile/dbSoundSmall.dat'; name_sound := 'Small'; end;
	'2' : begin DirFile := 'dbfile/dbSoundMedium.dat'; name_sound := 'Medium'; end;
	'3' : begin DirFile := 'dbfile/dbSoundLarge.dat'; name_sound := 'Large'; end;
	'X','x' : begin exit := True; Goto ExitLabel; end;
	else
		Goto Prompt1;
	end;
	writeln('--- MANAGE Sound System Kategori ',name_sound,' ---');
	writeln('	1. Input Data Sound');
	writeln('	2. View Sound');
	writeln('	3. Update Harga');
	writeln('	4. Delete Sound System');
	writeln('Press ''X'' to Back to the Main Menu');
	write('Pilihan : '); 
	Prompt2 : opt := readkey;
	writeln();
	case opt of
		'1' : InsertSound(DirFile);
		'2' : begin ViewSound(DirFile); readln(); end;
		'3' : begin UpdateSound(DirFile); readln(); end;
		'4' : begin DeleteSound(DirFile); readln(); end;
		'X','x' : exit := True;
	else
		Goto Prompt2;
	end;
	ExitLabel:
	until (exit=true);

end;

end.