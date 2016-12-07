unit MemberAdvantage;
interface
procedure MenuAdvantage();


implementation
uses crt;

type PlusMember = Record
	diskon : integer;
	bonus : string;
	end;
var 
	tmp_member: PlusMember;
	edit_member,pil : char;
	PremiumMember : file of PlusMember;
	GoldMember : file of PlusMember;
	SilverMember : file of PlusMember;

procedure MenuAdvantage();
begin
	writeln();
	writeln('--- # MEMBER MANAGEMENT - Menu Advantage # ---');
	writeln('==============================================');
	writeln('1. View Member Advantage');
	writeln('2. Edit Member Advantage');
	write('Input Pilihan : ');readln(pil);
	case pil of
	'1' : begin
			writeln;
			writeln('View Member Advantage');
			writeln('---------------------');
			writeln('1. Premium Member');
			Assign(PremiumMember,'dbfile/dbPremMbr.dat');
			reset(PremiumMember);
			read(PremiumMember,tmp_Member);
			writeln('Diskon : ',tmp_member.diskon, ' %');
			writeln('Bonus : ',tmp_member.bonus);
			writeln;
			close(PremiumMember);

			writeln('2. Gold Member');
			Assign(GoldMember,'dbfile/dbGoldMbr.dat');
			reset(GoldMember);
			read(GoldMember,tmp_Member);
			writeln('Diskon : ',tmp_member.diskon, ' %');
			writeln('Bonus : ',tmp_member.bonus);
			writeln;
			close(GoldMember);

			writeln('3. Silver Member');
			Assign(SilverMember,'dbfile/dbSilvMbr.dat');
			reset(SilverMember);
			read(SilverMember,tmp_Member);
			writeln('Diskon : ',tmp_member.diskon, ' %');
			writeln('Bonus : ',tmp_member.bonus);
			writeln;
			close(SilverMember);
		end;

	'2' : begin
			writeln;
			writeln('Edit Member Advantage');
			writeln('---------------------');
			writeln('1. Premium Member');
			writeln('2. Gold Member');
			writeln('3. Silver Member');
			write('Pilih Jenis Member yang akan di edit : ');readln(edit_member);
			case edit_member of
			'1' : begin
				Assign(PremiumMember,'dbfile/dbPremMbr.dat');
				rewrite(PremiumMember);
				write('Masukkan Diskon(%) (Update/Input): ');readln(tmp_member.diskon);
				write('Masukkan Bonus (Update/Input) : ');readln(tmp_member.bonus);
				write(PremiumMember,tmp_member);
				close(PremiumMember);
				  end;
			'2' : begin
				Assign(GoldMember,'dbfile/dbGoldMbr.dat');
				rewrite(GoldMember);
				write('Masukkan Diskon(%) (Update/Input): ');readln(tmp_member.diskon);
				write('Masukkan Bonus (Update/Input) : ');readln(tmp_member.bonus);
				write(GoldMember,tmp_member);
				close(GoldMember);
				  end;
			'3' : begin
				Assign(SilverMember,'dbfile/dbSilvMbr.dat');
				rewrite(SilverMember);
				write('Masukkan Diskon(%) (Update/Input): ');readln(tmp_member.diskon);
				write('Masukkan Bonus (Update/Input) : ');readln(tmp_member.bonus);
				write(SilverMember,tmp_member);
				close(SilverMember);
				  end;
				end;
			end;
			end;
readln();
end;

end.

