unit SearchPeminjaman;
interface
procedure SearchPinjam();

implementation	//dbfile/dbSewa.dat
uses crt,sysutils;
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

procedure SearchPinjam();
var
	cari : string;
	find : boolean;
begin
	assign(FileSewa,'dbfile/dbDataSewa.dat');
	reset(FileSewa);
	find := False;
	writeln(); writeln();
	write('Masukan Nama yang akan dicari : '); readln(Cari);
	while not EOF(FileSewa) do
	begin
		read(FileSewa, VarSewa);
		if (cari = VarSewa.nama) then
			begin
				find := True;
				break;
			end;
	end;
	close(FileSewa);
	
	if find then
		begin
		writeln('Data Ditemukan !!');
		writeln();
		writeln('Kode Peminjaman 		: ',VarSewa.kode);
		writeln('Nama 					: ',VarSewa.nama);
		writeln('No.ID 					: ',VarSewa.no_id);
		writeln('No. Telp 				: ',VarSewa.no_telp);
		writeln('ID Member 				: ',VarSewa.id_member);
		//writeln('Barang yang di pinjam 	: ',VarSewa.pinjam_data);
		writeln('Total Barang 			: ',VarSewa.total_barang);
		writeln('Tgl. Pinjam 			: ',VarSewa.tgl_pjm);
		writeln('Tgl. Kembali 			: ',VarSewa.tgl_kbl);
		writeln('Total Hari 			: ',VarSewa.total_hari);
		writeln('Biaya Total 			: ',VarSewa.total_bayar);
		writeln;
		end
	else
		writeln('Data Tidak Ditemukan');

	// Tampilkan Data;


	readln();
end;


end.