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
    public partial class Vendas : Form
    {
        bool Achou = false;
        string connectionString;

        public Vendas()
        {
            InitializeComponent();
            string caminhoDoBd = Path.GetFullPath(Path.Combine(Directory.GetCurrentDirectory(), @"..\..\"));
            connectionString = @"Data Source = (LocalDB)\MSSQLLocalDB; AttachDbFilename ='" + caminhoDoBd + @"ProjetoMCT.mdf'; Integrated Security = True";

        }

        private void button1_Click(object sender, EventArgs e)
        {
            string consulta, sql, sqlestoque, sqlpedido, id_produto="", quantidade="";
            if (float.Parse(txtSaldo.Text) < float.Parse(txtValor.Text))
                MessageBox.Show("Cliente com saldo insuficiente!!!");
            else
            {
                SqlConnection conexao = new SqlConnection(connectionString);

                conexao.Open();
                if (Achou)
                {
                    float saldo = float.Parse(txtSaldo.Text) - float.Parse(txtValor.Text);
                    consulta = "UPDATE cliente SET saldo = " + saldo  + " where id_cli=" + txtCliente.Text;

                    SqlCommand command = new SqlCommand(consulta, conexao);

                    command.ExecuteNonQuery();
                    conexao.Close();

                    if (Achou == true)
                    {
                        SqlConnection conexao2 = new SqlConnection(connectionString);

                        conexao2.Open();

                        MessageBox.Show("Pedido realizado com sucesso!!!");

                        sql = "SELECT id_produto, quantidade FROM pedido_produto WHERE id_pedido =" + txtPedido.Text;
                        SqlCommand command2 = new SqlCommand(sql, conexao2);
                        SqlDataReader leitor = command2.ExecuteReader();

                        if (leitor.Read())
                        {
                            id_produto = leitor.GetValue(0).ToString();
                            quantidade = leitor.GetValue(1).ToString();
                        }

                        conexao2.Close();

                        SqlConnection conexao3 = new SqlConnection(connectionString);

                        conexao3.Open();

                        sqlestoque = "UPDATE produto SET estoque = (estoque - '"+quantidade+"') WHERE id_produto ='" +id_produto+ "';";
                        SqlCommand command9 = new SqlCommand(sqlestoque, conexao3);

                        command9.ExecuteNonQuery();
                        conexao3.Close();

                        SqlConnection conexao4 = new SqlConnection(connectionString);

                        conexao4.Open();
                        sqlpedido = "DELETE FROM pedido WHERE id_pedido = '" + txtPedido.Text + "';";
                        SqlCommand command8 = new SqlCommand(sqlpedido, conexao4);
                        command8.ExecuteNonQuery();
                        conexao4.Close();
                    }

                }

            }
        }

        private void txtPedido_Leave(object sender, EventArgs e)
        {
            SqlConnection conexao = new SqlConnection(connectionString);

            conexao.Open();

            string consulta = "SELECT p.data_hora, p.preco_total, p.id_cli, c.saldo FROM pedido p, cliente c WHERE p.id_cli=c.id_cli and p.id_pedido=" + txtPedido.Text;

            SqlCommand command = new SqlCommand(consulta, conexao);

            SqlDataReader leitor = command.ExecuteReader();

            if (leitor.Read())
            {
                Achou = true;
                txtData.Text = leitor.GetValue(0).ToString();
                txtValor.Text = leitor.GetValue(1).ToString();
                txtCliente.Text = leitor.GetValue(2).ToString();
                txtSaldo.Text = leitor.GetValue(3).ToString();
            }
            else Achou = false;

            conexao.Close();
        }
    }
}
