unit ViewPeminjaman;

interface
procedure ViewPeminjam();

implementation
uses SortingPeminjaman, crt;

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
var
	VarSewa : Sewa; //dbSewa.dat
	FileSewa : file of Sewa;
	TempSewa : Sewa;
	OptMember : Char;

procedure ViewPeminjam();

var
	opt : char;
label Prompt2;
begin
	assign(FileSewa,'dbfile/dbDataSewa.dat');
	reset(FileSewa);
	// writeln();
	// writeln('========================================================= DATA PEMINJAM YANG TERSEDIA ============================================================');
	// writeln('      KODE      ||        NAMA        ||      NO.ID 	 ||		NO.TELP 	||		ID MEMBER 	   ||	BARANG YANG DI PINJAM 	||		TGL.PINJAM 		||		TGL.KEMBALI 	||		TOTAL HARI 		|| 		TOTAL BIAYA		||	   ');
	writeln('                       VIEW PEMINJAMAN SOUND SYSTEM                     ');
	writeln('------------------------------------------------------------------------');
	while not EOF(FileSewa) do
		begin
		read(FileSewa,VarSewa);
		writeln();
		writeln('  Kode Peminjaman    : ',VarSewa.kode);
		writeln('  Nama               : ',VarSewa.nama);
		writeln('  No.ID              : ',VarSewa.no_id);
		writeln('  No. Telp           : ',VarSewa.no_telp);
		writeln('  ID Member          : ',VarSewa.id_member);
		//writeln('Barang yang di pinjam 	: ',VarSewa.pinjam_data);
		writeln('  Total Barang       : ',VarSewa.total_barang);
		writeln('  Tgl. Pinjam        : ',VarSewa.tgl_pjm);
		writeln('  Tgl. Kembali       : ',VarSewa.tgl_kbl);
		writeln('  Total Hari         : ',VarSewa.total_hari);
		writeln('  Biaya Total        : ',VarSewa.total_bayar);
		writeln;
		end;
	close(FileSewa);
	write('Apakah Anda ingin mengurutkan Data ? (Y/N) : ');
	Prompt2: opt := readkey;
	case opt of
		'Y', 'y' : begin SortingPinjam(); end;
		'N', 'n' : begin end; //Skip this Case
	else
		Goto Prompt2;
	end;

end;

end.