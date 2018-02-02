#include <bits/stdc++.h>
#include <map>

using namespace std;

map<string, string> month_to_number;

void clientes(){
	string name, country;
	int day, year, n;
	string month;
	while(getline(cin, name, ','), name[0] != '\n' && name != ""){		
		cin >> day >> month >> year >> country;
		cin.ignore();
		cout << "INSERT INTO usuarios VALUES ();" << endl;
		cout << "INSERT INTO clientes VALUES ('" << name << "', '" << country << "', '" << year << "-" << month_to_number[month] << "-" << day << "', LAST_INSERT_ID());" << endl;
	}
	cout << "INSERT INTO usuarios VALUES ();" << endl;
	cout << "INSERT INTO clientes VALUES ('Keylor Navas', 'Costa Rica', '1986-12-15', LAST_INSERT_ID())";
}

int main(){

	month_to_number["January"] = "01";
	month_to_number["February"] = "02";
	month_to_number["March"] = "03";
	month_to_number["April"] = "04";
	month_to_number["May"] = "05";
	month_to_number["June"] = "06";
	month_to_number["July"] = "07";
	month_to_number["August"] = "08";
	month_to_number["September"] = "09";
	month_to_number["October"] = "10"; 
	month_to_number["November"] = "11";
	month_to_number["December"] = "12";

	clientes();
return 0;
}
