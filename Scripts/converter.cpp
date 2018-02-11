#include <bits/stdc++.h>
#include <map>

using namespace std;

map<string, string> month_to_number, month_english;

string string_format(string str){
	int found = str.find_last_of(' ');
	string s = str.substr(found + 1);
	
	s[0] = tolower(s[0]);
	
	return s;
}

void clientes(){
	string name, country, user;
	int day, year, n;
	string month;
	int found;
	while(getline(cin, name, ','), name[0] != '\n' && name != ""){		
		cin >> day >> month >> year;
		cin.ignore();
		getline(cin, country, '\n');
		user = string_format(name);
		cout << "INSERT INTO usuarios(username, senha, tipo) VALUES ('" << user << "', '123', 1);" << endl;
		cout << "INSERT INTO clientes VALUES ('" << name << "', '" << country << "', '" << year << "-" << month_to_number[month] << "-" << day 		<< "', LAST_INSERT_ID());" << endl;
	}
}

void anunciantes(){
	string nome, cnpj, servico, homepage, telefone;
	int n = 1;
	while(getline(cin, nome, ','), nome[0] != '\n' && nome != ""){
		cin >> cnpj >> servico >> homepage >> telefone;
		cin.ignore();
		cout << "INSERT INTO usuarios(username, senha, tipo) VALUES ('emp" << n++ << "', '123', 2);" << endl;
		cout << "INSERT INTO anunciantes VALUES (";
		cout << "'" << nome << "'";
		cout << ", '" << cnpj << "'";
		cout << ", '" << servico << "'";
		cout << ", '" << homepage << "'";
		cout << ", '" << telefone << "'";
		cout << ", LAST_INSERT_ID());" << endl;
	}
}

void comentarios_pontos_turisticos(int comentario_id, int qnt_pontos, int qnt_usuarios){
	int n = qnt_pontos * qnt_usuarios * 0.75;
	vector<string> opcao = {"Nice", "Like it", "Crap", "Hate it", "#amazing", "#boring"};
	//set<tuple<int, int, int>> com_ponto; //comentario_id, usuario_id, ponto_turistico_id;
	vector<vector<int>> com_ponto(qnt_usuarios+1, vector<int>(qnt_pontos+1, 0));
	vector<string> comentarios;
	int u, p;
	while(comentarios.size() < n){
		u = rand() % qnt_usuarios + 1;
		p = rand() % qnt_pontos + 1;
		if(com_ponto[u][p] == 0){
			com_ponto[u][p] = comentario_id++;
			comentarios.push_back(opcao[rand()%opcao.size()]);
		}
	}
	cout << "INSERT INTO comentarios(texto) VALUES" << endl;
	for(int i = 0 ; i < comentarios.size() ; i++){
		cout << "('" << comentarios[i] << "')";
		if(i == comentarios.size() - 1)
			cout << ";" << endl;
		else 
			cout << "," << endl;	
	}
	
	cout << endl;
	cout << "INSERT INTO comentarios_pturistico VALUES" << endl;
	for(u = 1 ; u <= qnt_usuarios ; u++)
		for(p = 1 ; p <= qnt_pontos ; p++)
			if(com_ponto[u][p] > 0){
				cout << "(" << com_ponto[u][p] << "," << u << "," << p << ")";
				if(u == qnt_usuarios && p == qnt_pontos)
					cout << ";" << endl;
				else
					cout << "," << endl;
			}
}
	
int main(int ac, char * av[]){
	
	srand(time(NULL));
	
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

	month_english["Janeiro"] = "January";
	month_english["Fevereiro"] = "February";
	month_english["Março"] = "March";
	month_english["Abril"] = "April";
	month_english["Maio"] = "May";
	month_english["Junho"] = "June";
	month_english["Julho"] = "July";
	month_english["Agosto"] = "August";
	month_english["Setembro"] = "September";
	month_english["Outubro"] = "October"; 
	month_english["Novembro"] = "November";
	month_english["Dezembro"] = "December";
	
	if(ac == 2 || 5) {
		string arg = av[1];
		if(arg == "clientes") {
			clientes();
		} else if(arg == "anunciantes") {
			anunciantes();
		} else if(arg == "comentarios_pturistico") {
			comentarios_pontos_turisticos(atoi(av[2]), atoi(av[3]), atoi(av[4]));
		} else {
			cerr << "conjunto de parametros incompativel: " << av[1] << endl;
			return 1;
		}
	} else if(ac > 5) {
		cerr << "parametros demais" << endl;
		return 1;
	} else {
		cerr << "é necessario um parametro: ";
		cerr << "<clientes> | <anunciantes> | <comentarios_pturistico, next_comentario_id, qnt_pontos, qnt_usuarios>" << endl;
		return 1;
	}

	return 0;
}
