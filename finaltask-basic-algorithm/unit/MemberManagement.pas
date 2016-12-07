unit MemberManagement;
interface
procedure MenuMember();
procedure DeleteMember();
procedure UpgradeMember();

implementation
uses sysutils, crt, MemberAdvantage;

type PlusMember = Record
	diskon : integer;
	bonus : string;
	end;

type Member = Record
	id : string;
	nama : string;
	jenis : string;
	adv : PlusMember;
	end;

var
	// Database Variable Member.
	varMember : Member; //dbDataMember.dat
	file_Member : file of Member;
	temp_Member : Member;

	file_Plus : file of PlusMember;
	varPlus : PlusMember;
	temp_Plus : PlusMember;
	fdel_Member : file of Member;
	DirFile : string;

function GetPlusMember(DFile : string):PlusMember;
var
	TempPlus : PlusMember;
begin
	Assign(File_Plus, DFile);
	reset(File_Plus);
	read(File_Plus,TempPlus);
	close(File_Plus);
	GetPlusMember := TempPlus;
end;

procedure CreateMember();
var
	DirPlusMember : String;
	opt : char;
label Prompt1, Prompt2, Prompt3;
begin
	assign(file_Member, 'dbfile/dbMember.dat');
	//rewrite(file_Member); // Disable this After Create File;
	reset(file_Member);
	while not (EOF(file_Member)) do
		begin
			read(file_Member, temp_Member);
		end;
	Prompt1:
	writeln();
	writeln('MEMBER MANAGEMENT - Create Member');
	writeln('---------------------------------');
	write('ID Member : '); readln(VarMember.id);
	write('Nama Anggota : '); readln(VarMember.nama);
	writeln('Jenis Member');
	writeln('  1. Premium');
	writeln('  2. Gold');
	writeln('  3. Silver'); writeln('Pilih !! : ');
	Prompt2: opt := readkey;
	case opt of
	'1' : begin DirFile := 'dbfile/dbPremMbr.dat'; VarMember.jenis := 'Premium'; end;
	'2' : begin DirFile := 'dbfile/dbGoldMbr.dat'; VarMember.jenis := 'Gold'; end;
	'3' : begin DirFile := 'dbfile/dbSilvMbr.dat'; VarMember.jenis := 'Silver'; end;
	else
		Goto Prompt2;
	end;
	VarMember.adv := GetPlusMember(DirFile);
	// Insert Data Member to File ('dbfile/dbMember.dat')
	write(File_Member,VarMember);
	writeln('Member Berhasil Dibuat!');
	writeln('Input Lagi ?? (Y/N)');
	Prompt3: opt := readkey;
	case opt of
	'Y','y' : Goto Prompt1;
	'N','n'	: begin end;
	else
		Goto Prompt3;
	end;
	close(File_Member);
end;

procedure ViewMember();
begin
	writeln();
	writeln('                   MEMBER MANAGEMENT - View Member                      ');
	writeln('------------------------------------------------------------------------');
	writeln('   ID Member   ||          Nama Member         ||      Jenis Member     ');
	assign(file_Member, 'dbfile/dbMember.dat');
	reset(file_Member);
	while not (EOF(file_Member)) do
		begin
			read(file_Member, VarMember); write('     ');
			write(VarMember.id); write('              ');
			write(VarMember.nama); write('            ');
			writeln(VarMember.jenis);
		end;
	close(file_Member);
	readln();
end;

procedure DeleteMember();
var
	str_del : string;
begin
	ViewMember();
	assign(file_Member, 'dbfile/dbMember.dat');
	assign(fdel_Member, 'dbfile/Del_dbMember.dat');
	reset(file_Member);
	rewrite(fdel_Member);
	write('ID Member yang Akan Di Delete : '); readln(str_del);
	while not EOF(file_Member) do
	begin
		read(file_Member, VarMember);
		writeln(str_del);
		if (VarMember.id <> str_del) then
			write(fdel_Member, VarMember);
	end;
	DeleteFile('dbfile/dbMember.dat');
	RenameFile ('dbfile/Del_dbMember.dat','dbfile/dbMember.dat');
	writeln('Data Berhasil di Hapus');
	writeln();
end;

procedure UpgradeMember();
var
	str_del,str_update : string;
	opt: char;
begin
	ViewMember();
	assign(file_Member, 'dbfile/dbMember.dat');
	assign(fdel_Member, 'dbfile/Del_dbMember.dat');
	reset(file_Member);
	rewrite(fdel_Member);
	writeln('----- Update Jenis Member -----');
	write('Masukan ID Member yang Akan Di Update Jenis membernya: '); readln(str_del);
	while not EOF(file_Member) do
	begin
		read(file_Member, VarMember);
		if (VarMember.id = str_del) then
			begin
				writeln('Jenis Member Baru : ');
				writeln('  1. Premium');
				writeln('  2. Gold');
				writeln('  3. Silver'); writeln('Pilih !! : ');
				opt := readkey;
				case opt of
				'1' : begin DirFile := 'dbfile/dbPremMbr.dat'; str_update := 'Premium';end;
				'2' : begin DirFile := 'dbfile/dbGoldMbr.dat'; str_update := 'Gold';end;
				'3' : begin DirFile := 'dbfile/dbSilvMbr.dat'; str_update := 'Silver';end;
				end;
				VarMember.jenis := str_update;
				write(fdel_Member, VarMember);
			end
		else
			write(fdel_Member, VarMember);
	end;
	DeleteFile('dbfile/dbMember.dat');
	RenameFile ('dbfile/Del_dbMember.dat','dbfile/dbMember.dat');
	writeln('Data Updated');

	writeln();
end;

procedure MenuMember();
var
	opt : char;
	exit : boolean;
label Prompt1;
begin
	exit := False;
	repeat
	clrscr;
	writeln('------ ## 8. MEMBER MANAGEMENT - Main Menu ## ------');
	writeln('====================================================');
	writeln('	1. View Member');
	writeln('	2. Create Member');
	writeln('	3. Delete Member');
	writeln('	4. Upgrade Member');
	writeln('	5. Edit Member Advantage');
	writeln('Press X to EXIT ');
	writeln('Pilih : ');
	Prompt1: opt := readkey;
	case opt of
		'1' : ViewMember();
		'2' : CreateMember();
		'3' : DeleteMember();
		'4' : UpgradeMember();
		'5' : MenuAdvantage();
		'x','X' : exit := True
	else
		Goto Prompt1;
	end;
	until (exit=true);
end;

end.
