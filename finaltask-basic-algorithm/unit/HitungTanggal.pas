unit HitungTanggal;

interface
function SelisihTanggal(tgl1, tgl2 : string):integer;


implementation
Uses sysutils,crt;

// Date();
// StrToDate();
// FloatToStr();
// StrToInt();

function SelisihTanggal(tgl1, tgl2 : string):integer;
{I.S : Ada dua buah tanggal inputan dari paramter (TGL1 dan TGL2)}
{F.S : Mengeluarkan Selisih dari TGL2 - TGL1}
	var
		temp : real;
		str_selisih : string;
		n : integer;
	begin
		temp := strtodate(tgl2)-strtodate(tgl1);
		str_selisih := FloatToStr(temp);
		SelisihTanggal := StrToInt(str_selisih);
	end;

end.