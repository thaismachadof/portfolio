using System;
using System.Data.SqlClient;
using System.IO;
using System.Windows.Forms;

namespace TrabClaudio
{
    public partial class Contato : Form
    {
        bool Achou=false;
        string connectionString;
        public Contato()
        {
            InitializeComponent();
            string caminhoDoBd = Path.GetFullPath(Path.Combine(Directory.GetCurrentDirectory(), @"..\..\"));
            connectionString = @"Data Source = (LocalDB)\MSSQLLocalDB; AttachDbFilename ='" + caminhoDoBd + @"ProjetoMCT.mdf'; Integrated Security = True";

        }
        
        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            if (id.Text == "")
            {
                nome.Text = "";
                
                //
                button1.Visible = true;
            }
            //
            SqlConnection connection = new SqlConnection(connectionString);
            connection.Open();
            string query2 = "SELECT * FROM area WHERE codigo = '" + id.Text + "'";
            SqlCommand command2 = new SqlCommand(query2, connection);
            SqlDataReader reader2;
            try
            {
                reader2 = command2.ExecuteReader();
                if (reader2.Read())
                {
                    nome.Text = reader2[1].ToString();
                    button1.Visible = false;
             
                }
                
            }
            catch
            {
                
            }
           connection.Close();
            
        }
        

        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection conexao = new SqlConnection(connectionString);
            conexao.Open();
            string consulta = "";
            if (Achou)
            {
                consulta = "UPDATE fornecedor SET email='"+email.Text+"', nome_empresa='"+ nome.Text+"', telefone='"+ telefone.Text+"' WHERE Id_fornec="+id.Text;
            }

            else
            {
                consulta = "INSERT INTO fornecedor (id_fornec, email, nome_empresa, telefone) VALUES (" + Convert.ToInt32(id.Text) + ",'" + email.Text + "','" + nome.Text + "','" + telefone.Text + "')";
            }
            SqlCommand command = new SqlCommand(consulta, conexao);

            command.ExecuteNonQuery();

            conexao.Close();
            if (Achou)
                MessageBox.Show("Dados Atualizados com sucesso");
            else
                MessageBox.Show("Dados Inseridos com sucesso");

            //Limpas Campos
            nome.Clear();
            email.Clear();
            telefone.Clear();
            id.Clear();
            id.Focus();

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void id_Leave(object sender, EventArgs e)
        {

            SqlConnection conexao = new SqlConnection(connectionString);

            conexao.Open();

            string consulta = "SELECT email, nome_empresa, telefone FROM fornecedor WHERE Id_fornec=" + id.Text;

            SqlCommand command = new SqlCommand(consulta, conexao);

            SqlDataReader leitor = command.ExecuteReader();

            if (leitor.Read())
            {
                Achou = true;
                nome.Text = leitor.GetString(1);
                email.Text = leitor.GetString(0);
                telefone.Text = leitor.GetString(2);

            }
            else Achou = false;

            conexao.Close();
        }
    }       
}

