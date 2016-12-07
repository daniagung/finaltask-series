unit DeletePeminjaman;

interface
procedure DeletePeminjam();

implementation
uses ViewPeminjaman, Sysutils, crt, HitungTanggal;

procedure DeletePeminjam();
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
	varSewa : Sewa; //dbSewa.dat
	fileSewa : file of Sewa;
	fdel_sewa : file of Sewa;
	tempSewa : Sewa;
	optMember : Char;
	str_del : string;
	FoundDel : boolean;
	totDenda : double;
	tglReturn : string;
	slsHari : integer;


begin
	ViewPeminjam();
	assign(FileSewa, 'dbfile/dbDataSewa.dat');
	assign(fdel_sewa, 'dbfile/Del_dbDataSewa.dat');
	reset(FileSewa);
	rewrite(fdel_sewa);
	writeln();
	writeln('Kode Peminjam yang Akan Di Delete : '); readln(str_del);
	// G
	// FoundDel := False;
	// while not EOF(FileSewa) do
	// begin
	// 	read(FileSewa, VarSewa);
	// 	if (VarSewa.kode = str_del) then
	// 		begin
	// 		break;
	// 		FoundDel := True;
	// 		end;
	// end;

	// // VarSewa.tgl_kbl
	// if foundDel then
	// 	begin
	// 		writeln('Tanggal Perjanjian :', varSewa.tgl_kbl);
	// 		write('Masukan Tanggal Kembali Barang (2-2-2014): '); readln(tglReturn);
	// 		if (tglReturn = VarSewa.tgl_kbl) or (VarSewa.tgl_kbl = 'Sehabis Acara') then
	// 			writeln('Barang dikembalikan Tepat Waktu')
	// 		else
	// 			begin
	// 				//tgl return - tgl kembali
	// 				//denda 20% dari total harga
	// 				// total denda = (harga pinjam * 20) * perhari.
	// 				//function SelisihTanggal(tgl_pjm, tgl_kembali : string):integer;
	// 				slsHari := SelisihTanggal(tglReturn, VarSewa.tgl_kbl);
	// 				totDenda := slsHari * 0.2 * VarSewa.total_bayar;
	// 				writeln('Total Denda : ', totDenda:0:0);
	// 			end;
	// 	end
	// else
	// 	writeln('Gak Ada Datanya Tjuy');



	// Delete 
	while not EOF(FileSewa) do
	begin
		read(FileSewa, VarSewa);
		if (VarSewa.kode <> str_del) then
			write(fdel_sewa, VarSewa);
	end;
	close(FileSewa);
	close(fdel_sewa);
	DeleteFile('dbfile/dbDataSewa.dat');
	RenameFile('dbfile/Del_dbDataSewa.dat','dbfile/dbDataSewa.dat');
	writeln('Data Berhasil di Hapus');
	writeln();

end;

end.
