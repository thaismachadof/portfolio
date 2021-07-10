using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;
using System.IO;

namespace TrabClaudio
{
    public partial class CadastroFuncionario : Form
    {
        string connectionString;
        bool Achou = false;

        public CadastroFuncionario()
        {
            InitializeComponent();
            string caminhoDoBd = Path.GetFullPath(Path.Combine(Directory.GetCurrentDirectory(), @"..\..\"));
            connectionString = @"Data Source = (LocalDB)\MSSQLLocalDB; AttachDbFilename ='" + caminhoDoBd + @"ProjetoMCT.mdf'; Integrated Security = True";
        }

        private void btnCadastrar_Click(object sender, EventArgs e)
        {
            SqlConnection conexao = new SqlConnection(connectionString);
            conexao.Open();

            string cpf = txtCPF.Text;
            string nome = txtNome.Text;
            string senha = txtSenha.Text;
            string salario = txtSalario.Text;
            string admin;

            string consulta = "";
            if (chkAdmin.Checked)
                admin = "1";
            else
                admin = "0";


            if (Achou == true)
            {
                consulta = "UPDATE funcionario SET nome= '" + nome + "', senha='" + senha + "' , salario= " + salario + ", admin=" + admin;
            }
            else
            { 
                consulta = "INSERT INTO funcionario VALUES(" + cpf + ",'" + nome + "'," + senha + "," + salario + "," + admin + ")";
            }
            SqlCommand command = new SqlCommand(consulta, conexao);

            int linhasAfetadas = command.ExecuteNonQuery();

            conexao.Close();
            if (Achou==true)
                MessageBox.Show("Atualizado com sucesso");
            else            
                MessageBox.Show("Inserido com sucesso");

            //Limpando Formulario
            txtCPF.Clear();
            txtNome.Clear();
            txtSalario.Clear();
            txtSenha.Clear();
            chkAdmin.Checked = false;

        }

        private void txtCPF_Leave(object sender, EventArgs e)
        {
            bool adm = false;
            SqlConnection conexao = new SqlConnection(connectionString);

            conexao.Open();

            string consulta = "SELECT  nome, senha, salario, admin FROM funcionario WHERE Id_funcionario=" + txtCPF.Text;

            SqlCommand command = new SqlCommand(consulta, conexao);

            SqlDataReader leitor = command.ExecuteReader();

            if (leitor.Read())
            {
                Achou = true;
                txtNome.Text = leitor.GetString(0);
                txtSenha.Text = leitor.GetValue(1).ToString();
                txtSalario.Text = leitor.GetDouble(2).ToString();
         
                chkAdmin.Checked = leitor.GetBoolean(3);

            }
            else Achou = false;

            conexao.Close();
        }
    }
}
