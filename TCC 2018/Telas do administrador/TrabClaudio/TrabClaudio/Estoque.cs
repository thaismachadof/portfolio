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
    public partial class Estoque : Form
    {
        string connectionString;
        public Estoque()
        {
            InitializeComponent();
            string caminhoDoBd = Path.GetFullPath(Path.Combine(Directory.GetCurrentDirectory(), @"..\..\"));
            connectionString = @"Data Source = (LocalDB)\MSSQLLocalDB; AttachDbFilename ='" + caminhoDoBd + @"ProjetoMCT.mdf'; Integrated Security = True";
        }

        private void Estoque_Load(object sender, EventArgs e)
        {
            SqlConnection conexao = new SqlConnection(connectionString);
            conexao.Open();

            //string consulta = "SELECT id_produto, nome, estoque, preco,  FROM produto";

            //SqlCommand command = new SqlCommand(consulta, conexao);

            //SqlDataReader leitor = command.ExecuteReader();

            //DataTable tabela = new DataTable();

            //tabela.Load(leitor);
            var dataAdapter = new SqlDataAdapter("SELECT id_produto, nome, descricao, tipo, fornecedor, estoque, preco, preco_custo FROM produto",conexao);
            var ds = new DataSet();
            dataAdapter.Fill(ds);

            dataGrid.DataSource = ds.Tables[0];

            conexao.Close();
        }

        private void buscar_Click(object sender, EventArgs e)
        {
            SqlConnection conexao2 = new SqlConnection(connectionString);
            conexao2.Open();

            string consulta = "DELETE FROM produto WHERE id_produto = '"+ CodProd.Text+"'";

            SqlCommand command = new SqlCommand(consulta, conexao2);

            SqlDataReader leitor = command.ExecuteReader();

            conexao2.Close();
        }
    }
}
