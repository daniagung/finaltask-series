unit InputPeminjaman;

interface
procedure InputDataPinjam();

implementation
uses PaketManagement, HitungTanggal, MemberManagement, crt, sysutils, SoundSystemManagement;

type Sewa = Record
	kode : string;
	nama : string;
	no_id : string;
	no_telp : string;
	id_member : string;
	pinjam_data : array[1..20] of string;
	total_barang : integer;
	tgl_pjm : string; 
	tgl_kbl : string;
	total_hari : integer;
	total_bayar : int64;
	end;

type PaketSound = Record
	kode : string;
	paket : String;
	harga : int64;
	end;

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

type SoundSystem = Record
	kode : string;
	merk_tipe : String;
	harga : int64;
end;

var
	VarSewa : Sewa; //dbSewa.dat
	FileSewa : file of Sewa;
	TempSewa : Sewa;
	OptMember : Char;

	VarPaketSound : PaketSound; //dbPaket.dat
	file_paket : file of PaketSound;
	temp_paket : PaketSound;

	VarSound : SoundSystem; //dbPaket.dat
	FileSound : file of SoundSystem;
	fdel_sound : file of SoundSystem;
	TempSound : SoundSystem;
	DirFile : string;

	varMember : Member; //dbDataMember.dat
	file_Member : file of Member;
	temp_Member : Member;

	file_Plus : file of PlusMember;
	varPlus : PlusMember;
	temp_Plus : PlusMember;
	
	TotalSewaHari : int64;

function GetDiskonBonus(str_id : string):PlusMember; // Dipergunakan di InputPeminjaman.pas
var
	var_return : PlusMember;
begin
	assign(file_Member,'dbfile/dbMember.dat');
	reset(file_Member);
	while not EOF(file_Member) do
	begin
		read(file_Member,varMember);
		if varMember.id = str_id then
			var_return := varMember.adv;
	end;
	close(file_Member);
	GetDiskonBonus := var_return;
end;

function CekMember(str_id : string):boolean; // Dipergunakan di InputPeminjaman.pas
var
	return_var : boolean;
begin
	return_var := false;
	assign(file_Member,'dbfile/dbMember.dat');
	reset(file_Member);
	while not EOF(file_Member) do
	begin
		read(file_Member,varMember);
		if varMember.id = str_id then
			return_var := True;
	end;
	close(file_Member);
	CekMember := return_var;
end;

function CekPaket(kode_paket : string):boolean;
var
	return_var : boolean;
begin
	return_var := false;
	assign(file_paket,'dbfile/dbPaket.dat');
	reset(file_paket);
	while not EOF(file_paket) do
	begin
		read(file_paket,VarPaketSound);
		if (VarPaketSound.kode = kode_paket) then
			return_var := True;
	end;
	close(file_paket);
	CekPaket := return_var;
end;

procedure InputDataPinjam();
var
	opt,opt1,opt2,opt3 : char;
	Select_Paket : string;
	cek_idmember : string;
	DataPlus : PlusMember;
	name_sound : string;
	i : integer;
	soundPjm : string;
	findSound : boolean;
label PromptService, PromptMember, PromptOptMember, PromptPaket, PromptTipeSound, PromptGantiSound,
		PromptSoundLagi, PromptSoundGantiTipe, PromptPinjamLagiTipeSama, PromptPinjamSelesai;
