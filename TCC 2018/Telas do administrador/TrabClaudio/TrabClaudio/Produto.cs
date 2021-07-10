using System;
using System.Windows.Forms;
using System.Data.SqlClient;
using System.IO;

namespace TrabClaudio
{
    public partial class Produto : Form
    {
        string connectionString;
        public bool Achou;

        public Produto()
        {
            InitializeComponent();

            string caminhoDoBd = Path.GetFullPath(Path.Combine(Directory.GetCurrentDirectory(), @"..\..\"));
            connectionString = @"Data Source = (LocalDB)\MSSQLLocalDB; AttachDbFilename ='" + caminhoDoBd + @"ProjetoMCT.mdf'; Integrated Security = True";
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string consulta;
            string cod = this.codProd.Text;
            string nome = this.nome.Text;
            string quantidade = this.quantidade.Text;
            string preco = this.preco.Text;
            string tipo = this.tipo.Text;
            string descricao = this.descricao.Text;
            string precoCusto = this.precoCusto.Text;
            string[] p_fornec = comboForn.Text.Split('-');
            

            SqlConnection conexao = new SqlConnection(connectionString);

            conexao.Open();
            if (Achou)
            {
                consulta = "UPDATE produto SET nome = '" + nome + "', tipo = '" + tipo + "', descricao = '" + descricao +
                "', preco = " + preco + ", estoque = " + quantidade + 
                ", fornecedor=" + p_fornec[0] + ", preco_custo=" + precoCusto + " where id_produto='" + codProd.Text + "'";

            }
            else
            {
                consulta = "INSERT INTO produto(id_produto, nome, tipo, descricao, preco, estoque, preco_custo, fornecedor) " +
                    "VALUES ('" + cod + "', '" + nome + "', '" + tipo + "','" + descricao + "'," + preco + "," + quantidade + "," + precoCusto + "," + p_fornec[0] + ")";
            }
            SqlCommand command = new SqlCommand(consulta, conexao);

            command.ExecuteNonQuery();

            conexao.Close();

            if (Achou == true)
                MessageBox.Show("Atualizado com sucesso");
            else
                MessageBox.Show("Inserido com sucesso");


            //Limpar campos
            codProd.Clear();
            this.nome.Clear();
            this.tipo.Text = "";
            comboForn.Text = "";
            this.quantidade.Text = "";
            this.precoCusto.Clear();
            this.preco.Clear();
            this.descricao.Clear();
        }

        private void listBox1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            /*SqlConnection conexao = new SqlConnection(connectionString);

            conexao.Open();

            string[] p_fornec = comboForn.Text.Split('-');

            string consulta = "UPDATE produto SET nome = '" + nome + "', tipo = '" + tipo + "', descricao = '" + descricao + 
                "', preco = '" + preco + "', estoque = '" + quantidade + "' nome = '" + nome.Text +
                "' fornecedor=" + p_fornec[0] + ", preco_custo=" + precoCusto+" where id_produto='"+codProd.Text+"'" ;

            SqlCommand command = new SqlCommand(consulta, conexao);

            command.ExecuteNonQuery();


            conexao.Close();*/
        }

        private void Produto_Load(object sender, EventArgs e)
        {
            SqlConnection conexao = new SqlConnection(connectionString);

            conexao.Open();

            string consulta = "select * from fornecedor";

            SqlCommand command = new SqlCommand(consulta, conexao);

           SqlDataReader leitor =  command.ExecuteReader();
            comboForn.Items.Clear();
            while (leitor.Read())
            {
                comboForn.Items.Add(leitor.GetValue(0).ToString()+"-"+leitor.GetString(3));
            }

            conexao.Close();
                       
        }

        private void codProd_Leave(object sender, EventArgs e)
        {           
            SqlConnection conexao = new SqlConnection(connectionString);

            conexao.Open();

            string consulta = "SELECT nome, tipo, descricao, preco, estoque, preco_custo, fornecedor FROM produto WHERE id_produto='" + codProd.Text + "'";

            SqlCommand command = new SqlCommand(consulta, conexao);

            SqlDataReader leitor = command.ExecuteReader();

            if (leitor.Read())
            {
                Achou = true;
                nome.Text = leitor.GetString(0);
                tipo.Text = leitor.GetString(1);
                descricao.Text = leitor.GetString(2);
                preco.Text = leitor.GetValue(3).ToString();
                quantidade.Text = leitor.GetValue(4).ToString();
                precoCusto.Text = leitor.GetValue(5).ToString();
                comboForn.Text = leitor.GetValue(6).ToString();

            }
            else Achou = false;

            conexao.Close();
           
        }
    }
    }
