<?php
  include ("conectar-cliente.php");
  $valor_buscar = $_POST['busca-avancada-cliente'];
  $grupo = pesquisarClientesAvancado();
?>
<head>
	<style type="text/css">
		input[type=number]::-webkit-inner-spin-button { 
		    -webkit-appearance: none;
		    cursor:pointer;
		    display:block;
		    width:3px;
		    color: #333;
		    text-align:center;
		    position:relative;
		    
		}
		input[type=number] { 
		   -moz-appearance: textfield;
		   appearance: textfield;
		   margin: 0;
		}	
	</style>
	
</head>

<h1>Busca Avançada<br></h1>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-cliente.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="<?=$pessoa["nome"]?>" maxlength="20" size="15" /></td>
			</tr>
			<tr>
				<td>Dia do Nascimento:</td>
				<td>
					<select>
						<option></option> <option>1</option> <option>2</option> <option>3</option> <option>4</option>
						<option>5</option> <option>6</option> <option>7</option> <option>8</option> <option>9</option>
						<option>10</option> <option>11</option> <option>12</option> <option>13</option> <option>14</option>
						<option>15</option> <option>16</option> <option>17</option> <option>18</option> <option>19</option>
						<option>20</option> <option>21</option> <option>22</option> <option>23</option> <option>24</option>
						<option>25</option> <option>26</option> <option>27</option> <option>28</option> <option>29</option>
						<option>30</option> <option>31</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Mês do Nascimento:</td>
				<td>
					<select>
					   <option></option> <option>1</option> <option>2</option> <option>3</option> <option>4</option>
					   <option>5</option> <option>6</option> <option>7</option> <option>8</option> <option>9</option>
					   <option>10</option> <option>11</option> <option>12</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Ano do Nascimento:</td>
				<td><input type="number" min="1900" max="2030" name="ano-nasc" /></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" value="<?=$pessoa["telefone"]?>" maxlength="20" size="15"/></td>
			</tr>
			<tr>
				<td>Endereco:</td>
				<td><input type="text" name="endereco" value="<?=$pessoa["endereco"]?>" maxlength="20" size="15"/></td>
			</tr>

			<tr style="display: inline-block;">
				<td>
					<form action="resposta-busca-avancada.php" method="POST">
						<input type="hidden" name="acao" value="buscaavancada" />
						<input type="submit" value="Busca" />
					</form>
				</td>
				<td><input type="submit" action="../index.php" value="Cancelar" /></td>
			</tr>
		</tbody>
	</table>	
</form>