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
    public partial class login : Form
    {
        string palavra;
        string connectionString;

        public login()
        {
            InitializeComponent();
            string caminhoDoBd = Path.GetFullPath(Path.Combine(Directory.GetCurrentDirectory(), @"..\..\")); 
            connectionString = @"Data Source = (LocalDB)\MSSQLLocalDB; AttachDbFilename ='" + caminhoDoBd + @"ProjetoMCT.mdf'; Integrated Security = True";


        }

        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection connection = new SqlConnection(connectionString);

            //try
            //{
                //verificando se ha existente
                connection.Open();
                string query2 = "SELECT nome, senha FROM funcionario WHERE nome = '" + textBox2.Text + "' AND senha= '" + textBox3.Text+"'";
                SqlCommand command2 = new SqlCommand(query2, connection);
                SqlDataReader reader2;

                reader2 = command2.ExecuteReader();
                if (reader2.Read())
                {
                    if (textBox2.Text == "" + reader2[0] + "" && textBox3.Text == "" + reader2[1] + "")
                    {
                 
                        Menu v1 = new Menu();
                        v1.ShowDialog(); // mostra formulário na tela e bloqueia formulários  que estiverem atras
                        palavra = "" + reader2[0] + "";
      
                    }
                    else
                    {
                        MessageBox.Show("usuario ou senha incorreta");
                    }


                }
                else
                {
                    MessageBox.Show("usuario ou senha incorreta");
                }
            //}
            /*catch
            {
                MessageBox.Show("erro");
            } */

            connection.Close();

        }

        private void button2_Click(object sender, EventArgs e)
        {
            SqlConnection conexao = new SqlConnection(connectionString);
            conexao.Open();

            string usuario = textBox2.Text;
            string senha = textBox3.Text;

            string consulta = "SELECT admin FROM funcionario WHERE nome = '" + usuario + "' AND senha = '" + senha + "'";

            SqlCommand command = new SqlCommand(consulta, conexao);

            SqlDataReader leitor = command.ExecuteReader();

            if(leitor.Read())
            {
                if(Convert.ToBoolean(leitor[0]) == true)
                {
                    CadastroFuncionario telaDeFuncioanrio = new CadastroFuncionario();
                    telaDeFuncioanrio.ShowDialog();
                }
                else
                {
                    MessageBox.Show("Usuário não tem privilégio de administrador");
                }
            }
            else
            {
                MessageBox.Show("Usuario ou senha inválida...");
            }

            conexao.Close();
        }
    }
}