begin
	clrscr;
	//Input Basic Data
	writeln('--------- # 2. INPUT PEMINJAMAN SOUND SYSTEM # ---------');
	writeln('========================================================');
	write('Kode Peminjaman : '); readln(VarSewa.kode);
	write('Nama Peminjam : '); readln(VarSewa.nama);
	write('ID Peminjam (KTP/SIM) : '); readln(VarSewa.no_id);
	write('No Telp : '); readln(VarSewa.no_telp);

	//Member Prompt Input
	PromptMember:
	writeln('Member Atau Bukan ?? (Y/N): '); 
	PromptOptMember: OptMember := readkey;
	case OptMember of
		'Y','y' : begin
					write('Masukin ID : '); readln(cek_idmember);
					if CekMember(cek_idmember) then
						begin
						DataPlus := GetDiskonBonus(cek_idmember); //Variable Member Benfit!!
						writeln('ID Member Found');
						VarSewa.id_member := cek_idmember;
						writeln();
						end
					else
						begin
						writeln('ID Member not Found');
						writeln();
						Goto PromptMember;
						end;
				  end;
		'N','n' : VarSewa.id_member := '-';
	else
		GoTo PromptOptMember;
	end;

	//Input Service Peminjaman!!
	writeln('Service Peminjaman');
	writeln('	1. Paket Peminjaman');
	writeln('	2. Pinjam Satuan');
	writeln('Option Service : '); 
	PromptService: opt := readkey;
	case opt of
	'1' : begin
		// BLOK PROGRAM PINJAM SOUND PAKET
		//  ---------------------------------------------
		 	ViewPaket();
		 	PromptPaket:
		 	write('Masukan Kode Paket yang akan dipinjam : '); readln(Select_Paket);
		 	if CekPaket(Select_Paket) then
		 		begin
			 	assign(file_paket,'dbfile/dbPaket.dat');
				reset(file_paket);
				while not EOF(file_paket) do
					begin
						read(file_paket, VarPaketSound);
						if (VarPaketSound.Kode = Select_Paket) then
							begin
							VarSewa.pinjam_data[1] := VarPaketSound.paket;
							VarSewa.total_bayar := VarPaketSound.harga;
							end;
					end;
				close(file_paket);
				end
			else
				begin
					writeln('Paket tidak ditemukan!!');
					writeln();
					Goto PromptPaket;
				end;
			VarSewa.total_barang := 1;
			write('Tanggal Pinjam (Format : 31-2-2015) : '); readln(VarSewa.tgl_pjm); 
			VarSewa.tgl_kbl := 'Sehabis Acara'; // Tanggal Kembalian diisi dengan String Sehabis Acara
			VarSewa.total_hari := 1;
			writeln('Input Peminjaman Selesai')
		  end;

	'2' : begin 
		// BLOK PROGRAM PINJAM SOUND SYSTEM SATUAN
		// ---------------------------------------------
		  	i := 0; //Counter Buat Isi Sound
		  	PromptGantiSound:
		  	clrscr;
			writeln('Pilih Tipe SoundSystem yang akan dipinjam');
			writeln('	1. Sound Small');
			writeln('	2. Sound Medium');
			writeln('	3. Sound Large');
			write('Pilihan : ');
			PromptTipeSound: opt1 := readkey;
			writeln();
			case opt1 of
			'1' : begin DirFile := 'dbfile/dbSoundSmall.dat'; name_sound := 'Small'; end;
			'2' : begin DirFile := 'dbfile/dbSoundMedium.dat'; name_sound := 'Medium'; end;
			'3' : begin DirFile := 'dbfile/dbSoundLarge.dat'; name_sound := 'Large'; end;
			else
				Goto PromptTipeSound;
			end;

			
			ViewSound(DirFile);
			PromptPinjamLagiTipeSama:
			writeln();
			write('Masukan Kode Sound yang akan dipinjam : '); readln(soundPjm);
			Assign(FileSound,DirFile);
			Reset(FileSound);
			findSound := False;
			while (not EOF(FileSound)) do
			begin
				read(FileSound,VarSound);
				if (VarSound.kode = soundPjm) then
					findSound := True;
					break;
			end;
			
			if findSound then
				begin
					i := i + 1;
					VarSewa.pinjam_data[i] := VarSound.merk_tipe; 
					VarSewa.total_bayar := VarSewa.total_bayar + VarSound.harga;
					VarSewa.total_barang := VarSewa.total_barang + 1;
					writeln('Sound Berhasil di Pinjam');
				end
			else
				writeln('SoundSystem Tidak ditemukan ');
			
			writeln('Ingin Meminjam SoundSystem Lagi (Y/N)');
			PromptSoundLagi: opt2 := readkey;
			case opt2 of
			'N' : GoTo PromptPinjamSelesai;
			'Y' : begin
					writeln('Ingin Ganti Tipe Sound (Y/N)');
					PromptSoundGantiTipe: opt3 := readkey;
					case opt3 of
					'N' : Goto PromptPinjamLagiTipeSama;
					'Y' : begin Goto PromptGantiSound; close(FileSound); end;
					else
						Goto PromptSoundGantiTipe;
					end;
				  end;
			else
				Goto PromptSoundLagi;
			end;



		PromptPinjamSelesai:
		
		write('Tanggal Pinjam (Format : 31-2-2015) : '); readln(VarSewa.tgl_pjm); 
		write('Tanggal Kembali (Format : 31-2-2015) : '); readln(VarSewa.tgl_kbl);
		VarSewa.total_hari := SelisihTanggal(VarSewa.tgl_kbl, VarSewa.tgl_pjm);
		writeln('Peminjaman Sound Selesai');
		close(FileSound);
		end;
	else
		Goto PromptService;
	end; // End Case of Main
	
	readln();
	writeln();
	// STRUK PEMINJAMAN
	writeln('------------ STRUK PEMINJAMAN ------------');
	writeln('Kode Peminjaman        : ', VarSewa.kode);
	writeln('Nama Peminjam          : ', VarSewa.nama);
	writeln('ID Peminjam (KTP/SIM)  : ', VarSewa.no_id);
	writeln('No Telepon             : ', VarSewa.no_telp);
	writeln('ID Member              : ', VarSewa.id_member);
	writeln('Tanggal Pinjam         : ', VarSewa.tgl_pjm);
	writeln('Tanggal Kembali        : ', VarSewa.tgl_kbl);
	writeln('Total Hari Pinjam      : ', VarSewa.total_hari, ' Hari');
	writeln('Total Barang           : ', VarSewa.total_barang);
	write('Barang yang dipinjam   : '); i:=1;
		while (VarSewa.pinjam_data[i] <> '') do
			begin
				write(VarSewa.pinjam_data[i]);
				write(', ');
				i := i + 1;
			end;
	writeln();
	writeln();
	writeln('TOTAL BIAYA            : ', VarSewa.total_bayar);
	writeln('-------------------------------------------');

	//Insert to dbDataSewa.dat
	Assign(FileSewa,'dbfile/dbDataSewa.dat');
	//rewrite(FileSewa); //Disable this After Creating Files
	reset(FileSewa);
	while not EOF(FileSewa) do
		begin
		read(FileSewa, TempSewa);
		end;
	write(FileSewa,VarSewa);
	close(FileSewa);
	
	readln();

	if VarSewa.id_member <> '-' then
		begin
		writeln('Wow KEJUATAN Karena Anda Member selamat anda mendapatkan : ');
		writeln('Diskon : ', DataPlus.diskon, ' %');
		writeln('BONUS : ', DataPlus.bonus);
		readln();
		end;

end;

end.
