unit SortingPeminjaman;
interface
procedure SortingPinjam();

implementation
uses sysutils, crt;

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
	ArSewa : array[1..100] of Sewa;
	VarSewa : Sewa; //dbSewa.dat
	FileSewa : file of Sewa;
	TempSewa : Sewa;

procedure SortingPinjam();
	//GET Data from file
	//Repeat Insert to Array
	//Sorting based Kode / Nama
	//Tampilkan
var
	nData, i, j : integer;
	opt : char;
label
	PromptSort;
begin
	//GET Data from file
	//Repeat Insert to Array
	clrscr;
	assign(FileSewa, 'dbfile/dbDataSewa.dat');
	reset(FileSewa); i:=1;
	while not EOF(FileSewa) do
		begin
		read(FileSewa, TempSewa);
		ArSewa[i] := TempSewa;
		i := i + 1;
		end;
	//Menghitung Banyak Data 
	Reset(FileSewa);
	i:=0;
	while not EOF(FileSewa) do
		begin
		i := i + 1;
		read(FileSewa, TempSewa);
		end;
	close(FileSewa);
	nData := i;
	

	writeln('Urutkan Berdasarkan ??');
	writeln('	1. Kode Sewa');
	writeln('	2. Nama Peminjam');
	writeln('Pilih : ');

	PromptSort: opt := readkey;
	case opt of
	'1' : begin 
			//Sort syntax here KODE SEWA
			for i:=nData downto 2 do
				begin
				for j:=2 to i do
				begin
				if ArSewa[j-1].kode > ArSewa[j].kode then
					begin
						TempSewa := ArSewa[j-1];
						ArSewa[j-1] := ArSewa[j];
						ArSewa[j] := TempSewa;
					end; 
				end; 
			end;
		  end;
	
	'2' : begin 
			//Sort syntax here NAMA SEWA
			for i:=nData downto 2 do
				begin
				for j:=2 to i do
				begin
				if ArSewa[j-1].nama > ArSewa[j].nama then
					begin
						TempSewa := ArSewa[j-1];
						ArSewa[j-1] := ArSewa[j];
						ArSewa[j] := TempSewa;
					end; 
				end; 
			end;
		  end;
	else
		Goto PromptSort;
	end;

	// Tampilkan Hasil Sorting
	writeln('----- # Data Hasil Sorting # ------');
	i := 1;
	while (ArSewa[i].kode <> '') do
		begin
		writeln('Data ke : ',i);
		writeln('Kode Peminjaman    : ',ArSewa[i].kode);
		writeln('Nama               : ',ArSewa[i].nama);
		writeln('No.ID              : ',ArSewa[i].no_id);
		writeln('No. Telp           : ',ArSewa[i].no_telp);
		writeln('ID Member          : ',ArSewa[i].id_member);
		writeln('Total Barang       : ',ArSewa[i].total_barang);
		writeln('Tgl. Pinjam        : ',ArSewa[i].tgl_pjm);
		writeln('Tgl. Kembali       : ',ArSewa[i].tgl_kbl);
		writeln('Total Hari         : ',ArSewa[i].total_hari);
		writeln('Biaya Total        : ',ArSewa[i].total_bayar);
		i := i + 1;
		end;
	readln();
end;

end.


