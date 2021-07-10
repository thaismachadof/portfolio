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
    public partial class Fornecedor : Form
    {
        string connectionString;

        public Fornecedor()
        {
            InitializeComponent();
            string caminhoDoBd = Path.GetFullPath(Path.Combine(Directory.GetCurrentDirectory(), @"..\..\"));
            connectionString = @"Data Source = (LocalDB)\MSSQLLocalDB; AttachDbFilename ='" + caminhoDoBd + @"ProjetoMCT.mdf'; Integrated Security = True";
        }

        private void Fornecedor_Load(object sender, EventArgs e)
        {
            SqlConnection conexao = new SqlConnection(connectionString);
            conexao.Open();

            string consulta = "SELECT id_fornec, nome_empresa, telefone, email, preco_de_custo FROM fornecedor";

            SqlCommand command = new SqlCommand(consulta, conexao);

            SqlDataReader leitor = command.ExecuteReader();

            DataTable tabela = new DataTable();

            tabela.Load(leitor);

            dataGrid.DataSource = tabela;
   
            conexao.Close();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection conexao2 = new SqlConnection(connectionString);
            conexao2.Open();

            string consulta = "DELETE FROM fornecedor WHERE id_fornec = '" + CodFornec.Text + "'";

            SqlCommand command = new SqlCommand(consulta, conexao2);

            SqlDataReader leitor = command.ExecuteReader();

            conexao2.Close();
        }

        private void dataGrid_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
}
